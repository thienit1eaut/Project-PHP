@extends('admin.template')
@section('admin.content')

<script type="text/javascript">

    FORM_GLOBAL = '#mainform';

    function close_window() {

        parent.$.fancybox.close();

    }

</script>

<div id="main-content">


 <div class="container-fluid">


    <div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">


        <ul>


            <li class="home"><a href="Systemadmin"><i class="icon-home" style="font-size:14px;"></i> Trang chủ</a></li>


            <li class="SecondLast"><a href="{{url('')}}Systemadmin/view/menu">Menu</a></li>


            <li class="Last"><span>Thêm mới Menu</span></li>


        </ul>


    </div>


    <div style="clear: both;"></div>


    <div id="cph_Main_ContentPane">


       <div class="widget">


        <div class="widget-title">


         <h4><i class="icon-list-alt"></i>&nbsp; Thêm mới menu</h4>


         <div class="ui-widget-content ui-corner-top ui-corner-bottom">


          <div id="toolbox">


           <div style="float:right;" class="toolbox-content">


            <table class="toolbar">


             <tbody>


              <tr>


                 <td align="center">


                    <a id="cph_Main_ctl00_toolbox_rptAction_lbtAction_0" title="HỖ TRỢ" class="toolbar btn btn-info" href="" onclick=""><i class="icon-question-sign"></i>&nbsp; HỖ TRỢ</a>


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


   <i class="icon-list-alt"></i>&nbsp; MENU


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

    <form  name="addform" id="mainform"  action="{{ route('systemadmin.create.menu') }}" method="post" accept-charset="UTF-8">

        <div id="tabs" style="" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

            <ul class="nav nav-tabs ui-tabs-nav " role="tablist">

                <li class="ui-state-active" role="tab" aria-controls="tabs-edit-1">

                    <span class="ui-tabs-anchor" onclick="return false;" >Thông tin chung</span>

                </li>

            </ul>

            <div id="tabs-edit-1" role="tabdiv" style="display: block">

                <div class="container-fluid padding0 tableedit">

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Tên menu:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="name">
                
                        </div>
                
                    </div>

                    <div class="row margin0">

                        <div class="col-md-2 col-xs-12">
                
                            <span>Link:</span>
                
                        </div>
                
                        <div class="col-md-10 col-xs-12">
                
                            <input value="" type="text" name="link">
                
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
                    
                            <span>Danh mục cha:</span>
                    
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
                
                            <input value="" type="text" name="ord">
                
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
                            <span>Thời gian tạo:</span>
                        </div>
                        <div class="col-md-10 col-xs-12">
                            <input class="datepicker" value="{{date("d-m-Y H:i:s ",time())}}" type="text" placeholder="Thời gian tạo" onkeydown="">
                            <input type="hidden" value="{{date("Y-m-d H:i:s ",time())}}" name="created_at">
                        </div>
                    </div>

                    <div class="row margin0">
                        <div class="col-md-2 col-xs-12">
                            <span>Thời gian cập nhật:</span>
                        </div>
                        <div class="col-md-10 col-xs-12">
                            <input class="datepicker" value="{{date("d-m-Y H:i:s ",time())}}" type="text" placeholder="Thời gian cập nhật" onkeydown="">
                            <input type="hidden" value="{{date("Y-m-d H:i:s ",time())}}" name="updated_at">
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