@extends("backend.layout.main_auth")

@section("content")
    <div class="row g-0">
    <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
            <div class="card-body">
                    <img src="{{asset("backend/assets/themeAssets/assets/images/login-images/forgot-password-cover.svg")}}" class="img-fluid" width="600" alt=""/>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
            <div class="card-body p-sm-5">
                <div class="p-3">
                    <div class="text-center">
                        <img src="{{asset("backend/assets/themeAssets/assets/images/logo_mali.png")}}" width="100" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold text-center">Mot de passe oublié ?</h4>
                    <p class="text-muted text-center">Entrez votre adresse e-mail enregistrée pour réinitialiser le mot de passe.</p>

                     <form class="row g-3" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="my-4">
                            <label class="form-label">Adresse e-mail</label>
                            <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Saisissez votre email ex: example@gmail.com" required autofocus />
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" type="submit" class="btn btn-primary">Demander un lien de réinitialisation</button>
                            <a href="{{route('login')}}" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>
                              Retour à la connexion
                            </a>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection