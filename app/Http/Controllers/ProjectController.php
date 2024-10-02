<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projets = Project::get();
        return view('backend.programManagement.projets.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $activities = Activity::get();
        return view('backend.programManagement.projets.create', compact('activities'));
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
            "sourceFinancement" => 'required|string|max:120',
            "produitFinal" => 'required|string|max:60',
            "debut" => 'required',
            "fin" => 'required',
            "duree" => 'required|numeric',
            "budgetTotal" => 'required|numeric',
            'activity_id' => 'required',
        ]);

        $dataSave = (new Project())->storeProject($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Projet créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Projet non créer avec succès, reéssayez plus tard');
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
        $projet = (new Project())->getSingleProject($id);
        $activities  = Activity::get();
        return view('backend.programManagement.projets.edit', ['projet' => $projet, 'activities' => $activities]);
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
            "sourceFinancement" => 'required|string|max:120',
            "produitFinal" => 'required|string|max:60',
            "debut" => 'required',
            "fin" => 'required',
            "duree" => 'required|numeric',
            "budgetTotal" => 'required|numeric',
            'activity_id' => 'required',
        ]);

        $dataUpdate = (new Project())->updateProject($id, $datas);
        if ($dataUpdate) {
            return Redirect('projets')->with('success', 'Projet modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Projet non modifier avec succès, reéssayez plus tard');
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
        $projet = (new Project())->getSingleProject($id);
        if ($projet) {
            (new Project())->deleteProject($id);
            return Redirect()->back()->with('success','Projet supprimer avec succès');
        } else {
            return Redirect()->back()->with('error','Projet non supprimer avec succès, réessayez plus tard');
        }
        
    }
}
