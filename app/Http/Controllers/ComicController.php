<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        $data = [
            'comics' => $comics
        ];


        return view('comics.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:50',
            'series' => 'required|max:50',
            'thumb'=>'required|max:255',
            'price' => 'required'
            
        ]);
    
        $form_data = $request->all();
    
        $comic = new Comic();

        $comic->fill($form_data);
        $comic->save();
        return redirect()->route('comics.show',[
            
            'comic'=> $comic->id
            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comics = Comic::findORfail($id);

        $data=[
            'comics' => $comics
        ];

        return view('comics.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this_comic = Comic::findOrFail($id);
        
        $data = [
            'comic' => $this_comic
        ];

        return view('comics.edit', $data);
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
        $data = $request->all();
        
        $thisComic = Comic::find($id);

        $thisComic->fill($data);

        $thisComic->save();

        return redirect()->route('comics.show', $thisComic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thisComic = Comic::find($id);

        $thisComic->delete();

        return redirect()->route('comics.index');
    }
}
