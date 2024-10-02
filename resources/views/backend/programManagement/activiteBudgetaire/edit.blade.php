@extends("backend.layout.main")
@section("content")
<div class="card">
    <div class="card-body p-4">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Modification d'un nouveau programme</h6>
            </div>
            <div class="ms-auto"><a href="{{route("activitieBudgetaires.index")}}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i class="bx bx-right-arrow-alt"></i></a></div>
        </div>
        <hr/>
        <div class="form-body mt-4">
        <form action="{{route("activitieBudgetaires.update", [$data->id])}}" method="post">
        @csrf
        @method("PUT")
            <div class="row">
            <div class="col-lg-12">
            <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                    <div class="col-6">
                            <div class="mb-3">
                        <label for="produitService" class="form-label h6">Produit/Service</label>
                        <input type="text" name="produitService" value="{{ $data->produitService }}" class="form-control @error('produitService') is-invalid @enderror" placeholder="Entrez le produit/service">
                        @error('produitService')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            </div>
                    </div>
                
                <div class="col-6">
                    <div class="mb-3">
                        <label for="quantite" class="form-label h6">Quantité</label>
                        <input type="number" name="quantite" value="{{ $data->quantite }}" class="form-control @error('quantite') is-invalid @enderror" placeholder="Entrez la quantité">
                        @error('quantite')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="uniteIndicateur" class="form-label h6">Unité Indicateur</label>
                    <input type="text" name="uniteIndicateur" value="{{ $data->uniteIndicateur }}" class="form-control @error('uniteIndicateur') is-invalid @enderror" placeholder="Entrez l'unité indicateur">
                    @error('uniteIndicateur')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="realisation" class="form-label h6">Réalisation</label>
                    <input type="number" name="realisation" value="{{ $data->realisation }}" class="form-control @error('realisation') is-invalid @enderror" placeholder="Entrez la réalisation">
                    @error('realisation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="volume" class="form-label h6">Volume</label>
                    <input type="number" name="volume" value="{{ $data->volume }}" class="form-control @error('volume') is-invalid @enderror" placeholder="Entrez le volume">
                    @error('volume')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="facteurAjustement" class="form-label h6">Facteur d'ajustement</label>
                    <input type="text" name="facteurAjustement" value="{{ $data->facteurAjustement }}" class="form-control @error('facteurAjustement') is-invalid @enderror" placeholder="Entrez le facteur d'ajustement">
                    @error('facteurAjustement')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="unit" class="form-label h6">Unité</label>
                    <input type="text" name="unit" value="{{ $data->unit }}" class="form-control @error('unit') is-invalid @enderror" placeholder="Entrez l'unité">
                    @error('unit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="budgetAloue" class="form-label h6">Budget Alloué</label>
                    <input type="number" name="budgetAloue" value="{{ $data->budgetAloue }}" class="form-control @error('budgetAloue') is-invalid @enderror" placeholder="Entrez le budget alloué">
                    @error('budgetAloue')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="type" class="form-label h6">Type d'activité</label>
                    <select name="type" class="form-select @error('type') is-invalid @enderror">
                        <option value="">Sélectionnez un type</option>
                        <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Type 1</option>
                        <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Type 2</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="maturite" class="form-label h6">Maturité</label>
                    <input type="text" name="maturite" value="{{ $data->maturite }}" class="form-control @error('maturite') is-invalid @enderror" placeholder="Entrez la maturité">
                    @error('maturite')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    </div>

                    <div class="col-6">
                <!-- Foreign key: activity_id -->
                <div class="mb-3">
                    <label for="activity_id" class="form-label h6">Activité</label>
                    <select name="activity_id" class="form-select @error('activity_id') is-invalid @enderror">
                        <option value="">Sélectionnez une activité</option>
                        @foreach($acts as $activity)
                            <option value="{{ $activity->id }}" {{ $data->activity_id== $activity->id ? 'selected' : '' }}>
                                {{ $activity->code }} -  {{ $activity->libelle }}
                            </option>
                        @endforeach
                    </select>
                    @error('activity_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                    <div class="col-6">
                <!-- Foreign key: activite_budgetaire_parent_id -->
                <div class="mb-3">
                    <label for="activite_budgetaire_parent_id" class="form-label h6">Sous Activité</label>
                    <select name="activite_budgetaire_parent_id" class="form-select @error('activite_budgetaire_parent_id') is-invalid @enderror">
                        <option value="">Sélectionnez un sous activité</option>
                        @foreach($datas as $parent)
                            <option value="{{ $parent->id }}" {{ $data->activite_budgetaire_parent_id == $parent->id ? 'selected' : '' }}>
                                {{ $parent->produitService }}
                            </option>
                        @endforeach
                    </select>
                    @error('activite_budgetaire_parent_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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
        <!--end row-->
         </form>
    </div>
    </div>
</div>
@endsection

@section("script")
<script>
    function fetchSections() {
        var ministereId = document.getElementById('ministereSelect').value;
        if(ministereId) {
            axios.get('/ministeres/' + ministereId + '/sections')
                .then(function (response) {
                    var sectionSelect = document.getElementById('sectionSelect');
                    sectionSelect.innerHTML = '<option value="">-- Sélectionnez une Section --</option>'; // Reset the dropdown

                    response.data.forEach(function(section) {
                        var option = document.createElement('option');
                        option.value = section.id;
                        option.text = section.code+" - "+section.libelle;
                        sectionSelect.appendChild(option);
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
        } else {
            document.getElementById('sectionSelect').innerHTML = '<option value="">-- Select Section --</option>';
        }
    }
</script>
@endsection