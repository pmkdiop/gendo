@extends('backend.layout.main')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <h6 class="mb-0 text-uppercase"> <i class="bx bxs-plus-circle text-primary"></i>
                        Ajout des permissions pour le rôle « <strong>{{ $role->name }}</strong> »
                    </h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary radius-30 mt-2 mt-lg-0">
                        Retrouner
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
            </div>
            <hr />
            <div class="form-body mt-4">
                <form action="{{ route('update.permissionRoles', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="InputPermission" class="form-label h6">Permissions</label>
                                    <div class="row">
                                        <hr class="border border-1 border-dark">
                                        @if (count($permissions) > 0)
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-2 mb-3">
                                                    <label>
                                                        <input type="checkbox" name="permission[]"
                                                            value="{{ $permission->name }}" class=""
                                                            id="InputPermission" 
                                                            {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                                             placeholder="">
                                                        {{ $permission->name }}
                                                        
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                        <hr class="border border-1 border-dark">
                                    </div>
                                    @error('permission') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="card-footer d-flex align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-3 rounded-pill">
                                        <i class="bx bx-plus"></i>Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
