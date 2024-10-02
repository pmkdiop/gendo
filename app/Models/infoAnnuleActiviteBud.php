<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoAnnuleActiviteBud extends Model
{
    use HasFactory;

    protected $fillable = [
        "annee",
        "quantite",
        "realisation",
        "budgetAlloue",

        'activite_budgetaire_id', // Add the foreign key column

    ];
    public function activityBudgetaire()
    {
        return $this->belongsTo(ActiviteBudgetaire::class);
    }

    public function StoreinfoAnnuleActiviteBud($data)
    {
        return infoAnnuleActiviteBud::create($data);
    }
    function getAllLatestId()
    {
        return infoAnnuleActiviteBud::latest('id')->get();
    }
    public function getAll()
    {
        return infoAnnuleActiviteBud::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return infoAnnuleActiviteBud::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleinfoAnnuleActiviteBud($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = infoAnnuleActiviteBud::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteinfoAnnuleActiviteBud($id)
    {
        //return Program::find($id)->delete();
        $data = infoAnnuleActiviteBud::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateinfoAnnuleActiviteBud($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = infoAnnuleActiviteBud::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('activityBudgetaire');
    }
}