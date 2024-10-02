<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends DateTimeInFrench
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",
        'section_id',
    ];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function StoreChapter($data)
    {
        return Chapter::create($data);
    }
    function getAllLatestId()
    {
        return Chapter::latest('id')->get();
    }
    public function getAll()
    {
        return Chapter::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return Chapter::whereDate("created_at", Carbon::today())->latest()->get();
    }

    public function deleteChapter($id)
    {
        $data = Chapter::find($id);
        if ($data) {
            return $data->delete();
        }
        return null;
    }

    public function updateChapter($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = Chapter::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

    function getSingleChapter($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = Chapter::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function scopeWithRelations($query)
    {
        return $query->with('section');
    }
}