@extends('admin.layout')
@section('title','Contact Detail')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Contact Detail</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Contact</li>
            <li class="breadcrumb-item active">Contact Detail</li>
          </ol>
        </nav>
     </div>

    @if (session('delete'))
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
        <strong>{{session('delete')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container-fluid mt-5">
        <div class="card mx-auto p-3 col-md-8">
             <a class="fs-5" href="{{route('contact.list')}}">
                <i class="fa-solid fa-arrow-left me-2"></i> Back
             </a>
             <div class="card-body">
                <h5 class="card-title text-center"><i class="fa-regular fa-user me-2"></i>{{$data->name}}</h5>
              </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fa-regular fa-envelope me-2"></i>{{$data->email}}</li>
              <li class="list-group-item"><i class="fa-solid fa-phone me-2"></i>{{$data->phone}}</li>
              <li class="list-group-item">{{$data->message}}</li>
              <li class="list-group-item"><i class="fa-regular fa-calendar me-2"></i>{{$data->created_at->format('d-F-Y')}}</li>
            </ul>
          </div>
     </div>
   </main>
@endsection
