<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <!-- Navigation Link to Home Page -->
            <a href="{{ route('home') }}" class="nav-link">Back to Home</a>
            
            <!-- Search Form -->
            <form action="{{ route('categories.index') }}" method="GET" class="search-form">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search categories...">
                <button type="submit">Search</button>
            </form>

            <!-- Link to add a new category -->
            <a href="{{ route('categories.create') }}" class="add-category-link">Add New Category</a>
        </aside>

        <main class="content">
            <h1>Categories List</h1>

            <!-- Display success message if available -->
            @if (session('success'))
                <div class="message">
                    {{ session('success') }}
                </div>
            @endif

            <!-- List of categories -->
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <strong>{{ $category->name }}</strong><br>
                        <a href="{{ route('categories.edit', $category->id) }}" class="edit-button">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
