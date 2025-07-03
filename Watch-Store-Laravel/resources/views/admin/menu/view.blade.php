@extends('admin.template')
@section('admin.content')

<script type="text/javascript">

    $= jQuery.noConflict();

    $(document).ready(function() {

    $('.cbone').change(function(event) {

      $('.cball').prop('checked', false);

      if($(this).is(':checked')){

        var tr = $(this).parent().parent();

        tr.css({ 'background-color':'rgb(234, 234, 234)','color':'#333'})

        tr.find('a').css({'color':'#333'});

    }

    else{

        var tr = $(this).parent().parent();

        tr.css({ 'background-color':'','color':''})

        tr.find('a').css({'color':''});

    }

    getDataDeleteAll();

});

    $('.cball').change(function(event) {

      if($(this).is(':checked')){

        $('td input.cbone').prop('checked', true);

        var tr = $('td input.cbone').parent().parent();

        tr.css({ 'background-color':'rgb(234, 234, 234)','color':'#333'})

        tr.find('a').css({'color':'#333'});

    }

    else{

       $('td input.cbone').prop('checked', false);

       var tr = $('td input.cbone').parent().parent();

       tr.css({ 'background-color':'','color':''})

       tr.find('a').css({'color':''});

   }

   getDataDeleteAll();

});

    function getDataDeleteAll(){

      var arr = $('td input.cbone:checked');

      var str = "";

      for (var i = 0; i < arr.length; i++) {

        var item = arr[i];

        str += $(item).attr('dt-value');

        if(i<arr.length-1){

          str+=",";

      }

  }

  $('.cball').attr('dt-delete', str);

}

    function updateOneField(_this){

        var datapri = $(_this).attr('data-primary');

        var uName = $(_this).attr('name');

        var uValue = $(_this).val();

        if($(_this).attr('type')=='checkbox'){

            uValue = $(_this).is(':checked')?1:0;

        }

        checkReload=false;

        $.ajax({type:'POST', 

        url: "Techsystem/updateOneField/{{ $table }}", data:{where:datapri,name:uName,newValue:uValue}, global:true,

        success: function(response) {

        }});

    }

        var currentEditableInput = undefined;

      $('input[type=text].editable').dblclick(function(event) {

        $(this).prop('readonly',false);

        $(this).css('background','#fff');

        currentEditableInput = this;

    });  

      $(document).click(function(e){

       if( currentEditableInput !=undefined &&  !$(currentEditableInput).is( e.target ) ) {

        $(currentEditableInput).prop('readonly',true);

        $(this).css('background','');

        updateOneField(currentEditableInput);

        currentEditableInput = undefined;

    } 

}); 

      $('input[type=checkbox].editable').click(function(event) {

          updateOneField(event.target);

      }); 

      $('select.editable').change(function(event) {

       updateOneField(event.target);

   });

  });

    function deleteAll(){

     var datawhere = $('input.cball').attr('dt-delete');

     if(datawhere.length>0){

      bootbox.confirm("Bạn chắc chắn muốn xóa item menu này", function(ret){

        if(!ret)return;

        checkReload=false;

        $.ajax({

          url: 'Techsystem/deleteAll',

          type: 'POST',

          data: {ids:datawhere,table:"{{ $table }}"},

      })

        .done(function(e) {

            try{

              var json = $.parseJSON(e);

              if(json.code==SUCCESS){

                window.location.href="Techsystem/view/{{ $table }}";

            }

        }

        catch(e){

        }

    })

        .fail(function() {

            console.log("error");

        })

        .always(function() {

            console.log("complete");

        });

    });

  }

  else{

      bootbox.alert("<?php echo sprintf('Bạn chưa chọn %s để xóa','Menu') ?>");

  }

}

function deleteItem(_this){

  bootbox.confirm("<?php echo sprintf('Bạn có thực sự muốn xóa các %s này không?','Menu') ?>",function(ret) {

    if(!ret) return;

    checkReload=false;

    var datawhere =$(_this).attr('dt-delete');

    $.ajax({type:'POST', 

      url: "Techsystem/delete/{{$table}}", data:{where:datawhere},

      success: function(response) {

          try{

            var jsdata = $.parseJSON(response);

            if(jsdata.code==SUCCESS){

              $(_this).parent().parent().hide();

          }

      }

      catch(e){

        console.log(e);

    }

}});

})

}

</script>

<style>

#dragandrophandler
{

    border: 2px dashed #92AAB0;

    width: 650px;

    height: 200px;

    color: #92AAB0;

    text-align: center;

    vertical-align: middle;

    padding: 10px 0px 10px 10px;

    font-size:200%;

    display: table-cell;

}

.progressBar {

  height: 22px;

  border: 1px solid #ddd;

  border-radius: 5px; 

  overflow: hidden;

  display:inline-block;

  vertical-align:top;

}

.progressBar div {

  height: 100%;

  color: #fff;

  text-align: right;

  line-height: 22px; /* same as #progressBar height if we want text middle aligned */

  width: 0;

  background-color: #0ba1b5; border-radius: 3px; 

}

.statusbar

{

  border-top:1px solid #A9CCD1;

  min-height:25px;

}

.statusbar:nth-child(odd){

    background:#EBEFF0;

}

.filename

{


    display:inline-block;


    vertical-align:top;


    width:250px;


}


.filesize


{


    display:inline-block;


    vertical-align:top;


    color:#30693D;


    width:100px;


    margin-left:10px;


    margin-right:5px;


}


.abort{


  background-color:#A8352F;


  -moz-border-radius:4px;


  -webkit-border-radius:4px;


  border-radius:4px;display:inline-block;


  color:#fff;


  font-family:arial;font-size:13px;font-weight:normal;


  padding:4px 15px;


  cursor:pointer;


  vertical-align:top


}


.dragzoneinfo input,.dragzoneinfo select,.dragzoneinfo textarea{


    width: 100%;


    margin:3px 0px;


}


.detailquick{


    text-align: left;


}


</style>

<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">

    <ul>

        <li class="home"><a href="{{url('')}}/Systemadmin"><i class="icon-home" style="font-size:14px;"></i> Trang chủ</a></li>

        <li class="SecondLast"><a href="Systemadmin/view/menu">Menu</a></li>

    </ul>

</div>

<div id="cph_Main_ContentPane">

    <div class="widget row margin0">

        <div class="widget-title">

            <h4><i class="icon-qrcode"></i>&nbsp; Menu</h4>

            <div class="ui-widget-content ui-corner-top ui-corner-bottom">

                <div id="toolbox">

                    <div style="float:right;" class="toolbox-content">

                    <table class="toolbar">

                     <tbody>

                      <tr>

                        <td align="center"> </td>

                        <td align="center">

                            <a onclick="" id="" onclick="" title="HỖ TRỢ" class="toolbar btn btn-info" href=""><i class="icon-question-sign"></i>&nbsp; HỖ TRỢ</a>

                        </td>

                        <td align="center">

                            <a id="" title="THÊM MỚI" class="toolbar btn btn-info" href="<?php echo url('').'/'.'Systemadmin/create/'.$table ?>"><i class="icon-plus"></i>&nbsp; THÊM MỚI</a>
                        
                        </td>

                        <td align="center">

                            <a onclick="deleteAll();return false;"  id="" href="javascript:deleteAll();" title="XÓA" class="deleteall toolbar btn btn-info"><i class="icon-trash"></i>&nbsp; XÓA</a>

                        </td>

                      </tr>

                  </tbody>

              </table>

          </div>

          <div class="clr"></div>

      </div>

  </div>

<div id="hiddenToolBarScroll" class="scrollBox" style="display:none">

    <h4> <i class="icon-qrcode"></i>&nbsp; Menu </h4>

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

                            <a id="" title="THÊM MỚI" class="toolbar btn btn-info" href="<?php echo url('').'/'.'Systemadmin/create/'.$table ?>"><i class="icon-plus"></i>&nbsp; THÊM MỚI</a>

                        </td>

                        <td align="center">

                            <a onclick="deleteAll();return false;"  href="javascript:deleteAll();"  id="" title="XÓA" class="deleteall toolbar btn btn-info" href=""><i class="icon-trash"></i>&nbsp; XÓA</a>

                        </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="clr"></div>

        </div>

    </div>

</div>

</div>

</div>

    <div class="widget-body">

        <div class="row margin0">

            <div class="col-md-3 col-xs-12 padding0">

                <div style="">

                    Tổng số : <span style="color: #A52A2A;">{{ $lstData->total() }} bản ghi</span>

                </div>

            </div>

            <div class="col-md-9 col-xs-12 padding0">

                <div class="pagination pagination-small pagination-right">

                    {{ $lstData->appends(Request::all())->links() }}

                </div>

                <div class="clr"></div>

            </div>

        </div>

        <div class="row margin0">

            <div id="no-more-tables">

                <table class="col-md-12 table-bordered padding0 table-striped table-condensed cf">

                    <thead class="cf">

                        <tr>

                            <th scope="col" style="width: 40px;text-align:center">#</th>

                            <th align="left" scope="col" style="width: 40px;text-align:center">

                                <input id="" type="checkbox" name="cball" dt-delete="" class="cball" onclick="">

                            </th>

                            <th>Tên</th>

                            <th>Link</th>

                            <th>Danh mục</th>

                            <th>Sắp xếp</th>

                            <th>Kích hoạt</th>

                            <th style="min-width:70px;width: 120px;text-align:center;" scope="col">

                                <label for="">Chức năng</label>

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php

                        $i =0; foreach ($lstData as $key => $item) {

                        $primarykey = array();

                        $i++;

                    ?>

                        <tr> 

                            <td style="width: 40px;text-align:center"><?php echo $i; ?></td>   

                            <td style="width: 40px;text-align:center"><input id="" type="checkbox" class="cbone" dt-value="<?php echo $item->id ?>" name="cb<?php echo $item->id ?>" onclick=""></td>

                            <td><?php echo $item->name ?></td>

                            <td><?php echo $item->link ?></td>

                            <td><?php echo $item->parent ?></td>

                            <td><?php echo $item->ord ?></td>

                            <td><?php echo $item->act ?></td>

                            <td data-title="Chức năng" align="center" style="width: 120px;text-align: center;vertical-align: middle;">

                                <?php if(isset($item) && isset($item->slug)) { ?>

                                <a href="<?php echo $item->slug ?>" target="_blank" class="edit fnc" title="Xem demo"><i class="icon-eye-open"></i></a>

                                <?php } ?>

                                <a href="Systemadmin/copy/menu/<?php echo $item->id ?>" class="edit fnc" ><i class="icon-copy"></i></a>

                                <a href="Systemadmin/edit/menu/<?php echo $item->id ?>" class="edit fnc" ><i class="icon-edit"></i></a>

                                <a href="#" dt-delete='<?php echo json_encode($primarykey) ?>' onclick = "javascript:deleteItem(this);return false;" class="delete fnc"><i class="icon-trash"></i></a>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

        <div class="pagination pagination-small pagination-right">

            {{ $lstData->appends(Request::all())->links() }}

            <div class="clr"></div>

        </div>

    </div>

</div>

</div>

@endsection