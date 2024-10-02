<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationAnnule extends Model
{
    use HasFactory;
    protected $fillable = [
        "annee",
        "budgetAloue",
        "plafondBudgetaire",
        "tauxCroissanceRel",
        "tauxInflation",
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function StoreInformationAnnule($data)
    {
        return InformationAnnule::create($data);
    }
    function getAllLatestId()
    {
        return InformationAnnule::latest('id')->get();
    }
    public function getAll()
    {
        return InformationAnnule::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return InformationAnnule::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleInformationAnnule($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = InformationAnnule::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteInformationAnnule($id)
    {
        //return Program::find($id)->delete();
        $data = InformationAnnule::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateInformationAnnule($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = InformationAnnule::find($id); // Retrieve the data
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