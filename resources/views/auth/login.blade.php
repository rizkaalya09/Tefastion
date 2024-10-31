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
                
                
                <h2 class="opacity">LOGIN</h2>
                <p class="opacity">Welcome back! Please login to your account.</p>
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <label for="email">
                        <input type="email" placeholder="Enter your email..." name="email" />
                    </label>
                    <label for="password">
                        <input type="password" placeholder="******" name="password" />
                    </label>

                    <input type="submit" name="submit" id="submit" class="button">
                </form>
                <div class="register-forget opacity">
                    <a href="{{route('register')}}">Dont have an account?</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
    
</body>
</html>