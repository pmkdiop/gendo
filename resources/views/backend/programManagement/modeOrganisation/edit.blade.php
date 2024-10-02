@extends("backend.layout.main")

@section("content")
<div class="card">
    <div class="card-body p-4">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Création d'un mode organisation</h6>
            </div>
            <div class="ms-auto"><a href="{{route("modeOrganisations.index")}}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i class="bx bx-right-arrow-alt"></i></a></div>
        </div>
        <hr/>
        <div class="form-body mt-4">
        <form action="{{route("modeOrganisations.update", [$data->id])}}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-lg-12">
            <div class="border border-3 p-4 rounded">
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Code de mode organisation</label>
                        <input type="text" name="code" value="{{$data->code}}" class="form-control @error('code') is-invalid @enderror" id="codeId" placeholder="Saisissez le code mode organisation ">
                        @error('code')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Libelle de mode organisation</label>
                        <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{$data->libelle}}" id="libelleId" placeholder="Saisissez le mode organisation ">
                        @error('libelle')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="inputVendor" class="form-label h6">Method Costing</label>
                     <select class="form-select select2  @error('methode_costing_id') is-invalid @enderror" id="methode_costing_id" name="methode_costing_id">
                            <option value="">-- Sélectionnez une methode de costing --</option>
                           @if (count($datas)>0)
                                @foreach ($datas as $d)
                                <option value="{{$d->id}}" {{$data->methode_costing_id==$d->id ? 'selected' : ''}}>{{$d->code}} - {{$d->libelle}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('methode_costing_id')
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