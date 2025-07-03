@extends('admin.layout')
@section('title','Contact List')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Contact List - {{$data->total()}}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Contact</li>
            <li class="breadcrumb-item active">Contact List</li>
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
                 <th>Created Date</th>
                 <th>Setting</th>
             </tr>
              </thead>
              <tbody>
                 @foreach ($data as $contact)
                 <tr class="tr-shadow">
                  <td class="">{{$contact->id}}</td>
                  <td class=""><i class="fa-regular fa-user me-1"></i>{{$contact->name}}</td>
                  <td class=""><i class="fa-regular fa-envelope me-1"></i>{{$contact->email}}</td>
                  <td class=""><i class="fa-regular fa-calendar-days me-1"></i>{{$contact->created_at->format('d-F-Y')}}</td>
                  <td class="col-lg-3">
                    <a class="btn btn-primary" href="{{route('contact.detail',$contact->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                     <a class="btn ms-1 btn-danger mt-2 mt-lg-0" href="{{route('contact.delete',$contact->id)}}"><i class="fa-solid fa-trash"></i></a>
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
