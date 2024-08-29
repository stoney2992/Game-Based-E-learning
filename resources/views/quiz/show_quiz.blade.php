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
                 <li><a href="{{ route('student_dashboard') }}">Dashboard</a></li>
                 <li><a href="{{ route('rewards.index')}}"></i>Rewards</a></li>
                 <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>

            </ul>
        </div>
        <br />
        <div class="topnav">
            <a href="#home" class="active">MathQuest</a>
            <div id="myLinks">
                <li><a href="{{ route('student_dashboard') }}"></i>Dashboard</a></li>
                <li><a href="{{ route('rewards.index')}}"></i>Rewards</a></li>
                <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
                <a class="lgt-btn" href="{{ route('logout') }}">Logout</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            </div>

        <!-- 
             
         -->
        <!-- End of sidebar -->


       <div class="my-classes">
        <h3 class="add-lesson">Activity Quiz</h3>
        <hr />
        
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(!$hasAttempted)
    <div class="display-add-lesson">
        <h1 class="quiz-title">{{ $quiz->title }}</h1>
        <p>Total Quiz Score: {{ $totalScore }}</p>

        <div id="timer">
        <p>Time Limit: {{ $quiz->time_limit }} minutes</p>
        <p id="time-left"> 00:00</p>
        </div>


        <form id="quiz-form" method="post" action="{{ route('quiz.submit', ['quizId' => $quiz->id]) }}">
            @csrf
            @foreach($questions as $question)
                <div class="quiz-question">
                    <p class="questionnaire">{{ $question->question_text }}</p>
                    @foreach($question->choices as $choice)
                        <input class="input-radio-quiz" type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}">
                        {{ $choice->option }}
                        <br>
                    @endforeach
                </div>
            @endforeach
            <div class="test-submit-button">
                <button type="submit">Submit Quiz</button>
            </div>
        </form>
    </div>
@else
    <div class="alert alert-info">
        You have already attempted this quiz.
        @if(isset($pupilScore))
        <p>Your Score: {{ $pupilScore }}</p>
    @endif
    </div>
@endif


            





                




         
       
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Debug: Log 'DOMContentLoaded' event to ensure it's being called
        console.log('DOM fully loaded and parsed');
        
        // Ensure the element exists before attempting to start the timer
        let display = document.getElementById('time-left');
        if (display) {
            // If the element exists, log its current content for debugging
            console.log('Time display element found:', display.textContent);

            // Parse the time limit to an integer before multiplying
            let timeLimit = parseInt({{ $quiz->time_limit }}, 10) * 60;
            console.log('Starting timer for:', timeLimit, 'seconds');
            
            startTimer(timeLimit, display);
        } else {
            // If the element does not exist, log an error message
            console.error('Time display element not found');
        }
    });

    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var interval = setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        
        // Add console log to check the timer decrement
        console.log('Timer:', display.textContent);

        if (--timer < 0) {
            clearInterval(interval);
            var form = document.getElementById('quiz-form');
            if (form) {
                console.log('Time is up! Auto-submitting form.');
                form.submit();
            } else {
                console.error('Quiz form not found. Cannot submit.');
            }
        }
    }, 1000);
}
</script>







</body>
</html>
