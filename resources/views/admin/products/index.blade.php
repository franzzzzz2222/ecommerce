<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <!-- Navigation Link to Home Page -->
            <a href="{{ route('home') }}" class="nav-link">Back to Home</a>
            
            <!-- Search Form -->
            <form action="{{ route('products.index') }}" method="GET" class="search-form">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products...">
                <button type="submit">Search</button>
            </form>

            <!-- Filter by Category -->
            <form action="{{ route('products.index') }}" method="GET" class="filter-form">
                <label for="category">Filter by Category:</label>
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>

            <!-- Link to add a new product -->
            <a href="{{ route('products.create') }}" class="add-product-link">Add New Product</a>
        </aside>

        <main class="content">
            <h1>Products List</h1>

            <!-- Display success message if available -->
            @if (session('success'))
                <div class="message">
                    {{ session('success') }}
                </div>
            @endif

            <!-- List of products -->
            <ul>
                @foreach ($products as $product)
                    <li>
                        <strong>{{ $product->product_name }}</strong> - ₱{{ number_format($product->price, 2) }} - Stock: {{ $product->stock }}<br>
                        <p>{{ $product->description }}</p>
                        @if ($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}">
                        @endif
                        <a href="{{ route('products.edit', $product->id) }}" class="edit-button">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </main>
    </div>
</body>
</html>
