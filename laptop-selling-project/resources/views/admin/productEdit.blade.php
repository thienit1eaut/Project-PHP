@extends('admin.layout')
@section('title','Product Page')
@section('content')
  <main id="main" class="main">
      {{-- Page Title --}}
     <div class="pagetitle">
        <h1>Product Edit</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">Product List</li>
            <li class="breadcrumb-item active">Edit Product</li>
          </ol>
        </nav>
     </div>

     {{-- success msg --}}
     @if (session('success'))
    <div class="alert col-lg-6 offset-lg-3 alert-success alert-dismissible fade show container" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
     {{-- Product create  --}}
     <div class="container-fluid mt-3">
         <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a class="fs-5" href="{{route('product.list')}}">
                            <i class="fa-solid fa-arrow-left me-2"></i> Back
                         </a>
                        <h4 class="text-center">Edit Product</h4>
                    </div>

                    <div class="text-center">
                    @if ($productData->image == null)
                    <img class="w-50" src="{{asset('images/noimage.png')}}" class="card-img-top" alt="Laptop">
                    @else
                    <img class="w-50" src="{{asset('storage/products/' . $productData->image)}}" class="card-img-top" alt="Laptop">
                    @endif
                    </div>

                    <hr>
                    {{-- form --}}
                    <form action="{{route('product.update',$productData->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Product Image</label>
                           <input type="file" class="form-control mt-1 @error('productImage') is-invalid @enderror" placeholder="Enter Product Image . . ." name="productImage" id="">
                           @error('productImage')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                           <input type="text" class="form-control mt-1 @error('productName') is-invalid @enderror" placeholder="Enter Your Product Name . . ." name="productName" id="" value="{{ old('productName' , $productData->name) }}">
                           @error('productName')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Series</label>
                           <input type="text" class="form-control mt-1 @error('productSeries') is-invalid @enderror" placeholder="Enter Your Product Series . . ." name="productSeries" id="" value="{{ old('productSeries' , $productData->series) }}">
                           @error('productSeries')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                      <div class="form-group mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select @error('categoryId') is-invalid @enderror" aria-label="Default select example" name="categoryId">
                        <option value="">Choose Category</option>
                        @foreach ($categoryData as $category)
                       <option value="{{$category->id}}" @if($category->id == $productData->category_id || old('categoryId') == $category->id) selected @endif >{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                        </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control @error('productDescription') is-invalid @enderror" placeholder="Enter Your Description . . ." name="productDescription" id="">{{ old('productDescription',$productData->description) }}</textarea>
                        @error('productDescription')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Product Price</label>
                       <input type="number" class="form-control mt-1 @error('productPrice') is-invalid @enderror" placeholder="Enter Price . . ." name="productPrice" id="" value="{{ old('productPrice',$productData->price) }}">
                       @error('productPrice')
                          <small class="text-danger">{{$message}}</small>
                       @enderror
                    </div>
                         <button class="btn float-end btn-primary px-3">Update</button>
                    </form>
                </div>
            </div>
         </div>
     </div>
  </main>
@endsection
