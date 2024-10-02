@extends('backend.layout.main')

@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Création d'une source
                        financement
                    </h6>
                </div>
                <div class="ms-auto"><a href="{{ route('sourceFinancements.index') }}"
                        class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('sourceFinancements.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputCode" class="form-label h6">Code du source financement</label>
                                    <input type="text" name="code" value="{{ old('code') }}"
                                        class="form-control @error('code') is-invalid @enderror" id="inputCode"
                                        placeholder="Saisissez le code du source ">
                                    @error('code')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputCode1" class="form-label h6">Code 1 du source financement</label>
                                    <input type="text" name="code1" value="{{ old('code1') }}"
                                        class="form-control @error('code') is-invalid @enderror" id="inputCode1"
                                        placeholder="Saisissez le code 1 du source ">
                                    @error('code1')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputLibelle1" class="form-label h6">Libelle 1 du source financement</label>
                                    <input type="text" name="libelle1"
                                        class="form-control @error('libelle1') is-invalid @enderror"
                                        value="{{ old('libelle1') }}" id="inputLibelle1"
                                        placeholder="Saisissez le libelle 1 de l'activité ">
                                    @error('libelle1')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputCode2" class="form-label h6">Code 2 du source financement</label>
                                    <input type="text" name="code2" value="{{ old('code2') }}"
                                        class="form-control @error('code') is-invalid @enderror" id="inputCode2"
                                        placeholder="Saisissez le code 2 du source ">
                                    @error('code1')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputLibelle2" class="form-label h6">Libelle 2 du source financement</label>
                                    <input type="text" name="libelle2"
                                        class="form-control @error('libelle2') is-invalid @enderror"
                                        value="{{ old('libelle1') }}" id="inputLibelle1"
                                        placeholder="Saisissez le libelle 2 de l'activité ">
                                    @error('libelle2')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="card-footer d-flex align-items-center gap-3">
                                    <button type="reset" class="btn btn-outline-secondary px-3 rounded-pill">
                                        <i class="bx bx-undo"></i>
                                        Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary px-3 rounded-pill">
                                        <i class="bx bx-plus"></i>
                                        Enregistrer
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
