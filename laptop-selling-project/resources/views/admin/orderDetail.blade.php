@extends('admin.layout')
@section('title','Order List')
@section('content')
   <main class="main" id="main">
    <div class="pagetitle">
        <h1>Order Detail</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Order</li>
            <li class="breadcrumb-item active">Order Detail</li>
          </ol>
        </nav>
     </div>

     <div class="container-fluid mt-5">
        <div class="card mx-auto p-3 col-md-8">
            <div class="card-body">
              <h5 class="card-title text-center"><i class="fa-regular fa-user me-1"></i>{{$data2->user_name}} [ Id - {{$data2->user_id}} ]</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item fs-4"><i class="fa-solid fa-dollar-sign me-2"></i>{{$data2->total_amount}} (Tax inc.)</li>
          </div>
     </div>

    @foreach ($data as $orderDetail)
    <div class="container-fluid mt-5">
        <div class="card mx-auto p-3 col-md-8">
             <a class="fs-5" href="{{route('order.list')}}">
                <i class="fa-solid fa-arrow-left me-2"></i> Back
             </a>
            @if ($orderDetail->product_image == null)
            <img class="col-8 col-lg-5 m-auto" src="{{asset('images/noimage.png')}}" class="card-img-top" alt="Laptop">
            @else
            <img class="col-8 col-lg-5 m-auto" src="{{asset('storage/products/' . $orderDetail->product_image)}}" class="card-img-top" alt="Laptop">
            @endif
            <div class="card-body">
              <h5 class="card-title text-center"><i class="fa-solid fa-laptop me-2"></i>{{$orderDetail->product_name}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fa-solid fa-tags me-2"></i>Order of {{$orderDetail->qty}} laptops, Totaling <i class="fa-solid fa-dollar-sign ms-1"></i>{{$orderDetail->total}} Include Shipping</li>
              <li class="list-group-item"><i class="fa-solid fa-laptop-code me-2"></i>Qty - {{$orderDetail->qty}} Laptops</li>
              <li class="list-group-item"><i class="fa-solid fa-qrcode me-2"></i>{{$orderDetail->order_number}}</li>
              <li class="list-group-item"><i class="fa-solid fa-dollar-sign me-2"></i>{{$orderDetail->product_price}}</li>
              <li class="list-group-item"><i class="fa-regular fa-calendar me-2"></i>{{$orderDetail->created_at->format('d-F-Y')}}</li>
            </ul>
          </div>
     </div>
    @endforeach
   </main>
@endsection
