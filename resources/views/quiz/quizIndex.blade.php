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
            <p class="teacher-teacher-dashboard" style="margin-left: -30px;"> {{ session('name') }} </p>
            <a class="lgt-btn" href="{{ route('logout') }}" style="margin-left: 94%;"><i class="fa-solid fa-right-from-bracket" ></i></a>
        </ul>
    </div>

    <div class="container-dashboard">
        <div class="sidenav-bar">
            <ul>
                 <li><a href="{{ route('teacher_dashboard') }}">Dashboard</a></li>
                <li><a href='{{ route("assign_class.MyClass") }}'>My Class</a></li>
        
            </ul>
        </div>
        <br />

        <!-- 
             
         -->
        <!-- End of sidebar -->


       <div class="my-classes">
        <h1 class="activities-title-head">Activities</h1> 
        <button id="myBtn" class="add-activities"><span><i
        class="fa-solid fa-light fa-circle-plus "></i></span>Add</button>

        <hr />
            <div class="display-add-lesson">
                @foreach($quizzes as $quiz)
    <div class="class-quiz">                                                                
        <h2 class="quizz-title">{{ $quiz->title }}</h2>
        <div class="quizDate">
             <p> Date: {{ $quiz->created_at->format('m/d/Y') }} </p>
        </div>
        <p class="quizz-description">{{ $quiz->description }}</p>
        <p>Time Limit: {{ $quiz->time_limit ? $quiz->time_limit.' minutes' : 'No limit set' }}</p>
        <p><strong>Total Score:</strong> {{ $quiz->total_score }}</p>
        <hr />

        <div class="add-question-btn">
            <a class="add-question-button" href="{{ route('quiz.question_create', ['quizId' => $quiz->id]) }}">Add Question</a>
        </div>

        <div class="delete-question-btn">
        <a href="{{ route('quiz.quiz_edit', ['id' => $quiz->id]) }}" class="btn btn-primary">Edit</a>
        

            <form method="POST" action="{{ route('quiz.delete', ['quizId' => $quiz->id]) }}">
                @csrf
                @method('DELETE')
                <button  type="submit"><i class="fa-solid fa-trash-can"></i></button>
            </form>
        </div>

        <!-- Display existing questions -->
        @foreach($quiz->questions as $question)
            <div class="display-question">
                        <p>Question: {{ $question->question_text }}</p>
                        <ul class="question-choices">
                        @foreach($question->choices as $choice)
                            <li> Option :{{ $choice->option }}</li>
                        @endforeach
                        @foreach($question->choices as $choice)
                            @if($choice->is_correct)
                            <div>
                                <p class="correct-choice">Correct Option: {{ $choice->option }}</p>
                                <!-- You can add specific content or styling for correct choices if needed -->
                                <li>Points: {{ $choice->points }}</li>
                            </div>    
                            @endif
                         @endforeach
                            </p> 
                        </ul>

                <!-- Delete question form -->
                <div class="delete-new-button">
                    <form  method="POST" action="{{ route('quiz.question_destroy', ['questionId' => $question->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-question-btn"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
                    <div class="edit-answersheet">
                         <a href="{{ route('quiz.question.edit', ['quizId' => $quiz->id, 'questionId' => $question->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
            </div>
        @endforeach

        <!-- Quiz Attempts section -->
        <div class="quiz-attempts">
    <h3>Quiz Attempts</h3>
    <ul>
        @foreach($quizAttempts->where('quiz_id', $quiz->id) as $attempt)
            <li>
                User: 
                @if($attempt->user)
                    {{ $attempt->user->name }}
                @else
                    (User not found)
                @endif
                | Score: {{ $attempt->score }}
                Date: {{ $attempt->created_at->format('m/d/Y') }} 
            </li>
        @endforeach
    </ul>
</div>
    </div>
@endforeach


            <!-- The Modal -->

                <div id="myModal" class="modal">

                <!-- Modal content -->
                    <div class="modal-content">
                        <p class="close">&times;<p>

                        <!-- Your existing modal content -->
                        <form class="quiz-add-modal" method="POST" action="{{ route('quiz.store') }}">
                            @csrf
                            <input type="hidden" name="class_id" value="{{ $classId }}">
                            <input class="ipt-btn-quizz-title" type="text" name="title" placeholder="Title"required>
                            <input class="ipt-btn-quizz" type="text" name="description" required  placeholder="Description"/>
                            <input type="number" name="time_limit" id="time_limit" value="{{ old('time_limit', $quiz->time_limit ?? null) }}" placeholder="Time Limit (minutes):">

                            <!-- Add more fields as needed -->

                            <button type="submit" class="create-btn" >Create</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
 
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
     

            <script src="{{ url('/js/dashboard.js') }}"></script>
</body>

<Style>
    .displayRequest{
        margin-top: 20%;
        margin-left: 25%;
        padding: 10px;
        background-color: #E4ECF1;
        width:70%;
    }
    thead tr{
        font-family: 'Fredoka';
        margin-left: 10%;
    }
    .t-name{
        font-size: 24px;
        font-weight: 400;
    }
    .r-name{
        font-size: 24px;
        padding-left: 250px;
        font-weight: 400;
    }
    .a-name{
        font-size: 24px;
        padding-left: 300px;
        font-weight: 400;
    }



.display-class{
    width: 70%;
    margin-left: 25%;
    margin-top: 50px;
    font-family: 'Fredoka';
}
.display-class a{
    padding: 10px;
    background-color: #e4e9ee;
    width: 80%;
    height: 50px;
    border-radius: 10px;
    margin-top: 10px;
    
}
.display-class  .classes-display {
    text-decoration: none;
    color: #000;
    font-size: 24px;
    display: inline-block;
}

</style>


