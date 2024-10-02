<?php

namespace App\Http\Controllers;

use App\Models\ActiviteBudgetaire;
use App\Models\Dotation;
use App\Models\Rubrique;
use App\Models\Task;
use Illuminate\Http\Request;

class DotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dotations = Dotation::get();
        return view('backend.budgetaireManagement.dotations.index', compact('dotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $activite_bugs  = ActiviteBudgetaire::get();
        $taches  = Task::get();
        $rubriques  = Rubrique::get();

        return view('backend.budgetaireManagement.dotations.create', compact(
            'activite_bugs',
            'taches',
            'rubriques'
        ));
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
            "code" => 'required|digits:6|unique:dotations,code',
            "libelle" => "required|string|max:150",
            "annee" => "required|digits:4" ,
            "activite_budgetaire_id" => "required",
            "task_id" => "required",
            "rubrique_id" => "required"
        ]);

        $dataSave = (new Dotation())->storeDotation($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Dotation créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Dotation non créer avec succès, reéssayez plus tard');
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
        $dotation = (new Dotation())->getSingleDotation($id);
        $activite_bugs  = ActiviteBudgetaire::get();
        $tasks  = Task::get();
        $rubriques  = Rubrique::get();
        return view(
            'backend.budgetaireManagement.dotations.edit',
            [
                'dotation' => $dotation,
                'activite_bugs' => $activite_bugs,
                'tasks' => $tasks,
                'rubriques' => $rubriques
            ]
        );
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
            "code" => 'required|max:6|unique:dotations,code',
            "libelle" => "required|string|max:150",
            "annee" => "required|digits:4",
            "activite_budgetaire_id" => "required",
            "task_id" => "required",
            "rubrique_id" => "required"
        ]);

        $dataUpdate = (new Dotation())->updateDotation($id, $datas);
        if ($dataUpdate) {
            return Redirect('dotations')->with('success', 'Dotation modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Dotation non modifier avec succès, reéssayez plus tard');
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
        $dotation = (new Dotation())->getSingleDotation($id);
        if ($dotation) {
            (new Dotation())->deleteDotation($id);
            return Redirect()->back()->with('success', 'Dotation supprimer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Dotation non supprimer avec succès, réessayez plus tard');
        }
    }
}
