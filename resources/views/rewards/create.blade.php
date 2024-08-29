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
                <li><a href='{{ route("assign_class.MyClass") }}'>My Class</a></li>
            
            </ul>
        </div>
        <br />

        <!-- 
             
         -->
        <!-- End of sidebar -->


       <div class="my-classes">
        <h3 class="add-lesson">Add Rewards</h3>
        <hr />

        <div class="container-rewards">

            <form method="POST" action="{{ route('rewards.store') }}">
                @csrf
                <div>
                    <input class="add-reward-reward" type="text" id="name" name="name" placeholder="Reward Name" required>
                </div>
                <div>
                    <Input class="add-reward-reward" id="description" name="description" placeholder="description" required>
                </div>
                <div>
                    <input class="add-reward-reward" type="number" id="points_required" name="points_required" placeholder="Points Required" required>
                </div>
                <div>
                    <button class="add-reward-reward-btn" type="submit">Add Reward</button>
                </div>
            </form>
        </div>




                 




         
       
    </div>

    <!-- JavaScript to handle modal interactions -->
<script>
 
</script>


</body>
</html>
