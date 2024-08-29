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

        <body>
            <!------start of sidebar------->
            <div class="container-dashboard">
                <div class="sidebar">
                    <img src="{{url('/photos/logoImage.png')}}" alt="images">


                    <div class="db-image">
                        <img src="{{url('/photos/class.png')}}" alt="images">
                    </div>
                    <div class="game-image">
                        <img src="{{url('/photos/pupils.png')}}" alt="images">
                    </div>
                    <div class="activity-image">
                        <img src="{{url('/photos/activity.png')}}" alt="images">
                    </div>
                    <div class="rewards-image">
                        <img src="{{url('/photos/prize.png')}}" alt="images">
                    </div>
                    <ul class="menu-items">
                        <h1>MathQuest</h1>
                        <li><a href="{{ route('teacher_dashboard.class') }}">Classes</a></li>
                        <li><a href="{{ route('teacher_dashboard.pupil') }}">Pupils</a></li>
                        <li><a href='activity'>Activities</a></li>
                        <li><a href='reward'>Rewards</a></li>
                    </ul>
                    <a class="backbtn" href="{{ route('teacher_dashboard.class') }}"><span>
                        <i class="fa-solid fa-arrow-left fa-beat"></i></span>Back</a>
                </div>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <!------end of sidebar------->
                <!------start of search bar------->
                <div class="search-bar">
                    <form action="">
                        <input type="text" placeholder="Search " name="search">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <!------end of search bar------->

                <!----start messages , notification and profile-------->
                <div class="message">
                    <p class="msg-btn"> <i class="fa fa-solid fa-envelope fa-2x"></i> </p>
                    <p class="nt-btn"> <i class="fa fa-solid fa-bell fa-2x"></i> </p>
                    <h1> Juan Dela Cruz </h1>
                </div>
                <!----end messages , notification and profile-------->


             <div class="p-list">   
                <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">Pupils</h3>
                </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <h3>{{ Session::get('success') }}</h3>
                        </div>
                    @endif
                                <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($pupils->count() > 0)
                                @foreach($pupils as $rs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rs->name }}</td>
                 
                                        <td>
                                            <div role="group" aria-label="Basic example">
                                                <!-- <a href="" >Add to class</a> -->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">teachers not found</td>
                                </tr>
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

        </body>

        </html>

