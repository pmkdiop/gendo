@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>
                        Information de utilisateur « <strong>{{ $user->prenom . ' ' . $user->nom }}</strong> »
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

                <div class="row">
                    <div class="col-lg-5">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-4 d-flex justify-content-center position-relative">
                                <div class="text-center">
                                    @if (!empty($user->avatar))
                                        <img id="imge_view"
                                            src="{{ asset('backend/assets/themeAssets/assets/users/' . $user->avatar) }}"
                                            alt="" class="border border-3 rounded-circle img-fluid"
                                            style="width: 200px; height: 200px; object-fit: cover;" />
                                    @else
                                        <img id="imge_view"
                                            src="{{ asset('backend/assets/themeAssets/assets/users/default-img.png') }}"
                                            alt="" class="border border-3 rounded-circle img-fluid"
                                            style="width: 200px; height: 200px; object-fit: cover;" />
                                    @endif
                                    {{-- <div class="position-absolute d-flex justify-content-center align-items-center"
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
                                        <input type="hidden" name="old_image_user" value="{{ $user->avatar }}"> --}}
                                </div>
                            </div>

                            <div class="mb-3 ">
                                <label for="" class="form-label h6">
                                    Prénom :
                                    <strong>{{ $user->prenom }}</strong>
                                </label>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="" class="form-label h6">
                                    Nom :
                                    <strong>{{ $user->nom }}</strong>
                                </label>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label for="" class="form-label h6">
                                    Rôles :
                                    <strong>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <label for="" class="badge bg-primary mx-1">
                                                    {{ $rolename }}
                                                </label>
                                            @endforeach
                                        @endif
                                    </strong>
                                </label>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="" class="form-label h6">
                                    Nom utilisateur: <strong>{{ $user->nomUtilisateur }}</strong>
                                </label>

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">
                                    Adresse Email : <strong>{{ $user->email }}</strong>
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label h6">
                                    Ministère :
                                    <strong>
                                        @if ($user->ministere_id != null)
                                            {{ $user->ministere->code }} - {{ $user->ministere->nom }}
                                        @else
                                            Pas ministère associer
                                        @endif
                                    </strong>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">
                                    Statut :
                                    <strong>
                                        <a href="#"
                                                class="@if ($user->actif == 'Oui') text-success @else text-danger @endif p-2">
                                                <i
                                                    class="@if ($user->actif == 'Oui') bx bx-lock-open-alt
                                                     @else 
                                                     bx bx-lock-alt @endif">
                                                </i>

                                                @if ($user->actif == 'Oui') Actif @else Inactif @endif
                                            </a>
                                    </strong>
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label h6">
                                    Date création :
                                    <strong>
                                        {{ $user->created_at }}
                                    </strong>
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label h6">
                                    Date du dernier login :
                                    <strong>
                                       
                                    </strong>
                                </label>
                            </div>

                            {{-- dateDernierLogin --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
