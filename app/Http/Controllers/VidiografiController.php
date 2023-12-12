<?php

namespace App\Http\Controllers;

use App\Models\Vidiografi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class VidiografiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Vidiografi::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('adminpage.page.vidiografi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.page.vidiografi.create');
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
            'vidio' => ['required', 'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/',],
        ]);

        $user_id = Auth::user()->id;

        // Check if the provided link is a valid YouTube link
        if (!$this->isYouTubeLink($request->vidio)) {
            return redirect()->route('vidiografi.index')->with(['error' => 'Invalid YouTube link!']);
        }

        $blog = Vidiografi::create([
            'vidio'     => $request->vidio,
            'user_id'   => $user_id

        ]);

        if ($blog) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Ditambah!');
            return redirect()->route('vidiografi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vidiografi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vidiografi  $vidiografi
     * @return \Illuminate\Http\Response
     */
    public function show(Vidiografi $vidiografi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vidiografi  $vidiografi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vidiografi = Vidiografi::findOrFail($id);
        return view('adminpage.page.vidiografi.edit', compact('vidiografi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vidiografi  $vidiografi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vidio' => ['required', 'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/',],
        ]);

        // Check if the provided link is a valid YouTube link
        if (!$this->isYouTubeLink($request->vidio)) {
            return redirect()->route('vidiografi.index')->with(['error' => 'Invalid YouTube link!']);
        }


        $vidiografi = Vidiografi::findOrFail($id);
        $vidiografi->update([
            'vidio'     => $request->vidio,
        ]);

        if ($vidiografi) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Diubah!');
            return redirect()->route('vidiografi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vidiografi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vidiografi  $vidiografi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vidiografi = Vidiografi::findOrFail($id);
        $vidiografi->delete();

        if ($vidiografi) {
            //redirect dengan pesan sukses
            Alert::success('Berhasil', 'Data Berhasil Dihapus!');
            return redirect()->route('vidiografi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vidiografi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    private function isYouTubeLink($link)
    {
        // Check if the link matches the YouTube URL pattern
        return preg_match('/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/', $link);
    }
}
