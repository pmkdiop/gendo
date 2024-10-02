<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOrganisation extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",
        "methode_costing_id",
    ];
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
    public function methodeCosting()
    {
        return $this->belongsTo(MethodeCosting::class);
    }


    public function StoreModeOrganisation($data)
    {
        return ModeOrganisation::create($data);
    }
    function getAllLatestWithLimit(int $limit)
    {
        return ModeOrganisation::latest('id')->limit($limit)->get();
    }
    public function getAll()
    {
        return ModeOrganisation::latest()->get(); //get()
    }

    function getSingleModeOrganisation($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = ModeOrganisation::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteModeOrganisation($id)
    {
        //return Program::find($id)->delete();
        $data = ModeOrganisation::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateModeOrganisation($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = ModeOrganisation::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('methodeCosting');
    }

}