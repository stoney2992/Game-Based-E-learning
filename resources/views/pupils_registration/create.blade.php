<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>dashboard</title>
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

  <!-- Sidebar start -->
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
    <a href="">Dashboard</a>
    <a href="{{ route('pupils_registration.index') }}">Pupils</a>
    <a href="{{ route('teacher_registration') }}">Teachers</a>
  </div>
  <!-- Sidebar end -->
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  <div class="admin-container">
  <form action="{{ route('register_save') }}" method="POST" class="user">
      @csrf
      <div class="form-group">
        <input name="name" type="text" class="form-control form-control-user @error('name')is-invalid @enderror" id="exampleInputName" placeholder="Name">
        @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group">
        <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address">
        @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group">
        <input name="phone" type="number" class="form-control form-control-user @error('phone')is-invalid @enderror" id="exampleInputEmail" placeholder="Phone Number">
        @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <input name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
          @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-sm-6">
          <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password">
          @error('password_confirmation')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror

        </div>
        <input name="roles" type="hidden" class="form-control form-control-user @error('roles')is-invalid @enderror" id="exampleInputName" value="pupil">
      </div>

      <button type="submit" class="reg-btn btn-primary btn-user btn-block">Register Account </button>
    </form>
  </div>

  <script src="{{ url('/js/dashboard.js') }}"></script>
</body>
</html>
