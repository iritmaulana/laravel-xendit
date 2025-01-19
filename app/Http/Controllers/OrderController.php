<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $apiInstance;

    public function __construct()
    {
        // Setup Xendit configuration
        Configuration::setXenditKey(config('services.xendit.secret_key'));
        $this->apiInstance = new InvoiceApi();
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
        ]);

        try {
            // Create invoice request object
            $createInvoiceRequest = new CreateInvoiceRequest([
                'external_id' => 'inv-' . time(),
                'description' => "Pembelian {$product->name}",
                'amount' => $product->price,
                'invoice_duration' => 86400,
                'currency' => 'IDR',
                'reminder_time' => 1,
                'customer' => [
                    'given_names' => $validated['customer_name'],
                    'email' => $validated['customer_email']
                ],
                'success_redirect_url' => route('payment.success'),
                'failure_redirect_url' => route('payment.failed'),
                'payment_methods' => ['BCA', 'BNI', 'BSI', 'BRI', 'MANDIRI', 'PERMATA', 'ALFAMART', 'INDOMARET', 'OVO', 'DANA', 'LINKAJA', 'QRIS'],
            ]);

            // Optional: If you're using Xendit Platform feature
            $forUserId = null; // Isi dengan Business ID jika menggunakan fitur sub-account

            // Create invoice
            $invoice = $this->apiInstance->createInvoice($createInvoiceRequest, $forUserId);

            // Simpan order ke database
            Order::create([
                'product_id' => $product->id,
                'invoice_id' => $invoice['external_id'],
                'amount' => $invoice['amount'],
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'status' => 'pending'
            ]);

            // Redirect ke halaman pembayaran Xendit
            return redirect($invoice['invoice_url']);
        } catch (\Xendit\XenditSdkException $e) {
            Log::error('Xendit Error: ' . $e->getMessage());
            Log::error('Full Error: ' . json_encode($e->getFullError()));
            return back()->with('error', 'Terjadi kesalahan saat membuat invoice. Silakan coba lagi.');
        }
    }

    public function callback(Request $request)
    {
        try {
            $callbackToken = $request->header('x-callback-token');

            if ($callbackToken !== config('services.xendit.webhook_secret')) {
                return response()->json(['error' => 'Invalid token'], 403);
            }

            $payment = $request->all();

            $order = Order::where('invoice_id', $payment['external_id'])->first();
            if ($order) {
                $order->update([
                    'payment_status' => $payment['status'],
                    'payment_method' => $payment['payment_method'],
                    'payment_channel' => $payment['payment_channel']
                ]);

                if ($payment['status'] === 'PAID') {
                    // Update stock product
                    $product = $order->product;
                    $product->decrement('stock');
                }
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function success()
    {
        return view('payment.success');
    }

    public function failed()
    {
        return view('payment.failed');
    }
}
