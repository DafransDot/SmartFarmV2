<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('img/icon2.png') }}" type="image/png">
    <title>Login</title>
    
</head>
<body>
   
<div class="wrapper">
        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="login_box">
            @csrf
            <div class="login-header">
                <span>Login</span>
            </div>
             <!-- Error Messages -->
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Email Field -->
            <div class="input_box">
                <input type="email" id="email" name="email" class="input-field" required>
                <label for="email" class="label">Email</label>
                <i class="bx bx-envelope icon"></i>
            </div>

            <!-- Password Field -->
            <div class="input_box">
                <input type="password" id="password" name="password" class="input-field" required>
                <label for="password" class="label">Password</label>
                <i class="bx bx-lock-alt icon"></i>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember"> Remember me</label>
                </div>
                <div class="forgot">
                    <a href="#">Forgot password?</a>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="input_box">
                <button type="submit" class="input_submit">Login</button>
            </div>

            <!-- Register Link -->
            <div class="register">
                <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
            </div>
        </form>
    </div>
</body>
</html>
