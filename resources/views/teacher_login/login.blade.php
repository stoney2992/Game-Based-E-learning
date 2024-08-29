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
            <form action="{{ route('login_actionT') }}" method="post">
            @csrf
                    @if ($errors->any())
                    <div>
                          <ol>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ol>
                      </div>
                    @endif
                <div class="heads">
                    <h1 class="lgn">Login</h1>
                </div>

                <img src="{{url('/photos/logImages1.png')}}" alt="images" >
                
        <!------Login start ----->
                <div class="container-login">


                    <label for="uname" id="user"><b></b></label>
                    <input type="email" id="username" placeholder="Username" name="email" required>

                    <label for="psw" id="passw"><b></b></label>
                    <input type="password" id="password" placeholder="Password" name="password" required>

                    <button id="btn1" type="submit">Login</button>

                </div>
        <!------Login end ----->                    
             </form>
        </div>
        
    </body>
</html>
