<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Artist, Album};

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::orderBy('id', 'desc')->get();
        return view('albums.index')->with('albums', $albums)->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::orderBy('id', 'desc')->get();
        return view('albums.create')->with('artists', $artists);
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
            'name' => 'required|max:255',
            'artist' => 'required',
        ]);

        Album::create($request->all());
        
        return redirect()->route('albums.index')
            ->with('success','New album created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $artist = Artist::orderBy('id', 'desc')->get();
        return view('albums.edit')->with('artist', $artist)->with('album', $album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $album = Album::findOrFail($request->id);
        $album->update($request->all());
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

		return redirect()->route('albums.index')
			->with('success','Album deleted successfully.');
    }
}
