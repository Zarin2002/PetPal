<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PetConnect</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            color: #333;
        }

        /* Top Navigation */
        .topbar {
            background-color: #1f3a93;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .topbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
            transition: 0.3s;
        }
        .topbar a:hover { text-decoration: underline; }

        /* Page container */
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background: #1f3a93;
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- Topbar -->
    <div class="topbar">
        <div><strong>PetConnect</strong></div>
        <div>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('my-account') }}">My Account</a>
            <a href="{{ route('adopt') }}">Adopt</a>
            <!-- Cart and Logout links removed since they don't exist yet -->
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 PetConnect. All Rights Reserved.
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



