@extends('admin.layout')
@section('title','Category Page')
@section('content')
  <main id="main" class="main">
      {{-- Page Title --}}
     <div class="pagetitle">
        <h1>Category Create</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
        </nav>
     </div>

     {{-- success msg --}}
     @if (session('success'))
    <div class="alert col-md-8 m-md-auto alert-success alert-dismissible fade show container" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
     {{-- category create  --}}
     <div class="container-fluid mt-3">
         <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="text-center">Create New Category</h4>
                    </div>
                    <hr>
                    {{-- form --}}
                    <form action="{{route('category.edit',$data->id)}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                           <input type="text" class="form-control @error('categoryName') is-invalid @enderror" placeholder="Enter Your Category Name . . ." value="{{old('categoryName',$data->name)}}" name="categoryName" id="">
                           @error('categoryName')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>
                        <div class="form-group mb-3">
                            <textarea class="form-control @error('categoryDescription') is-invalid @enderror" placeholder="Enter Your Description . . ." name="categoryDescription" id="">{{ old('categoryDescription', $data->description) }}</textarea>
                            @error('categoryDescription')
                               <small class="text-danger">{{$message}}</small>
                            @enderror
                         </div>
                         <button class="btn btn-primary px-3">Update</button>
                    </form>
                </div>
            </div>
         </div>
     </div>
  </main>
@endsection
