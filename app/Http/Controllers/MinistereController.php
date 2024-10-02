<?php

namespace App\Http\Controllers;

use App\Models\Ministere;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MinistereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ministeres = Ministere::latest()->get();
        return view('backend.userManagement.ministeres.index', ["ministeres" => $ministeres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.userManagement.ministeres.create');
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
            "nom" => 'required|string|max:120',
            "code" => ['required', 'string', 'max:10', 'unique:ministeres,code'],
        ]);

        $dataSave = (new Ministere())->storeMinistere($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Ministère créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Ministère non créer avec succès, reéssayez plus tard');
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
        $ministere = Ministere::find($id);
        return view('backend.userManagement.ministeres.edit', ['ministere' => $ministere]);
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
            "nom" => ['required', 'string', 'max:120'],
            "code" => ['required', 'string', 'max:10'],
            //unique:your_table_name,code,' . $id,
        ]);

        $dataUpdate = (new Ministere())->updateMinistere($id, $datas);
        if ($dataUpdate) {
            return Redirect('/ministeres')->with('success', 'Ministère modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Ministère non modifier avec succès, reéssayez plus tard!');
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
        $ministere = Ministere::find($id);
        if ($ministere) {
            (new Ministere())->deleteMinistere($id);
            return Redirect()->back()->with('success', "Ministère supprimer avec succès");
        } else {
            return Redirect()->back()->with('error', "Ministère non supprimer avec succès, réessayez plus tard!");
        }
    }

    //Les customs methode 
    public function getSections($ministere_id)
    {
        // Fetch all sections where ministere_id matches the provided ID
        $sections = Section::where('ministere_id', $ministere_id)->get();

        // Return the sections as a JSON response
        return response()->json($sections);
    }
}