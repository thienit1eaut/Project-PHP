<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{url('')}}"/>
    <title>Hệ thống trang quản trị</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="">
    <link type="text/css" rel="stylesheet" href="{{url('')}}{{asset('assets/admin/static/bootstrap.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('')}}{{asset('assets/admin/static/font-awesome.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('')}}{{asset('assets/admin/static/menumobile/css/headroom.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('')}}{{asset('assets/admin/static/menumobile/css/meanmenu.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('')}}{{asset('assets/admin/static/fancybox/source/jquery.fancybox.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('')}}{{asset('assets/admin/static/combined.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('')}}{{asset('assets/admin/static/datetimepicker/jquery.datetimepicker.css')}}">
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/menumobile/js/headroom.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/menumobile/js/jQuery.headroom.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/menumobile/js/jquery.meanmenu.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/menumobile/js/menu.js')}}"></script>
  <script type="text/javascript">        var $ = jQuery.noConflict();</script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/jquery.hotkeys.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/fancybox/source/jquery.fancybox.pack.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/datetimepicker/jquery.datetimepicker.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/jquery.form.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/bootbox.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/select2.min.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{url('')}}{{asset('assets/admin/static/select2/select2-bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('')}}{{asset('assets/admin/static/select2/select2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('')}}{{asset('assets/admin/static/toast/toastr.css')}}">
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/toast/toastr.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('tinymce/tinymce.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('tinymce/jquery.tinymce.min.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('tinymce/main.js')}}"></script>
  <script type="text/javascript" src="{{url('')}}{{asset('assets/admin/static/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{url('')}}{{asset('assets/admin/static/scrollbar/jquery.mCustomScrollbar.css')}}">
  <script src='{{url('')}}{{asset('assets/admin/static/color/spectrum.js')}}'></script>
  <script src='{{url('')}}{{asset('assets/admin/static/script.js')}}'></script>
  <link rel='stylesheet' href='{{url('')}}{{asset('assets/admin/static/color/spectrum.css')}}' />
  <script type="text/javascript">
    $(function() {
      $('.fancybox').fancybox();
      $('.datepicker').datetimepicker({
        lang:'vi',
        timepicker:true,
        formatTime: 'H:i',
        format:'d-m-Y H:i:s',
        onClose: function(e,e1){
          try{
            var val = $(e1).val();
            var s= val.split(' ');
            var s1 = s[0].split('-');
            var s2 = s[1].split(':');
            var d = new Date(s1[2],s1[1]-1,s1[0],s2[0],s2[1],s2[2]);
            $(e1).next().val(d.getTime()/1000);
          }
          catch(ex){}
        }
      });
    });

    $(document).ready(function() {
      $('*').bind('keydown', 'meta+s', function(e){
        e.preventDefault();
        if(FORM_GLOBAL!=undefined) submitForm(FORM_GLOBAL);
      });
      $('*').bind('keydown', 'ctrl+s', function(e){
        e.preventDefault();
        if(FORM_GLOBAL!=undefined) submitForm(FORM_GLOBAL);
      });

      $.mCustomScrollbar.defaults.scrollButtons.enable=true;

      $(".scrollbar").mCustomScrollbar({'theme':'rounded-dark'});

      $.fn.moveUp = function() {

        $.each(this, function() {

         $(this).after($(this).prev());   

       });

      };

      $.fn.moveDown = function() {

        $.each(this, function() {

         $(this).before($(this).next());   

       });

      };

    });

    var MISSING_PARAM={{ MISSING_PARAM }};

    var SUCCESS={{ SUCCESS }};

    var ERROR={{ ERROR }};

    var checkReload= true;

    var FORM_GLOBAL = undefined;

    var DIALOG_TIMEOUT = 2000;

    //Ajax Config

    $(document).ajaxStart(function() {

      $('#notiajax').css({

        display: 'block'

      });

    });

    $(document).ajaxStop(function(){

      $('#notiajax').css({

        display: 'none'

      });

    });

    $(document).ajaxSuccess(function(event, xhr, settings) {

      $('#notiajax').css({

        display: 'none'

      });

      try{

        var json = $.parseJSON(xhr.responseText);

        toastr.options = {

          "closeButton": true,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-center-center","preventDuplicates": true,

          "onclick": null,

          "showDuration": "300","hideDuration": "1000","timeOut": DIALOG_TIMEOUT,"extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"

        };

        if(json.reload!=undefined){

          checkReload = json.reload;

        }

        if(checkReload){

          toastr.options.onHidden = function() {

            @if (@$table)

            window.location.href="Systemadmin/view/{{$table}}";
              
            @endif

          }

        }
        
        if(json.code == SUCCESS){

          toastr["success"](json.message);

        }

        else{

          toastr["error"](json.message);

        }

        if(checkReload==false){

          checkReload = true;  

        }

      }

      catch( e){

      }

    });

    var csfrData = {};

    csfrData['_token'] = '{{ csrf_token() }}';

    $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      },

      data: csfrData

    });

    function submitForm(frm){

      try{

        tinyMCE.triggerSave();

      }

      catch(ex){

      }

      toastr.options = {

        "closeButton": true,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-center-center","preventDuplicates": true,

        "onclick": null,

        "showDuration": "300","hideDuration": "1000","timeOut": DIALOG_TIMEOUT,"extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"

      };

      var options = { 

        type: 'POST',

        beforeSend: function() {

        },

        uploadProgress: function(event, position, total, percentComplete) {

        },

        success: function(e) {

          console.log(e);

        },

        complete: function(xhr) {

        }

      }; 

      $(frm).ajaxForm(options); 

      $(frm).submit();

    }

    $(window).scroll(function(){

      if($(this).scrollTop()>130){

        $("#hiddenToolBarScroll").show();

      }else{

        $("#hiddenToolBarScroll").hide();

      }}

    );

    function locDau(str) 
    { 

      str = str.trim();

      str = str.toLowerCase();

      str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");

      str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");

      str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");

      str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");

      str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");

      str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");

      str = str.replace(/đ/g, "d");

      str = str.replace(/^\-+|\-+$/g, "");

      var re = new RegExp("\\W", 'g');

      str = str.replace(re, '-');

      str = str.replace(/\-{2,}/g,'-');

      str = str.replace(/\-+$/g,'');

      str = str.replace(/^\-+/g,'');

      return str;
    }
</script>

</head>
<body>
    <div id="notiajax" style=" display:none; position: fixed;left: 50%;  transform: translate(-50%);background-color: #fff;z-index: 99999;padding: 0px 20px;border: 1px solid #00923F;border-top: none;border-radius: 0px 0px 20px 20px;">

    <img style="width:25px;" src="{{url('')}}{{asset('assets/admin/images/loading.gif')}}"/>

    <span>Đang tải dữ liệu</span>

    </div>

    <div class="bb-alert alert alert-info" style="position:fixed;top:25%;right:50%; transform:translate(50%,50%);z-index:9999;background:transparent;border:none;text-align:center;display:none">

    <span style="display:block;  display: inline-block;background: #0BAE00;color: #fff;padding: 5px 30px;border-radius: 6px;">Hi</span>

    </div>

    <div class="container-fluid padding0">

    @include('admin.header')

    <div id="container" class="row-fluid">

    <div class="clear" style="height: 10px"></div>

    @include('admin.menu')

    <div id="main-content">

    <div class="container-fluid">

        @yield('admin.content')

    </div>

    @include('admin.footer')

    </div>

    </div>

    </div>

    <div class="modal" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">

    <div class="modal-dialog">

    <div class="modal-content">

    <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal">

        <span aria-hidden="true">&times;</span><span class="sr-only">ĐÓNG ADMIN</span>

    </button>

    <h3 class="modal-title clmain" id="modal-register-label">THAY ĐỔI MẬT KHẨU</h3>

    </div>

    <div class="modal-body">

    <form onsubmit="sumitFormLogin(this);return false;" role="form" action="Techsystem/doChangePass" method="post" class="registration-form">

        <div class="form-group">

        <label class="" for="form-first-name">Mật khẩu cũ</label>

        <input type="password" name="oldpass" placeholder="Nhập mật khẩu cũ" class="form-first-name form-control" id="form-first-name">

        </div>

        <div class="form-group">

        <label class="" for="form-last-name">Nhập mật khẩu mới</label>

        <input type="password" name="password" placeholder="Nhập mật khẩu mới" class="form-last-name form-control" id="form-last-name">

        </div>

        <button class=" btn clfff maincolor" type="submit" >THAY ĐỔI PASS</button>

    </form>

    </div>

    </div>

    </div>

    </div>

    <script type="text/javascript">

    function sumitFormLogin(frm){

        $.ajax({

            url: $(frm).attr('action'),

            type: 'POST',

            data: $(frm).serialize(),

        })

        .done(function(e) {

        try{

            var json= $.parseJSON(e);

            if(json.errorCode==200){

                window.location.href="{{url('')}}/Systemadmin/logout";

            }

            else{

                window.location.href="{{url('')}}/Systemadmin/"; 

            }

        }

        catch(ex){

        }

        });

    }

    </script>
</body>
</html>