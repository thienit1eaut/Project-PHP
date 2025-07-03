@extends('admin.template')
@section('admin.content')

<div style="width: 100%; margin: 0 auto;">

    <div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
    
       <ul>
    
          <li class="Last"><span><i class="icon-home" style="font-size:14px;"></i> Trang chủ</span></li>
    
       </ul>
    
    </div>
    
    <div style="clear: both;"></div>
    
    <div id="cph_Main_ContentPane">
    
       <div class="">
    
          <!-- widget Thông báo -->
    
          <div class="row margin0">
    
             <div class="col-sm-6 col-xs-12" style="padding-left: 0px;">
    
                <?php 
    
                    $defaultShow = true;
    
                ?>
    
                <?php if($defaultShow): ?>
    
                <div class="widget">
    
                   <div class="widget-title row margin0">
    
                      <h4>
    
                         <i class="icon-bullhorn"></i>&nbsp;THÔNG BÁO
    
                      </h4>
    
                   </div>
    
                   <div class="widget-body" style="height: 193px;">
    
                      <ul class="hotIconList thongbao">

                        <li class="thongbaohot">
                            <i class="icon-fire"></i>
                            <a target="_blank" href="#">abcd</a>
                        </li>
    
                      </ul>
    
                   </div>
    
                </div>
    
                <?php endif; ?>
    
             </div>
    
             <!-- widget hỗ trợ khách hàng -->
    
             <div class="col-sm-6 col-xs-12"  style="padding-right: 0px;">
    
                <?php 
    
                $defaultShow = true;
    
                ?>
    
    
                <?php if($defaultShow): ?>
    
                <div class="widget">
    
                   <div class="widget-title row margin0">
    
                      <h4>
    
                         <i class="icon-bullhorn"></i>&nbsp;HỖ TRỢ
    
                      </h4>
    
                   </div>
    
                   <div class="widget-body inlineblock heightSupport">
    
                      <div class="supportInfoNew support-info homecontainer row margin0">
    
                         <div class="icon iconFullSize">
    
                            <a href="" rel="nofollow" target="_blank" title="Yêu cầu hỗ trợ">
    
                              <img src="{{url('')}}{{asset('assets/admin/static/support-icon_03.png')}}" alt="support icon">
    
                            </a>
    
                         </div>
    
                         <div class="info infoMarginLeft" style="color:#606060;">
    
                            <div class="f14">
    
                               <h4 style="font-size:16px;font-weight:bold;margin-top:16px;">Cần hỗ trợ</h4>
    
                            </div>
    
                            <div class="f14">
    
                               Liên hệ hỗ trợ: <a href="mailto:kythuat.eaut.it1@gmail.com" rel="nofollow" target="_blank" title="Yêu cầu hỗ trợ">kythuat.eaut.it1@gmail.com</a>
    
                            </div>
    
                            <div class="f14" style="margin-bottom:-5px;">
    
                               Hỗ trợ kỹ thuật: Thien IT1
    
                            </div>
    
                         </div>
    
                         <div class="clear">
    
                         </div>
    
                      </div>
    
                   </div>
    
                </div>
    
                <?php endif; ?>
    
             </div>
    
          </div>
    
          <!-- widget báo cáo -->
    
          <div class="row margin0">
    
             <!-- Thống kê đơn hàng -->
    
             <?php 
    
             $defaultShow = true;

             ?>
    
             <?php if($defaultShow): ?>
    
             <div class="widget ">
    
                <div class="widget-body">
    
                   <div class="tabs tabbable tabbable-custom row margin0">
    
                      <div class="statistic col-md-12 col-xs-12">
    
                         <!-- Khách hàng -->
    
                         @php
                            $color =['purple','turquoise','red','green','gray','blue'];
        
                            $icon = ['user','tags','shopping-cart','comments-alt','sitemap','file'];
                         @endphp
    
                         <div class="col-sm-2 col-xs-12 responsive" data-desktop="span2" data-tablet="span3">
    
                            <div class="circle-wrap">
    
                               <a href="Techsystem/view/#">
    
    
                                  <div class="stats-circle -color">
    
                                     <i class="icon-"></i>
    
                                  </div>
    
    
                                  <p>
    
    
                                     <strong>

                                        Bảng sản phẩm
    
    
                                     </strong>
    
                                     
    
                                  </p>
    
                               </a>
    
                            </div>
    
                         </div>
    
                      </div>
    
                   </div>
    
                </div>
    
             </div>
    
             <?php endif; ?>
    
             <!-- widget truy cập nhanh -->
    
             <div class="col-md-6 col-xs-12 NoMarginLeft"  style="padding-left: 0px;">
    
             <?php 
    
             $defaultShow = true;
    
             ?>
    
             <?php if($defaultShow): ?>
    
                <div class="widget">
    
                   <div class="widget-title row margin0">
    
                      <h4>
    
                         <i class="icon-bolt"></i>&nbsp;Duyệt nhanh
    
                      </h4>
    
                   </div>
    
                   <div class="widget-body maxheight row margin0">
    
                      <div class="square-state">
    
                         <div class="row-fluid row">
    
    
                            <div class="col-sm-3 col-xs-6">
    
    
                               <a href="Techsystem/view/#" class="icon-btn ">
    
    
                                  <i class="icon-"></i>
    
    
                                  <div>
    
    
                                     Bảng tin tức
    
    
                                  </div>
    
    
                               </a>
    
    
                            </div>
    
    
                            <div class="col-sm-3 col-xs-6">
    
    
                               <a href="Techsystem/insert/#" class="icon-btn">
    
    
                                  <i class="icon-plus-sign"></i>
    
    
                                  <div>
    
    
                                     Thêm mới
    
    
                                  </div>
    
    
                               </a>
    
    
                            </div>
    
    
                         </div>
    
    
                      </div>
    
    
                   </div>
    
    
                </div>
    
    
             <?php endif; ?>
    
             </div>
    
             <!-- widget các vấn đề thường gặp, video hướng dẫn nhanh, giúp bạn bán hàng nhiều hơn-->
    
             <div class="col-md-6 col-xs-12"  style="padding-right: 0px;">
    
             <?php 
    
             $defaultShow = true;
    
             ?>
    
             <?php if($defaultShow): ?>
    
    
                <div class="widget">
    
    
                   <script type="text/javascript">
    
    
                      $= jQuery.noConflict();
    
    
                      $(document).ready(function() {
    
    
                      $('.nav-tabs li a').click(function(event) {
    
    
                         event.preventDefault();
    
    
                         $('div[id^=contentTab]').hide();
    
    
                         $('#'+$(this).attr('data-tab')).css({'display':'block'});
    
    
                         $('.nav-tabs .active').removeClass('active');
    
    
                         $(this).parent().addClass('active');
    
    
                      });
    
    
                      });
    
    
                   </script>
    
    
                   <div class="widget-title titleheight">
    
    
                      <ul class="nav nav-tabs">
    
    
                         <li class="active"><a data-tab="contentTab_1" id="controlTab_1" href="#" class="NoBorderRadius NoborderTop NoBorderLeft first current titleHeader nowrap">
    
    
                            <i class=" icon-warning-sign"></i>&nbsp;Tech Eaut tư vấn</a>
    
    
                         </li>
    
    
                         <li><a data-tab="contentTab_3" id="controlTab_3" href="" class="NoBorderRadius NoborderTop titleHeader nowrap">
    
    
                            <i class="icon-shopping-cart"></i>&nbsp;Hỗ trợ</a>
    
    
                         </li>
    
    
                      </ul>
    
    
                   </div>
    
    
                   <div class="widget-body maxheight">
    
    
                      <div id="contentTab_1" style="display: block;">
    
    
                         <div id="rssfeedsSupport" class="rssFeedDisplay" style="overflow-y:scroll">
    
    
                            <?php 
    
    
                               if(@$tech5s && property_exists($tech5s, 'data')){
    
    
                                  foreach ($tech5s->data->hotc as $key => $value) {
    
    
                                     echo '<div class="item">';
    
    
                                     echo '<a class="titlefield" target="_new" href="'.$tech5s->base_url.$value->slug.'" rel="nofollow">'.$value->name.'</a><span class="datefield"></span>';
    
    
                                     echo '</div>';
    
    
                                  }
    
    
                               }
    
    
                               ?>
    
    
                         </div>
    
    
                      </div>
    
    
                      <div id="contentTab_3" style="display: none;">
    
    
                         <div id="rssfeedsBlog" class="rssFeedDisplay" style="overflow-y:scroll">
    
    
                            <?php 
    
    
                               if(@$tech5s && property_exists($tech5s, 'data')){
    
    
                                  foreach ($tech5s->data->hotf as $key => $value) {
    
    
                                     echo '<div class="item">';
    
    
                                     echo '<a class="titlefield" target="_new" href="'.$tech5s->base_url.$value->slug.'" rel="nofollow">'.$value->name.'</a><span class="datefield"></span>';
    
    
                                     echo '</div>';
    
    
                                  }
    
    
                               }
    
    
                               ?>
    
    
                         </div>
    
    
                      </div>
    
    
                   </div>
    
    
                </div>
    
    
             <?php endif; ?>
    
    
             </div>
    
    
          </div>
    
    
       </div>
    
    
    </div>

@endsection