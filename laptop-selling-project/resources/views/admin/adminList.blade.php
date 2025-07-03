@extends('admin.layout')
@section('title','Admin List')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Admin List - {{$data->total()}}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Account</li>
            <li class="breadcrumb-item active">Admin List</li>
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
                 <th>Name</th>
                 <th>Email</th>
                 <th>Join Date</th>
                 <th>Setting</th>
             </tr>
              </thead>
              <tbody>
                 @foreach ($data as $admin)
                 <tr class="tr-shadow">
                  <td class="">{{$admin->id}}</td>
                  <td class=""><i class="fa-regular fa-Admin me-1"></i>{{$admin->name}}</td>
                  <td class=""><i class="fa-regular fa-envelope me-1"></i>{{$admin->email}}</td>
                  <td class=""><i class="fa-regular fa-clock me-1"></i>{{$admin->created_at->format('d-F-Y')}}</td>
                  <td class="col-lg-3">
                   @if (Auth::user()->id == $admin->id)
                    <span class="text-success fw-bold">Your Account!</span>
                   @else
                   <a class="btn btn-primary " href="{{route('admin.detail',$admin->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                   <a class="btn ms-1 btn-danger mt-2 mt-lg-0" href="{{route('admin.delete',$admin->id)}}"><i class="fa-solid fa-trash"></i></a>
                   @endif
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
     <h1 style="height: 55vh" class="d-flex justify-content-center align-items-center">There is no <span class="text-danger ms-2">Admin Data</span></h1>
    @endif
   </main>
@endsection
