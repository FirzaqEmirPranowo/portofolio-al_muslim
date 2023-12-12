<?php

namespace App\Http\Controllers;

use App\Models\Cerpen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CerpenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Cerpen::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('adminpage.page.cerpen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.page.cerpen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'isi'   => 'required'
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/cerpens', $image->hashName());
        $user_id = Auth::user()->id;
        // Membuat slug dari judul berita
        $slug = Str::slug($request->input('judul'));
        $blog = Cerpen::create([
            'gambar'     => $image->hashName(),
            'judul'     => $request->judul,
            'isi'   => $request->isi,
            'slug'   => $slug,
            'user_id'   => $user_id

        ]);

        if ($blog) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Ditambah!');
            return redirect()->route('cerpen.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('cerpen.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cerpen  $cerpen
     * @return \Illuminate\Http\Response
     */
    public function show(Cerpen $cerpen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cerpen  $cerpen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cerpen = Cerpen::findOrFail($id);
        return view('adminpage.page.cerpen.edit', compact('cerpen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cerpen  $cerpen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'     => 'required',
            'isi'   => 'required'
        ]);

        //get data Blog by ID

        $slug = Str::slug($request->input('judul'));
        $cerpen = Cerpen::findOrFail($id);
        if ($request->file('gambar') == "") {
            $cerpen->update([
                'judul'     => $request->judul,
                'isi'   => $request->isi,
                'slug'   => $slug
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/cerpens/' . $cerpen->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/cerpens', $image->hashName());

            $cerpen->update([
                'gambar'     => $image->hashName(),
                'judul'     => $request->judul,
                'isi'   => $request->isi,
                'slug'   => $slug
            ]);
        }

        if ($cerpen) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Diubah!');
            return redirect()->route('cerpen.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('cerpen.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cerpen  $cerpen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cerpen = Cerpen::findOrFail($id);
        Storage::disk('local')->delete('public/cerpens/' . $cerpen->image);
        $cerpen->delete();

        if ($cerpen) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Dihapus!');
            return redirect()->route('cerpen.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('cerpen.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
