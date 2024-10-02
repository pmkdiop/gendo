@extends('backend.layout.main_auth')

@section('content')
    <div class="row g-0">

        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

            <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                <div class="card-body">
                    <img src="{{ asset('backend/assets/themeAssets/assets/images/login-images/login-cover.svg') }}"
                        class="img-fluid auth-img-cover-login" width="650" alt="" />
                </div>
            </div>

        </div>

        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
            <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                <div class="card-body p-sm-5">
                    <div class="">
                        <div class="mb-3 text-center">
                            <img src="{{ asset('backend/assets/themeAssets/assets/images/logo_mali.png') }}" width="100"
                                alt="">
                        </div>
                        <div class="text-center mb-4">
                            <h5 class="">Se Connecter</h5>
                            <p class="mb-0">Veuillez vous connecter à votre compte pour continuer.</p>
                        </div>
                        <div class="form-body">
                            <form class="row g-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">Identifiant</label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control border-end-0 @error('email') is-invalid @enderror"
                                        id="inputEmailAddress" placeholder="Saisissez votre email ex: example@gmail.com"
                                        autofocus autocomplete="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Mot de passe</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password"
                                            class="form-control border-end-0 @error('password') is-invalid @enderror"
                                            id="inputChoosePassword" value=""
                                            placeholder="Saisissez votre mot de passe.." autocomplete="password"> <a
                                            href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bx bx-hide"></i></a>

                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="remember" type="checkbox"
                                            id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Se souvenir de
                                            moi</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-md-6 text-end">
                                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Se connecter</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center ">
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
