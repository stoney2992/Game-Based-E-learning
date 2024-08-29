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

    <div class="container-dashboard">
        <div class="sidenav-bar">
            <ul>
                <li><a href="{{ route('student_dashboard')}}"></i>Dashboard</a></li>
                <li><a href="{{ route('rewards.index')}}"></i>Rewards</a></li>
                <li><a href="{{ route('math-game.index')}}"></i>Game</a></li>
                <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
            </ul>
        </div>
        <br />
        
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

           
 
        <!-- End of sidebar -->


       <div class="my-classes-reward">
        <h3 class="reward-section">Rewards </h3>


        <div class="reward-container">
        @foreach ($recentQuizAttempts as $attempt)
        <p>Quiz: {{ $attempt->quiz->title }}</p>
        <p>Quiz Points: {{ $attempt->points }}</p>
@endforeach
        <p>Your Game Points: {{ $gamePoints }}</p>
        <p >Your Points: {{ $userPoints }}</p>
        
 
            @foreach ($rewards as $reward)
                <div class="reward-reward-container">
                    <h3>{{ $reward->name }}</h3>
                    <p>Required Points: {{ $reward->points_required }}</p>
                    @if(Auth::user()->points >= $reward->points_required)
                        <form method="POST" action="{{ route('rewards.claim', $reward->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="claim-reward-btn">Claim Reward</button>
                        </form>
                    @else
                        <button disabled class="btn btn-secondary" id="claim-reward-btn" >Not Enough Points</button>
                    @endif
                </div>
            @endforeach
        </div>  
    </div>

    

    <!-- JavaScript to handle modal interactions -->
<script>
    // Get the button and modal elements for assigned pupils
    var openPupilsBtn = document.getElementById("openPupilsModal");
    var pupilsModal = document.getElementById("pupilsModal");
    var closePupilsBtn = document.getElementById("closePupilsModal");

    // Event listener for opening the modal for assigned pupils
    openPupilsBtn.addEventListener("click", function () {
        pupilsModal.style.display = "block";
    });

    // Event listener for closing the modal for assigned pupils
    closePupilsBtn.addEventListener("click", function () {
        pupilsModal.style.display = "none";
    });

    // Get the button, modal, and close element for the existing modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = modal.getElementsByClassName("close")[0];

    // Event listener for opening the existing modal
    btn.onclick = function () {
        modal.style.display = "block";
    };

    // Event listener for closing the existing modal
    span.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the existing modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

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
