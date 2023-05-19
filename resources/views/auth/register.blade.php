@extends('layouts.main')

@section('styles')
    @if (App::isLocale('fa'))
        <style>
            .password-container {
                position: relative;
            }

            .toggle-password,
            .toggle-password-confirm {
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
            #password,
            #password-confirm {
                padding-left: 35px;
            }
        </style>
    @else
        <style>
            .password-container {
                position: relative;
            }

            .toggle-password,
            .toggle-password-confirm {
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
            #password,
            #password-confirm {
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
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
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
                                        required autocomplete="new-password">
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
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6 password-container">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <span class="toggle-password-confirm fa fa-eye text-info"
                                        onclick="togglePasswordConfirmVisibility()">
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="{{ App::isLocale('fa') ? 'col-md-10 text-start' : 'col-md-6 offset-md-4' }}">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <p>{{ __('Already have an account?') }} <a
                                        href="{{ route('login') }}">{{ __('Login') }}</a></p>
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

        function togglePasswordConfirmVisibility() {
            const passwordInput = document.getElementById("password-confirm");
            const toggleButton = document.querySelector(".toggle-password-confirm");

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
