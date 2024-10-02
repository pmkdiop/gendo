<?php

namespace App\Http\Controllers;

use App\Models\Ministere;
use App\Models\Upload_image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:lire', ['only' => ['index','show']]);
        $this->middleware('permission:creer', ['only' => ['create', 'store']]);
        $this->middleware('permission:modifier', ['only' => ['update', 'edit']]);
        $this->middleware('permission:supprimer', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('id','!=', 1)->get();
        return view('backend.userManagement.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::get();
        $ministeres = Ministere::get();
        return view('backend.userManagement.users.create', ['roles' => $roles, 'ministeres' => $ministeres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'nomUtilisateur' => 'required|string|max:255|unique:users,nomUtilisateur',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'confirme_password' => 'required|same:password',
            'roles' => 'required',
            'ministere_id' => 'required',
        ]);

        if ($request->avatar) {
            $image = $request->avatar;
            $fileName = (new Upload_image())->users_img($image);
        } else {
            $fileName = $request->avatar;
        }

        $user = User::create([
            'prenom'    => $request->prenom,
            'nom'       => $request->nom,
            'nomUtilisateur'  => $request->nomUtilisateur,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'ministere_id' => $request->ministere_id,
            'avatar' => $fileName,
            'actif' => 'Oui'
        ]);

        $user->syncRoles($request->roles);

        return redirect()->back()->with('success', 'Utilisateur créer avec son role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = (new User())->getSingleUser($id);
        $roles = Role::latest()->get();
        $ministeres = Ministere::get();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('backend.userManagement.users.show', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'ministeres' => $ministeres,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $user = (new User())->getSingleUser($id);
        $roles = Role::latest()->get();
        $ministeres = Ministere::get();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('backend.userManagement.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'ministeres' => $ministeres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if ($request->verification == "userActif") {
            if ($request->old_actif == "Oui") {
                $data['actif'] = "Non";
            } else {
                $data['actif'] = "Oui";
            }
            $user = (new User)->updateUser($id, $data);

            if (!empty($user)) {
                if ($request->old_actif == "Non") {
                    return back()->with('success', 'Le compte de l\'utilisateur est activer avec succès');
                } else {
                    return back()->with('success', 'Le compte de l\'utilisateur est désactiver avec succès');
                }
            } else {
                return back()->with('error', 'Une error s\'est produite, réessayez plus tard');
            }
        }


        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'nomUtilisateur' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8|max:20',
            'confirme_password' => 'nullable|same:password',
            'roles' => 'required',
            'ministere_id' => 'required',
        ]);

        $user = User::find($id);
        $old_pieces = $request->old_image_user;

        if ($request->hasFile('avatar') && $request->avatar != '') {
            $imagePath = public_path('backend/assets/themeAssets/assets/users/' . $old_pieces);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
            $new_image = $request->avatar;
            $fileName = (new Upload_image())->users_img($new_image);;
        } else {
            $fileName = $old_pieces;
        }

        $data = [
            'prenom'    => $request->prenom,
            'nom'       => $request->nom,
            'nomUtilisateur'  => $request->nomUtilisateur,
            'email'     => $request->email,
            // 'password'  => Hash::make($request->password),
            'ministere_id' => $request->ministere_id,
            'avatar' => $fileName,
            'actif' => 'Oui'
        ];

        if (!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('success', 'Utilisateur modifier  avec son role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'Utilisateur supprimer avec succès');
    }
}
