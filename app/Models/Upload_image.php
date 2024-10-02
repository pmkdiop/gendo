<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload_image extends Model
{
    public function users_img($nomImage)
    {
        //Inserer une image
        if (!empty($nomImage)) {
            $public_path_imag = "backend/assets/themeAssets/assets/users";
            $nomComplet = date("dmy") . '-' . mt_rand(999, 999999) . '.' . $nomImage->getClientOriginalExtension();
            $nomImage->move(public_path($public_path_imag), $nomComplet);
            $uriImag = $nomComplet;

            return $uriImag;
        }
        return;
    }

  
}
