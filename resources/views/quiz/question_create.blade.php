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
                 <li><a href="{{ route('teacher_dashboard') }}">Dashboard</a></li>
                <li><a href='{{ route("assign_class.MyClass") }}'>My Class</a></li>
                <li><a href='#'>Reward</a></li>
                <li><a href='#'>Activities</a></li>
            
            </ul>
        </div>
        <br />

        <!-- 
             
         -->
        <!-- End of sidebar -->


       <div class="my-classes">
        <h3 class="add-lesson">Question</h3>
        <hr />
             <div class="display-add-lesson">
                <p class="title-of-quiz">{{ $quiz->description }} :</p>

                 <!-- quiz/question/create.blade.php -->
                 <form method="POST" action="{{ route('quiz.question_store', ['quizId' => $quiz->id]) }}">
    @csrf
    <div class="question-question">
        <label for="question">Question:</label>
        <input type="text" name="question_text" required />
    </div>

    <div class="choicess">
        <!-- Add input fields for options -->
        <input type="text" name="options[]" placeholder="Option 1" required>
        <input type="text" name="options[]" placeholder="Option 2" required><br>
        <!-- More options as needed... -->

        <!-- Radio buttons for selecting the correct option -->
        <label>Correct Option:</label><br>
        <label>
            <input type="radio" name="correct_option" value="0" required> Option 1
        </label>
        <label>
            <input type="radio" name="correct_option" value="1" required> Option 2
        </label>
        <!-- More radio buttons as needed... -->

        <input type="number" name="points" placeholder="set a point/s" required>
    </div>
    <button type="submit" class="create-question-btn">Create</button>
</form>
        </div>

</body>
</html>
