@extends('backend.layout.main')

@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Édition d'une dotation
                    </h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('dotations.index') }}"
                        class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner 
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('dotations.update', $dotation->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="inputAnnee" class="form-label h6">Année de la dotation</label>
                                        <input type="text" name="annee" value="{{ $dotation->annee }}"
                                            class="form-control @error('annee') is-invalid @enderror" id="inputAnnee"
                                            placeholder="Saisissez l'année de la dotation ">
                                        @error('annee')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="inputCode" class="form-label h6">Code de la dotation</label>
                                        <input type="text" name="code" value="{{ $dotation->code }}"
                                            class="form-control @error('code') is-invalid @enderror" id="inputCode"
                                            placeholder="Saisissez le code de la dotation ">
                                        @error('code')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="inputLibelle" class="form-label h6">Libelle de la dotation</label>
                                        <input type="text" name="libelle"
                                            class="form-control @error('libelle') is-invalid @enderror"
                                            value="{{ $dotation->libelle }}" id="inputLibelle"
                                            placeholder="Saisissez le libelle de la dotation ">
                                        @error('libelle')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="single-select-clear-field" class="form-label h6">Acivité
                                            budgétaire</label>
                                        <select class="form-select @error('activite_budgetaire_id') is-invalid @enderror"
                                            id="single-select-clear-field"
                                            data-placeholder="Sélectionner une activité budgétaire"
                                            name="activite_budgetaire_id">
                                            <option value=""></option>
                                            @if (count($activite_bugs) > 0)
                                                @foreach ($activite_bugs as $activite_bug)
                                                    <option value="{{ $activite_bug->id }}"
                                                        {{ $dotation->activite_budgetaire_id == $activite_bug->id ? 'selected' : '' }}>
                                                        {{ $activite_bug->produitService }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('activite_budgetaire_id')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="single-select-clear-field1" class="form-label h6">Tâche du
                                            dotation</label>
                                        <select class="form-select @error('task_id') is-invalid @enderror"
                                            id="single-select-clear-field1" data-placeholder="Sélectionner une tâche"
                                            name="task_id">
                                            <option value=""></option>
                                            @if (count($taches) > 0)
                                                @foreach ($taches as $tache)
                                                    <option value="{{ $tache->id }}"
                                                        {{ $dotation->task_id == $tache->id ? 'selected' : '' }}>
                                                        {{ $tache->code . ' — ' . $tache->libelle }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('task_id')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="single-select-clear-field2" class="form-label h6">Rubrique du
                                            dotation</label>
                                        <select class="form-select @error('rubrique_id') is-invalid @enderror"
                                            id="single-select-clear-field2" data-placeholder="Sélectionner une rubrique"
                                            name="rubrique_id">
                                            <option value=""></option>
                                            @if (count($rubriques) > 0)
                                                @foreach ($rubriques as $rubrique)
                                                    <option value="{{ $rubrique->id }}"
                                                        {{ $dotation->rubrique_id == $rubrique->id ? 'selected' : '' }}>
                                                        {{ $rubrique->code . ' — ' . $rubrique->libelle }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('rubrique_id')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer d-flex align-items-center gap-3">
                                    <button type="reset" class="btn btn-outline-secondary px-3 rounded-pill"> <i
                                            class="bx bx-undo"></i> Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary px-3 rounded-pill"> <i
                                            class="bx bx-plus"></i> Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div><!--end row-->


                </form>
            </div>
        </div>
    </div>
@endsection
