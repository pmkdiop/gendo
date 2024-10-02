<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Task;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taches = Task::get();
        return view('backend.programManagement.taches.index', compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $composants = Composant::get();
        return view('backend.programManagement.taches.create', compact('composants'));
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
            "code" => "required|string|max:6",
            "libelle" => "required|string|max:120",
            'composant_id' => "required",
        ]);

        $dataSave = (new Task())->storeTask($datas);
        if ($dataSave) {
            return Redirect()->back()->with('success', 'Tache du composant créer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Tache du composant non créer avec succès, reéssayez plus tard');
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
        $tache = (new Task())->getSingleTask($id);
        $composants  = Composant::get();
        return view('backend.programManagement.taches.edit', ['tache' => $tache, 'composants' =>$composants]);
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
            "code" => "required|string|max:6",
            "libelle" => "required|string|max:120",
            'composant_id' => "required",
        ]);

        $dataUpdate = (new Task())->updateTask($id, $datas);
        if ($dataUpdate) {
            return Redirect('taches')->with('success', 'Tache du composant modifier avec succès');
        } else {
            return Redirect()->back()->with('error', 'Tache du composant non modifier avec succès, reéssayez plus tard');
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
        $projet = (new Task())->getSingleTask($id);
        if ($projet) {
            (new Task())->deleteTask($id);
            return Redirect()->back()->with('success', 'Tache du composant supprimer avec succès');
        } else {
            return Redirect()->back()->with('error', 'Tache du composant non supprimer avec succès, réessayez plus tard');
        }
    }
}
