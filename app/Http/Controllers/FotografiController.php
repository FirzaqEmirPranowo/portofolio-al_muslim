<?php

namespace App\Http\Controllers;

use App\Models\Fotografi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class FotografiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Fotografi::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('adminpage.page.fotografi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.page.fotografi.create');
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
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/fotografis', $image->hashName());
        $user_id = Auth::user()->id;
        $blog = Fotografi::create([
            'gambar'     => $image->hashName(),
            'judul'     => $request->judul,
            'user_id'   => $user_id

        ]);

        if ($blog) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Ditambah!');
            return redirect()->route('fotografi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('fotografi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function show(Fotografi $fotografi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotografi = Fotografi::findOrFail($id);
        return view('adminpage.page.fotografi.edit', compact('fotografi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'     => 'required',
        ]);

        $fotografi = Fotografi::findOrFail($id);
        if ($request->file('gambar') == "") {
            $fotografi->update([
                'judul'     => $request->judul,
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/fotografis/' . $fotografi->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/fotografis', $image->hashName());

            $fotografi->update([
                'gambar'     => $image->hashName(),
                'judul'     => $request->judul,
            ]);
        }

        if ($fotografi) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Diubah!');
            return redirect()->route('fotografi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('fotografi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $fotografi = Fotografi::findOrFail($id);
        Storage::disk('local')->delete('public/fotografis/' . $fotografi->image);
        $fotografi->delete();

        if ($fotografi) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Dihapus!');
            return redirect()->route('fotografi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('fotografi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
