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
        <h3> Assign Classes Pupils</h3>
        <button id="myBtn"><span><i
        class="fa-solid fa-light fa-circle-plus fa-spin fa-spin-reverse"></i></span>Assign</button>
        <hr />

        <!-- The Modal -->

        <div id="myModal" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            <form action="{{ route('assign_class.addClass') }}" method="POST">
                @csrf

                <div>
                    <div><lable>Class Name</label>
                    <select name="class_id" class="class-dropdown">
                        <option>Select Class</option>
                        @foreach($assignClasses as $class)
                            <option  class="class-option" value="{{ $class->id }}">{{ $class->className }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div>

                <div>
                        <select name="pupil_id[]" class="class-dropdown">
                            <option value="">Select Pupils</option>
                            @foreach($pupils as $pupil)
                                <option class="class-option" value="{{ $pupil->id }}">{{ $pupil->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div>
                    <input type="hidden" name="status" value="0">
                </div>
 
                <div>
                    <div>
                        <button class="sub-btn" type="submit" style="margin-left:90px;">Submit</button>
                    </div>
                </div>
            </form>
            </div>

        </div>

    </div>

    <div class="display-class">
    
    @foreach($pupilAssignments as $value)
    <a class="classes-display">{{ $value->class_name }}, {{ $value->pupil_name }} </a>
    <a class="delete-assign-class" href="{{ route('assign_class.destroy', $value->id)}}"><i class="fa-solid fa-trash-can"></i></a> 
    @endforeach

    
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

</html>