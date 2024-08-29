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
            <form action="{{ route('quiz.update', ['id' => $quiz->id]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- ... other form fields ... -->
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ old('title', $quiz->title) }}" required>
    
    <label for="description">Description:</label>
    <textarea name="description">{{ old('description', $quiz->description) }}</textarea>
    
    <label for="time_limit">Time Limit (minutes):</label>
    <input type="number" name="time_limit" id="time_limit" value="{{ old('time_limit', $quiz->time_limit) }}" placeholder="Enter time in minutes" min="1">

    <!-- ... submit button ... -->
    <button type="submit">Update Quiz</button>
</form>

        </div>

</body>
</html>
