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
        </ul>
    </div>
    <span class="hamburger" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="AdminSidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="">Assign class</a>
        <a href="{{ route('pupils_registration.index') }}">Pupils</a>
        <a href="{{ route('teacher_registration') }}">Teachers</a>
    </div>
    <!----sidebar end ----->


    <!----adding classes --->

    <div class="class_add">
        <h3>View Assign Classes </h3>
        <br />
        <hr />

    </div>
   
    <div class="display-class">
    @foreach($groupedClasses as $classId => $classPupils)
      <div class="admin-view-pupils">
        @php
            $className = $classPupils->first()->class_name;
            $assignedTeacher = $assignedTeachers->get($classId);
        @endphp

        <p class="class-name-view">Class: {{ $className }}</p><br>

          @if($assignedTeacher)
              <p class="assign-teachers" >Assigned Teacher: {{ $assignedTeacher->teacher->name }}</p>
              <br>
          @else
              <p >No assigned teacher for this class.</p>
          @endif

          @foreach($classPupils as $pupil)
            <div class="pupils-distance-to-top">
              <p class="pupils-view-in-assign-class"> {{ $pupil->user->name }}</p>
              <hr class="line-in-pupils"/>
              <br />
            </div>
              <!-- Assuming 'user' is the relationship with the User model, adjust if needed -->
              <!-- Add other pupil details as needed -->
          @endforeach
     </div>
    @endforeach

    </div>

</div>
            <script src="{{ url('/js/dashboard.js') }}"></script>
</body>

<Style>
    

.display-class{
    width: 70%;
    margin-left: 23%;
    margin-top: 50px;
    font-family: 'Fredoka';
    font-size: 24px;
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

</html>