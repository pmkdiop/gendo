<?php

namespace App\Http\Controllers;

use App\Models\DateTimeInFrench;
use App\Models\Ministere;
use App\Models\Program;
use App\Models\Section;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Program::withRelations()->limit(1000)->get();
        return view("backend.programManagement.program.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministeres = (new Ministere)->getAll();
        return view("backend.programManagement.program.create", compact("ministeres"));
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
            "description" => ["required", "string", "max:500"],
            "types" => ["required"],
            "dateDebut" => ["required"],
            "dateFin" => ["required"],
            'section_id' => ["required"],
            'ministere_id' => ["required"],
        ]);

        $data = (new Program)->StoreProgram($datas);

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
        $data = (new Program)->getSingleProgram($id);
        if ($data) {
            return view("backend.programManagement.program.edit", compact("ministeres", "data"));
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
            "description" => ["required", "string", "max:500"],
            "types" => ["required"],
            "dateDebut" => ["required"],
            "dateFin" => ["required"],
            'section_id' => ["required"],
            'ministere_id' => ["required"],
        ]);

        $data = (new Program)->updateProgram($id, $datas);
        if ($data) {
            return redirect("programmes")->with("success", "Mise à jour effectuée avec succès.");
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
        $data = (new Program)->deleteProgram($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}