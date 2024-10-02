@extends("backend.layout.main")

@section("content")
<div class="card">
    <div class="card-body p-4">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Création l'info Activité Budgetaire</h6>
            </div>
            <div class="ms-auto"><a href="{{route("infoAnnuelleActiviteBuds.index")}}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i class="bx bx-right-arrow-alt"></i></a></div>
        </div>
        <hr/>
        <div class="form-body mt-4">
        <form action="{{route("infoAnnuelleActiviteBuds.store")}}" method="post">
        @csrf
            <div class="row">
            <div class="col-lg-12">
                <div class="border border-3 p-4 rounded">
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="annee" class="form-label h6">l'Année</label>
                            <input type="number" name="annee" value="{{ old('annee') }}" class="form-control @error('annee') is-invalid @enderror" placeholder="Entrez l'année">
                            @error('annee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       
                    <div class="col-6">
                            <label for="quantite" class="form-label h6">Quantité</label>
                            <input type="number" name="quantite" value="{{ old('quantite') }}" class="form-control @error('quantite') is-invalid @enderror" placeholder="Entrez la quantité">
                            @error('quantite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                       
                        <div class="col-6">
                        <label for="realisation" class="form-label h6">Réalisation</label>
                        <input type="text" name="realisation" value="{{ old('realisation') }}" class="form-control @error('realisation') is-invalid @enderror" placeholder="Entrez la réalisation">
                        @error('realisation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="col-6">
                        <label for="budgetAloue" class="form-label h6">Budget Alloué</label>
                        <input type="number" name="budgetAloue" value="{{ old('budgetAloue') }}" class="form-control @error('budgetAloue') is-invalid @enderror" placeholder="Entrez le budget alloué">
                        @error('budgetAloue')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="col-12">
                    <!-- Foreign key: activite_budgetaire_id -->
                        <label for="activite_budgetaire_id" class="form-label h6">Activité Budgetaire</label>
                        <select name="activite_budgetaire_id" class="form-select @error('activite_budgetaire_id') is-invalid @enderror">
                            <option value="">Sélectionnez une activité</option>
                            @foreach($datas as $activity)
                                <option value="{{ $activity->id }}" {{ old('activite_budgetaire_id') == $activity->id ? 'selected' : '' }}>
                                    {{ $activity->produitService }} 
                                </option>
                            @endforeach
                        </select>
                        @error('activite_budgetaire_id')
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
            </div>
            </div>
         </form>
    </div>
    </div>
</div>
@endsection