@extends("backend.layout.main")
 @section("content")
<div class="card">
    <div class="card-body">
    <div class="d-lg-flex align-items-center mb-4 gap-3">
        <div class="position-relative">
            <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Liste des informations annuelle</h6>
        </div>
        <div class="ms-auto"><a href="{{route("informationAnnuelles.create")}}" title="Creer un nouveau programme" class="btn btn-outline-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Ajouter</a></div>
    </div> <hr>
        <div class="table-responsive">
            <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                        <th>Année</th>
                        <th>Budget Alloué</th>
                        <th>Plafond Budgetaire</th>
                        <th>Taux de croissance rel</th>
                        <th>Taux inflation</th>
                        <th>Programme</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($datas))
                    @foreach ($datas as $d)
                        <tr>
                            <td>{{$d->annee}}</td>
                            <td>{{$d->budgetAloue}}</td>
                            <td>{{$d->plafondBudgetaire}}</td>
                            <td>{{$d->tauxCroissanceRel}}</td>
                            <td>{{$d->tauxInflation}}</td>
                            <td>{{$d->program->code}} - {{$d->program->libelle}}</td>
                             <td>
                                <div class="d-flex order-actions">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#details{{ $d->id }}">
                                        <i class="bx bxs-cog text-success"></i>
                                    </a>


                                    <a class="ms-1" href="#" data-bs-toggle="modal"
                                        data-bs-target="#plus{{ $d->id }}">
                                        <i class="bx bxs-plus-circle text-success"></i>
                                    </a>


                                    <a class="ms-1" href="{{ route('informationAnnuelles.edit', $d->id) }}">
                                        <i class="bx bxs-edit text-primary"></i>
                                    </a>

                                    <a href="#" data-bs-toggle="modal" class="ms-1"
                                        data-bs-target="#delete{{ $d->id }}">
                                        <i class="bx bxs-trash text-danger"></i>
                                    </a>

                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1"
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
                                                    Voulez-vous supprimer cet programme?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                    class="btn btn-outline-secondary px-3 rounded-pill"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <form action="{{ route('informationAnnuelles.destroy', $d->id) }}"
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

                                <!-- Modal -->
                                <div class="modal fade" id="details{{ $d->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Information dur programme Annuelle</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12 text-center h5">
                                                    Voulez-vous supprimer cet programme?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                    class="btn btn-outline-secondary px-3 rounded-pill"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <form action="{{ route('informationAnnuelles.destroy', $d->id) }}"
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
                            </td>
                        </tr>
                    @endforeach
                    @else
                       <h6>There is no data to show</h6>
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
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
@endsection