<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CV Pustaka Mandiri Jaya</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        }

        body {
            position: relative;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #343a40; /* Warna background footer */
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }

        .navbar {
            z-index: 1000; /* Agar navbar selalu di atas */
        }

        .card {
            margin-bottom: 1rem;
        }

        .navbar .nav-link.btn-danger {
            background-color: #ff0000; /* Merah */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar .nav-link.btn-danger:hover {
            background-color: #cc0000; /* Merah lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">CV Pustaka Mandiri Jaya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tambah Buku</a>
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

    <!-- Header -->
    <header class="text-center bg-primary text-white py-5">
        <div class="container">
            <h1>Selamat Datang, Admin</h1>
            <p class="lead">Kelola buku dan statistik untuk <strong>CV Pustaka Mandiri Jaya</strong>.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Card Tambah Buku -->
                    <div class="col-md-4 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Tambah Buku</h5>
                                <p class="card-text">Tambah data buku baru ke dalam katalog.</p>
                                <a href="#" class="btn btn-success">Tambah Buku</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Katalog -->
                    <div class="col-md-4 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Katalog</h5>
                                <p class="card-text">Lihat dan kelola daftar buku yang tersedia.</p>
                                <a href="#" class="btn btn-info">Lihat Katalog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 CV Pustaka Mandiri Jaya. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
