@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>La liste des rôles</h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('roles.create') }}" title="Créer un nouveau role"
                        class="btn btn-outline-primary radius-30 mt-2 mt-lg-0">
                        <i class="bx bxs-plus-square"></i>
                        Ajouter
                    </a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="example2" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Libelle du rôle</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $index => $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('add.permissionRoles', $role->id) }}" title="Ajouter/Modifier une permission à un rôle">
                                                <i class="bx bx-book-add text-success"></i>
                                            </a>

                                            <a href="{{ route('roles.edit', $role->id) }}" class="ms-2" title="Éditer un rôle">
                                                <i class="bx bxs-edit text-primary"></i>
                                            </a>

                                            <a href="#" data-bs-toggle="modal" class="ms-2"
                                                data-bs-target="#delete{{ $role->id }}" title="Supprimer un rôle">
                                                <i class="bx bxs-trash text-danger"></i>
                                            </a>

                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{ $role->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center h5">
                                                        Voulez-vous supprimer cet role?
                                                    </div>

                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-secondary px-3 rounded-pill"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit"
                                                                class="btn btn-outline-danger px-3 rounded-pill">
                                                                Confirmer
                                                            </button>
                                                        </div>
                                                    </form>

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
