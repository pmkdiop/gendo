<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'nomUtilisateur',
        'email',
        'password',
        'dateDernierLogin',
        'avatar',
        'actif',
        'ministere_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ministere()
    {
        return $this->belongsTo(Ministere::class);
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    function getSingleUser($id)
    {
        // Validate that the ID is a valid integer
        if (!is_numeric($id) || intval($id) <= 0) {
            return null;
        }

        // Attempt to find the User
        $user = User::find($id);

        if (!$user) {
            return null;
        }
        return $user;
    }
    public function getAll()
    {
        return User::latest()->get(); //get()
    }

    public function getAllLatest()
    {
        return User::whereDate("created_at", Carbon::today())->latest()->get();
    }

    public function deleteUser($id)
    {
        //return User::find($id)->delete();
        $user = User::find($id);

        if ($user) {
            return $user->delete();
        }

        return null;

    }

    public function updateUser($id, $datas)
    {
        if (empty($id)) {
            return; // Early return if $id is empty
        }
        $data = User::find($id); // Retrieve the data
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