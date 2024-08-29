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
                <li><a href='{{ route("assign_class.MyClass") }}'>Lesson</a></li>
                <li><a href="{{ route('rewards.index')}}"></i>Rewards</a></li>
                <li><a href="{{ route('assign_class.view_quizzes', ['class_id' => $classData]) }}">Activities</a></li>
            
            </ul>
        </div> 
        <br />
         
        

        <!-- 
             
         -->
        <!-- End of sidebar -->


       <div class="my-classes">
        <h3 class="add-lesson">{{ $classId }} Quiz show</h3>
        <button id="myBtn" class="add-button-lesson"><i class="fa-solid fa-circle-plus"></i>Add</button>
        <hr />

             <div class="display-add-lesson">


             <h1>{{ $quiz->title }}</h1>
    <p>{{ $quiz->description }}</p>

    


    <a href="{{ route('quiz.start', $quiz->id) }}">Start Quiz</a>


            





                


         <div id="myModal" class="modal">
         <div class="modal-content-lesson">
         <p class="close">&times;<p>

        <!-- Your existing modal content -->
        <form action="" method="POST">
            @csrf
            <div>
                <input type="hidden" name="class_id" value="">
            </div>
            <div class="lesson-title">
                <input type="text" name="quarter" placeholder="Title">
            </div>
            <div class="lesson-content">
                <textarea type="text" name="topic" placeholder="write here...."></textarea>
            </div>
            <div>
                <button class="create-lesson-btn" type="submit">Submit</button>
            </div>
        </form>
    </div>
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
</script>


</body>
</html>
