<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('create.css') }}">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.getElementById('price');
            const stockInput = document.getElementById('stock');

            function enforceMaxDigits(event) {
                const value = event.target.value;
                if (value.replace('.', '').length > 6) {
                    event.target.value = value.slice(0, -1);
                }
            }

            priceInput.addEventListener('input', enforceMaxDigits);
            stockInput.addEventListener('input', enforceMaxDigits);
        });
    </script>
</head>
<body style="background: url('{{ asset('imagewb/bg.jpeg') }}') no-repeat center center fixed; background-size: cover;">

    <div class="hero">

        <div class="form-container">
            <h1>Edit Product</h1>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="error-container">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required><br>

                <label for="description">Description:</label>
                <textarea id="description" name="description">{{ old('description', $product->description) }}"></textarea><br>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required><br>

                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required><br>

                <!-- Category Selection -->
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" required>
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select><br>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image"><br>

                @if ($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" width="100"><br>
                @endif

                <button type="submit">Update Product</button>
            </form>
            <a href="{{ route('products.index') }}" class="back-link">Back to Product List</a>
        </div>
    </div>
</body>
</html>
