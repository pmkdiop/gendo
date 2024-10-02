@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>
                        Édition d'un composant projet
                    </h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('composants.index') }}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('composants.update', $composant->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="InputCode" class="form-label h6">Code du composant</label>
                                    <input type="text" name="code" value="{{ $composant->code }}"
                                        class="form-control @error('code') is-invalid @enderror" id="InputCode"
                                        placeholder="Saissisez le code du composant">
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="InputLibelle" class="form-label h6">Libelle du composant</label>
                                    <input type="text" name="libelle" value="{{ $composant->libelle }}"
                                        class="form-control @error('libelle') is-invalid @enderror"
                                        id="InputLibelle" placeholder="Saissisez le reste du travail">
                                    @error('libelle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="single-select-clear-field" class="form-label h6">Nom du projet</label>
                                    <select name="project_id" class="form-select @error('project_id') is-invalid @enderror"
                                        id="single-select-clear-field" data-placeholder="Choisissez le nom du project">
                                        <option value=""></option>
                                        @foreach ($projets as $projet)
                                            <option value="{{ $projet->id }}" @if($composant->project_id == $projet->id) selected @endif>
                                                {{ $projet->sourceFinancement . ' « ' . $projet->formatDateShort($projet->debut) . ' — ' . $projet->formatDateShort($projet->fin) . ' »' }}
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
