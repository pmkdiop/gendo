<?php

namespace App\Http\Controllers;

use App\Models\infoAnnuleProjet;
use App\Models\Project;
use Illuminate\Http\Request;

class InfoAnnuleProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $info_annuel_projets = infoAnnuleProjet::get();
        return view('backend.programManagement.infoAnnuleProjet.index', compact('info_annuel_projets'));
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
        return view('backend.programManagement.infoAnnuleProjet.create', compact('projets'));
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
            "annee"  => 'required|max:4',
            "travailRestant"  => 'required',
            "budgetDepense"  => 'required|numeric',
            'project_id'  => 'required',
        ]);

        $dataSave = (new infoAnnuleProjet())->storeinfoAnnuleProjet($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Info annuel projet créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Info annuel projet non créer avec succès, reéssayez plus tard');
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
        $info_annuel_projet = (new infoAnnuleProjet())->getSingleinfoAnnuleProjet($id);
        $projets  = Project::get();
        return view('backend.programManagement.infoAnnuleProjet.edit', ['info_annuel_projet' => $info_annuel_projet, 'projets' => $projets]);
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
            "annee"  => 'required|max:4',
            "travailRestant"  => 'required',
            "budgetDepense"  => 'required|numeric',
            'project_id'  => 'required',
        ]);

        $dataUpdate = (new infoAnnuleProjet())->updateinfoAnnuleProjet($id, $datas);
        if ($dataUpdate) {
            return Redirect('infoAnnuelArojets')->with('success', 'Info annuel projet modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Info annuel projet non modifier avec succès, reéssayez plus tard');
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
        $info_annuel_projet = (new infoAnnuleProjet())->getSingleinfoAnnuleProjet($id);
        if ($info_annuel_projet) {
            (new infoAnnuleProjet())->deleteinfoAnnuleProjet($id);
            return Redirect()->back()->with('success', 'Info annuel projet supprimer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Info annuel projet non supprimer avec succès, réessayez plus tard');
        }
    }
}
