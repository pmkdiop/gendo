<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodeCosting extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "libelle",
        "typeDonnees",
    ];

    public function StoreMethodeCosting($data)
    {
        return MethodeCosting::create($data);
    }
    function getAllLatestWithLimit(int $limit)
    {
        return MethodeCosting::latest('id')->limit($limit)->get();
    }
    public function getAll()
    {
        return MethodeCosting::latest()->get(); //get()
    }

    function getSingleMethodeCosting($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the Program
        $data = MethodeCosting::find($id);

        if (!$data) {
            return null;
        }
        return $data;
    }

    public function deleteMethodeCosting($id)
    {
        //return Program::find($id)->delete();
        $data = MethodeCosting::find($id);

        if ($data) {
            return $data->delete();
        }

        return null;

    }

    public function updateMethodeCosting($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = MethodeCosting::find($id); // Retrieve the data
        if ($data) {
            return $data->update($datas); // Update the existing data
        }
        return null;
    }

}