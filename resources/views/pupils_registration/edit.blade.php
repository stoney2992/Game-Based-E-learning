<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MathQuest</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body class="bg-gradient-primary">
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
        <h3 class="mb-0">Update User</h1>
        <hr />
        <form action="{{ route('pupils_registration.update', $pupil->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="update-ipt">
        <div class="label-input">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $pupil->name }}" > <!-- Change $pupils to $pupil -->
        </div>
        <div class="label-input">
            <label>Email</label>
            <input type="text" name="email" placeholder="Email" value="{{ $pupil->email }}" > <!-- Change $pupils to $pupil -->
        </div>
        <div class="label-input">
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="Phone" value="{{ $pupil->phone }}" style="margin-left: -70px" > <!-- Change $pupils to $pupil -->
        </div>
        <div class="label-input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter new password to change"> <!-- Change $pupils to $pupil -->
            
        </div>    
    </div>
    <div class="update-btn">
        <button>Update</button>
    </div>
</form>

            
    </div>
    <script src="{{ url('/js/dashboard.js') }}"></script>
    
</body>
</html>