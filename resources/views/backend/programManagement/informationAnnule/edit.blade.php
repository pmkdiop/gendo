@extends("backend.layout.main")
@section("content")
<div class="card">
    <div class="card-body p-4">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Modification d'une nouvelle l'information annuelle</h6>
            </div>
            <div class="ms-auto"><a href="{{route("informationAnnuelles.index")}}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i class="bx bx-right-arrow-alt"></i></a></div>
        </div>
        <hr/>
        <div class="form-body mt-4">
        <form action="{{route("informationAnnuelles.update", [$data->id])}}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-lg-12"> 
            <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                <div class="col-6">
                    <label for="inputProductType" class="form-label h6">L'année de l'information annuelle</label>
                    <input type="number" name="annee" value="{{$data->annee}}" class="form-control  @error('annee') is-invalid @enderror" id="annee" placeholder="Saisissez l'année de l'ainformation annuelle">
                    @error('annee')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="inputProductType" class="form-label h6">Programme</label>
                    <select class="form-select select2  @error('program_id') is-invalid @enderror" id="program_id" name="program_id">
                            <option value="">-- Sélectionnez un Programme --</option>
                            @if (count($datas)>0)
                                @foreach ($datas as $m)
                                    <option value="{{$m->id}}" {{$data->program_id==$m->id ? 'selected' : ''}}>{{$m->code}} - {{$m->libelle}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('program_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputPrice" class="form-label h6">Budget Alloué</label>
                    <input type="number" name="budgetAloue" value="{{$data->budgetAloue}}" class="form-control  @error('budgetAloue') is-invalid @enderror" id="budgetAloue" placeholder="Saisissez budget alloué">
                    @error('budgetAloue')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputPrice" class="form-label h6">Plafond Budgetaire</label>
                    <input type="number" name="plafondBudgetaire" value="{{$data->plafondBudgetaire}}" class="form-control  @error('plafondBudgetaire') is-invalid @enderror" id="plafondBudgetaire" placeholder="Saisissez le platfon budgetaire">
                    @error('plafondBudgetaire')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputPrice" class="form-label h6">Taux de croissance rel</label>
                    <input type="number" name="tauxCroissanceRel" value="{{$data->tauxCroissanceRel}}" class="form-control  @error('tauxCroissanceRel') is-invalid @enderror" id="tauxCroissanceRel" placeholder="Saisissez le taux de croissance rel">
                    @error('tauxCroissanceRel')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputPrice" class="form-label h6">Taux inflation</label>
                    <input type="number" name="tauxInflation" value="{{$data->tauxInflation}}" class="form-control  @error('tauxInflation') is-invalid @enderror" id="tauxInflation" placeholder="Saisissez le taux d'inflation">
                    @error('tauxInflation')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="card-footer d-flex align-items-center gap-3">
                    <button type="reset" class="btn btn-outline-secondary px-3 rounded-pill"> <i class="bx bx-undo"></i> Annuler</button>
                    <button type="submit" class="btn btn-primary px-3 rounded-pill"> <i class="bx bx-plus"></i> Enregistrer</button>
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