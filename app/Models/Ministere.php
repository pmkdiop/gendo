<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministere extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "nom",
    ];

    // Relationship with Sections
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    // Relationship with Programs
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    //Relation avec utilisateur

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function StoreMinistere($data)
    {
        return Ministere::create($data);
    }

    function getAllLatestId()
    {
        return Ministere::latest('id')->get();
    }
    public function getAll()
    {
        return Ministere::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Ministere::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleMinistere($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $ministere = Ministere::find($id);

        if (!$ministere) {
            return null;
        }
        return $ministere;
    }

    public function deleteMinistere($id)
    {
        //return Ministere::find($id)->delete();
        $ministere = Ministere::find($id);

        if ($ministere) {
            return $ministere->delete();
        }

        return null;

    }

    public function updateMinistere($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Ministere::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('ministere');
    }

}