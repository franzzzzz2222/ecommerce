<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="{{ asset('sc2.css') }}">
    <style>
        body {
            color: white; /* Set default text color to white */
        }

        .message {
            color: white; /* Make sure success messages are white */
        }

        .nav-link,
        .add-user-link,
        .edit-button,
        .delete-button,
        .description-button {
            color: white; /* Set link colors to white */
        }

        .users-list {
            list-style: none; /* Remove default list styles */
            padding: 0; /* Remove padding */
        }

        /* Optional: Style for buttons */
        button {
            background-color: transparent; /* Transparent button background */
            color: white; /* Button text color */
            border: 1px solid white; /* White border for buttons */
            padding: 5px 10px; /* Padding for buttons */
            cursor: pointer; /* Pointer cursor on hover */
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Light hover effect */
        }
    </style>
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
                <h1 style="color: white;">🅽🅴🆇🆃🅶🅴🅽 🅵🅾🆁 🆄🆂🅴🆁🆂</h1>

                <!-- Display success message if available -->
                @if (session('success'))
                    <div class="message">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Search Form -->
                <form action="{{ route('users.index') }}" method="GET" class="search-form">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users..." style="color: white;">
                    <button type="submit">Search</button>
                </form>

                <!-- Link to add a new user -->
                <a href="{{ route('users.create') }}" class="add-user-link">Add New User</a>

                <!-- List of users -->
                <ul class="users-list">
                    @foreach ($users as $user)
                        <li>
                            <strong>{{ $user->name }}</strong><br>
                            <span>Email: {{ $user->email }}</span><br>
                            <span>Role: {{ $user->role }}</span><br>
                            <a href="{{ route('users.edit', $user->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <!-- Modal for displaying descriptions -->
                <div id="descriptionModal" class="popup-content">
                    <span class="close">&times;</span>
                    <h2>Description</h2>
                    <p id="descriptionText"></p>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Get modal element
        var modal = document.getElementById("descriptionModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Get all description links
        var descLinks = document.querySelectorAll('.description-button');

        // Function to show modal with description
        descLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var description = this.getAttribute('data-description');
                document.getElementById('descriptionText').innerText = description;
                modal.style.display = "block";
            });
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
