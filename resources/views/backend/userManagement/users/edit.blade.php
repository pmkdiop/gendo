@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>
                        Edition d'un utilisateur
                    </h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-4 d-flex justify-content-center position-relative">
                                    <div class="text-center">
                                        @if (!empty($user->avatar))
                                        <img id="imge_view" src="{{ asset('backend/assets/themeAssets/assets/users/'.$user->avatar) }}" alt=""
                                        class="border border-3 rounded-circle img-fluid"
                                        style="width: 200px; height: 200px; object-fit: cover;" />
                                        @else
                                        <img id="imge_view" src="{{ asset('backend/assets/themeAssets/assets/users/default-img.png') }}" alt=""
                                        class="border border-3 rounded-circle img-fluid"
                                        style="width: 200px; height: 200px; object-fit: cover;" />
                                        @endif
                                        <div class="position-absolute d-flex justify-content-center align-items-center"
                                            style="width: 40px; height: 40px; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                            <label class="input-group-btn m-0">
                                                <span
                                                    class="btn-sm btn btn-default text-primary p-1 border-0 input-group-file"
                                                    title="Parcourir">
                                                    <i class="bx bx-plus bx-lg"></i>
                                                    <input type="file" accept=".svg,.jpg,.png,.jpeg" name="avatar"
                                                        style="display: none;" id="image_product">
                                                </span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="old_image_user" value="{{ $user->avatar }}">
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="inputPrenom" class="form-label h6">Prénom</label>
                                    <input type="text" name="prenom" id="inputPrenom" value="{{ $user->prenom }}"
                                        placeholder="Saisissez le prénom de l'utilisateur" class="form-control @error('prenom') is-invalid @enderror">
                                        @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputNom" class="form-label h6">Nom</label>
                                    <input type="text" name="nom" id="inputNom" value="{{ $user->nom }}"
                                        placeholder="Saisissez le nom de l'utilisateur" class="form-control @error('nom') is-invalid @enderror">
                                        @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputId_user" class="form-label h6">Nom utilisateur</label>
                                    <input type="text" name="nomUtilisateur" id="inputId_user" value="{{ $user->nomUtilisateur }}" placeholder="ID Utilisateur"
                                        class="form-control @error('nomUtilisateur') is-invalid @enderror">
                                        @error('nomUtilisateur') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label h6">Adresse Email</label>
                                    <input type="email" name="email" id="inputEmail" value="{{ $user->email }}"
                                        placeholder="Saisissez l'adresse email de l'utilisateur ex: example@gmail.com" class="form-control @error('email') is-invalid @enderror">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label h6">Mot de passe</label>
                                    <input type="password" name="password" id="inputPassword"
                                        placeholder="Saisissez le mot de passe de l'utilisateur" class="form-control @error('password') is-invalid @enderror">
                                        @error('password') {{ $message }} @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputConfirme" class="form-label h6">Confirmer mot de passe</label>
                                    <input type="password" name="confirme_password" id="inputConfirme"
                                        placeholder="Confirmer le mot de passe" class="form-control @error('confirme_password') is-invalid @enderror">
                                        @error('confirme_password') {{ $message }} @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="multiple-select-clear-field" class="form-label h6">Rôles</label>
                                    <select class="form-select @error('roles') is-invalid @enderror" name="roles[]" id="multiple-select-clear-field"
                                        data-placeholder="Choisissez les rôles" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ in_array($role->name, $userRoles) ? 'selected':'' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roles') {{ $message }} @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="single-select-clear-field" class="form-label h6">Ministère</label>
                                    <select class="form-select @error('ministere_id') is-invalid @enderror" name="ministere_id" id="single-select-clear-field"
                                        data-placeholder="Choisissez un ministère">
                                        <option></option>
                                        @foreach ($ministeres as $ministere)
                                            <option value="{{ $ministere->id }}" @if($user->ministere_id == $ministere->id) selected @endif>
                                                {{ $ministere->code.' '.$ministere->nom }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ministere_id') {{ $message }} @enderror
                                </div>

                                <div class="card-footer d-flex justify-content-center gap-3">
                                    <button type="reset" class="btn btn-outline-secondary px-3 rounded-pill mt-1">
                                        <i class="bx bx-undo"></i>
                                        Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary px-3 rounded-pill mt-1 ms-2">
                                        <i class="bx bx-plus"></i>
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
