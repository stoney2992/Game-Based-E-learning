<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MathQuest</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{url('/css/style.css')}}">
        
    </head>

    <body>
        <div class="container-heads">
            <form action="{{ route('login_action') }}" method="post">
            @csrf
                    @if ($errors->any())
                    <div>
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                    @endif
                <div class="heads">
                    <h1 class="lgn">MathQuest</h1>
                </div>

                <img src="{{url('/photos/loginImg.jpg')}}" alt="images" >
                
        <!------Login start ----->
                <div class="container-login">

                    <div class="login-input">
                        <input type="email" id="username" placeholder="Email" name="email" required>
                    </div>
                    <div class="login-input">
                        <input type="password" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="forgot-password">
                        <a href="{{ route('forget.password')}}" class="forget-password-link">Forget Password</a>
                    </div>

                    <button id="btn1" type="submit">Login</button>
                </div>
        <!------Login end ----->                    
             </form>
        </div>
        
    </body>
</html>
