@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>
                        Édition d'un information annuelle
                    </h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('infoAnnuelArojets.index') }}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('infoAnnuelArojets.update', $info_annuel_projet->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="InputAnnee" class="form-label h6">Année de l'information annuel du
                                        projet</label>
                                    <input type="number" name="annee" value="{{ $info_annuel_projet->annee }}"
                                        class="form-control @error('annee') is-invalid @enderror" id="InputAnnee"
                                        placeholder="Saissisez l'année Exemple: 2000">
                                    @error('annee')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="InputTravailRestant" class="form-label h6">Restant sur le travail</label>
                                    <input type="number" name="travailRestant" value="{{ $info_annuel_projet->travailRestant }}"
                                        class="form-control @error('travailRestant') is-invalid @enderror"
                                        id="InputTravailRestant" placeholder="Saissisez le reste du travail">
                                    @error('travailRestant')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="InputbudgetDepense" class="form-label h6">Budget dépenser</label>
                                    <input type="number" name="budgetDepense" value="{{ $info_annuel_projet->budgetDepense }}"
                                        class="form-control @error('budgetDepense') is-invalid @enderror"
                                        id="InputbudgetDepense" placeholder="Saissisez le budget dépenser">
                                    @error('budgetDepense')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="single-select-clear-field" class="form-label h6">Nom du projet</label>
                                    <select name="project_id" class="form-select @error('project_id') is-invalid @enderror"
                                        id="single-select-clear-field" data-placeholder="Choisissez le nom du project">
                                        <option value=""></option>
                                        @foreach ($projets as $projet)
                                            <option value="{{ $projet->id }}" @if($info_annuel_projet->project_id == $projet->id) selected @endif>
                                                {{ $projet->sourceFinancement.' « '.$projet->formatDateShort($projet->debut).' — '.$projet->formatDateShort($projet->fin).' »' }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('project_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="card-footer d-flex align-items-center gap-3">
                                    <button type="reset" class="btn btn-outline-secondary px-3 rounded-pill"> 
                                        <i class="bx bx-undo"></i> Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary px-3 rounded-pill">
                                        <i class="bx bx-plus"></i> Enregistrer
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