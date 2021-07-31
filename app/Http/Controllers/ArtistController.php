<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Image;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        return view('artists.create', compact('artists'))->with('i');
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
            'bio' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
			$img = Image::make($photo);
			$img->fit(150);
			$img->save(public_path('/uploads/' . $filename));
			$request->photo = $filename;
        }

        $artist = Artist::create([
			'name' => $request->name,
			'bio' => $request->bio,
			'photo' => $request->photo,
		]);
		
		return redirect()->route('artists.index')
			->with('success','New artist created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'bio' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
			$img = Image::make($photo);
			$img->fit(150);
			$img->save(public_path('/uploads/' . $filename));
			$request->photo = $filename;
        }

        $artist->update($request->all());
		return redirect()->route('artists.index')
			->with('success','Artist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $file_path = public_path('/uploads/' . $artist->photo);
		if(file_exists($file_path)){
			@unlink($file_path);
		}

		$artist->delete();

		return redirect()->route('artists.index')
			->with('success','Artist deleted successfully.');
    }
}
