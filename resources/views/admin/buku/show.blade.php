@extends('admin.layouts.app')

@section('content')
    <main>
        <section class="py-5" style="background: linear-gradient(90deg, #e3f2fd, #f8f9fa);">
            <div class="container">
                <div class="row">
                    <!-- Kolom Kiri: Foto Cover -->
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            @if($buku->cover_buku)
                                <img src="{{ asset('storage/' . $buku->cover_buku) }}" 
                                     alt="{{ $buku->judul }}" 
                                     class="img-fluid rounded border"
                                     style="width: 100%; height: auto; object-fit: cover; border: 5px solid #ddd;">
                            @endif
                        </div>
                    </div>

                    <!-- Kolom Kanan: Detail Buku -->
                    <div class="col-md-8">
                        <h1 class="mb-4">{{ $buku->judul }}</h1>
                        <div class="card shadow border-0" style="background-color: #f8f9fa;">
                            <div class="card-body">
                                <p><i class="fas fa-user"></i> <strong>Penulis:</strong> {{ $buku->penulis }}</p>
                                <p><i class="fas fa-tag"></i> <strong>Harga:</strong> Rp{{ number_format($buku->harga, 0, ',', '.') }}</p>
                                <p><i class="fas fa-box"></i> <strong>Stok:</strong> {{ $buku->stok ? 'Tersedia' : 'Tidak Tersedia' }}</p>
                                <p><i class="fas fa-book"></i> <strong>Jumlah Halaman:</strong> {{ $buku->jml_halaman }}</p>
                                <p><i class="fas fa-ruler-combined"></i> <strong>Dimensi:</strong> {{ $buku->dimensi }}</p>
                                <p><i class="fas fa-weight"></i> <strong>Berat:</strong> {{ $buku->berat }} gr</p>
                                <p><i class="fas fa-barcode"></i> <strong>ISBN:</strong> {{ $buku->isbn ? $buku->isbn : '-' }}</p>
                                <p><i class="fas fa-barcode"></i> <strong>e-ISBN:</strong> {{ $buku->e_isbn ? $buku->e_isbn : '-' }}</p>
                                <p><i class="fas fa-calendar-alt"></i> <strong>Tanggal Terbit:</strong> {{ $buku->tgl_rilis ? $buku->tgl_rilis : '-' }}</p>
                                <p><i class="fas fa-align-left"></i> <strong>Deskripsi:</strong> {{ $buku->deskripsi }}</p>

                                <!-- Tombol Kembali, Edit, dan Hapus -->
                                <div class="text-center mt-4">
                                    <a href="{{ route('buku.index') }}" class="btn btn-secondary me-2">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                    <a href="{{ route('buku.edit', $buku->product_number) }}" class="btn btn-warning me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('buku.hapus', $buku->product_number) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
