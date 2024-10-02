@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>
                        Creation d'une nouvelle permission
                    </h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('permissions.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="InputLibelle" class="form-label h6">Libelle de la permission</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="InputLibelle"
                                        placeholder="Saissisez le nom de la permission">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="card-footer d-flex align-items-center gap-3">
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
