<?php

namespace App\Http\Controllers;

use App\Models\ActiviteBudgetaire;
use App\Models\infoAnnuleActiviteBud;
use Illuminate\Http\Request;

class InfoAnnuleActiviteBudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = infoAnnuleActiviteBud::withRelations()->limit(1000)->get();
        return view("backend.programManagement.infoAnnuelleActiviteBud.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = (new ActiviteBudgetaire)->getAll();
        return view("backend.programManagement.infoAnnuelleActiviteBud.create", compact("datas"));
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
            "annee" => ["required", "digits:4"],
            "quantite" => ["required", "digits:1,11"],
            "realisation" => ["required", "string", "max:50"],
            "budgetAlloue" => ["required", "digits:5,15"],

            'activite_budgetaire_id' => ["required"],
        ]);
        dd($request->all());

        $data = (new infoAnnuleActiviteBud)->StoreinfoAnnuleActiviteBud($datas);

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
        $datas = (new ActiviteBudgetaire)->getAll();
        $data = (new infoAnnuleActiviteBud)->getSingleinfoAnnuleActiviteBud($id);
        if ($data) {
            return view("backend.programManagement.infoAnnuelleActiviteBud.edit", compact("datas", "data"));
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
            "annee" => ["required", "numeric", "digits:4"],
            "quantite" => ["required", "numeric", "digits:11"],
            "realisation" => ["required", "string", "max:50"],
            "budgetAlloue" => ["required", "numeric", "digits:15"],

            'activite_budgetaire_id' => ["required", "numeric"],
        ]);


        $data = (new infoAnnuleActiviteBud)->updateinfoAnnuleActiviteBud($id, $datas);
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
        $data = (new infoAnnuleActiviteBud)->deleteinfoAnnuleActiviteBud($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}