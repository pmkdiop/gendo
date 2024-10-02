<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceFinancement extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "code1",
        "libelle1",
        "code2", 
        "libelle2",
    ];

    // Relationship avec CoutsDepenses
    public function coutsDepenses()
    {
        return $this->hasMany(CoutsDepenses::class);
    }

    public function storeSourceFinancement($data)
    {
        return SourceFinancement::create($data);
    }

    function getAllLatestId()
    {
        return SourceFinancement::latest('id')->get();
    }
    
    public function getAll()
    {
        return SourceFinancement::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return SourceFinancement::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleSourceFinancement($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = SourceFinancement::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteSourceFinancement($id)
    {
        //return Program::find($id)->delete();
        $data = SourceFinancement::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateSourceFinancement($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = SourceFinancement::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }
}
