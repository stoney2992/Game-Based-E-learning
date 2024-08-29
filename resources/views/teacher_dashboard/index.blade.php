<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>dashboard</title>

    <link rel="stylesheet" type="text/css" href="{{url('/css/style.css')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Teachers</h1>

        <!-- <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add teacher</a> -->

    </div>
    <hr />

    <h2>Class</h2>
    @if($teacher_dashboards->count() > 0)
    @foreach($teacher_dashboards as $rs)
    <ul>
        <li>{{ $rs->className }}</li>
    </ul>
    @endforeach
    @else
    <tr>
        <p>teachers not found</p>
    </tr>
    @endif

    <button id="myBtn">Add Class</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="{{ route('teacher_dashboard.store') }}" method="POST">
                @csrf
                <div>
                    <div>
                        <lable>Input Class Name</label>
                            <input type="text" name="className" placeholder="name">
                    </div>
                </div>

                <div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

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