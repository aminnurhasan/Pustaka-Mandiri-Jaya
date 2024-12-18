<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - CV Pustaka Mandiri Jaya</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan style custom jika diperlukan */
        #home {
            background: linear-gradient(to bottom, #f8f9fa, #ffffff);
        }
        footer {
            font-size: 0.9rem;
        }
        /* Media queries untuk layar kecil */
        @media (max-width: 768px) {
            #home h1 {
                font-size: 1.8rem;
            }
            #home p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">CV Pustaka Mandiri Jaya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#katalog">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white px-3" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="py-5 bg-light">
        <div class="container text-center">
            <h1 class="display-4">Selamat Datang di CV Pustaka Mandiri Jaya</h1>
            <p class="lead mt-3">Kami menyediakan berbagai buku berkualitas untuk semua kalangan. Temukan koleksi buku terbaik kami sekarang juga!</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Tentang Kami</h2>
                    <p>CV Pustaka Mandiri Jaya adalah sebuah perusahaan yang bergerak di bidang penyediaan buku untuk pendidikan, literasi, dan hiburan. Kami berdedikasi untuk memberikan layanan terbaik dan produk berkualitas tinggi kepada pelanggan kami.</p>
                </div>
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500x300" class="img-fluid rounded" alt="Tentang Kami">
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Section -->
    <section id="katalog" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Katalog Buku</h2>
            <p class="text-center">Temukan koleksi buku yang tersedia di CV Pustaka Mandiri Jaya. Klik tombol di bawah ini untuk melihat katalog lengkap.</p>
            <div class="text-center mt-3">
                <a href="/katalog" class="btn btn-success px-4">Lihat Katalog</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white text-center">
        <p>&copy; 2024 CV Pustaka Mandiri Jaya. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
