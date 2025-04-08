<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - ClickNeat</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}" />
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/css.custom.css') }}" rel="stylesheet" />
  </head>
  <body>
    <div class="main-wrapper">
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
          <div id="loginform">
            <div class="text-center pt-3 pb-3">
              <span class="db"><img src="{{ asset('images/logo.png') }}" alt="logo" /></span>
            </div>
            <!-- Laravel Breeze Login Form -->
            <form method="POST" action="{{ route('login') }}" class="form-horizontal mt-3">
              @csrf
              <div class="row pb-4">
                <div class="col-12">
                  <!-- Email Address -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-email fs-4"></i></span>
                    </div>
                    <input id="email" type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                  </div>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  
                  <!-- Password -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                    </div>
                    <input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Mot de passe" required autocomplete="current-password" />
                  </div>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
              </div>
              <!-- Remember Me -->
              <div class="form-group">
                <label for="remember_me" class="text-white">
                  <input id="remember_me" type="checkbox" name="remember" class="me-2" /> Se souvenir de moi
                </label>
              </div>
              <!-- Login Button -->
              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group pt-3 d-flex justify-content-between">
                    @if (Route::has('password.request'))
                      <a class="btn btn-info" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                    <!-- Register Button with margin to the right -->
                    <a href="{{ route('register') }}" class="btn btn-primary text-white ms-3">S'inscrire</a>
                    <button class="btn btn-success text-white" type="submit">Connexion</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
      $(document).ready(function() {
        $(".preloader").fadeOut();
      });
    </script>
  </body>
</html>
