<title>
    Daftar Guru
  </title>
@include('layout.header')
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
                                
                                <!-- Role Type -->
                                <div class="input-group input-group-outline mb-3">
                                    <select name="role" id="role" class="form-select input spaces" required>
                                        <option selected disabled>Pilih Peranan</option>
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>
                                    </select>
                                </div>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />

                                <!-- School Type -->
                                <div class="input-group input-group-outline mb-3">
                                    <select name="school" id="school" class="form-select input spaces" required>
                                        <option selected disabled>Pilih Sekolah</option>
                                        @foreach ($sekolah as $sk)
                                        <option value="{{ $sk->school_name }}">{{ $sk->school_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-input-error :messages="$errors->get('school')" class="mt-2" />

                                <x-primary-button class="btn bg-gradient-primary w-100 my-4 mb-2">
                                    {{ __('Register') }}
                                </x-primary-button>

                                <div class="flex items-center justify-end mt-4">
                                    <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layout.layout')

<style>
    .spaces {
        padding-left: 15px; 
    }
</style>