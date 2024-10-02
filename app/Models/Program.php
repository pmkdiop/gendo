<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends DateTimeInFrench //Model 
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",
        "description",
        "types",
        "dateDebut",
        "dateFin",
        'section_id',
        'ministere_id',
    ];

    // Relationship with Section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function action()
    {
        return $this->hasMany(Action::class);
    }

    public function informationAnnule()
    {
        return $this->hasMany(InformationAnnule::class);
    }

    // Relationship with Ministere
    public function ministere()
    {
        return $this->belongsTo(Ministere::class);
    }

    public function StoreProgram($data)
    {
        return Program::create($data);
    }
    function getLatestWithLimit($limit)
    {
        return Program::latest('id')->limit($limit)->get();
    }

    function getSingleProgram($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $program = Program::find($id);

        if (!$program) {
            return null;
        }
        return $program;
    }
    public function getAll()
    {
        return Program::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Program::whereDate("created_at", Carbon::today())->latest()->get();
    }

    public function deleteProgram($id)
    {
        //return Program::find($id)->delete();
        $program = Program::find($id);

        if ($program) {
            return $program->delete();
        }

        return null;

    }

    public function updateProgram($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Program::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('section', 'ministere');
    }



}