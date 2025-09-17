<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Flashy Flashcards')</title>
    <style>
        /* Reset & Basic Styles */
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Mitr', sans-serif;
            background: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: #3787FF;
            color: white;
            padding: 15px 30px;
            font-family: 'Rubik One', sans-serif;
            font-size: 28px;
            text-align: center;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        
        /* Navigation */
        nav {
            background: #255ec1;
            padding: 10px 30px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        @yield('additional-styles')
    </style>
</head>
<body>
    <header>
        @yield('header', 'Flashy Flashcards')
    </header>
    
    <nav>
        <a href="{{ route('home') }}">Home</a>
        @yield('navigation')
    </nav>
    
    <main>
        @yield('content')
    </main>
    
    @yield('scripts')
</body>
</html>