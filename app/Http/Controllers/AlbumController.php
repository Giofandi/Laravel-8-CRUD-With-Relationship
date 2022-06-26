<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
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
            $results = Album::with('artist')->where('title', 'LIKE', '%'.$search.'%')->get();
            return view('albums.search', compact('results'));
        } else
        {
            $results = Artist::with('albums')->paginate(10);
            return view('albums.index', compact('results'));
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
        $results = Artist::get(['id', 'name']);
        return view('albums.create', compact('results'));
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
        $request->validate([
            'title' => 'required',
            'artist_id' => 'required'
        ]);

        Album::create([
            'title' => $request->title,
            'artist_id' => $request->artist_id
        ]);

        return redirect()->route('albums.index')
            ->with('success', 'Album '.$request->title.' Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
        $artists = Artist::whereRelation('Albums', 'id', '=', $album->id )->get();
        return view('albums.show', compact('album', 'artists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
        $artists = Artist::whereRelation('Albums', 'id', '=', $album->id )->get();
        return view('albums.edit', compact('album', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
        $request->validate([
            'title' => 'required'
        ]);

        $album->update($request->all());

        return redirect()->route('albums.index')
            ->with('success', 'Album '.$album->title.' Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
        $album->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Album ' .$album->title. ' Deleted Successfully.');
    }
}
