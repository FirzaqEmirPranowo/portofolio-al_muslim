<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Blog::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('adminpage.page.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.page.blog.create');
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
        $image->storeAs('public/blogs', $image->hashName());
        $user_id = Auth::user()->id;
        // Membuat slug dari judul berita
        $slug = Str::slug($request->input('judul'));
        $blog = Blog::create([
            'gambar'     => $image->hashName(),
            'judul'     => $request->judul,
            'isi'   => $request->isi,
            'slug'   => $slug,
            'user_id'   => $user_id

        ]);

        if ($blog) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Ditambah!');
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('adminpage.page.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
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
        $blog = Blog::findOrFail($id);
        if ($request->file('gambar') == "") {
            $blog->update([
                'judul'     => $request->judul,
                'isi'   => $request->isi,
                'slug'   => $slug
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/blogs/' . $blog->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/blogs', $image->hashName());

            $blog->update([
                'gambar'     => $image->hashName(),
                'judul'     => $request->judul,
                'isi'   => $request->isi,
                'slug'   => $slug
            ]);
        }

        if ($blog) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Diubah!');
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        Storage::disk('local')->delete('public/blogs/' . $blog->image);
        $blog->delete();

        if ($blog) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Dihapus!');
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
