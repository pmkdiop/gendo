<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Project;
use Illuminate\Http\Request;

class ComposantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $composants = Composant::get();
        return view('backend.programManagement.composants.index', compact('composants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $projets = Project::get();
        return view('backend.programManagement.composants.create', compact('projets'));
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
        $datas = $request->validate([
            "code" => "required|string|max:6",
            "libelle" => "required|string|max:120",
            'project_id' => "required",
        ]);

        $dataSave = (new Composant())->storeComposant($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Composant du projet créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Composant du projet non créer avec succès, reéssayez plus tard');
        }
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
        $composant = (new Composant())->getSingleComposant($id);
        $projets  = Project::get();
        return view('backend.programManagement.composants.edit', ['composant' => $composant, 'projets' =>$projets]);
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
        $datas = $request->validate([
            "code" => "required|string|max:6",
            "libelle" => "required|string|max:120",
            'project_id' => "required",
        ]);

        $dataUpdate = (new Composant())->updateComposant($id, $datas);
        if ($dataUpdate) {
            return Redirect('composants')->with('success', 'Composant du projet modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Composant du projet non modifier avec succès, reéssayez plus tard');
        }
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
        $projet = (new Composant())->getSingleComposant($id);
        if ($projet) {
            (new Composant())->deleteComposant($id);
            return Redirect()->back()->with('success', 'Composant du projet supprimer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Composant du projet non supprimer avec succès, réessayez plus tard');
        }
    }
}
