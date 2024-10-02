<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",
        'program_id',
    ];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function StoreAction($data)
    {
        return Action::create($data);
    }
    function getAllLatestId()
    {
        return Action::latest('id')->get();
    }
    public function getAll()
    {
        return Action::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Action::whereDate("created_at", Carbon::today())->latest()->get();
    }

    public function deleteAction($id)
    {
        $data = Action::find($id);
        if ($data) {
            return $data->delete();
        }
        return null;
    }

    public function updateAction($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Action::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    function getSingleAction($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }
        // Attempt to find the Program
        $data = Action::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('program');
    }

}