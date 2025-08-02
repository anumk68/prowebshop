@extends('frontend.layout.app')
@section('content')
<style>
         section.login_form_main .login-container {
            width: 100%;
            max-width: 360px;
            margin: auto;
        }
        section.login_form_main .login-container h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 30px;
        }
        section.login_form_main {
            padding: 80px 0;
            text-align: center;
        }
        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            background-color: #eef3ff;
            border-radius: 2px;
            font-size: 15px;
        }
        section.login_form_main .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        section.login_form_main .remember-me input[type="checkbox"] {
            margin-right: 8px;
        }
        form button {
            width: 100%;
            padding: 12px;
            background-color: #0097e6;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        section.login_form_main .create-account {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }
        section.login_form_main .create-account a {
            color: #007bff;
            text-decoration: none;
        }
        section.login_form_main .create-account a:hover {
            text-decoration: underline;
        }
        section.login_form_main .btn-login {
            color: #fff;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
</style>
    <section class="login_form_main">
        <div class="login-container">
            <h2>Login to Your Account</h2>
            <form action="{{ route('user.login') }}" method="POST">
                @csrf

                <input type="email" name="email"
                    placeholder="Enter Email"
                    value="{{ old('email') }}" class="@error('email') is-invalid @enderror"  >
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password"
                    placeholder="{{ $errors->has('password') ? $errors->first('password') : 'Enter Password' }}"
                    class="@error('password') is-invalid @enderror"  >
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn_theme btn-login">LOGIN</button>

                <p class="create-account">
                   Don't have an account?  <a href="{{ route('user.register') }}">Sign up</a>
                </p>
            </form>

        </div>

    </section>
@endsection
