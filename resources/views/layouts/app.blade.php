<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Design_House') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: url('image/house.jpg') no-repeat center center/cover;
        }
        ul{
              background: rgba(0, 0, 0, 0.4);
            padding: 1em;
            position: absolute;
            width: 100%;
            top: 0;
            text-align: right;

        }
       
        li{
              color: #000000;
            margin: 0 2em;
            text-decoration: none;
            padding: 0.5em 1em;
            border: 1px solid #f5e8c7;
            border-color: #ffcc00;
            border-radius: 20px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }
        li:hover {
            background-color: #ffcc00;
            font-weight: bold;
            color: #000000;
        }
      div{
         padding-top: 2%;
      }
   


    </style>
</head>
<body>


    <ul class="nav justify-content-end">
      
 
          <li class="nav-item">

            <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
          </li>
          <li class="nav-item">
            @auth
              <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
             </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link " href="{{ route('login') }}">login</a>
          </li>
              <li class="nav-item">
            <a class="nav-link " href="{{ route('register') }}">register</a>
          </li>

 @endauth
</ul>

<div class="menu">
     <main class="py-4">
        @yield('content')
    </main>
    
</div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>