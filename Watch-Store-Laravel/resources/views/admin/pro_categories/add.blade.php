@extends('admin.template')
@section('admin.content')


<script type="text/javascript">


    FORM_GLOBAL = '#mainform';


function changeListImage(_that,inputarget){


    var arr = $(_that).find('img');


    var str =new Array();


    for (var i = 0; i < arr.length; i++) {


      var item = arr[i];


      str.push($(item).attr('src'));


  };


  str = JSON.stringify(str);


  $('input[name='+inputarget+']').val(str);


}


function close_window() {


  parent.$.fancybox.close();


} 


function tech5sFileManagerCallback(arrItem,field_id){


    if(arrItem.length==0) return;


    jQuery('#'+field_id).val(arrItem[0]).trigger('change');;


    var nxt = $('#'+field_id).next();


    if($(nxt).prop('tagName').toLowerCase()=='img'){


      $(nxt).attr('src', arrItem[0]);


  }


  else{


      if($(nxt).attr('data-type')=='libimg'){


        $name = $('#'+field_id).attr('data-name');


        for(var i=0;i<arrItem.length;i++){


            var url = arrItem[i];


            $(nxt).append('<div class="boximg">'+


              '<i onclick="var ax=$(this).parent().parent();$(this).parent().remove();changeListImage(ax,$name);" class="icon-remove-circle"></i><img style="height:85px" src="'+url+'"/>'+


              '<i onclick="$(this).parent().moveDown();changeListImage($(this).parent().parent(),$name);" class="icon-arrow-right" style="position:absolute;right:-15px;top:50%;    color: #810D0D;font-size: 30px;transform: translateY(-50%);"></i>'+


              '<i onclick="$(this).parent().moveUp();changeListImage($(this).parent().parent(),$name);" class="icon-arrow-left" style="position:absolute;left:-15px;top:50%;    color: #810D0D;font-size: 30px;transform: translateY(-50%);"></i></div>');


        }


        changeListImage(nxt,$name);


    }


}


}


function hungvtApplyCallbackFile(arrItem,field_id){


    if(arrItem.length==0) return;


    var nxt = $('#'+field_id).next();


    if($(nxt).prop('tagName').toLowerCase()=='img'){


      var item = arrItem[0];


      $('#'+field_id).val(JSON.stringify(item)).trigger('change');


      $(nxt).attr('src', item.path+item.file_name);


  }


  else if($(nxt).prop('tagName').toLowerCase()=='input'){


      var item = arrItem[0];


      $('#'+field_id).val(JSON.stringify(item)).trigger('change');


      $(nxt).val(item.path+item.file_name);


  }


  else{


      if($(nxt).attr('data-type')=='libimgv2'){


        $name = $('#'+field_id).attr('data-name');


        for(var i=0;i<arrItem.length;i++){


            var item = arrItem[i];


            var url = item.path+item.file_name;


            $(nxt).append('<div class="boximgv2 boximg">'+


              "<i onclick='var ax=$(this).parent().parent();$(this).parent().remove();changeListImageV2(ax,$name);' class='icon-remove-circle'></i><img data-file='"+JSON.stringify(item)+"' style='height:85px' src='"+url+"'/>"+


              '<i onclick="$(this).parent().moveDown();changeListImageV2($(this).parent().parent(),$name);" class="icon-arrow-right" style="position:absolute;right:-15px;top:50%;    color: #810D0D;font-size: 30px;transform: translateY(-50%);"></i>'+


              '<i onclick="$(this).parent().moveUp();changeListImageV2($(this).parent().parent(),$name);" class="icon-arrow-left" style="position:absolute;left:-15px;top:50%;    color: #810D0D;font-size: 30px;transform: translateY(-50%);"></i></div>');


        }


        changeListImageV2(nxt,$name);


    }


}


}


function changeListImageV2(_that,inputarget){


    var arr = $(_that).find('img');


    var str =new Array();


    for (var i = 0; i < arr.length; i++) {


      var item = arr[i];


      var tmp = JSON.parse($(item).attr('data-file'));


      str.push(tmp);


  };


  str = JSON.stringify(str);


  $('input[name='+inputarget+']').val(str);


}


$(function() {


    $('.boximg').on('click', 'i', function(event) {


      var _that = $(this).parent().parent();


      var name = $(_that).parent().find('input[data-name]').attr('data-name');


      changeListImage(_that,name);


  });


    $('.boximgv2').on('click', 'i', function(event) {


      var _that = $(this).parent().parent();


      var name = $(_that).parent().find('input[data-name]').attr('data-name');


      changeListImageV2(_that,name);


  });


    const width = 0.9*$(window).width();


    $('.iframe-btn').fancybox({ 


        'width'   : width,


        'height'  : 600,


        'type'    : 'iframe',


        'autoScale'     : false


    });


    $('.ui-tabs-nav li').click(function(event) {


      var div = $('#'+$(this).attr('aria-controls')+'');


      $('.ui-tabs-nav li[role=tab]').removeClass('ui-state-active');


      $(this).addClass('ui-state-active');


      $('div[role=tabdiv]').css({'display':'none'});


      $(div).css({


          display: 'block'


      });





  });


});


</script>


<div id="main-content">


 <div class="container-fluid">


    <div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">


        <ul>


            <li class="home"><a href="Systemadmin"><i class="icon-home" style="font-size:14px;"></i> Trang chủ</a></li>


            <li class="SecondLast"><a href="{{ url('Systemadmin/view/pro_categories') }}">Danh mục sản phẩm</a></li>


            <li class="Last"><span>Thêm mới danh mục sản phẩm</span></li>


        </ul>


    </div>


    <div style="clear: both;"></div>


    <div id="cph_Main_ContentPane">


       <div class="widget">


        <div class="widget-title">


         <h4><i class="icon-list-alt"></i>&nbsp; Thêm mới</h4>


         <div class="ui-widget-content ui-corner-top ui-corner-bottom">


          <div id="toolbox">


           <div style="float:right;" class="toolbox-content">


            <table class="toolbar">


             <tbody>


              <tr>


                 <td align="center">


                    <a id="cph_Main_ctl00_toolbox_rptAction_lbtAction_0" title="HỖ TRỢ" class="toolbar btn btn-info" href="#" onclick=""><i class="icon-question-sign"></i>&nbsp; HỖ TRỢ</a>


                </td>


                <td align="center">


                    <a id="" onclick="submitForm('#mainform');return false;" title="LƯU" class="toolbar btn btn-info" ><i class="icon-ok"></i>&nbsp; LƯU</a>


                </td>


                <td align="center">


                    <a id="" title="QUAY LẠI" class="toolbar btn btn-info" href="#"><i class="icon-chevron-left"></i>&nbsp; QUAY LẠI</a>


            </td>


        </tr>


    </tbody>


</table>


</div>


<div class="clr"></div>


</div>


</div>


<div id="hiddenToolBarScroll" class="scrollBox" style="display:none;">


  <h4>


   <i class="icon-list-alt"></i>&nbsp; DANH MỤC SẢN PHẨM


</h4>


<div class="FloatMenuBar">


   <div class="ui-widget-content ui-corner-top ui-corner-bottom">


    <div id="toolbox">


     <div style="float:right;" class="toolbox-content">


      <table class="toolbar">


       <tbody>


        <tr>


        <td align="center">


          <a onclick="" id="" title="HỖ TRỢ" class="toolbar btn btn-info" href=""><i class="icon-question-sign"></i>&nbsp; HỖ TRỢ</a>


        </td>


      <td align="center">


          <a id="" onclick="submitForm('#mainform');return false;" title="LƯU" class="toolbar btn btn-info" ><i class="icon-ok"></i>&nbsp; LƯU</a>


      </td>


      <td align="center">


          <a id="cph_Main_ctl00_toolbox2_rptAction_lbtAction_4" title="QUAY LẠI" class="toolbar btn btn-info" href="#quay-lai"><i class="icon-chevron-left"></i>&nbsp; QUAY LẠI</a>


      </td>


  </tr>


</tbody>


</table>


</div>


</div>


</div>


</div>


</div>


</div>


<div class="widget-body">

    <form  name="addform" id="mainform"  action="{{ route('systemadmin.create.pro_categories') }}" method="post" accept-charset="UTF-8">

        <div id="tabs" style="" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

            <ul class="nav nav-tabs ui-tabs-nav " role="tablist">

                <li class="ui-state-active" role="tab" aria-controls="tabs-edit-1">

                    <span class="ui-tabs-anchor" onclick="return false;" >Thông tin chung</span>

                </li>

                <li class="" role="tab" aria-controls="tabs-edit-2">

                    <span class="ui-tabs-anchor" onclick="return false;">Cấu hình mô tả</span>

                </li>

                <li class="" role="tab" aria-controls="tabs-edit-3">

                    <span class="ui-tabs-anchor" onclick="return false;">Cấu hình SEO</span>

                </li>

            </ul>

            <div id="tabs-edit-1" role="tabdiv" style="display: block">

                <div class="container-fluid padding0 tableedit">

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Tên danh mục:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="name">
                
                        </div>
                
                    </div>

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Slug:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="slug">

                            <script type="text/javascript">

                            $(function() {

                                $('body').on('keyup', "input[name='name']", function(event) {

                                    var element = $("input[name='slug']");

                                    element.val(locDau($(this).val()));

                                });

                            });

                            </script>
                
                        </div>
                
                    </div>

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Hình ảnh:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="img">
                
                        </div>
                
                    </div>

                    <script type="text/javascript">

                        $(function() {
                    
                              var select = $('#select2parent').select2({
                    
                    
                                  placeholder: "Danh mục",
                    
                    
                                  allowClear: true,
                    
                    
                                closeOnSelect:false,
                    
                              });
                    
                        });
                    
                    </script>
                    
                    <div class="row margin0">
                    
                        <div class="col-md-2 col-xs-12">
                    
                            <span>Danh mục:</span>
                    
                        </div>
                    
                        <div class="col-md-4 col-xs-12">
                    
                            <select name="parent" class="form-control" id="select2parent">
                    
                                <option value="0">Không xác định</option>
                    
                                <option value="1">Item 1</option>
                    
                            </select>
                    
                        </div>
                    
                    </div>

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Sắp xếp:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="0" type="text" name="ord">
                
                        </div>
                
                    </div>

                    <div class="row margin0">


                        <div class="col-md-2 col-xs-12">
                    
                    
                            <span>Kích hoạt:</span>
                    
                    
                        </div>
                    
                    
                        <div class="col-md-10 col-xs-12">
                    
                    
                            <div style="" class="switch">
                    
                    
                                <input checked onclick="clickkickact(this)"  id="cmn-toggle-act"  class="cmn-toggle cmn-toggle-round"  type="checkbox">
                    
                    
                                <label for="cmn-toggle-act"></label>
                    
                    
                                <input type="hidden" name="act" >
                    
                    
                              </div>
                    
                    
                        </div>
                    
                    
                    </div>
                    
                    
                    <script type="text/javascript">
                    
                    
                    $(function() {
                    
                    
                        $('input[name=act]').val($('#cmn-toggle-act').is(':checked')?"1":"0")
                    
                    
                    });
                    
                    
                    function clickkickact(_this){
                    
                    
                        $('input[name=act]').val($(_this).is(':checked')?"1":"0");
                    
                    
                    }
                    
                    
                    </script>

                    <div class="row margin0">


                        <div class="col-md-2 col-xs-12">


                            <span>Hiển thị trang chủ:</span>


                        </div>


                        <div class="col-md-10 col-xs-12">


                            <div style="" class="switch">


                                <input checked onclick="clickkickhome(this)"  id="cmn-toggle-home"  class="cmn-toggle cmn-toggle-round"  type="checkbox">


                                <label for="cmn-toggle-home"></label>


                                <input type="hidden" name="home" >

                            </div>

                        </div>

                    </div>


                    <script type="text/javascript">


                    $(function() {


                        $('input[name=home]').val($('#cmn-toggle-home').is(':checked')?"1":"0")


                    });


                    function clickkickhome(_this){


                        $('input[name=home]').val($(_this).is(':checked')?"1":"0");


                    }


                    </script>

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">

                            <span>Thời gian tạo:</span>

                        </div>

                        <div class="col-md-10 col-xs-12">

                            <input class="datepicker" value="{{ date("d-m-Y H:i:s ",time()) }}" type="text" placeholder="Thời gian tạo" onkeydown="">

                            <input type="hidden" value="{{ date("Y-m-d H:i:s ",time()) }}" name="created_at">

                        </div>
                    </div>

                    <div class="row margin0">
                        <div class="col-md-2 col-xs-12">
                            <span>Thời gian cập nhật:</span>
                        </div>
                        <div class="col-md-10 col-xs-12">
                            <input class="datepicker" value="{{ date("d-m-Y H:i:s ",time()) }}" type="text" placeholder="Thời gian cập nhật" onkeydown="">

                            <input type="hidden" value="{{ date("Y-m-d H:i:s ",time()) }}" name="updated_at">
                        </div>
                    </div>

                </div>

            </div>

            <div id="tabs-edit-2" role="tabdiv" style="display: none">

                <div class="container-fluid padding0 tableedit">

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">

                            <span>Mô tả ngắn:</span>

                        </div>

                        <div class="col-md-10 col-xs-12">

                            <textarea name="short_content" id="short-content" style="visibility:visible !important" rows="4"></textarea>

                        </div>

                    </div>

                    <div class="row margin0">


                        <div class="col-md-2 col-xs-12">
                    
                    
                            <span>Nội dung:</span>
                    
                    
                        </div>
                    
                    
                        <div class="col-md-10 col-xs-12">
                    
                    
                            <textarea class="editor" name="content" id="content" style="visibility:visible !important" rows="6"></textarea>
                    
                    
                        </div>
                    
                    
                    </div>

                </div>

            </div>

            <div id="tabs-edit-3" role="tabdiv" style="display: none">

                <div class="container-fluid padding0 tableedit">

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Tiêu đề SEO:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="s_title">
                
                        </div>
                
                    </div>

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Mô tả SEO:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="s_des">
                
                        </div>
                
                    </div>

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Từ khóa SEO:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="s_key">
                
                        </div>
                
                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

</div>

</div>

</div>

</div>

</div>

@endsection