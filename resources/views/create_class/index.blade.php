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
            <li class="noti"> <i class="fa-solid fa-bell"></i><span class="notify"> Notification </span> </li>
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg">Messages </span></li>
            <li class="adn"> <i class="fa-solid fa-user-gear"></i><span class="adm">Admin</span></li>
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
                    <li><a href="{{ route('create_class.index') }}">Create Class</a></li>
                    <li><a href="{{ route('assign_class.index') }}">Assign Class Teacher</a></li> 
                </div>
            </div> 
        </ul>
        <a class="backbtn" href="{{ route('teacher_registration') }}"><span><i class="fa-regular fa-arrow-left fa-beat"></i></span>Back</a>
    </div>
    <span class="hamburger" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="AdminSidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="">Dashboard</a>
        <a href="{{ route('pupils_registration.index') }}">Pupils</a>
        <a href="{{ route('teacher_registration') }}">Teachers</a>
    </div>
    <!----sidebar end ----->


    <!----adding classes --->

    <div class="class_add">
        <h3> Create Classes </h3>
        <button id="myBtn"><span><i
        class="fa-solid fa-light fa-circle-plus fa-spin fa-spin-reverse"></i></span>Add</button>
        <hr />

        <!-- The Modal -->

        <div id="myModal" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            <form action="{{ route('create_class.store') }}" method="POST">
                @csrf
                <div>
                    <div>
                        <lable>Class Name</label>
                        <input type="text" name="name" placeholder="name" required>
                    </div>
                    <div>
                        <lable>Status</label>
                        <select name="status">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                    </div>
                </div>
 
                <div>
                    <div>
                        <button class="sub-btn" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            </div>

        </div>

    </div>

    <div class="display-classes">
          @foreach($getRecord as $value)
        <!-- <tbody>  
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->status }}</td>
            </tr>
        </tbody>     -->
          @endforeach
    </div>

    <div class="display-classes">
    @if($getRecord->count() > 0)
                @foreach($getRecord as $rs)
        <ul>
            <a href="{{ route('add_class.show', $rs->id) }}"><li> {{ $rs->name }}, {{ $rs->created_by_name }},  
                @if($rs->status == 0)
                  Active
                @else
                  Inactive
                @endif

                <form action="{{ route('create_class.delete', $rs->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="del-btn" type="submit">Delete</button>
                 </form>
             </li> </a>
        </ul>

        @endforeach
                @else
                
                    <p class="text-center" colspan="5">No Class added</p>
                
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
  background-color:  #61c07c;
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
</style>


</html>