@extends('layouts.main')

@section('styles')
    @if (App::isLocale('fa'))
        <style>
            .password-container {
                position: relative;
            }

            .toggle-password {
                position: absolute;
                left: 1.5em;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                /* background-image: url('eye-icon.png'); */
                /* Replace with your eye icon image path */
                background-repeat: no-repeat;
                background-size: contain;
                width: 20px;
                height: 20px;
            }

            /* Style the password field to prevent the toggle button from overlapping */
            #password {
                padding-left: 35spx;
            }
        </style>
    @else
        <style>
            .password-container {
                position: relative;
            }

            .toggle-password {
                position: absolute;
                right: 1em;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                /* background-image: url('eye-icon.png'); */
                /* Replace with your eye icon image path */
                background-repeat: no-repeat;
                background-size: contain;
                width: 20px;
                height: 20px;
            }

            /* Style the password field to prevent the toggle button from overlapping */
            #password {
                padding-right: 30px;
            }
        </style>
    @endif
@endsection


@section('content')
    <div class="container mt-5" dir="{{ App::isLocale('fa') ? 'rtl' : 'ltr' }}">
        <div class="text-center">
            PCP
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6 password-container">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <span class="toggle-password fa fa-eye text-info" onclick="togglePasswordVisibility()">
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="{{ App::isLocale('fa') ? 'col-md-10 text-start' : 'col-md-8 offset-md-4' }}">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <div class="row mt-3">
                            <div class="col-md-8 offset-md-4">
                                {{ __('Not a User?') }} <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const toggleButton = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.classList.remove("fa-eye");
                toggleButton.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleButton.classList.remove("fa-eye-slash");
                toggleButton.classList.add("fa-eye");
            }
        }
    </script>
@endsection
