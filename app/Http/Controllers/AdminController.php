<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($request->only('username', 'password'))){
            if(Auth::user()->isAdmin()){
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();
            return redirect()->route('login')->with('error', 'Anda Tidak Memiliki Hak Akses');
        }

        return back()->with('error', 'Username atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function buku()
    {
        $buku = Buku::all();
        return view('admin.buku.index', compact('buku'));
    }

    public function create()
    {
        $lastBook = Buku::latest()->first();

        if (!$lastBook) {
            // Jika buku pertama kali, mulai dengan nomor produk 10001
            $newProductNumber = "10001";
        } else {
            // Jika sudah ada buku, ambil nomor produk terakhir dan tambah 1
            $newProductNumber = str_pad((int) $lastBook->product_number + 1, 5, "0", STR_PAD_LEFT);
        }

        return view('admin.buku.tambah', compact('newProductNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_number' => 'required|unique:buku,product_number',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
            'stok' => 'required|boolean',
            'penulis' => 'required|string|max:255',
            'jml_halaman' => 'required|string|max:255',
            'dimensi' => 'required|string|max:50',
            'isbn' => 'nullable|string|max:50',
            'e_isbn' => 'nullable|string|max:50',
            'tgl_terbit' => 'required|date',
            'cover_buku' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'product_number.required' => 'Nomor Produk Harus Diisi',
            'product_number.unique' => 'Nomor Produk Sudah Digunakan',
            'judul.required' => 'Judul Buku Harus Diisi',
            'judul.string' => 'Judul Buku Harus Berupa Teks',
            'judul.max' => 'Judul Buku Tidak Boleh Lebih Dari 255 Karakter',
            'deskripsi.string' => 'Deskripsi Buku Harus Berupa Teks',
            'harga.required' => 'Harga Buku Harus Diisi',
            'harga.numeric' => 'Harga Buku Harus Berupa Angka',
            'harga.min' => 'Harga Buku Harus Lebih Dari 0',
            'berat.required' => 'Berat Buku Harus Diisi',
            'berat.numeric' => 'Berat Buku Harus Berupa Angka',
            'berat.min' => 'Berat Buku Harus Lebih Dari 0',
            'stok.required' => 'Stok Buku Harus Diisi',
            'penulis.required' => 'Penulis Buku Harus Diisi',
            'penulis.string' => 'Penulis Buku Harus Berupa Teks',
            'penulis.max' => 'Penulis Buku Tidak Boleh Lebih Dari 255 Karakter',
            'jml_halaman.required' => 'Jumlah Halaman Buku Harus Diisi',
            'jml_halaman.string' => 'Jumlah Halaman Buku Harus Berupa Teks',
            'jml_halaman.max' => 'Jumlah Halaman Buku Tidak Boleh Lebih Dari 255 Karakter',
            'dimensi.required' => 'Dimensi Buku Harus Diisi',
            'dimensi.string' => 'Dimensi Buku Harus Berupa Teks',
            'dimensi.max' => 'Dimensi Buku Tidak Boleh Lebih Dari 50 Karakter',
            'isbn.string' => 'ISBN Buku Harus Berupa Teks',
            'isbn.max' => 'ISBN Buku Tidak Boleh Lebih Dari 50 Karakter',
            'e_isbn.string' => 'E-ISBN Buku Harus Berupa Teks',
            'e_isbn.max' => 'E-ISBN Buku Tidak Boleh Lebih Dari 50 Karakter',
            'tgl_terbit.required' => 'Tanggal Terbit Buku Harus Diisi',
            'tgl_terbit.date' => 'Tanggal Terbit Buku Harus Berupa Tanggal',
            'cover_buku.required' => 'Cover Buku Harus Diisi',
            'cover_buku.image' => 'Cover Buku Harus Berupa Gambar',
            'cover_buku.mimes' => 'Cover Buku Harus Berformat jpeg, png, jpg',
            'cover_buku.max' => 'Cover Buku Tidak Boleh Lebih Dari 2MB',
        ]);

        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');

            $lastProduct = Buku::latest()->first();
            if ($lastProduct) {
                $newProductNumber = str_pad((int) $lastProduct->product_number + 1, 5, "0", STR_PAD_LEFT);
            } else {
                $newProductNumber = "10001"; // Jika belum ada produk, mulai dengan 10001
            }

            $filename = 'cover-' . $newProductNumber . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('cover', $filename, 'public');
            $validatedData['cover_buku'] = $filePath;
        }

        Buku::create($validatedData);

        return redirect()->route('buku.index')->with('success', 'Buku Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_number)
    {
        $buku = Buku::where('product_number', $product_number)->firstOrFail();
        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_number)
    {
        $buku = Buku::where('product_number', $product_number)->firstOrFail();
        return view('admin.buku.edit', compact('buku'));
    }

    public function update(Request $request, $product_number)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
            'stok' => 'required|boolean',
            'penulis' => 'required|string|max:255',
            'jml_halaman' => 'required|string|max:255',
            'dimensi' => 'required|string|max:50',
            'isbn' => 'nullable|string|max:50',
            'e_isbn' => 'nullable|string|max:50',
            'tgl_terbit' => 'required|date',
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Jika cover buku diupload
        ], [
            'judul.required' => 'Judul Buku Harus Diisi',
            'judul.string' => 'Judul Buku Harus Berupa Teks',
            'judul.max' => 'Judul Buku Tidak Boleh Lebih Dari 255 Karakter',
            'deskripsi.string' => 'Deskripsi Buku Harus Berupa Teks',
            'harga.required' => 'Harga Buku Harus Diisi',
            'harga.numeric' => 'Harga Buku Harus Berupa Angka',
            'harga.min' => 'Harga Buku Harus Lebih Dari 0',
            'berat.required' => 'Berat Buku Harus Diisi',
            'berat.numeric' => 'Berat Buku Harus Berupa Angka',
            'berat.min' => 'Berat Buku Harus Lebih Dari 0',
            'stok.required' => 'Stok Buku Harus Diisi',
            'penulis.required' => 'Penulis Buku Harus Diisi',
            'penulis.string' => 'Penulis Buku Harus Berupa Teks',
            'penulis.max' => 'Penulis Buku Tidak Boleh Lebih Dari 255 Karakter',
            'jml_halaman.required' => 'Jumlah Halaman Buku Harus Diisi',
            'jml_halaman.string' => 'Jumlah Halaman Buku Harus Berupa Teks',
            'jml_halaman.max' => 'Jumlah Halaman Buku Tidak Boleh Lebih Dari 255 Karakter',
            'dimensi.required' => 'Dimensi Buku Harus Diisi',
            'dimensi.string' => 'Dimensi Buku Harus Berupa Teks',
            'dimensi.max' => 'Dimensi Buku Tidak Boleh Lebih Dari 50 Karakter',
            'isbn.string' => 'ISBN Buku Harus Berupa Teks',
            'isbn.max' => 'ISBN Buku Tidak Boleh Lebih Dari 50 Karakter',
            'e_isbn.string' => 'E-ISBN Buku Harus Berupa Teks',
            'e_isbn.max' => 'E-ISBN Buku Tidak Boleh Lebih Dari 50 Karakter',
            'tgl_terbit.required' => 'Tanggal Terbit Buku Harus Diisi',
            'tgl_terbit.date' => 'Tanggal Terbit Buku Harus Berupa Tanggal',
            'cover_buku.image' => 'Cover Buku Harus Berupa Gambar',
            'cover_buku.mimes' => 'Cover Buku Harus Berformat jpeg, png, jpg',
            'cover_buku.max' => 'Cover Buku Tidak Boleh Lebih Dari 2MB',
        ]);

        $buku = Buku::where('product_number', $product_number)->first();

        if (!$buku) {
            return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan');
        }

        $buku->judul = $validatedData['judul'];
        $buku->deskripsi = $validatedData['deskripsi'];
        $buku->penulis = $validatedData['penulis'];
        $buku->harga = $validatedData['harga'];
        $buku->stok = $validatedData['stok'];
        $buku->jml_halaman = $validatedData['jml_halaman'];
        $buku->dimensi = $validatedData['dimensi'];
        $buku->berat = $validatedData['berat'];
        $buku->isbn = $validatedData['isbn'];
        $buku->e_isbn = $validatedData['e_isbn'];
        $buku->tgl_terbit = $validatedData['tgl_terbit'];

        if ($request->hasFile('cover_buku')) {
            // Hapus cover lama jika ada
            if ($buku->cover_buku && file_exists(storage_path('app/public/' . $buku->cover_buku))) {
                unlink(storage_path('app/public/' . $buku->cover_buku));
            }

            // Simpan file baru dengan nama berdasarkan product_number
            $file = $request->file('cover_buku');
            $filename = 'cover-' . $product_number . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('cover', $filename, 'public');
            $buku->cover_buku = $filePath;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_number)
    {
        $buku = Buku::where('product_number', $product_number)->first();

        if (!$buku) {
            return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan');
        }

        if ($buku->cover_buku) {
            unlink(storage_path('app/public/' . $buku->cover_buku));
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
