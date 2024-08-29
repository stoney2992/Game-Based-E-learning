        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>MathQuest</title>

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

            <!-- Styles -->
            <link rel="stylesheet" type="text/css" href="{{url('/css/style.css')}}">

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
                        <li><a href="{{ route('teacher_dashboard') }}">Classes</a></li>
                        <li><a href="{{ route('teacher_dashboard.pupil') }}">Pupils</a></li>
                        <li><a href='activity'>Activities</a></li>
                        <li><a href='reward'>Rewards</a></li>
                    </ul>
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


                
                <!---progress bar---->
                <div class="section">
                    <h3> Section A </h3>
                    <div class="pgbar-light"> </div>
                    <div class="pgbark-dark" hidden="hidden"> </div>
                </div>
                <!--- end of progress bar---->
                <div class="activities-content">

                    <button id="myBtn"><i class="fa-solid fa-circle-plus fa-spin fa-spin-reverse"></i>Add</button>
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form action="{{ route('teacher_dashboard.classStore') }}" method="POST">
                                @csrf
                                <div>
                                    <div class="quarter">
                                        <lable class="label-quarter">Quarter</label>
                                            <input class="ipt-quarter" type="text" name="quarter">
                                    </div>
                                    <div class="title">
                                        <lable class=" label-title">Title</label>
                                            <input class="ipt-title" type=" text" name="title">
                                    </div>
                                    <div class="content">
                                        <lable class="label-content">Content</label>
                                            <textarea class="ipt-content" type=" text" name="topic"
                                                placeholder="input here ...."></textarea>
                                    </div>
                                </div>

                                <div class="submit-btn">
                                    <button type="submit">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="classlesson">
                <h2>Lessons</h2>
                @if($class_lessons->count() > 0)
                @foreach($class_lessons as $rs)
                <ul>
                    <li>{{ $rs->quarter }}</li>
                    <li>{{ $rs->title }}</li>
                    <li>{{ $rs->description }}</li>
                </ul>
                @endforeach
                @else
                <tr>
                    <p>No Lesson Found</p>
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