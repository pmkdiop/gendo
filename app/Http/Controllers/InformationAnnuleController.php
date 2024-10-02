<?php

namespace App\Http\Controllers;

use App\Models\InformationAnnule;
use App\Models\Program;
use Illuminate\Http\Request;

class InformationAnnuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = InformationAnnule::withRelations()->limit(1000)->get();
        return view("backend.programManagement.informationAnnule.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = (new Program)->getAll();
        return view("backend.programManagement.informationAnnule.create", compact("datas"));
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
            "annee" => ["required", "numeric"],
            "budgetAloue" => ["required", "numeric"],
            "plafondBudgetaire" => ["required", "numeric"],
            "tauxCroissanceRel" => ["required", "numeric"],
            "tauxInflation" => ["required", "numeric"],
            'program_id' => ["required", "max:100"],
        ]);

        $data = (new InformationAnnule)->StoreInformationAnnule($datas);

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
        $datas = (new Program)->getAll();
        $data = (new InformationAnnule)->getSingleInformationAnnule($id);
        if ($data) {
            return view("backend.programManagement.informationAnnule.edit", compact("datas", "data"));
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
            "annee" => ["required", "numeric"],
            "budgetAloue" => ["required", "numeric"],
            "plafondBudgetaire" => ["required", "numeric"],
            "tauxCroissanceRel" => ["required", "numeric"],
            "tauxInflation" => ["required", "numeric"],
            'program_id' => ["required", "max:100"],
        ]);


        $data = (new InformationAnnule)->updateInformationAnnule($id, $datas);
        if ($data) {
            return redirect("informationAnnuelles")->with("success", "Mise à jour effectuée avec succès.");
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
        $data = (new InformationAnnule)->deleteInformationAnnule($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}