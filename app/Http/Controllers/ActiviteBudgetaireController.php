<?php

namespace App\Http\Controllers;

use App\Models\ActiviteBudgetaire;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActiviteBudgetaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ActiviteBudgetaire::withRelations()->limit(1000)->get();
        return view("backend.programManagement.activiteBudgetaire.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acts = (new Activity)->getAll();
        $datas = (new ActiviteBudgetaire)->getAll();
        return view("backend.programManagement.activiteBudgetaire.create", compact("datas", "acts"));
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
            'produitService' => ['required', 'string', 'max:255'],
            'quantite' => ['required', 'numeric', 'min:1'],
            'uniteIndicateur' => ['nullable', 'string', 'max:100'],
            'realisation' => ['nullable', 'numeric', 'min:0'],
            'volume' => ['nullable', 'numeric', 'min:0'],
            'facteurAjustement' => ['nullable', 'string', 'max:255'],
            'unit' => ['nullable', 'string', 'max:100'],
            'budgetAloue' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'in:1,2'], // Adjust as necessary for allowed types
            'maturite' => ['nullable', 'string', 'max:100'],
            'activity_id' => ['required', 'exists:activities,id'], // Foreign key validation
            'activite_budgetaire_parent_id' => ['nullable', 'exists:activite_budgetaires,id'], // Self-referencing foreign key
        ]);


        $data = (new ActiviteBudgetaire)->StoreActiviteBudgetaire($datas);

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
        $acts = (new Activity)->getAll();
        $datas = (new ActiviteBudgetaire)->getAll();
        $data = (new ActiviteBudgetaire)->getSingleActiviteBudgetaire($id);
        if ($data) {
            return view("backend.programManagement.activiteBudgetaire.edit", compact("acts", "datas", "data"));
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
            'produitService' => ['required', 'string', 'max:255'],
            'quantite' => ['required', 'numeric', 'min:1'],
            'uniteIndicateur' => ['nullable', 'string', 'max:100'],
            'realisation' => ['nullable', 'numeric', 'min:0'],
            'volume' => ['nullable', 'numeric', 'min:0'],
            'facteurAjustement' => ['nullable', 'string', 'max:255'],
            'unit' => ['nullable', 'string', 'max:100'],
            'budgetAloue' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'in:1,2'], // Adjust as necessary for allowed types
            'maturite' => ['nullable', 'string', 'max:100'],
            'activity_id' => ['required', 'exists:activities,id'], // Foreign key validation
            'activite_budgetaire_parent_id' => ['nullable', 'exists:activite_budgetaires,id'], // Self-referencing foreign key
        ]);

        $data = (new ActiviteBudgetaire)->updateActiviteBudgetaire($id, $datas);
        if ($data) {
            return redirect("activitieBudgetaires")->with("success", "Mise à jour effectuée avec succès.");
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
        $data = (new ActiviteBudgetaire())->deleteActiviteBudgetaire($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}