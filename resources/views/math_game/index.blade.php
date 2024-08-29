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

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                 <li><a href="{{ route('assign_class.myclassPupils') }}"></i>Lessons</a></li>
            
            </ul>
        </div>
        <br />
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

        <!-- 
             
         -->
        <!-- End of sidebar -->


    <div class="my-classes-game">
        <div class="game-container">
            <h1>Flash Arithmetic</h1>
            <div id="gameStart" class="gameStart">
                <button class="startGame" id="startGame">Start Game</button>
                <button id="stopGame" class="stopGame" style="display: none;">Stop Game</button>
            </div>
            <div id="timer" style="display: none;">
                <p class="game-rules">Answer it for 6 seconds  <span id="countdown">6</span></p>
            </div>
            <div id="mathGame" style="display: none;">
                <p id="question" class="game-question">{{ $question }}</p>
                <input class="game-input" type="text" id="answer" placeholder="Your answer" autocomplete="off" >
                <!-- Removed the submit button -->
            </div>
            <p id="feedback" class="game-feedback"></p>
        </div>

    </div>

    <script>
 document.getElementById('startGame').addEventListener('click', function() {
    this.style.display = 'none';  // Hide the "Start Game" button
    document.getElementById('stopGame').style.display = 'block';  // Show the "Stop Game" button
    document.getElementById('mathGame').style.display = 'block';
    document.getElementById('timer').style.display = 'block';
    startTimer(6);
});

document.getElementById('stopGame').addEventListener('click', function() {
    this.style.display = 'none';  // Hide the "Stop Game" button
    document.getElementById('startGame').style.display = 'block';  // Show the "Start Game" button
    document.getElementById('mathGame').style.display = 'none';
    document.getElementById('timer').style.display = 'none';
    document.getElementById('feedback').innerText = '';
    document.getElementById('answer').value = '';

    if (currentInterval) {
        clearInterval(currentInterval);
    }
});

var currentInterval = null;

function startTimer(duration) {
    if (currentInterval) {
        clearInterval(currentInterval);
    }

    var timer = duration;
    document.getElementById('countdown').textContent = timer;

    currentInterval = setInterval(function () {
        timer -= 1;
        document.getElementById('countdown').textContent = timer;

        if (timer <= 0) {
            clearInterval(currentInterval);
            submitAnswer();
        }
    }, 1000);
}

function submitAnswer() {
    let question = document.getElementById('question').innerText;
    let answer = document.getElementById('answer').value || '0';

    fetch('{{ route('math-game.submit') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ question: question, answer: answer })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('feedback').innerText = data.success ? 'Correct!' : 'Wrong answer!';
        document.getElementById('question').innerText = data.newQuestion;
        document.getElementById('answer').value = '';
        startTimer(6);
    });
}

document.getElementById('mathGame').style.display = 'none';
document.getElementById('timer').style.display = 'none';

</script>
<script src="{{ url('/js/dashboard.js') }}"></script>
</body>
</html>
