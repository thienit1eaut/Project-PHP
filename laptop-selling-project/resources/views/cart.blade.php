@extends('layout')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title','Cart Page')
@section('main')
   <div class="container-fluid p-5" style="margin-top: 70px">
    @if (count($data) == 0)
        <h4 style="height: 45vh" class="d-flex mb-5 justify-content-center align-items-center">There is no <span class="text-danger ms-2"> Cart Data!</span></h4>
    @else
    <h4 class=""><i class="fa-solid fa-cart-plus text-danger mb-3 me-1"></i>Shopping Cart</h4>
    <div id="main" class="row shadow rounded-3">
        <div class="col-lg-8 col-12 p-5">
        <table class="table table-borderless text-center">
            <tbody>
                @foreach ($data as $cart)
                  <tr class="row border-bottom">
                    <td class="col-md-2 col-12 d-md-none">
                        <button class="btn btn-dark float-end delete">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </td>
                    {{-- image --}}
                    <td class="col-md-2 col-12">
                <img class="img-fluid" src="{{asset('storage/products/'. $cart->product_image)}}" alt="laptop">
                    </td>
                    {{-- name --}}
                    <td class="col-md-2 col-12 ">
                        <i class="fa-solid fa-laptop me-1"></i>  {{$cart->product_name}}
                    </td>
                    {{-- price --}}
                    <td class="col-md-2 col-12 ">
                        <i class="fa-solid fa-dollar-sign"></i>  <span id="price">{{$cart->product_price}}</span>
                    </td>
                    {{-- qty --}}
                    <td class="col-md-2 col-12">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-sm btn-danger rounded-0 minusBtn"><i class="fa-solid fa-minus"></i></button>
                            <input class="form-control rounded-0" value="{{$cart->qty}}" readonly name="" id="qty" type="text" style="width: 45px">
                            <button class="btn btn-sm btn-danger rounded-0 plusBtn"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </td>
                    {{-- Total --}}
                    <td class="col-md-2 col-12 ">
                        Total - <i class="fa-solid fa-dollar-sign"></i>
                        <span id="total">{{$cart->product_price * $cart->qty}}</span>
                    </td>
                      {{-- delete --}}
                    <td class="col-md-2 col-12 d-none d-md-block">
                        <button class="btn btn-dark delete">
                            <i class="fa-solid fa-trash text-warning"></i>
                        </button>
                    </td>
                    {{-- hidden input --}}
                    <input type="hidden" name="" value="{{$cart->id}}" id="cartId">
                    <input type="hidden" name="" value="{{$cart->product_id}}" id="productId">
                  </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="col-lg-4 col-12 p-3 bg-light">
             <h4 class="mb-2">Cart Detail</h4>
             <div>
                <a href="#">
                    <img src="{{asset('images/cards/visa.png')}}" width="70" alt="cart">
                </a>
                <a href="#">
                    <img src="{{asset('images/cards/master.png')}}" width="70" alt="cart">
                </a>
                <a href="#">
                    <img src="{{asset('images/cards/discover.png')}}" width="70" alt="cart">
                </a>
                <a href="#">
                    <img src="{{asset('images/cards/american express.png')}}" width="70" alt="cart">
                </a>
             </div>
             {{-- order --}}
             <div class="p-3 main">
                <div class="d-flex justify-content-between mt-3 mb-3">
                    <h6>Subtotal</h6>
                    <h6>
                        <i class="fa-solid fa-dollar-sign"></i>
                        <span id="subtotal">{{$subTotal}}</span>
                    </h6>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-3 border-bottom">
                    <h6>Shipping</h6>
                    <h6><i class="fa-solid fa-dollar-sign"></i>50</h6>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-3 border-bottom">
                    <h6>Total <small>(tax incl.)</small></h6>
                    <h6>
                        <i class="fa-solid fa-dollar-sign"></i>
                        <span id="finalTotal">{{$subTotal + 50 }}</span>
                    </h6>
                </div>
                <div class="d-flex justify-content-evenly mt-3">
                    <a href="{{route('cart.clear')}}" class="btn btn-danger btn-sm px-3">
                        Clear Cart
                    </a>
                    <button id="orderBtn" class="btn btn-primary btn-sm px-3">
                        Order
                    </button>
                </div>
                <div class="alert alert-warning mt-3" role="alert">
                    Shipping time may be about one week . <br>
                    After ordered, we will send voucher detail to your email.
                  </div>
             </div>
        </div>
    </div>
    @endif
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
    // plus btn
    $('.plusBtn').click(function(){
     let tr = $(this).parents('tr');
    let qty = parseInt(tr.find('#qty').val());
      qty = qty + 1;
      tr.find('#qty').val(qty);
    //   price
    let price = parseInt(tr.find('#price').text());
    let total = price * qty;
    tr.find('#total').text(total);
    // subtotal
    calculate();
    })

    //  minus
    $('.minusBtn').click(function(){
        let tr = $(this).parents('tr');
    let qty = parseInt(tr.find('#qty').val());
    let count = 0;
      if(qty > 1){
        qty = qty - 1;
        count += qty;
      }
      tr.find('#qty').val(qty);
      //   price
    let price = parseInt(tr.find('#price').text());
    let total = price * qty;
    tr.find('#total').text(total);
     // subtotal
   if(count > 0){
    calculate();
   }
    });
    // delete
    $('.delete').click(function(){
        let tr = $(this).parents('tr');
       let cartId = parseInt(tr.find('#cartId').val());
       let productId = parseInt(tr.find('#productId').val());
       $.ajax({
          type : 'get',
          url : '/cart/product/delete',
          data : {
            'cartId' : cartId
          },
          dataType : 'json',
       });
        tr.remove();
       calculate();
    });


    // order btn
    $('#orderBtn').click(function(){
        let orderList = [];
        let orderNumber = Math.floor(Math.random() * 10000000000);
        $('tr').each(function(index,row){
            orderList.push({
               'productId' : parseInt($(row).find('#productId').val()),
               'orderNumber' : 'DH' + orderNumber,
               'qty' : parseInt($(row).find('#qty').val()),
               'total' : parseInt($(row).find('#total').text())
            });
        });
        $.ajax({
          type : 'post',
          url : '/order',
          data : Object.assign({},orderList),
          dataType : 'json',
          success : function(response){
            $('#main').remove()
            $('#header').after(`
      <div style="margin-top: 90px; margin-bottom: 50px;" class="alert alert-success alert-dismissible fade show text-center" role="alert">
           <strong class="me-2">Your order is Success</strong> Please check order vocher in your email.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
            `);
          }
        });
    })

    // calculate
    function calculate(){
      let subtotal = 0;
      $('tr').each(function(index,row){
       subtotal += parseInt($(row).find('#total').text())
      });
      $('#subtotal').text(subtotal);
      $('#finalTotal').text(subtotal + 50);
    }
   });
   </script>
@endsection

