<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Icon -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #0d6efd, #0b5ed7);
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .content-wrapper {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .table thead th {
            vertical-align: middle;
        }

        .btn {
            border-radius: 8px;
        }

        .alert {
            border-radius: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
        <div class="container">

            <a class="navbar-brand" href="/products">
                <i class="bi bi-laptop"></i>
                E-Commerce Product
            </a>

            @auth
            <div class="d-flex align-items-center">

                <span class="text-white me-3">
                    <i class="bi bi-person-circle"></i>
                    {{ Auth::user()->name }}
                </span>

                <a href="/logout" class="btn btn-warning btn-sm">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </a>

            </div>
            @endauth

        </div>
    </nav>

    <!-- Content -->
    <main class="container content-wrapper">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        Laravel CRUD & Relationship Project © 2026
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>