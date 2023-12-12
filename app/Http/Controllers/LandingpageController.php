<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cerpen;
use App\Models\Fotografi;
use App\Models\Vidiografi;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_blog = Blog::limit(6)->get();
        $list_cerpen = Cerpen::limit(6)->get();
        $list_fotografi = Fotografi::limit(6)->get();
        $list_vidiografi = Vidiografi::limit(6)->get();
        return view('landingpage.page.welcome', compact('list_blog', 'list_cerpen', 'list_fotografi', 'list_vidiografi'));
    }

    public function list_blog()
    {
        $list_blog = Blog::all();
        $recent_blog = Blog::limit(5)->get();
        return view('landingpage.page.list_blog', compact('list_blog', 'recent_blog'));
    }

    public function list_cerpen()
    {
        $list_cerpen = Cerpen::all();
        $recent_cerpen = Cerpen::limit(5)->get();
        return view('landingpage.page.list_cerpen', compact('list_cerpen', 'recent_cerpen'));
    }

    public function list_fotografi()
    {
        $list_fotografi = Fotografi::all();
        $recent_fotografi = Fotografi::limit(5)->get();
        return view('landingpage.page.list_fotografi', compact('list_fotografi', 'recent_fotografi'));
    }

    public function list_vidiografi()
    {
        $list_vidiografi = Vidiografi::all();
        $recent_vidiografi = Vidiografi::limit(5)->get();
        return view('landingpage.page.list_vidiografi', compact('list_vidiografi', 'recent_vidiografi'));
    }


    public function detail_cerpen($slug)
    {
        $cerpen = Cerpen::where('slug', $slug)->firstOrFail();
        $new = Cerpen::latest('created_at')->take(5)->get();
        return view('landingpage.page.detail_cerpen', compact('cerpen', 'new'));
    }

    public function detail_blog($slug)
    {
        $blog = blog::where('slug', $slug)->firstOrFail();
        $new = blog::latest('created_at')->take(5)->get();
        return view('landingpage.page.detail_blog', compact('blog', 'new'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
