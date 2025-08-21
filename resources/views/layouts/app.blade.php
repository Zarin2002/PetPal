<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PetConnect</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f6f6f6; margin: 0; }
        .topbar {
            background-color: #2a5bd7;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 1000px; margin: 30px auto; padding: 20px; }
    </style>
</head>
<body>

    <div class="topbar">
        <div><strong>PetConnect</strong></div>
        <div>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('adopt') }}">Adopt</a>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>

