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
        <h3 class="add-lesson">Update Question</h3>
        <hr />
            <div class="display-add-lesson">
             <form method="POST" action="{{ route('quiz.question.update', ['quizId' => $quiz->id, 'questionId' => $question->id]) }}">
                @csrf
                @method('PUT')
                <div class="edit-question-question-edit">
                
                        {{-- Question text input --}}
                        <div class="update-question">
                            <label for="question_text">Question:</label>
                            <input type="text" name="question_text" value="{{ $question->question_text }}" required />
                        </div>
                        
                        {{-- Choices inputs --}}
                        @foreach($question->choices as $index => $choice)
                        <div class="inputers-questionaires">
                            <label for="correct_option">Option:</label>
                            <input class="inputers-questionaires-quest" type="radio" name="correct_option" value="{{ $index }}" {{ $choice->is_correct ? 'checked' : '' }} />
                            <input class="inputers-questionaires-quest-quest" type="text" name="options[]" value="{{ $choice->option }}" required />
                            <input type="hidden" name="option_ids[]" value="{{ $choice->id }}">
                        </div>
                        @endforeach
                        
                        {{-- Points input --}}
                        <div class="questionares-pointas">
                            <label for="points">Points:</label>
                            <input type="number" name="points" value="{{ $question->choices->firstWhere('is_correct', 1)->points }}" min="0" required />
                        </div>
                        <div class="button-question-buttons">
                             <button type="submit">Update</button>
                        </div>
                        
                          
                </div>       
            </form>
        </div>

</body>
</html>
