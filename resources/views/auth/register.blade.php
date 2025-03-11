<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
    <title>ClickNeat - S'inscrire</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('images/favicon.png') }}"/>
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/css.custom.css') }}" rel="stylesheet" />
  </head>

  <body>
    <div class="main-wrapper">
      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
          <div>
            <div class="text-center pt-3 pb-3">
              <span class="db"><img src="{{ asset('images/logo.png') }}" alt="logo" /></span>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="form-horizontal mt-3">
              @csrf
              <div class="row pb-4">
                <div class="col-12">
                  <!-- Name -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success text-white h-100"><i class="mdi mdi-account fs-4"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="name" value="{{ old('name') }}" required autofocus />
                  </div>
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                  <!-- Email Address -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger text-white h-100"><i class="mdi mdi-email fs-4"></i></span>
                    </div>
                    <input type="email" class="form-control form-control-lg" placeholder="Email Address" name="email" value="{{ old('email') }}" required />
                  </div>
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                  <!-- Password -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning text-white h-100"><i class="mdi mdi-lock fs-4"></i></span>
                    </div>
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required />
                  </div>
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                  <!-- Confirm Password -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info text-white h-100"><i class="mdi mdi-lock fs-4"></i></span>
                    </div>
                    <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="password_confirmation" required />
                  </div>
                  @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3 d-grid">
                      <!-- Centrer le bouton S'inscrire -->
                      <button class="btn btn-block btn-lg btn-info" type="submit">
                        S'inscrire
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <!-- Login Link -->
            <div class="pt-3 text-center">
              <!-- Centrer le lien "Déjà inscrit ? Se connecter" -->
              <a class="btn btn-primary text-white" href="{{ route('login') }}">
                Déjà inscrit ? Se connecter
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
