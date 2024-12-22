<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CV Pustaka Mandiri Jaya</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        /* Global Style */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif; /* Font modern */
        }

        body {
            position: relative;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #f8f9fa; /* Warna abu-abu terang */
            color: #333;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
            font-size: 14px;
        }

        .navbar {
            z-index: 1000;
            background: linear-gradient(135deg, #4a90e2, #87ceeb); /* Gradasi biru pastel */
        }

        .navbar .nav-link {
            color: #ffffff;
            font-weight: 600;
            padding: 12px 20px;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .navbar .nav-link:hover {
            color: #ffe066; /* Hover warna kuning lembut */
            text-decoration: none;
            transform: scale(1.05);
        }

        .navbar .nav-link.btn-danger {
            background-color: #ff6f61; /* Warna merah soft */
            color: white;
            border-radius: 5px;
            padding: 12px 20px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .navbar .nav-link.btn-danger:hover {
            background-color: #ff4b3a; /* Hover efek lebih gelap */
        }

        .navbar-brand {
            font-weight: 700;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }

        .navbar .nav-item.active .nav-link {
            color: #ffd700; /* Warna emas untuk link aktif */
        }

        footer {
            background-color: #87ceeb; /* Biru langit sinkron dengan navbar */
            color: #ffffff;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
            font-size: 14px;
        }

        footer p {
            margin: 0;
            padding: 0.5rem 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">CV Pustaka Mandiri Jaya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buku.index') }}">Kelola Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white px-3" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 CV Pustaka Mandiri Jaya. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(function () {
            $('#bukuTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
</body>
</html>
