<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="{{ asset('sc3.css') }}">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');

            function enforceMaxLength(event) {
                const value = event.target.value;
                if (value.length > 100) {
                    event.target.value = value.slice(0, 100);
                }
            }

            nameInput.addEventListener('input', enforceMaxLength);
            emailInput.addEventListener('input', enforceMaxLength);
        });
    </script>
</head>
<body style="background: url('{{ asset('webpic/bgnike.jpeg') }}') no-repeat center center fixed; background-size: cover;">

    <div class="hero">

        <nav>
            <img src="{{ asset('webpic/nlogo.png') }}" class="logo" alt="Nike Logo">
            <ul>
                <li><a href="{{ route('home') }}" class="nav-link">Back to Home</a></li>
            </ul>
        </nav>

        <!-- Main content container -->
        <div class="content-container">
            <main class="content">
                <h1>Create New User</h1>
                <form action="{{ route('users.store') }}" method="POST" class="user-form">
    @csrf

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="password_confirmation" required><br>

    <label for="role">Role:</label>
    <select id="role" name="role" required>
        <option value="" disabled selected>Select Role</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
        <option value="seller">Seller</option>
    </select><br>

    <button type="submit">Create User</button>
</form>


                <a href="{{ route('users.index') }}" class="back-link">Back to Users List</a>
            </main>
        </div>
    </div>
</body>
</html>
