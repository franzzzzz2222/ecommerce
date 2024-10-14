<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gonzales Stitch & Style</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body style="background: url('{{ asset('imagewb/bg.jpeg') }}') no-repeat center center fixed; background-size: cover;">

    <div class="hero">

        <nav>
            <img src="{{ asset('assets/img/fb.png') }}" class="logo" alt="Gonzales Stitch & Style Logo">
            <ul>
                <li><a href="#about" id="about-link">ABOUT</a></li>
                <li><a href="{{ route('profile.index') }}">PROFILE</a></li>
                <li><a href="{{ route('products.index') }}">VIEW PRODUCTS</a></li>
                <li><a href="{{ route('categories.index') }}">CATEGORY</a></li>
                <li><a href="{{ route('users.index') }}">USER MANAGEMENT</a></li> <!-- User Management link added -->
            </ul>
            <div class="nav-right">
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-button">LOGOUT</button>
                </form>
            </div>
        </nav>

        <!-- Main content container -->
        <div class="form-container">
            <h1>𝙶𝚘𝚗𝚣𝚊𝚕𝚎𝚜 𝚂𝚝𝚒𝚝𝚌𝚑 & 𝚂𝚝𝚢𝚕𝚎</h1>

            <!-- Pop-up content for About section -->
            <div id="about" class="popup-content">
                <h2>Welcome to Gonzales Stitch & Style</h2>
                <p>Welcome to Gonzales Stitch & Style – your premier destination for high-quality, custom-made basketball jerseys. At our shop, we specialize in crafting stylish and durable jerseys that not only represent your team but also stand out on the court. With a passion for sportswear and a dedication to top-notch tailoring, we ensure that each jersey is designed with precision and care. Whether you're a player looking to make a statement or a fan wanting to support your team in style, Gonzales Stitch & Style has got you covered. Explore our collection and find the perfect fit for your game!</p>
                <button onclick="closePopup()">Close</button>
            </div>

            
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Show the popup content
        document.getElementById('about-link').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.popup-content').style.display = 'block';
        });

        // Close the popup content
        function closePopup() {
            document.querySelector('.popup-content').style.display = 'none';
        }

        // Function to add a user (placeholder for actual implementation)
        function addUser() {
            // Implement your add user functionality here
            alert('Add User functionality goes here.');
        }
    </script>
</body>
</html>
