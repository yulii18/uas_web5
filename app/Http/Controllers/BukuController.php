<?php
namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller {

    public function index(Request $request) {
        $query = Buku::with('kategori');
        if ($request->search) {
            $query->where('judul','like','%'.$request->search.'%')
                  ->orWhere('penulis','like','%'.$request->search.'%');
        }
        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }
        $buku      = $query->paginate(10);
        $kategoris = Kategori::all();
        return view('buku.index', compact('buku','kategoris'));
    }

    public function create() {
        $kategoris = Kategori::all();
        return view('buku.create', compact('kategoris'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer',
            'isbn'         => 'required|unique:buku',
            'stok'         => 'required|integer|min:0',
            'kategori_id'  => 'required|exists:kategoris,id',
            'deskripsi'    => 'nullable|string',
            'cover'        => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers','public');
        }
        Buku::create($validated);
        return redirect()->route('buku.index')->with('success','Buku berhasil ditambahkan!');
    }

    public function show(Buku $buku) {
        $buku->load('kategori','peminjamans.anggota');
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku) {
        $kategoris = Kategori::all();
        return view('buku.edit', compact('buku','kategoris'));
    }

    public function update(Request $request, Buku $buku) {
        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer',
            'isbn'         => 'required|unique:buku,isbn,'.$buku->id,
            'stok'         => 'required|integer|min:0',
            'kategori_id'  => 'required|exists:kategoris,id',
            'deskripsi'    => 'nullable|string',
            'cover'        => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers','public');
        }
        $buku->update($validated);
        return redirect()->route('buku.index')->with('success','Buku berhasil diperbarui!');
    }

    public function destroy(Buku $buku) {
        $buku->delete();
        return redirect()->route('buku.index')->with('success','Buku berhasil dihapus!');
    }
}