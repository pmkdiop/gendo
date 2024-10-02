@extends('backend.layout.main')

@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Édition d'un coût de
                        dépense
                    </h6>
                </div>
                <div class="ms-auto"><a href="{{ route('coutDepenses.index') }}"
                        class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i
                            class="bx bx-right-arrow-alt"></i></a></div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('coutDepenses.update', [$data->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="border border-3 p-4 rounded">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="inputAnnee" class="form-label h6">Année du coût de dépense</label>
                                        <input type="text" name="annee" value="{{ $coutDepense->annee }}"
                                            class="form-control @error('annee') is-invalid @enderror" id="inputAnnee"
                                            placeholder="Saisissez l'année ">
                                        @error('annee')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="inputLibelle" class="form-label h6">Libelle du coût</label>
                                        <input type="text" name="libelle"
                                            class="form-control @error('libelle') is-invalid @enderror"
                                            value="{{ $coutDepense->libelle }}" id="inputLibelle"
                                            placeholder="Saisissez le libelle du coût ">
                                        @error('libelle')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="inputType" class="form-label h6">Type du coût</label>
                                        <input type="text" name="type"
                                            class="form-control @error('type') is-invalid @enderror"
                                            value="{{ $coutDepense->type }}" id="inputType"
                                            placeholder="Saisissez le type du coût ">
                                        @error('type')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="">
                                        <label for="inputDescription" class="form-label h6">Description</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription"
                                            placeholder="Saisissez la description du coût de dépense" rows="4">{{ $coutDepense->description }}</textarea>

                                        @error('description')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="single-select-clear-field" class="form-label h6">Dotation</label>
                                    <select class="form-select  @error('dotation_id') is-invalid @enderror"
                                        id="single-select-clear-field" data-placeholder="Sélectionner une dotation"
                                        name="dotation_id">
                                        <option value=""></option>
                                        @if (count($dotations) > 0)
                                            @foreach ($dotations as $dotation)
                                                <option value="{{ $dotation->id }}"
                                                    {{ $coutDepense->dotation_id == $dotation->id ? 'selected' : '' }}>
                                                    {{ $dotation->code }} -
                                                    {{ $dotation->libelle }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('dotation_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="single-select-clear-field1" class="form-label h6">Source finance</label>
                                    <select class="form-select  @error('source_financement_id') is-invalid @enderror"
                                        id="single-select-clear-field1" data-placeholder="Sélectionner une source finance"
                                        name="source_financement_id">
                                        <option value=""></option>
                                        @if (count($sourceFinancements) > 0)
                                            @foreach ($sourceFinancements as $sourceFinancement)
                                                <option value="{{ $sourceFinancement->id }}"
                                                    {{ $coutDepense->source_financement_id == $sourceFinancement->id ? 'selected' : '' }}>
                                                    {{ $sourceFinancement->code }}
                                                    - {{ $sourceFinancement->libelle1 }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('source_financement_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="single-select-clear-field2" class="form-label h6">Rubrique</label>
                                    <select class="form-select @error('rubrique_id') is-invalid @enderror"
                                        id="single-select-clear-field2" data-placeholder="Selectionner une rubrique"
                                        name="rubrique_id">
                                        <option value=""></option>
                                        @if (count($rubriques) > 0)
                                            @foreach ($rubriques as $rubrique)
                                                <option value="{{ $rubrique->id }}"
                                                    {{ $coutDepense->rubrique_id == $rubrique->id ? 'selected' : '' }}>
                                                    {{ $rubrique->code }} - {{ $rubrique->libelle }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('rubrique_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="card-footer text-center gap-3 mb-0">
                                    <button type="reset" class="btn btn-outline-secondary px-2 me-2 rounded-pill"> <i
                                            class="bx bx-undo"></i> Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary px-2 rounded-pill"> <i
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
