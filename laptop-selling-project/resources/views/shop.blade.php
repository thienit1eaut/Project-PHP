@extends('layout')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title','shop')
@section('main')
   {{-- shop --}}
   <div class="container px-4 mb-5" style="margin-top: 170px">
     <div class="row">
        {{-- image --}}
        <div class="col-lg-4">
            <img class="w-100" src="{{asset('storage/products/' . $data->image)}}" alt="Laptop">
        </div>
        {{-- detail --}}
        <div class="col-lg-8">
            <h2 class="text-danger">{{$data->category_name}}</h2>
            <h3>{{$data->name}}</h3>
            <div class="text-warning">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <h4 class="my-3 text-danger">
                <i class="fa-solid fa-dollar-sign"></i> {{$data->price}}
            </h4>

            <p class="col-lg-7">{{$data->description}}</p>
            @if (Auth::user())
            @if(Auth::user()->role == 'user')
            <div class="d-flex mt-4">
                <button id="minusBtn" class="btn btn-sm btn-danger rounded-0"><i class="fa-solid fa-minus"></i></button>
                <input class="form-control rounded-0" value="1" readonly name="" id="qty" type="text" style="width: 50px">
                <button id="plusBtn" class="btn btn-sm btn-danger rounded-0"><i class="fa-solid fa-plus"></i></button>
                <button id="cartBtn" class="btn btn-sm btn-danger ms-3"><i class="fa-solid fa-cart-shopping me-1"></i>Add To Card</button>

                {{-- user id , product id --}}
                <input type="hidden" id="userId" value="{{Auth::user()->id}}" name="">
                <input type="hidden" name="" id="productId" value="{{$data->id}}">
            </div>
            @endif
            @else
            <div class="alert alert-warning mt-4" role="alert">
                If you want to buy this product, you should  <a class="text-danger link fw-bold" href="{{route('login')}}" class="alert-link">Login</a>. at first.
              </div>
            @endif
        </div>
     </div>
   </div>
@endsection

@section('js')
   <script>
   $(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
    let qty = parseInt($('#qty').val());
    // plus btn
    $('#plusBtn').click(function(){
      qty = qty + 1
      $('#qty').val(qty)
    })

     // minus btn
     $('#minusBtn').click(function(){
        if(qty > 1){
            qty = qty - 1
           $('#qty').val(qty)
        }
    })

     // cart btn
     $('#cartBtn').click(function(){
       let userId = $('#userId').val();
       let productId = $('#productId').val();
       $.ajax({
        type: 'post',
        url: '/cart/add',
        data: {
            'userId' : userId,
            'productId' : productId,
            'qty' : qty
        },
        dataType : 'json',
        success: function(response){
            window.location.href = "http://127.0.0.1:8000/"
        }
       })
    })
   })
   </script>
@endsection
