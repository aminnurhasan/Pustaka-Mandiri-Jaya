@extends('admin.layouts.app')

@section('content')
    <main>
        <section class="py-5" style="background: linear-gradient(90deg, #e3f2fd, #f8f9fa);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="mb-4 text-center font-weight-bold">Edit Buku</h1>
                        <div class="card shadow-sm border-0 rounded-lg">
                            <div class="card-body">
                                <form action="{{ route('buku.update', $buku->product_number) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                    <!-- Nomor Produk -->
                                    <div class="mb-3">
                                        <label for="product_number" class="form-label">Nomor Produk</label>
                                        <input type="text" name="product_number" class="form-control" id="product_number" value="{{ $buku->product_number }}" disabled>
                                    </div>
                                    
                                    <!-- Judul Buku -->
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Buku <span class="text-danger">*</span></label>
                                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul', $buku->judul) }}" >
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Deskripsi Buku -->
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi Buku</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Penulis -->
                                    <div class="mb-3">
                                        <label for="penulis" class="form-label">Penulis <span class="text-danger">*</span></label>
                                        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" id="penulis" value="{{ old('penulis', $buku->penulis) }}" >
                                        @error('penulis')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Harga -->
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga', $buku->harga) }}" >
                                        </div>
                                        @error('harga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Stok -->
                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                                        <select name="stok" class="form-select @error('stok') is-invalid @enderror" id="stok" >
                                            <option value="1" {{ old('stok', $buku->stok) == '1' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="0" {{ old('stok', $buku->stok) == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
                                        </select>
                                        @error('stok')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jumlah Halaman -->
                                    <div class="mb-3">
                                        <label for="jml_halaman" class="form-label">Jumlah Halaman <span class="text-danger">*</span></label>
                                        <input type="text" name="jml_halaman" class="form-control @error('jml_halaman') is-invalid @enderror" id="jml_halaman" value="{{ old('jml_halaman', $buku->jml_halaman) }}" >
                                        @error('jml_halaman')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Dimensi -->
                                    <div class="mb-3">
                                        <label for="dimensi" class="form-label">Dimensi (Panjang x Lebar) <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="dimensi" class="form-control @error('dimensi') is-invalid @enderror" id="dimensi" value="{{ old('dimensi', $buku->dimensi) }}" >
                                            <span class="input-group-text">cm</span>
                                        </div>
                                        @error('dimensi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Berat -->
                                    <div class="mb-3">
                                        <label for="berat" class="form-label">Berat <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" value="{{ old('berat', $buku->berat) }}" >
                                            <span class="input-group-text">Gr</span>
                                        </div>
                                        @error('berat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ISBN -->
                                    <div class="mb-3">
                                        <label for="isbn" class="form-label">ISBN</label>
                                        <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" id="isbn" value="{{ old('isbn', $buku->isbn) }}">
                                        @error('isbn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- e-ISBN -->
                                    <div class="mb-3">
                                        <label for="e_isbn" class="form-label">e-ISBN</label>
                                        <input type="text" name="e_isbn" class="form-control @error('e_isbn') is-invalid @enderror" id="e_isbn" value="{{ old('e_isbn', $buku->e_isbn) }}">
                                        @error('e_isbn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Terbit -->
                                    <div class="mb-3">
                                        <label for="tgl_terbit" class="form-label">Tanggal Terbit <span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_terbit" class="form-control @error('tgl_terbit') is-invalid @enderror" id="tgl_terbit" value="{{ old('tgl_terbit', $buku->tgl_terbit) }}" >
                                        @error('tgl_terbit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Cover Buku -->
                                    <div class="mb-3">
                                        <label for="cover_buku" class="form-label">Cover Buku</label>
                                        @if ($buku->cover_buku)
                                            <div class="mb-3">
                                                <img src="{{ asset('storage/' . $buku->cover_buku) }}" alt="Cover Buku" class="img-fluid mb-2" style="max-height: 200px;">
                                                <p><strong>Cover Buku Saat Ini</strong></p>
                                            </div>
                                        @endif

                                        <input type="file" name="cover_buku" class="form-control @error('cover_buku') is-invalid @enderror" id="cover_buku">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti cover buku.</small>
                                        @error('cover_buku')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Buttons -->
                                    <div class="text-center mt-4">
                                        <a href="{{ route('buku.index') }}" class="btn btn-secondary btn-md">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-md ml-3">
                                            <i class="fas fa-save"></i> Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
