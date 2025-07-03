@extends('admin.layout')
@section('title','User Detail')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>User Detail</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">User</li>
            <li class="breadcrumb-item active">User Detail</li>
          </ol>
        </nav>
     </div>

     {{-- success msg --}}
     @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show container" role="alert">
        <strong>{{session('delete')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container-fluid mt-5">
        <div class="card mx-auto p-3 col-md-8">
             <a class="fs-5" href="{{route('user.list')}}">
                <i class="fa-solid fa-arrow-left me-2"></i> Back
             </a>
            @if ($data->image == null)
            <img class="col-8 col-lg-5 m-auto" src="{{asset('images/noimage.png')}}" class="card-img-top" alt="Laptop">
            @else
            <img class="col-8 col-lg-5 m-auto rounded-circle img-thumbnail" src="{{asset('storage/profile/' . $data->image)}}" class="card-img-top" alt="Laptop">
            @endif
            <div class="card-body">
              <h5 class="card-title text-center"><i class="fa-regular fa-user me-1"></i>{{$data->name}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fa-regular fa-envelope me-2"></i>{{$data->email}}</li>
              <li class="list-group-item"><i class="fa-solid fa-tags me-2"></i>{{$data->role}}</li>
              <li class="list-group-item"><i class="fa-regular fa-heart me-2"></i>{{$data->age}}</li>
              <li class="list-group-item">
                @if ($data->gender == 'male')
                <i class="fa-solid fa-person me-2"></i>
                @else
                <i class="fa-solid fa-person-dress me-2"></i>
                @endif
                {{$data->gender}}
            </li>
              <li class="list-group-item"><i class="fa-solid fa-phone me-2"></i>{{$data->phone}}</li>
              <li class="list-group-item"><i class="fa-solid fa-map-location-dot me-2"></i>{{$data->address}}</li>
              <li class="list-group-item"><i class="fa-regular fa-calendar me-2"></i>{{$data->created_at->format('d-F-Y')}}</li>
              {{-- user to admin --}}
              <li class="list-group-item text-center mt-1">
                 <a href="{{route('user.promote',$data->id)}}" class="btn btn-warning">Promote to Admin</a>
              </li>
            </ul>
          </div>
     </div>
   </main>
@endsection
