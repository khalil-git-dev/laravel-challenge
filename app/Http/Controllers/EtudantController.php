<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Classe;
use DB;
use Str;

class EtudantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        $classes = Classe::all();
        
        return view('etudiants.index')->with('etudiants', $etudiants)->with('classes', $classes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view('etudiants.create')->with('classes', $classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nom' => 'required',
        //     'prenom' => 'required',
        //     'telephone' => 'required',
        //     'age' => 'required',
        //     'email' => 'required',
        //     'classe_id' => 'required',
        // ]);

        // Formatage du matricule etudiant
        if(Etudiant::all()->last()->id == 0){
            $lastId = 0;
        }else{
            $lastId = Etudiant::all()->last()->id;
        }

        $first_caracter_prenom_nom = Str::upper($request->prenom[0].$request->nom[0]);
        $matricule = "E-".$first_caracter_prenom_nom.date('Y').($lastId+1);
        
        // Trairetement avatar utilisateur

        $fileImage = $request->file('avatar');

        $imageName = time().uniqid().".".$fileImage->getClientOriginalExtension();
        
        // dd($imageName);
        $fileImage->storeAS('images', $imageName);
        
        $etudiant = new Etudiant();
        
        $etudiant->matricule = $matricule;
        $etudiant->avatar = $imageName;
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->telephone = $request->telephone;
        $etudiant->age = $request->age;
        $etudiant->email = $request->email;
        $etudiant->classe_id = $request->classe_id;

        $etudiant->save();

        return redirect()->route('etudiants.index')->with('message', "Un etudiant enregistré");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        
        return view('etudiants.show')->with('etudiant', $etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = Classe::all();
        $etudiant = Etudiant::find($id);
        return view('etudiants.edit', compact('etudiant'))->with('classes', $classes);
        
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
        $etudiant = Etudiant::find($id);
        
        $fileImage = $request->file('avatar');
        
        if($fileImage != null){
            $imageName = time().uniqid().".".$fileImage->getClientOriginalExtension();
            $fileImage->storeAS('images', $imageName);

            $etudiant->avatar = $imageName;
        }

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->telephone = $request->telephone;
        $etudiant->age = $request->age;
        $etudiant->email = $request->email;
        $etudiant->classe_id = $request->classe_id;

        $etudiant->save();

        return redirect()->route('etudiants.index')->with('message', "Un etudiant modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('messageDelete', "Un etudiant supprimé");
    }

    public function filter($classe){
        //dd('test');
        //if(!empty($classe)){
            // $classes = Classe::all();
            // $etudiants = DB::table('etudiants')
            //     ->where('classe_id', $classe)
            //     ->get();
            
            // return view('filter')->with('classes', $classes);
        

        //}

        // return redirect()->route('filter');
    }

}
