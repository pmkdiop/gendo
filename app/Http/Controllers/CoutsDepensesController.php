<?php

namespace App\Http\Controllers;

use App\Models\CoutsDepenses;
use App\Models\Dotation;
use App\Models\Rubrique;
use App\Models\SourceFinancement;
use Illuminate\Http\Request;

class CoutsDepensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coutsDepenses = CoutsDepenses::get();
        return view('backend.budgetaireManagement.coutsDepenses.index', compact('coutsDepenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dotations = Dotation::get();
        $sourceFinancements = SourceFinancement::get();
        $rubriques = Rubrique::get();
        return view('backend.budgetaireManagement.coutsDepenses.create', compact('dotations', 'sourceFinancements', 'rubriques'));
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
            "libelle" => "required|string|max:200",
            "description" => "nullable",
            "annee" => "required|digits:4",
            "type" => "required|string|max:100",
            "dotation_id" => "required",
            "source_financement_id" => "required",
            "rubrique_id" => "required"
        ]);

        $dataSave = (new CoutsDepenses())->storeCoutsDepenses($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Coûts des dépenses créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Coûts des dépenses non créer avec succès, reéssayez plus tard');
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
        $coutsDepense = (new CoutsDepenses())->getSingleCoutsDepenses($id);
        $dotations = Dotation::get();
        $sourceFinancements = SourceFinancement::get();
        $rubriques = Rubrique::get();
        return view(
            'backend.budgetaireManagement.coutsDepenses.edit',
            [
                'coutsDepense' => $coutsDepense,
                'dotations' => $dotations,
                'rubriques' => $rubriques,
                'sourceFinancements' => $sourceFinancements
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
            "libelle" => "required|string|max:200",
            "description" => "nullable",
            "annee" => "required|digits:4",
            "type" => "required|string|max:100",
            "dotation_id" => "required",
            "source_financement_id" => "required",
            "rubrique_id" => "required"
        ]);

        $dataUpdate = (new CoutsDepenses())->updateCoutsDepenses($id, $datas);
        if ($dataUpdate) {
            return Redirect('coutDepenses')->with('success', 'Coûts des dépenses modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Coûts des dépenses non modifier avec succès, reéssayez plus tard');
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
        $coutsDepense = (new CoutsDepenses())->getSingleCoutsDepenses($id);
        if ($coutsDepense) {
            (new CoutsDepenses())->deleteCoutsDepenses($id);
            return Redirect()->back()->with('success', 'Coûts des dépenses supprimer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Coûts des dépenses non supprimer avec succès, réessayez plus tard');
        }
    }
}
