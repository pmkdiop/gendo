<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends DateTimeInFrench
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",

        'action_id',
        'chapter_id',
        'mode_organisation_id',

    ];


    public function activiteBudgetaire()
    {
        return $this->belongsTo(ActiviteBudgetaire::class);
    }


    public function action()
    {
        return $this->belongsTo(Action::class);
    }


    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }


    public function modeOrganisation()
    {
        return $this->belongsTo(ModeOrganisation::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }


    public function StoreActivity($data)
    {
        return Activity::create($data);
    }
    function getAllLatestWithLimit(int $limit)
    {
        return Activity::latest('id')->limit($limit)->get();
    }
    public function getAll()
    {
        return Activity::latest()->get(); //get()
    }

    function getSingleActivity($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = Activity::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteActivity($id)
    {
        //return Program::find($id)->delete();
        $data = Activity::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateActivity($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Activity::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('action', 'chapter', 'modeOrganisation');
    }

}