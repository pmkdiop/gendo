<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Activity;
use App\Models\Chapter;
use App\Models\ModeOrganisation;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Activity::withRelations()->limit(1000)->get();
        return view("backend.programManagement.activities.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actions = (new Action)->getAll();
        $chapters = (new Chapter)->getAll();
        $modeOrgs = (new ModeOrganisation)->getAll();
        return view("backend.programManagement.activities.create", compact("modeOrgs", "actions", "chapters"));
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

            'action_id' => ["required"],
            'chapter_id' => ["required"],
            'mode_organisation_id' => ["required"],
        ]);

        $data = (new Activity)->StoreActivity($datas);

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
        $actions = (new Action)->getAll();
        $chapters = (new Chapter)->getAll();
        $modeOrgs = (new ModeOrganisation)->getAll();
        $data = (new Activity)->getSingleActivity($id);
        if ($data) {
            return view("backend.programManagement.activities.edit", compact("modeOrgs", "actions", "chapters", "data"));
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

            'action_id' => ["required"],
            'chapter_id' => ["required"],
            'mode_organisation_id' => ["required"],
        ]);

        $data = (new Activity)->updateActivity($id, $datas);
        if ($data) {
            return redirect("activities")->with("success", "Mise à jour effectuée avec succès.");
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
        $data = (new Activity)->deleteActivity($id);
        if ($data) {
            return back()->with("success", "La suppression a été effectuée avec succès");
        }
        return back()->with("error", "Erreur : suppression non effectuée!");
    }
}