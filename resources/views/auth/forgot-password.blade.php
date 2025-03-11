<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>recover password</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('images/favicon.png') }}"
    />
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/css.custom.css') }}" rel="stylesheet" />
  </head>

  <body>
    <div class="main-wrapper">
      <!-- ============================================================== -->
      <!-- Recovery form -->
      <!-- ============================================================== -->
      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
          <div id="recoverform">
            <div class="text-center">
              <div class="text-center pt-3 pb-3">
                <span class="db"><img src="{{ asset('images/logo.png') }}" alt="logo" /></span>
              </div>
              <span class="text-white">
                {{ __('Entrez votre adresse e-mail ci-dessous et nous vous enverrons les instructions pour récupérer votre mot de passe.') }}
              </span>
            </div>
            <div class="row mt-3">
              <!-- Form -->
              <form method="POST" action="{{ route('password.email') }}" class="col-12">
                @csrf
                <!-- email -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-email fs-4"></i></span>
                  </div>
                  <input
                    type="email"
                    class="form-control form-control-lg"
                    placeholder="{{ __('Email') }}"
                    aria-label="Email Address"
                    aria-describedby="basic-addon1"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                  />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <!-- Buttons -->
                <div class="row mt-3 pt-3 border-top border-secondary">
                  <div class="col-12">
                    <a class="btn btn-success text-white" href="{{ route('login') }}">
                      {{ __('Retour à la connexion') }}
                    </a>
                    <button class="btn btn-info float-end" type="submit">
                      {{ __('Réinitialiser') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- All Required js -->
      <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <script>
        $(".preloader").fadeOut();
      </script>
    </div>
  </body>
</html>
