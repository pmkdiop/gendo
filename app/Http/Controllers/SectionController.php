<?php

namespace App\Http\Controllers;

use App\Models\Ministere;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Section::withRelations()->limit(1000)->get();
        return view("backend.programManagement.section.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministeres = (new Ministere)->getAll();
        return view("backend.programManagement.section.create", compact("ministeres"));
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
            "code" => ["required", "numeric", "digits_between:4,6", 'unique:sections,code'],
            "libelle" => ["required", "string", "max:100"],
            'ministere_id' => ["required"],
        ]);

        $data = (new Section)->StoreSection($datas);

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
        $ministeres = (new Ministere)->getAll();
        $data = (new Section)->getSingleSection($id);
        if ($data) {
            return view("backend.programManagement.section.edit", compact("ministeres", "data"));
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
            'ministere_id' => ["required"],
        ]);

        $data = (new Section)->updateSection($id, $datas);
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
        $data = (new Section)->deleteSection($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}