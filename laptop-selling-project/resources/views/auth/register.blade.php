<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- icon --}}
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Register Page</title>
</head>
<body style="background: #f6f6f6">
   {{-- logo and header --}}
   <div class="text-center my-3">
    <img src="{{asset('images/logo.png')}}" alt="" width="80" height="80">
    <h1 class="text-danger fs-5 mt-2">Account Registration</h1>
   </div>
   {{-- form register --}}
   <section class="m-auto col-12 p-3 col-md-8 bg-white p-md-5 col-lg-6 mb-md-5 rounded-4">
    <form action="{{route('register')}}" method="POST">
     @csrf
     <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name . . .">
        @error('name')
          <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email . . .">
        @error('email')
          <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter your password . . .">
        @error('password')
          <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter your password confirmation . . .">
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age" value="{{old('age')}}" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="Enter your age . . .">
        @error('age')
        <small class="text-danger">{{$message}}</small>
      @enderror
      </div>
      <div class="mb-4">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select @error('gender') is-invalid @enderror" aria-label="Default select example" name="gender">
            <option value="">Select Gender</option>
            <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
            <option value="female" @if(old('gender') == 'female') selected @endif >Female</option>
          </select>
          @error('gender')
          <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="number" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone . . .">
        @error('phone')
        <small class="text-danger">{{$message}}</small>
      @enderror
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <a class="" href="{{route('login')}}">Already registered?</a>
        <button class="btn btn-primary">Register Here!</button>
    </div>
    </form>
   </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
