<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design House</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .hero {
            height: 100vh;
            background: url('image/house.jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .hero h1 {
            font-size: 3em;
            margin-bottom: 0.5em;
        }
        .hero p {
            font-size: 1.5em;
        }
        .nav {
            background: rgba(0, 0, 0, 0.4);
            padding: 1em;
            position: fixed;
            width: 100%;
            top: 0;
            text-align: right;
        }
        .nav a {
            color: #f5e8c7;
            margin: 0 2em;
            text-decoration: none;
            padding: 0.5em 1em;
            border: 1px solid #f5e8c7;
            border-color: #ffcc00;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }
        .nav a:hover {
            background-color: #ffcc00;
            font-weight: bold;
            color: #black;
        }

    </style>
</head>
<body>
    <div class="nav">
        @if (Route::has('login'))
        
                    @auth
                    <a>
                       <x-app-layout>

                      </x-app-layout>
                  </a>
                    @else
                    <a href="{{ route('login') }}">Sign up</a>

           @if (Route::has('register'))
            <a href="{{ route('register') }}">Sign in</a>
                       
                        @endif
                    @endauth
                
            @endif



       
    </div>
    <div class="hero" id="home">
        <div>
            <h1>Welcome to Design House</h1>
            <p>Explore the finest designs by our talented designers.</p>
        </div>
    </div>

</body>
</html>