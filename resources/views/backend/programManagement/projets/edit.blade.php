@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase">
                        <i class="bx bxs-plus-circle text-primary"></i>
                        Édition d'un projet
                    </h6>
                </div>
                <div class="ms-auto"><a href="{{ route('projets.index') }}"
                        class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('projets.update', $projet->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="sourceFinance" class="form-label h6">Source de financement</label>
                                    <textarea name="sourceFinancement" id="sourceFinance" class="form-control @error('sourceFinancement') is-invalid @enderror"
                                        placeholder="Saisissez le source de financement du projet" rows="4">{{ $projet->sourceFinancement }}</textarea>
                                    {{-- <input type="text" name="sourceFinancement" id="sourceFinance"
                                        value="{{ $projet->sourceFinancement }}"
                                        class="form-control @error('sourceFinancement') is-invalid @enderror"
                                        placeholder="Saisissez le source de financement du projet"> --}}
                                    @error('sourceFinancement')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="dateDebutProjet" class="form-label h6">Date Début</label>
                                        <input type="date" name="debut" value="{{ $projet->debut }}"
                                            class="form-control  @error('debut') is-invalid @enderror" id="dateDebutProjet">
                                        @error('debut')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="dateFinProjet" class="form-label h6">Date Fin</label>
                                        <input type="date" name="fin" value="{{ $projet->fin }}"
                                            class="form-control  @error('fin') is-invalid @enderror" id="dateFinProjet">
                                        @error('fin')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="">
                                    <label for="dureeProjet" class="form-label h6">Durée du projet</label>
                                    <input type="text" name="duree" value="{{ $projet->duree }}"
                                        class="form-control @error('duree') is-invalid @enderror" id="dureeProjet"
                                        placeholder="Saisissez la durée du projet ">
                                    @error('duree')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border border-3 p-4 rounded">
                                
                                <div class="mb-3">
                                    <label for="budgetProjet" class="form-label h6">Budget total du projet</label>
                                    <input type="text" name="budgetTotal" id="budgetProjet"
                                        value="{{ $projet->budgetTotal }}"
                                        class="form-control @error('budgetTotal') is-invalid @enderror">
                                    @error('budgetTotal')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="produitFinaux" class="form-label h6">Produit final du projet</label>
                                    <input type="text" name="produitFinal" id="produitFinaux"
                                        value="{{ $projet->produitFinal }}"
                                        class="form-control @error('produitFinal') is-invalid @enderror">
                                    @error('produitFinal')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="produitFinaux" class="form-label h6">Produit restant du projet</label>
                                    <input type="text" name="travailRestant" id="produitFinaux"
                                        value="{{ $projet->travailRestant }}"
                                        class="form-control @error('travailRestant') is-invalid @enderror">
                                    @error('travailRestant')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div> --}}

                                <div class="mb-3">
                                    <label for="single-select-clear-field" class="form-label h6">Activité</label>
                                    <select class="form-select  @error('activity_id') is-invalid @enderror"
                                        id="single-select-clear-field" name="activity_id"
                                        data-placeholder="Choisissez une activité">
                                        <option value=""></option>
                                        @if (count($activities) > 0)
                                            @foreach ($activities as $activite)
                                                <option value="{{ $activite->id }}"
                                                    @if ($projet->activity_id == $activite->id) selected @endif>
                                                    {{ $activite->code }} -
                                                    {{ $activite->libelle }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('activity_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="card-footer text-center gap-3">
                                    <button type="reset" class="btn btn-outline-secondary px-3 rounded-pill"> <i
                                            class="bx bx-undo"></i> Annuler</button>
                                    <button type="submit" class="btn btn-primary px-3 rounded-pill"> <i
                                            class="bx bx-plus"></i> Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
@endsection
