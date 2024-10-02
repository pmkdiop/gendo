@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> La Liste des permissions
                    </h6>
                </div>
                <div class="ms-auto">
                    @can('creer')
                        <a href="{{ route('permissions.create') }}" title="Creer une nouvelle section"
                            class="btn btn-outline-primary radius-30 mt-2 mt-lg-0">
                            <i class="bx bxs-plus-square">
                            </i>Ajouter
                        </a>
                    @endcan

                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="example2" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Libelle de la permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($permissions) > 0)
                            @foreach ($permissions as $index => $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            @can('modifier')
                                                <a href="{{ route('permissions.edit', $permission->id) }}">
                                                    <i class="bx bxs-edit text-primary"></i>
                                                </a>
                                            @endcan

                                            @can('supprimer')
                                                <a href="#" data-bs-toggle="modal" class="ms-2"
                                                    data-bs-target="#delete{{ $permission->id }}">
                                                    <i class="bx bxs-trash text-danger"></i>
                                                </a>
                                            @endcan
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{ $permission->id }}" tabindex="-1"
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
                                                            Voulez-vous supprimer cette permission de
                                                            {{ $permission->name }}?
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary px-3 rounded-pill"
                                                            data-bs-dismiss="modal">Fermer</button>
                                                        <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger px-3 rounded-pill">
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

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
