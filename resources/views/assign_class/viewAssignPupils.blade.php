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
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg" ><a style="margin-left: 59%;" href="{{ url('chatify') }}">Messages</a></span></li>
            <a class="lgt-btn" href="{{ route('logout') }}">Logout</a>
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
                    <i class="fa fa-caret-down"></i>
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
        <h3>View Assign Pupils </h3>
        <button id="myBtn"><span><i
          class="fa-solid fa-light fa-circle-plus fa-spin fa-spin-reverse"></i></span>Assign</button>
        <hr />

        <!-- The Modal -->

        <div id="myModal" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            
              </div>
         </div>

    </div>

    <div class="display-class">
    
    
    <!-- myclassPupils.blade.php -->
    @if($assignedPupils->isNotEmpty())
    @php
        $className = $assignedPupils->first()->class->className;
    @endphp

    <p>Class: {{ $className }}</p><br>

    @foreach($assignedPupils as $pupil)
        <a>{{ $pupil->pupil_id }} {{ optional($pupil->user)->name }}</a>
        <!-- Assuming 'user' is the relationship with the User model, adjust if needed -->
        <!-- Add other pupil details as needed -->
    @endforeach
@else
    <p>No pupils assigned to this class.</p>
@endif




    
        
    
        
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
    
.dropdown {
  float: left;
  overflow: hidden;
  font-family: 'Fredoka';

}


.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: #000;
  background-color: inherit;
  font-family: 'Fredoka';
  font-size: 24px;
  color: #5A787D;
  padding: 10px;
  margin-left: 115px;

}

.navbar a:hover, .dropdown:hover .dropbtn {
  color:  #61c07c;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left: 30px;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
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