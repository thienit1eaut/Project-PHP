@extends('admin.layout')
@section('title','Category List')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Category List - {{$data->total()}}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active">Create List</li>
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
                 <th>Category Id</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Created Date</th>
                 <th>Setting</th>
             </tr>
              </thead>
              <tbody>
                 @foreach ($data as $category)
                 <tr class="tr-shadow">
                  <td class="col-lg-1">{{$category->id}}</td>
                  <td class="col-lg-1">{{$category->name}}</td>
                  <td class="col-lg-3">{{$category->description}}</td>
                  <td class="col-lg-1">{{$category->created_at->format('d-F-Y')}}</td>
                  <td class="col-lg-1">
                     <a class="btn btn-primary " href="{{route('category.editPage',$category->id)}}">Edit</a>
                     <a class="btn btn-danger mt-2 mt-lg-0" href="{{route('category.delete',$category->id)}}">Delete</a>
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
     <h1 style="height: 55vh" class="d-flex justify-content-center align-items-center">There is no <span class="text-danger ms-2">Category Data</span></h1>
    @endif
   </main>
@endsection
