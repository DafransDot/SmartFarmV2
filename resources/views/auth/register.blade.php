<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('img/icon2.png') }}" type="image/png">
    <title>Register</title>
</head>
<body>
<div class="wrapper">
        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="register_box">
            @csrf
            <div class="register-header">
                <span>Register</span>
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

            <!-- Name Field -->
            <div class="input_box">
                <input type="text" id="name" name="name" class="input-field" required>
                <label for="name" class="label">Name</label>
                <i class="bx bx-user icon"></i>
            </div>

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

            <!-- Confirm Password Field -->
            <div class="input_box">
                <input type="password" id="password_confirmation" name="password_confirmation" class="input-field" required>
                <label for="password_confirmation" class="label">Confirm Password</label>
                <i class="bx bx-lock-alt icon"></i>
            </div>

            <!-- Submit Button -->
            <div class="input_box">
                <button type="submit" class="input_submit">Register</button>
            </div>

            <!-- Login Link -->
            <div class="login">
                <span>Already have an account? <a href="{{ route('login') }}">Login</a></span>
            </div>
        </form>
    </div>
</html>
