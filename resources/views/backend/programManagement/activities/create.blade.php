@extends("backend.layout.main")

@section("content")
<div class="card">
    <div class="card-body p-4">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i> Création d'une l'activité</h6>
            </div>
            <div class="ms-auto"><a href="{{route("activities.index")}}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">Retrouner <i class="bx bx-right-arrow-alt"></i></a></div>
        </div>
        <hr/>
        <div class="form-body mt-4">
        <form action="{{route("activities.store")}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
            <div class="border border-3 p-4 rounded">
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Code du l'activité</label>
                        <input type="text" name="code" value="{{old("code")}}" class="form-control @error('code') is-invalid @enderror" id="inputProductTitle" placeholder="Saisissez le code du l'activité ">
                        @error('code')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label h6">Libelle du l'activité</label>
                        <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{old("libelle")}}" id="libelleId" placeholder="Saisissez le libelle de l'activité ">
                        @error('libelle')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="inputVendor" class="form-label h6">Action de l'activite</label>
                    <select class="form-select select2  @error('action_id') is-invalid @enderror" id="action_id" name="action_id">
                            <option value="">-- Sélectionnez une l'action activité --</option>
                            @if (count($actions)>0)
                                @foreach ($actions as $m)
                                    <option value="{{$m->id}}" {{old("action_id")==$m->id ? 'selected' : ''}}>{{$m->code}} - {{$m->libelle}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('action_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="inputVendor" class="form-label h6">Chapiter de l'activité</label>
                    <select class="form-select select2  @error('chapter_id') is-invalid @enderror" id="ministereSelect" name="chapter_id">
                            <option value="">-- Sélectionnez une l'activité --</option>
                            @if (count($chapters)>0)
                                @foreach ($chapters as $m)
                                    <option value="{{$m->id}}" {{old("chapter_id")==$m->id ? 'selected' : ''}}>{{$m->code}} - {{$m->libelle}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('chapter_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="inputVendor" class="form-label h6">Mode organisation de l'activité</label>
                    <select class="form-select select2  @error('mode_organisation_id') is-invalid @enderror" id="mode_organisation_id" name="mode_organisation_id">
                            <option value="">-- Sélectionnez un Mode organisation --</option>
                            @if (count($modeOrgs)>0)
                                @foreach ($modeOrgs as $m)
                                    <option value="{{$m->id}}" {{old("mode_organisation_id")==$m->id ? 'selected' : ''}}>{{$m->code}} - {{$m->libelle}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('mode_organisation_id')
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