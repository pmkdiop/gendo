<?php

namespace App\Http\Controllers;

use App\Models\MethodeCosting;
use App\Models\ModeOrganisation;
use Illuminate\Http\Request;

class ModeOrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ModeOrganisation::withRelations()->limit(1000)->get();
        return view("backend.programManagement.modeOrganisation.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = (new MethodeCosting)->getAll();
        return view("backend.programManagement.modeOrganisation.create", compact("datas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->validate([
            "code" => ["required", "numeric"],
            "libelle" => ["required", "string", "max:100"],
            'methode_costing_id' => ["required"],
        ]);

        $data = (new ModeOrganisation)->StoreModeOrganisation($datas);

        if ($data) {
            return back()->with("success", "Enregistrement effectué avec succès.");
        }
        return back()->with("error", "Enregistrement non effectué!");

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
        $datas = (new MethodeCosting)->getAll();
        $data = (new ModeOrganisation)->getSingleModeOrganisation($id);
        if ($data) {
            return view("backend.programManagement.modeOrganisation.edit", compact("datas", "data"));
        }
        return back()->with("info", "Cette information est introuvable");
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
        $datas = $request->validate([
            "code" => ["required", "numeric"],
            "libelle" => ["required", "string", "max:100"],
            'methode_costing_id' => ["required"],
        ]);

        $data = (new ModeOrganisation)->updateModeOrganisation($id, $datas);
        if ($data) {
            return redirect("modeOrganisations")->with("success", "Mise à jour effectuée avec succès.");
        }
        return back()->with("error", "Mise à jour non effectuée!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = (new ModeOrganisation)->deleteModeOrganisation($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}