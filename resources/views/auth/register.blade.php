<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{url('/css/style.css')}}">
</head>

<body class="bg-gradient-primary">
  <div class="adminRegister">
      <h3 class="h4 text-gray-900 mb-4">Create Admin Account!</h3>
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
        <input name="roles" type="text" class="form-control form-control-user @error('roles')is-invalid @enderror" id="exampleInputName" placeholder="Roles">
      </div>

      <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
    </form>
    <div class="text-center">
      <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
    </div>
  </div>
</body>
</html>


