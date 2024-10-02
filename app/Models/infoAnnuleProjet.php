<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoAnnuleProjet extends Model
{
    use HasFactory;

    protected $fillable = [
        "annee",
        "travailRestant",
        "budgetDepense",
        'project_id',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function StoreinfoAnnuleProjet($data)
    {
        return infoAnnuleProjet::create($data);
    }

    function getAllLatestId()
    {
        return infoAnnuleProjet::latest('id')->get();
    }
    
    public function getAll()
    {
        return infoAnnuleProjet::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return infoAnnuleProjet::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleinfoAnnuleProjet($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = infoAnnuleProjet::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteinfoAnnuleProjet($id)
    {
        //return Program::find($id)->delete();
        $data = infoAnnuleProjet::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateinfoAnnuleProjet($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = infoAnnuleProjet::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('program');
    }
}
