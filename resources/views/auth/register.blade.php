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
<!-- SweetAlert  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

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
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-3">Daftar guru</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="name" :value="__('Name')"></label>
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Name" :value="old('name')" required autofocus autocomplete="name">
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                <!-- Email Address -->
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="email" :value="__('Email')"></label>
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Email" :value="old('email')" required autocomplete="username">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <!-- Password -->
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="password" :value="__('Password')"></label>
                                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                <!-- Confirm Password -->
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="password_confirmation" :value="__('Confirm Password')"></label>
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                <!-- School Type -->
                                
                                <label for="cars">Choose a car:</label>
                                <select name="cars" id="cars" class="btn bg-gradient-primary w-100 my-2">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                                </select>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                <!-- User Type -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Dropdown button
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                  </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                <x-primary-button class="btn bg-gradient-primary w-100 my-4 mb-2">
                                    {{ __('Register') }}
                                </x-primary-button>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>