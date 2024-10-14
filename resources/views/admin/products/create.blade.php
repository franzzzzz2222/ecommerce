<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="{{ asset('create.css') }}">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.getElementById('price');
            const stockInput = document.getElementById('stock');

            function enforceMaxDigits(event) {
                const value = event.target.value;
                if (value.length > 6) {
                    event.target.value = value.slice(0, 6);
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
            <h1>Create New Product</h1>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" required><br>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" required><br>

                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required><br>

                <!-- Category Selection -->
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select><br>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image"><br>

                <button type="submit">Create Product</button>
            </form>
            <a href="{{ route('products.index') }}" class="back-link">Back to Product List</a>
        </div>
    </div>
</body>
</html>
