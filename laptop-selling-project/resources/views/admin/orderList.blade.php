@extends('admin.layout')
@section('title','Order List')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Product List - {{$data->total()}}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Order</li>
            <li class="breadcrumb-item active">Order List</li>
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
                 <th>Username</th>
                 <th>Order Number</th>
                 <th>Total Price</th>
                 <th>Created Date</th>
                 <th>Setting</th>
             </tr>
              </thead>
              <tbody>
                 @foreach ($data as $order)
                 <tr class="tr-shadow">
                  <td class="col-lg-1">{{$order->id}}</td>
                  <td class=""><i class="fa-regular fa-user me-1"></i>{{$order->user_name}}</td>
                  <td class=""><i class="fa-solid fa-qrcode me-1"></i>{{$order->order_number}}</td>
                  <td class="">$ {{$order->total_amount}}</td>
                  <td class="col-lg-2"><i class="fa-regular fa-clock me-1"></i>{{$order->created_at->format('d-F-Y')}}</td>
                  <td class="col-lg-3">
                    <a class="btn btn-primary" title="detail" href="{{route('order.detail',$order->order_number)}}">
                        <i class="fa-solid fa-circle-info"></i>
                    </a>
                    {{-- check detivery --}}
                    @if ($order->order_delivered == 0)
                    <a class="btn ms-1 btn-warning" href="{{route('order.deliver',$order->order_number)}}">
                        <i class="fa-solid fa-truck"></i> Delivery
                    </a>
                    @else
                    <a class="btn ms-1 btn-danger mt-2 mt-lg-0" href="{{route('order.delete',$order->order_number)}}">
                        <i class="fa-solid fa-trash"></i> Delete
                    </a>
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
     <h1 style="height: 55vh" class="d-flex justify-content-center align-items-center">There is no <span class="text-danger ms-2">Order Data</span></h1>
    @endif
   </main>
@endsection
