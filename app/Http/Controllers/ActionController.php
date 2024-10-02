<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Program;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Action::withRelations()->limit(1000)->get();
        return view("backend.programManagement.action.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = (new Program)->getAll();
        return view("backend.programManagement.action.create", compact("datas"));
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
            'program_id' => ["required"],
        ]);

        $data = (new Action)->StoreAction($datas);

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
        $data = (new Action)->getSingleAction($id);
        if ($data) {
            return view("backend.programManagement.action.edit", compact("datas", "data"));
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
            'program_id' => ["required"],
        ]);

        $data = (new Action)->updateAction($id, $datas);
        if ($data) {
            return redirect("sections")->with("success", "Mise à jour effectuée avec succès.");
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
        $data = (new Action)->deleteAction($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}