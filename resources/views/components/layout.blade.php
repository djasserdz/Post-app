<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --background-color: #ecf0f1;
            --text-color: #34495e;
            --nav-color: #2c3e50;
            --nav-text-color: #ffffff;
            --hover-color: #e74c3c;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        nav {
            background-color: var(--nav-color);
            color: var(--nav-text-color);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: var(--nav-text-color);
            text-decoration: none;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: var(--secondary-color);
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 1rem;
        }

        .user-menu {
            position: relative;
        }

        .user-menu button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .user-menu-content {
            position: absolute;
            right: 0;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            border-radius: 4px;
            min-width: 200px;
            display: none;
            z-index: 10;
        }

        .user-menu-content[x-show="open"] {
            display: block;
        }

        .user-menu-content img {
            border-radius: 50%;
            border: 2px solid var(--secondary-color);
            margin-bottom: 1rem;
        }

        .user-menu-content p {
            text-align: center;
            margin: 0;
            font-size: 1rem;
            font-weight: bold;
        }

        .user-menu-content a,
        .user-menu-content button {
            display: block;
            padding: 0.5rem;
            text-decoration: none;
            color: var(--text-color);
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .user-menu-content a:hover,
        .user-menu-content button:hover {
            background-color: var(--primary-color);
            color: var(--nav-text-color);
        }

        main {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 2rem;
        }

        .home-icon {
            color: var(--secondary-color);
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ route('home') }}"><i class="fa-solid fa-house home-icon"></i> Home</a>
        @guest
        <ul>
            <li><a href="{{ route('view.register') }}">Register</a></li>
            <li><a href="{{ route('view.login') }}">Login</a></li>
        </ul>
        @endguest
        @auth
        <div x-data="{ open: false }" class="user-menu">
            <button @click="open = !open"><img src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="User avatar" width="50px"></button>
            <div x-show="open" class="user-menu-content">
                <!-- User Avatar inside the dropdown -->
                <p>{{ auth()->user()->username }}</p>
                <a href="{{route('view.profile')}}"><i class="fa-solid fa-user"></i> Profile</a>
                <a href="{{route('post.index')}}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button><i class="fa-solid fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
        </div>
        @endauth
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
