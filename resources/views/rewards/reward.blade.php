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
            <!-- <li class="noti"> <i class="fa-solid fa-bell"></i><span class="notify" s> Notification </span> </li> -->
            <li class="mes"> <i class="fa-solid fa-message"></i><span class="msg" ><a style="margin-left: 59%; margin-top: -4px;" href="{{ url('chatify') }}">Messages</a></span></li>
            <p class="teacher-teacher-dashboard"> {{ session('name') }} </p>
            <a class="lgt-btn" href="{{ route('logout') }}" style="margin-left: 94%;"><i class="fa-solid fa-right-from-bracket" ></i></a>
        </ul>
    </div>

    <div class="container-dashboard">
        <div class="sidenav-bar">
            <ul>
                 <li><a href="{{ route('teacherDashboard') }}">Dashboard</a></li>
                <li><a href='{{ route("assign_class.MyClass") }}'>My Class</a></li>
            </ul>
        </div>
        <br />

        <!-- 
             
         -->
        <!-- End of sidebar -->


       <div class="my-classes">
        <h3 class="add-lesson">Rewards</h3>
        <hr />
        <div class="container">
            <div class="add-btn-btn">
                <a class="create-reward-btn-btn" href="{{ route('rewards.create') }}">Add Reward</a>
            </div>
                <ul>
                    @foreach ($rewards as $reward)
                        <li class="all-reward-display">
                            {{ $reward->name }} <br />
                            ({{ $reward->points_required }} Points Required) <br />
                            <div class="reward-edit-btn-btn">
                                <a class="reward-edit-btn" href="{{ route('rewards.edit', $reward->id) }}">Edit</a>
                            </div>
                            <form method="POST" action="{{ route('rewards.destroy', $reward->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="reward-delete-btn-btn">
                                     <button type="submit">Delete</button>
                                </div>
                                
                            </form>
                        </li>
                    @endforeach
                </ul>
        </div>




                 




         
       
    </div>

    <!-- JavaScript to handle modal interactions -->
<script>
 
</script>


</body>
</html>
