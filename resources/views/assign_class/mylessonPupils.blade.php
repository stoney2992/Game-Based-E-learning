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

    <div class="topnav">
            <a href="#home" class="active">MathQuest</a>
            <div id="myLinks">
                <li><a href="{{ route('student_dashboard') }}"></i>Dashboard</a></li>
                <li><a href="{{ route('assign_class.view_quizzes', ['class_id' => $classData]) }}">Activities</a></li>
                <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
                <a class="lgt-btn" href="{{ route('logout') }}">Logout</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            </div>


    <!-- Start of sidebar -->
    <div class="container-dashboard" style="margin-top: 150px;">
    <div class="my-pupils-class">
     
        <div class="sidebar">
                
            <ul>
                <li><a href="{{ route('student_dashboard') }}"></i>Dashboard</a></li>
                <li><a href="{{ route('assign_class.view_quizzes', ['class_id' => $classData]) }}">Activities</a></li>
                <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
            </ul>

        </div>
</div>
    
        <!-- body content-->
    <div class="my-classes">
    <div>
    <h1 class="pupils-lesson-h1">Lessons for Class: {{ $classData->className }}</h1>
    <hr />

        @if($lessonData->isEmpty())
            <p>No lessons available for this class.</p>
        @else
            @foreach($lessonData as $lesson)
                <div class="lesson-content-pupils">
                    <p class="add-lesson-title">{{ $lesson->quarter }}</p>
                    <hr />
                    <p class="add-lesson-content"> {{ $lesson->topic }}</p>
                </div>
            @endforeach
        @endif





    </div>
</div>

        

    </div>
    <script src="{{ url('/js/dashboard.js') }}"></script>
</body>
</html>
