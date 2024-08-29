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
            <!-- <li class="noti"> <i class="fa-solid fa-bell"></i><span class="notify"> Notification </span> </li> -->
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg" ><a style="margin-left: 59%; margin-top: -4px;" href="{{ url('chatify') }}">Messages</a></span></li>
            <p class="teacher-teacher-dashboard" style="margin-left: -30px;"> {{ session('name') }} </p>
            <a class="lgt-btn" href="{{ route('logout') }}" style="margin-left: 94%;"><i class="fa-solid fa-right-from-bracket"></i></a>
        </ul>
        
        
    </div>
    <!-- Start of sidebar -->
    <div class="container-dashboard">
        <div class="sidenav-bar">
            <ul>
                <li><a href='{{ route("teacher_dashboard")}}'>Dashboard</a></li>
                <li><a href="{{ route('assign_class.MyClass') }}">My Class</a></li>
            
            </ul>
        </div>
        <br />
        <!-- End of sidebar -->

        <span style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">Dashboard</a>
            <a href="#">Game</a>
            
        </div>



    

       <div class="my-classes">
        <h3>My Classes</h3>
        <hr />
        @foreach($getRecord as $value) 
            <div class="my-display-classes">
                <a   href="{{ route('assign_class.addLesson', $value->class_id)}}"><p class="class-class">{{ $value->class_name }}</p>
                    <img class="class-image" src="{{ url('/photos/presentation.gif') }}" alt="class"></a>
            </div>
        @endforeach
       </div>


       
    </div>

    <script>
                // JavaScript code for modal functionality
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
        // ...
    </script>

</body>
</html>
