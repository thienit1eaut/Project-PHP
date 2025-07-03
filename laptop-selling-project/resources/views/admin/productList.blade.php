@extends('admin.layout')
@section('title','Product List')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Product List - {{$data->total()}}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">Product List</li>
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

    {{-- category list --}}
    @if (count($data))
    <div class="container-fluid mt-5">
        <table class="table">
              <thead>
             <tr>
                 <th>Id</th>
                 <th>Category</th>
                 <th>Name</th>
                 <th>Series</th>
                 <th>Price</th>
                 <th>Created Date</th>
                 <th>Setting</th>
             </tr>
              </thead>
              <tbody>
                 @foreach ($data as $product)
                 <tr class="tr-shadow">
                  <td class="col-lg-1">{{$product->id}}</td>
                  <td class="">{{$product->category_name}}</td>
                  <td class=""><i class="fa-solid fa-laptop me-1"></i>{{$product->name}}</td>
                  <td class="">{{$product->series}}</td>
                  <td class="">${{$product->price}}</td>
                  <td class="col-lg-2"><i class="fa-regular fa-clock me-1"></i>{{$product->created_at->format('d-F-Y')}}</td>
                  <td class="col-lg-3">
                    <a class="btn btn-primary " href="{{route('product.detail',$product->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                     <a class="btn ms-1 btn-warning " href="{{route('product.edit',$product->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                     <a class="btn ms-1 btn-danger mt-2 mt-lg-0" href="{{route('product.delete',$product->id)}}"><i class="fa-solid fa-trash"></i></a>
                  </td>
                  </tr>
              @endforeach
              </tbody>
        </table>
        <div class="mt-4">
         {{$data->links()}}
        </div>
     </div>
     @else
     <h1 style="height: 55vh" class="d-flex justify-content-center align-items-center">There is no <span class="text-danger ms-2">Product Data</span></h1>
    @endif
   </main>
@endsection
