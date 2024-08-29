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
            <p class="super-admin"> {{ session('name') }} </p>
            <a class="lgt-btn" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
        </ul>
        
        
    </div>
    <!----side bar start ---->
    <div class="sidenav-bar">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('pupils_registration.index') }}">Pupils</a></li>
            <li><a href="{{ route('teacher_registration') }}">Teachers</a></li>
            
            <div class="dropdown">
                <button class="dropbtn">Classes 
                </button>
                <div class="dropdown-content">
                    <li><a href="{{ route('add_class.index') }}">View Class</a></li>
                    <li><a href="{{ route('assign_class.index') }}">Assign Class Teacher</a></li> 
                    <li><a href="{{ route('assign_class.pupil') }}">Assign Pupil</a></li>
                    <li><a href="{{ route('assign_class.viewAssignClass') }}">View Assigned Class</a></li>
                </div>
            </div> 
            <!-- <li><a href="{{ route('create_class.index') }}">Create Class</a></li>
            <li><a href="{{ route('assign_class.index') }}">Assign Class Teacher</a></li> -->
        </ul>
        
    </div>
    <span class="hamburger" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="AdminSidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="">Dashboard</a>
        <a href="{{ route('pupils_registration.index') }}">Pupils</a>
        <a href="{{ route('teacher_registration') }}">Teachers</a>
    </div>
    <!----sidebar end ----->
    <div class="admin-container">
        <h3> Dashboard </h3>
        <hr />
        <div class="admin pupils" id="pupils">
            <p class="icons"> <i class="fa-solid fa-users"></i>
                <!--Icons-->
            </p>
            <p> Pupils </p>
            <p> {{ $pupils }}
                <!---Nummber of pupils from database-->
            </p>
        </div>

        <div class="admin" id="teachers">
            <p class="icons"> <i class="fa-solid fa-user-tie"></i>
                <!--Icons-->
            </p>
            <p> Teachers </p>
            <p> {{ $teachers }}
                <!---Nummber of pupils from database-->
            </p>
        </div>

        <div class="admin" id="request">
            <p class="icons"> <i class="fa-solid fa-book-open-reader"></i>
                <!--Icons-->
            </p>
            <p> Classes </p>
            <p> {{ $classes }} 
                <!---Nummber of pupils from database-->
            </p>
        </div>

</div>
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


</style>

</html>