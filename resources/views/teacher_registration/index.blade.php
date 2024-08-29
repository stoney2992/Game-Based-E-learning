<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>dashboard</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
    <!-- Side bar start -->
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
    <!-- Sidebar end -->
    <div class="admin-container">
        <h3> Teachers </h3>
        <div class="adminAddSection d-flex align-items-center justify-content-between">
            <a href="{{ route('teacher_registration.create') }}" class="addbtn btn btn-primary"><span><i
                        class="fa-sharp fa-light fa-circle-plus fa-spin fa-spin-reverse"></i></span>Add</a>
        </div>
        <hr />
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <h3 class="successful">{{ Session::get('success') }}</h3>
        </div>
        @endif
        <table class="table table-hover">
            
        @if(count($users ?? []) > 0)
    <tbody class="databody">
        @foreach($users as $teachers)
            <tr>
                <td>{{ $teachers->id }}</td>
                <td>{{ $teachers->name }}</td>
                <td class="all-btn">
                    <!-- Add your buttons or actions here -->
                    <form action="{{ route('teacher_registration.destroy', $teachers->id) }}" method="POST"
                    type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn btn btn-danger m-0">Delete</button>
                    </form>
                </td>
                <td class="ed-btn ">
                <a class="edit-btn" href="{{ route('teacher_registration.edit', $teachers->id)}}" type="button" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
@else
    <tr>
        <td class="text-center" colspan="3">No teachers found.</td>
    </tr>
@endif
    </div>
    <script src="{{ url('/js/dashboard.js') }}"></script>



    

</body>

</html>