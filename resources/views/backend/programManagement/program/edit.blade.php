@extends("backend.layout.main")
@section("content")
<div class="card">
    <div class="card-body p-4">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Modification d'un nouveau programme</h6>
            </div>
            <div class="ms-auto"><a href="{{route("programmes.index")}}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i class="bx bx-right-arrow-alt"></i></a></div>
        </div>
        <hr/>
        <div class="form-body mt-4">
        <form action="{{route("programmes.update", [$data->id])}}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-lg-7">
            <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Code de programme</label>
                        <input type="text" name="code" value="{{$data->code}}" class="form-control @error('code') is-invalid @enderror" id="inputProductTitle" placeholder="Saisissez le code de programme ">
                        @error('code')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Libelle de programme</label>
                        <input type="text" name="libelle" value="{{$data->libelle}}" class="form-control @error('libelle') is-invalid @enderror" id="inputProductTitle" placeholder="Saisissez le libelle du programme ">
                        @error('libelle')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputProductDescription" class="form-label h6">Description de programme</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="inputProductDescription" rows="7" placeholder="Saisissez la description du programme">{{$data->description}}</textarea>
                         @error('description')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-5"> 
            <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                <div class="col-12">
                    <label for="inputProductType" class="form-label h6">Type de programme</label>
                    <select name="types" class="form-select  @error('description') is-invalid @enderror" id="inputProductType">
                        <option></option>
                        <option value="1" {{$data->types==1 ? 'selected' : ''}}>One</option>
                    </select>
                    @error('description')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputPrice" class="form-label h6">Date Début</label>
                    <input type="date" name="dateDebut" value="{{$data->dateDebut}}" class="form-control  @error('dateDebut') is-invalid @enderror" id="inputPrice" placeholder="Ex: 6123">
                    @error('dateDebut')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputPrice" class="form-label h6">Date Fin</label>
                    <input type="date" name="dateFin" value="{{$data->dateFin}}" class="form-control  @error('dateFin') is-invalid @enderror" id="inputPrice" placeholder="Ex: 6123">
                    @error('dateFin')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                    <div class="col-12">
                    <label for="inputVendor" class="form-label h6">Ministère</label>
                    <select class="form-select select2  @error('ministere_id') is-invalid @enderror" id="ministereSelect" name="ministere_id" onchange="fetchSections()">
                            <option value="">-- Sélectionnez un Ministère --</option>
                            @if (count($ministeres)>0)
                                @foreach ($ministeres as $m)
                                    <option value="{{$m->id}}" {{$data->ministere_id==$m->id ? 'selected' : ''}}>{{$m->code}} - {{$m->nom}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('ministere_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                    <label for="inputCollection" class="form-label h6">Section de programme</label>
                    <select class="form-select  @error('section_id') is-invalid @enderror" name="section_id" id="sectionSelect">
                        <option value="">-- Sélectionnez une Section --</option>
                    </select>
                     @error('section_id')
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