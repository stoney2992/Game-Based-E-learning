<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MathQuest</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>

<body>
<div class="nav-bar">
        <img src="{{ url('/photos/logoImage.png') }}" alt="Logo">
        <a href="#"> MathQuest </a>
        <ul>
            <!-- <li class="noti"> <i class="fa-solid fa-bell"></i><span class="notify"> Notification </span> </li> -->
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg" ><a style="margin-left: 59%;" href="{{ url('chatify') }}">Messages</a></span></li>
            <p class="super-admin" style="margin-right: 20%;"> {{ session('name') }} </p>
            <a class="lgt-btn" href="{{ route('logout') }}" style="margin-left: 94%;"><i class="fa-solid fa-right-from-bracket"></i></a>
        </ul>
        
        
    </div>
    <br />


    <!-- Start of sidebar -->
    <div class="container-dashboard">
     <div >
        <div class="sidebar">
                
            <ul class="pupils-sidebar">
                <li><a href="{{ route('student_dashboard')}}"></i>Dashboard</a></li>
                <li><a href="{{ route('rewards.index')}}"></i>Rewards</a></li>
                <li><a href="{{ route('math-game.index')}}"></i>Game</a></li>
                <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
            </ul>

        </div>
        <!-- End of sidebar -->
        
        <div class="topnav">
            <a href="#home" class="active">MathQuest</a>
            <div id="myLinks">
                <li><a href="{{ route('student_dashboard')}}"></i>Dashboard</a></li>
                <li><a href="{{ route('rewards.index')}}"></i>Rewards</a></li>
                <li><a href="{{ route('math-game.index')}}"></i>Game</a></li>
                <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
                <a class="lgt-btn" href="{{ route('logout') }}">Logout</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            </div>


        <!-- Start header -->
        <div class="hdr">
        @if(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif
            <h3 class="pupil-greet">Hello, {{ session('name') }}</h3>
            <p class="pupils-greet-bot">Ready to start your day?</p>
            
        </div>
        
        



    </div>
    <script src="{{ url('/js/dashboard.js') }}"> </script>
    <script>
        function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
        }
</script>
</body>
</html>
