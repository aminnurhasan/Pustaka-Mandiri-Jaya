@extends('admin.layouts.app')

@section('content')
    <main>
        <!-- Background Gradasi dengan tinggi penuh layar -->
        <section class="py-5" style="background: linear-gradient(90deg, #e3f2fd, #f8f9fa); min-height: 100vh; display: flex; flex-direction: column;">
            <div class="container flex-grow-1">
                <h1 class="mb-4 text-center">Kelola Buku</h1>
                
                <!-- Tombol Tambah Buku Baru -->
                <div class="text-center mb-4">
                    <a href="{{ route('buku.tambah') }}" class="btn btn-success btn-lg">
                        <i class="fas fa-plus-circle"></i> Tambah Buku Baru
                    </a>
                </div>

                <!-- Tabel Buku -->
                <div class="card shadow border-0" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bukuTable" class="display table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. Produk</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku as $item)
                                    <tr>
                                        <td class="col-1">{{ $item->product_number }}</td>
                                        <td class="col-3">{{ $item->judul }}</td>
                                        <td class="col-2">{{ $item->penulis }}</td>
                                        <td class="col-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td class="col-1">{{ $item->stok ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                                        <td class="col-2">
                                            <a href="{{ route('buku.show', $item->product_number) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('buku.edit', $item->product_number) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('buku.hapus', $item->product_number) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
