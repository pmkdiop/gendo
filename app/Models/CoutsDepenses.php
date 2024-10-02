<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoutsDepenses extends Model
{
    use HasFactory;
    protected $fillable = [
        "libelle",
        "description",
        "annee",
        "type",
        "dotation_id",
        "source_financement_id",
        "rubrique_id"
    ];

    public function sourceFinancement()
    {
        return $this->belongsTo(SourceFinancement::class);
    }

    public function dotation()
    {
        return $this->belongsTo(Dotation::class);
    }

    public function rubrique()
    {
        return $this->belongsTo(Rubrique::class);
    }

    public function storeCoutsDepenses($data)
    {
        return CoutsDepenses::create($data);
    }

    function getAllLatestId()
    {
        return CoutsDepenses::latest('id')->get();
    }

    public function getAll()
    {
        return CoutsDepenses::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return CoutsDepenses::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleCoutsDepenses($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = CoutsDepenses::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteCoutsDepenses($id)
    {
        //return Program::find($id)->delete();
        $data = CoutsDepenses::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;
    }

    public function updateCoutsDepenses($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = CoutsDepenses::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }
}
