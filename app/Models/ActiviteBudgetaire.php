<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiviteBudgetaire extends Model
{
    use HasFactory;
    protected $fillable = [
        "produitService",
        "quantite",
        "uniteIndicateur",
        "realisation",
        "volume",
        "facteurAjustement",
        "unit",
        "budgetAloue",
        "type",
        "maturite",

        //Foreign key for activity_id referencing the activities table
        'activity_id',
        //Self-referencing foreign key for parent-child relationship
        'activite_budgetaire_parent_id',

    ];

    public function InfoAnnuelleActiviteBud()
    {
        return $this->hasMany(infoAnnuleActiviteBud::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function parent()
    {
        return $this->belongsTo(ActiviteBudgetaire::class, 'activite_budgetaire_parent_id');
    }

    public function children()
    {
        return $this->hasMany(ActiviteBudgetaire::class, 'activite_budgetaire_parent_id');
    }
    public function StoreActiviteBudgetaire($data)
    {
        return ActiviteBudgetaire::create($data);
    }
    function getAllLatestWithLimit(int $limit)
    {
        return ActiviteBudgetaire::latest('id')->limit($limit)->get();
    }

    public function getAll()
    {
        return ActiviteBudgetaire::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return ActiviteBudgetaire::whereDate("created_at", Carbon::today())->latest()->get();
    }

    public function deleteActiviteBudgetaire($id)
    {
        //return Program::find($id)->delete();
        $data = ActiviteBudgetaire::find($id);

        if ($data) {
            return $data->delete();
        }
        return null;
    }

    public function updateActiviteBudgetaire($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = ActiviteBudgetaire::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    function getSingleActiviteBudgetaire($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = ActiviteBudgetaire::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    // Define the scope method to include related models
    public function scopeWithRelations($query)
    {
        return $query->with('activity', 'parent', 'children');
    }


}