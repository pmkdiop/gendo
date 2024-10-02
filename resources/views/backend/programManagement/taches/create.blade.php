@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>
                        Creation d'une nouvelle tâche composant
                    </h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('taches.index') }}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('taches.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="InputCode" class="form-label h6">Code du tâche</label>
                                    <input type="text" name="code" value="{{ old('code') }}"
                                        class="form-control @error('code') is-invalid @enderror" id="InputCode"
                                        placeholder="Saissisez le code du tâche">
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="InputLibelle" class="form-label h6">Libelle du tâche</label>
                                    <input type="text" name="libelle" value="{{ old('libelle') }}"
                                        class="form-control @error('libelle') is-invalid @enderror"
                                        id="InputLibelle" placeholder="Saissisez le libelle du tâche">
                                    @error('libelle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="single-select-clear-field" class="form-label h6">Nom du composant</label>
                                    <select name="composant_id" class="form-select @error('composant_id') is-invalid @enderror"
                                        id="single-select-clear-field" data-placeholder="Choisissez le nom du composant">
                                        <option value=""></option>
                                        @foreach ($composants as $composant)
                                            <option value="{{ $composant->id }}">
                                                {{ $composant->code . ' ' . $composant->libelle }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('composant_id')
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
