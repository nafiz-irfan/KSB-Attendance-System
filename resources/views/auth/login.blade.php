 <!--     Fonts and icons     -->
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <!-- Bootstrap links -->
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


        <main class="main-content  mt-0">
        <div class="page-header min-vh-100">
        <span class="mask bg-gradient-dark opacity-0"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-3">Sign in</h4>
                </div>
              </div>
              <div class="card-body">
                <form  class="text-start"  method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label" for="email" :value="__('Email')"></label>
                    <input id="email" class="form-control" type="email" name="email"  placeholder="Email" :value="old('email')" required autofocus autocomplete="username" />
                  </div><x-input-error :messages="$errors->get('email')" class="mt-2" />

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label" for="password" :value="__('Password')"></label>
                    <input type="password" class="form-control" id="password" class="block mt-1 w-full"
                    placeholder="Password" 
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                  </div><x-input-error :messages="$errors->get('password')" class="mt-2" />
                  
                  <x-primary-button class="btn bg-gradient-primary w-100 my-4 mb-2">
                          {{ __('Log in') }}
                     </x-primary-button>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">Forgot</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
    <!-- </form> -->
