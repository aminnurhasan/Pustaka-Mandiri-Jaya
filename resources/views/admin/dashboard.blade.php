@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <main>
        <section class="py-5" style="background: linear-gradient(90deg, #e3f2fd, #f8f9fa); min-height: 100vh; display: flex; flex-direction: column;">
            <div class="container">
                <div class="row justify-content-center gy-4">
                    <!-- Card Kelola Buku -->
                    <div class="col-md-4">
                        <div class="card border-2 shadow-lg" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-book fa-3x text-primary"></i>
                                </div>
                                <h5 class="card-title fw-bold">Kelola Buku</h5>
                                <p class="card-text text-muted">Tambahkan, edit, atau hapus data buku dalam katalog.</p>
                                <a href="#" class="btn btn-primary w-100">Kelola Buku</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Katalog -->
                    <div class="col-md-4">
                        <div class="card border-2 shadow-lg" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-list-alt fa-3x text-success"></i>
                                </div>
                                <h5 class="card-title fw-bold">Katalog</h5>
                                <p class="card-text text-muted">Telusuri dan lihat daftar buku yang tersedia di katalog.</p>
                                <a href="#" class="btn btn-success w-100">Lihat Katalog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
