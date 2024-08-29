<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" >
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
            <!-- <li class="noti"> <i class="fa-solid fa-bell"></i><span class="notify" s> Notification </span> </li> -->
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg" ><a style="margin-left: 59%; margin-top: -4px;" href="{{ url('chatify') }}">Messages</a></span></li>
            <p class="teacher-teacher-dashboard" style="margin-left: -30px;"> {{ session('name') }} </p>
            <a class="lgt-btn" href="{{ route('logout') }}" style="margin-left: 94%;"><i class="fa-solid fa-right-from-bracket" ></i></a>
        </ul>
    </div>
    <div class="container-dashboard">
        <div class="sidenav-bar">
            <ul>
                <li><a href='{{ route("teacher_dashboard")}}'>Dashboard</a></li>
                <li><a href="{{ route('assign_class.MyClass') }}">My Class</a></li>
                <li><a href="{{ route('rewards.claimed') }}">Claimed Rewards</a></li>
                <li><a href="{{ route('rewards.reward') }}">Create Rewards</a></li>
            </ul>
        </div>
        <br />
        <!-- Start of sidebar --> 
             <div class="hdr-teacher">
                    <h3 class="hello">Hello, {{ session('name') }}!</h3>
                    <p class="start">Ready to start your day?</p>
                    <div>
                        <img class="classroom-img" src="{{ url('/photos/classroom.gif') }}" alt="background" />
                    </div>
             </div>
            <!-- Start header -->
            
    </div>

       
</body>
</html>


