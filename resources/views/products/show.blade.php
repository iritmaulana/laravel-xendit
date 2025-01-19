<!DOCTYPE html>
<html>

<head>
    <title>{{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto">
                    @endif
                </div>
                <div>
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    <p class="text-2xl font-bold mb-6">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                    <form action="{{ route('orders.store', $product) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="customer_name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="customer_email" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Beli Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
