<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universite;
use App\Models\Classe;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::all();
        return view('classes.index')->with('classes', $classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universites = Universite::all();
        return view('classes.create')->with('universites', $universites);

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
            'code' => 'required|unique:classes',
            'libelle' => 'required|unique:classes',
            'universite_id' => 'required',
        ]);
        $classe = new Classe();

        $classe->code = $request->code;
        $classe->libelle = $request->libelle;
        $classe->universite_id = $request->universite_id;
        $classe->save();

        return redirect()->route('classes.index')->with('message', "Une classe est ajoutée");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = Classe::find($id);
        return view('classes.show')->with('classe', $classe);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::find($id);
        $universites = Universite::all();
        
        return view('classes.edit')->with('classe', $classe)->with('universites', $universites);
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
        $classe = Classe::find($id);

        $classe->code = $request->code;
        $classe->libelle = $request->libelle;
        $classe->universite_id = $request->universite_id;
        
        $classe->save();

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);
        $classe->delete();

        return redirect()->route('classes.index')->with('messageDelete', "Une classe supprimée");
    }
}
