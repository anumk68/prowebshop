@extends('frontend.layout.app')
@section('content')
<style>
  section.register_sec .form-container {
           width: 100%;
            max-width: 400px;
            margin: auto;
        }
        section.register_sec h2 {
            font-size: 22px;
            margin-bottom: 10px;
            font-weight: 600;
        }
        section.register_sec .subtext {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }
        section.register_sec .subtext a {
            color: #007bff;
            text-decoration: none;
        }
        section.register_sec form input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        section.register_sec form input:focus {
            background-color: #e9f1ff;
            border-color: #007bff;
            outline: none;
        }
        section.register_sec .register-btn {
            width: 100%;
            padding: 12px;
            background-color: #0094e8;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        section.register_sec .register-btn:hover {
            background-color: #007acc;
        }
          section.register_sec .btn-register {
            color: #fff;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
</style>
    <section class="register_sec">
        <div class="container">
            <div class="form-container">
                <h2>Create New Account</h2>
                <form action="{{ route('user.register.store') }}" method="post" autocomplete="off">
                    @csrf

                    <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror"
                        placeholder="First Name"
                        value="{{ old('firstName') }}">
                    @error('firstName')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror"
                        placeholder="Last Name"
                        value="{{ old('lastName') }}">
                    @error('lastName')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email"
                        style="font-style: italic;" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <input type="password" name="confirm_password"
                        class="form-control @error('confirm_password') is-invalid @enderror"
                        placeholder="Confirm Password">
                    @error('confirm_password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <p class="subtext">Already have an account?  <a href="{{ route('user.login.get') }}">Sign in</a></p>
                    <br>
                    <button type="submit" class="btn_theme w-100 btn-register">REGISTER</button>
                </form>

            </div>
        </div>
    </section>
@endsection
