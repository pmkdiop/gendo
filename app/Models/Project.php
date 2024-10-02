<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends DateTimeInFrench
{
    use HasFactory;
    protected $fillable = [
        "sourceFinancement",
        "produitFinal",
        "debut",
        "fin",
        "duree",
        "budgetTotal",
        'activity_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function infoAnnulerProjet()
    {
        return $this->hasMany(infoAnnuleProjet::class);
    }

    public function storeProject($data)
    {
        return Project::create($data);
    }
    function getAllLatestId()
    {
        return Project::latest('id')->get();
    }
    public function getAll()
    {
        return Project::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Project::whereDate("created_at", Carbon::today())->latest()->get();
    }

    
    function getSingleProject($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = Project::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }


    public function updateProject($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Project::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    public function deleteProject($id)
    {
        //return Program::find($id)->delete();
        $data = Project::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

}