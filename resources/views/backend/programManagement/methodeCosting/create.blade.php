@extends("backend.layout.main")

@section("content")
<div class="card">
    <div class="card-body p-4">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Création d'une Methode Costing</h6>
            </div>
            <div class="ms-auto"><a href="{{route("methodeCostings.index")}}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i class="bx bx-right-arrow-alt"></i></a></div>
        </div>
        <hr/>
        <div class="form-body mt-4">
        <form action="{{route("methodeCostings.store")}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
            <div class="border border-3 p-4 rounded">
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Code de section</label>
                        <input type="text" name="code" value="{{old("code")}}" class="form-control @error('code') is-invalid @enderror" id="inputProductTitle" placeholder="Saisissez le code de la section ">
                        @error('code')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Libelle de section</label>
                        <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{old("libelle")}}" id="libelleId" placeholder="Saisissez la section ">
                        @error('libelle')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="inputVendor" class="form-label h6">Le type de donnée</label>
                    <select class="form-select select2  @error('typeDonnees') is-invalid @enderror" id="typeDonnees" name="typeDonnees">
                            <option value="">-- Sélectionnez un Ministère --</option>
                            <option value="1">One</option>
                        </select>
                        @error('typeDonnees')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                      <div class="card-footer d-flex align-items-center gap-3">
                        <button type="reset" class="btn btn-outline-secondary px-3 rounded-pill"> <i class="bx bx-undo"></i> Annuler</button>
                        <button type="submit" class="btn btn-primary px-3 rounded-pill"> <i class="bx bx-plus"></i> Enregistrer</button>
                    </div>
                </div>
            </div>
            
            </div><!--end row-->

           
         </form>
    </div>
    </div>
</div>
@endsection