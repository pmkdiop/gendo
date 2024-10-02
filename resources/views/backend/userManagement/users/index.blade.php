@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> La Liste des utilisateurs
                    </h6>
                </div>
                <div class="ms-auto"><a href="{{ route('users.create') }}" title="Creer un nouveau utilisateur"
                        class="btn btn-outline-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Ajouter</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="example2" class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID utilisateur</th>
                            <th>Nom complet</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            {{-- <th>Ministere</th> --}}
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $user->nomUtilisateur }}</td>
                                    <td>{{ $user->prenom . ' ' . $user->nom }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <label for=""
                                                    class="badge bg-primary mx-1">{{ $rolename }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    {{-- <th>{{ $user->getNameMinistere($user->ministere_id) }}</th> --}}
                                    <td>
                                        <div class="d-flex order-actions">

                                            <a href="#"
                                                class="@if ($user->actif == 'Oui') bg-success @else bg-danger @endif"
                                                data-bs-toggle="modal" class="ms-2"
                                                data-bs-target="#blocking{{ $user->id }}">
                                                <i
                                                    class="@if ($user->actif == 'Oui') bx bx-lock-open-alt 
                                                     @else 
                                                     bx bx-lock-alt text-white @endif text-white">
                                                </i>
                                            </a>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('users.show', $user->id) }}" class="me-2">
                                                <i class="bx bx-show-alt text-primary"></i>
                                            </a>

                                            <a href="{{ route('users.edit', $user->id) }}">
                                                <i class="bx bxs-edit text-primary"></i>
                                            </a>

                                            <a href="#" data-bs-toggle="modal" class="ms-2"
                                                data-bs-target="#delete{{ $user->id }}">
                                                <i class="bx bxs-trash text-danger"></i>
                                            </a>

                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12 text-center h5">
                                                            Voulez-vous supprimer cet utilisateur?
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-secondary px-3 rounded-pill"
                                                            data-bs-dismiss="modal">Fermer</button>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger px-3 rounded-pill">
                                                                Confirmer
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="blocking{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"> @if($user->actif == "Oui") Désactivation du compte @else Activation du compte @endif</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12 text-center h5">
                                                            Voulez-vous @if($user->actif == "Oui") désactiver  @else activer @endif l'utisateur {{ $user->prenom.' '.$user->nom }} ?
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-secondary px-3 rounded-pill"
                                                            data-bs-dismiss="modal">Fermer</button>
                                                        <form action="{{ route('users.update', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="old_actif" value="{{ $user->actif }}">
                                                            <input type="hidden" name="verification" value="userActif">
                                                            <button type="submit" class="@if($user->actif == "Oui") btn btn-outline-danger  @else btn btn-outline-danger @endif px-3 rounded-pill">
                                                                Confirmer
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
