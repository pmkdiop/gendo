<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dotation extends Model
{
    use HasFactory;
    protected $fillable = [
            "code",
            "libelle",
            "annee",
            "activite_budgetaire_id",
            "task_id",
            "rubrique_id"
    ];

    public function activiteBudgetaire()
    {
        return $this->belongsTo(ActiviteBudgetaire::class);
    }

    public function coutsDepenses()
    {
        return $this->hasMany(CoutsDepenses::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function rubrique()
    {
        return $this->belongsTo(Rubrique::class);
    }

    public function storeDotation($data)
    {
        return Dotation::create($data);
    }

    function getAllLatestId()
    {
        return Dotation::latest('id')->get();
    }
    
    public function getAll()
    {
        return Dotation::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Dotation::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleDotation($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = Dotation::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteDotation($id)
    {
        //return Program::find($id)->delete();
        $data = Dotation::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateDotation($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Dotation::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }
}
