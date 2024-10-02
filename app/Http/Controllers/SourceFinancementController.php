<?php

namespace App\Http\Controllers;

use App\Models\SourceFinancement;
use Illuminate\Http\Request;

class SourceFinancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sourceFinancements = SourceFinancement::get();
        return view('backend.budgetaireManagement.sourceFinancements.index', compact('sourceFinancements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.budgetaireManagement.sourceFinancements.create');
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
            "code" => 'required|max:6|unique:source_financements,code',
            "code1" => 'required|max:6',
            "libelle1" => 'required|string|max:60',
            "code2" => 'required|max:6',
            "libelle2" => 'required|string|max:60',
        ]);

        $dataSave = (new SourceFinancement())->storeSourceFinancement($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Source de financement créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Source de financement non créer avec succès, reéssayez plus tard');
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
        $sourceFinancement = (new SourceFinancement())->getSingleSourceFinancement($id);
        return view('backend.budgetaireManagement.sourceFinancements.edit', ['sourceFinancement' => $sourceFinancement]);
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
            "code" => 'required|max:6',
            "code1" => 'required|max:6',
            "libelle1" => 'required|string|max:60',
            "code2" => 'required|max:6',
            "libelle2" => 'required|string|max:60',
        ]);

        $dataUpdate = (new SourceFinancement())->updateSourceFinancement($id, $datas);
        if ($dataUpdate) {
            return Redirect('sourceFinancements')->with('success', 'Source de financement modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Source de financement non modifier avec succès, reéssayez plus tard');
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
        $sourceFinancement = (new SourceFinancement())->getSingleSourceFinancement($id);
        if ($sourceFinancement) {
            (new SourceFinancement())->deleteSourceFinancement($id);
            return Redirect()->back()->with('success', 'Source de financement supprimer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Source de financement non supprimer avec succès, réessayez plus tard');
        }
    }
}
