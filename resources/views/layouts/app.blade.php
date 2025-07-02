<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Credit Scoring App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #0d6efd;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
            border-radius: 5px;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: white;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="mb-4">Credit System</h4>
        <a href="{{ route('credit.form') }}">Predict Score</a>
        <a href="#">Logs</a>
        <a href="#">Users</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Welcome</span>
                <div class="d-flex">
                    <span class="navbar-text me-3">Logged in as Admin</span>
                    <a class="btn btn-outline-primary btn-sm" href="#">Logout</a>
                </div>
            </div>
        </nav>

        <!-- Main Yield -->
        @yield('content')
    </div>

    <!-- Bootstrap JS (Optional, for dropdowns etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
