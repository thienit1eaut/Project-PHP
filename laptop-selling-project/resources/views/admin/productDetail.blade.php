@extends('admin.layout')
@section('title','Product Detail')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Product Detail</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">Product Detail</li>
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
             <a class="fs-5" href="{{route('product.list')}}">
                <i class="fa-solid fa-arrow-left me-2"></i> Back
             </a>
            @if ($data->image == null)
            <img class="col-8 col-lg-5 m-auto" src="{{asset('images/noimage.png')}}" class="card-img-top" alt="Laptop">
            @else
            <img class="col-8 col-lg-5 m-auto" src="{{asset('storage/products/' . $data->image)}}" class="card-img-top" alt="Laptop">
            @endif
            <div class="card-body">
              <h5 class="card-title text-center"><i class="fa-solid fa-laptop me-2"></i>{{$data->name}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fa-solid fa-tags me-2"></i>{{$data->series}}</li>
              <li class="list-group-item"><i class="fa-solid fa-laptop-code me-2"></i>{{$data->category_name}}</li>
              <li class="list-group-item">{{$data->description}}</li>
              <li class="list-group-item"><i class="fa-solid fa-dollar-sign me-2"></i>{{$data->price}}</li>
              <li class="list-group-item"><i class="fa-regular fa-calendar me-2"></i>{{$data->created_at->format('d-F-Y')}}</li>
            </ul>
          </div>
     </div>
   </main>
@endsection
