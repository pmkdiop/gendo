<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends DateTimeInFrench //Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "libelle",
        'ministere_id',
    ];

    // Relationship with Ministere
    public function ministere()
    {
        return $this->belongsTo(Ministere::class);
    }

    // Relationship with Programs
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }


    public function StoreSection($data)
    {
        return Section::create($data);
    }
    function getAllLatestId()
    {
        return Section::latest('id')->get();
    }
    public function getAll()
    {
        return Section::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Section::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleSection($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $section = Section::find($id);

        if (!$section) {
            return null;
        }
        return $section;
    }

    public function deleteSection($id)
    {
        //return Section::find($id)->delete();
        $section = Section::find($id);

        if ($section) {
            return $section->delete();
        }

        return null;

    }

    public function updateSection($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Section::find($id); // Retrieve the data
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