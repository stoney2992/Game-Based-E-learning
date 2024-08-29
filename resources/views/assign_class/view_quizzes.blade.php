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
            <!-- <li class="noti"> <i class="fa-solid fa-bell"></i><span class="notify" s> Notification </span> </li> -->
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg" ><a style="margin-left: 59%; margin-top: -4px;" href="{{ url('chatify') }}">Messages</a></span></li>
            <p class="teacher-teacher-dashboard"> {{ session('name') }} </p>
            <a class="lgt-btn" href="{{ route('logout') }}" style="margin-left: 94%;"><i class="fa-solid fa-right-from-bracket" ></i></a>
        </ul>
    </div>

    <div class="topnav">
            <a href="#home" class="active">MathQuest</a>
            <div id="myLinks">
                <li><a href="{{ route('student_dashboard') }}"></i>Dashboard</a></li>
                <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
                <a class="lgt-btn" href="{{ route('logout') }}">Logout</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            </div>

    <div class="container-dashboard">
    <div class="my-pupils-class">
        <div class="sidenav-bar">
            <ul>
                 <li><a href="{{ route('student_dashboard') }}">Dashboard</a></li>
                <li><a href='{{ route("assign_class.myclassPupils") }}'>Lessons</a></li>
                <li><a href="{{ route('rewards.index')}}"></i>Rewards</a></li>   
            </ul>
        </div>
</div>
        <br />

        <!-- 
             
         -->
        <!-- End of sidebar -->


       <div class="my-classes">
        <div class="new-my-classes">
        <h3 class="add-lesson">Activities</h3>
        <hr />
        <div class="display-add-lesson">

        @forelse($quizzes as $quiz)
            <div class="activity-box-holder">
            
                <h2>{{ $quiz->title }}</h2>
                <p>{{ $quiz->description }}</p>
                <p>Time limit: {{ $quiz->time_limit }} minutes</p>
                    <a href="{{ route('quiz.quizShow', ['id' => $quiz->id]) }}" class="create-btn" >Take Quiz</a>
                <!-- Add more details as needed -->
            </div>
            
                @empty
                 <p>No quizzes available for your class.</p>
          @endforelse
        </div>
        </div>



        <script src="{{ url('/js/dashboard.js') }}"></script>
</body>
</html>
