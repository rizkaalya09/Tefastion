<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<section class="container">
    <div class="login-container">
        <div class="circle circle-one"></div>
        <div class="form-container">
            <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustrationorang" />
            <img src="{{asset('assets/img/logo-no-background.png')}}" alt="illustration" class="illustrationlogo" />


            <h2 class="opacity">REGISTER</h2>
            <p class="opacity">Welcome! Please register to your account.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('register')}}">
                @csrf <!-- Tambahkan token CSRF di sini -->

                <label for="email">
                    <input type="email" placeholder="Enter your email..." name="email" />
                </label>
                <label for="name">
                    <input type="text" placeholder="Enter your name..." name="name" /> <!-- Ubah type menjadi text -->
                </label>
                <label for="password">
                    <input type="password" name="password" placeholder="******" />
                </label>
                <label for="password_confirmation">
                    <input type="password" name="password_confirmation" placeholder="******" />
                </label>
                <input type="submit" name="submit" id="submit" class="button">
            </form>
            <div class="register-forget opacity">
                <a href="{{route('login')}}">Already have an account?</a>
            </div>
        </div>
        <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
</section>

</body>
</html>
