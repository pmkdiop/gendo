@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> La Liste des coûts
                        de dépense</h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('coutDepenses.create') }}" title="Creer une nouvelle section"
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
                            <th>Année</th>
                            <th>Libelle</th>
                            <th>Type de dépense</th>
                            <th>Dotation</th>
                            <th>Source finance</th>
                            <th>Rubrique</th>
                            <th>Description</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coutsDepenses as $coutDepense)
                            <tr>
                                <td>{{ $coutDepense->annee }}</td>
                                <td>{{ $coutDepense->libelle }}</td>
                                <td>{{ $coutDepense->type }}</td>
                                <td>
                                    {{ $coutDepense->dotation->code .' '. $coutDepense->dotation->libelle }}
                                </td>
                                <td>
                                    {{ $coutDepense->sourceFinancement->code.' '.$coutDepense->sourceFinancement->libelle1 }}
                                </td>
                                <td>
                                    {{ $coutDepense->modeOrganisation->code.' '.$coutDepense->modeOrganisation->libelle }}
                                </td>
                                <td>{{ $coutDepense->description }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        

                                        <a class="ms-1" href="{{ route('coutDepenses.edit', $coutDepense->id) }}">
                                            <i class="bx bxs-edit text-primary"></i>
                                        </a>

                                        <a href="#" data-bs-toggle="modal" class="ms-1"
                                            data-bs-target="#delete{{ $coutDepense->id }}">
                                            <i class="bx bxs-trash text-danger"></i>
                                        </a>

                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{ $coutDepense->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirmation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12 text-center text-wrap h5">
                                                        Voulez-vous supprimer cet coût de dépense?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-secondary px-3 rounded-pill"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <form action="{{ route('activities.destroy', $coutDepense->id) }}"
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
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Aucune donnée trouvée</td>
                        </tr>
                        @endforelse

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
