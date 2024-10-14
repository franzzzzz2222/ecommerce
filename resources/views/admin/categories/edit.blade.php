<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="{{ asset('create.css') }}">
</head>
<body style="background: url('{{ asset('imagewb/bg.jpeg') }}') no-repeat center center fixed; background-size: cover;">

    <div class="hero">

        <div class="form-container">
            <h1>Edit Category</h1>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
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

                <label for="name">Category Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required><br>

                <button type="submit">Update Category</button>
            </form>
            <a href="{{ route('categories.index') }}" class="back-link">Back to Category List</a>
        </div>
    </div>
</body>
</html>
