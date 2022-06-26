<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->get('search');
        if ($search)
        {
            $results = Track::with('album.artist')->where('name', 'LIKE', '%'.$search.'%')->get();
            return view('tracks.search', compact('results'));
        } else
        {
            $results = Artist::with('albums.tracks')->paginate(2);
            return view('tracks.index', compact('results'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $results = Artist::with('albums')->get();
        //dd($results);
        return view('tracks.create', compact('results'));
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
        //dd($request);
        $request->validate([
            'name' => 'required',
            'duration' => 'required',
            'album_id' => 'required'
        ]);

        Track::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'album_id' => $request->album_id
        ]);

        return redirect()->route('tracks.index')
            ->with('success', 'Track '.$request->name.' Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        //
        $album = Album::where('id', '=', $track->album_id)->first();
        $artist = Artist::where('id', '=', $album->artist_id)->first();
        return view('tracks.show', compact('artist', 'album', 'track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        //
        $album = Album::where('id', '=', $track->album_id)->first();
        $artist = Artist::where('id', '=', $album->artist_id)->first();
        return view('tracks.edit', compact('artist', 'album', 'track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        //
        $request->validate([
            'name' => 'required',
            'duration' => 'required'

        ]);

        $track->update($request->all());

        return redirect()->route('tracks.index')
            ->with('success', 'Track '.$track->name.' Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        //
        $track->delete();

        return redirect()->route('tracks.index')
            ->with('success', 'Track ' .$track->name. ' Deleted Successfully.');
    }
}
