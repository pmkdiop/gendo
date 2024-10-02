<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composant extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function storeComposant($data)
    {
        return Composant::create($data);
    }

    function getAllLatestId()
    {
        return Composant::latest('id')->get();
    }
    
    public function getAll()
    {
        return Composant::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Composant::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleComposant($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = Composant::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteComposant($id)
    {
        //return Program::find($id)->delete();
        $data = Composant::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateComposant($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Composant::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

}