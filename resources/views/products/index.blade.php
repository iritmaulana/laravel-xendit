<!DOCTYPE html>
<html>

<head>
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Produk</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md p-6">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4">
                    @endif
                    <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    <p class="text-lg font-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('products.show', $product) }}"
                        class="block text-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Beli Sekarang
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
