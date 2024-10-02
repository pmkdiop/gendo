<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",
        'composant_id',
    ];

    public function composant()
    {
        return $this->belongsTo(Composant::class);
    }

    public function storeTask($data)
    {
        return Task::create($data);
    }

    function getAllLatestId()
    {
        return Task::latest('id')->get();
    }
    
    public function getAll()
    {
        return Task::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Task::whereDate("created_at", Carbon::today())->latest()->get();
    }

    function getSingleTask($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = Task::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteTask($id)
    {
        //return Program::find($id)->delete();
        $data = Task::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateTask($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Task::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }
}