<!DOCTYPE html>
<html lang="en">
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
            <li class="noti"> <i class="fa-solid fa-bell"></i><span class="notify"> Notification </span> </li>
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg">Messages </span></li>
            <li class="adn"> <i class="fa-solid fa-user-gear"></i><span class="adm">Admin</span></li>
        </ul>
    </div>
    <!----side bar start ---->
    <div class="sidenav-bar">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('pupils_registration') }}">Pupils</a></li>
            <li><a href="{{ route('teacher_registration') }}">Teachers</a></li>
        </ul>
        <a class="backbtn" href="{{ route('teacher_registration') }}"><span><i class="fa-regular fa-arrow-left fa-beat"></i></span>Back</a>
    </div>
    <span class="hamburger" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div id="mySidenav" class="AdminSidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="">Dashboard</a>
            <a href="{{ route('pupils_registration') }}">Pupils</a>
            <a href="{{ route('teacher_registration') }}">Teachers</a>
        </div>
    <!----sidebar end ----->
    <div class="admin-container">
        <h3> Teacher's Information </h3>
        <hr />
        <div class="teachers-info">
            <div class="all-info " >
                <label >Name</label>
                <input class="info-name" type="text" name="name"  placeholder="Name" value="{{ $teachers->name }}" readonly>
            </div>
            <div class="all-info" >
                <label >Email</label>
                <input class="info-email" type="text" name="email"  placeholder="Email" value="{{ $teachers->email }}" readonly>
            </div>
            <div class="all-info" >
                <label>Password</label>
                <input class="info-pass" type="text" name="password"  placeholder="password" value="{{ $teachers->password }}" readonly>
            </div>
            <div class="all-info" >
                <label >Created At</label>
                <input class="info-cr8" type="text" name="created_at"  placeholder="Created At" value="{{ $teachers->created_at }}" readonly>
            </div>
            <div class="all-info">
                <label >Updated At</label>
                <input class="info-upt" type="text" name="updated_at"  placeholder="Updated At" value="{{ $teachers->updated_at }}" readonly>
            </div>
        </div>
         
    </div>
    <script src="{{ url('/js/dashboard.js') }}"></script>
</body>
</html>