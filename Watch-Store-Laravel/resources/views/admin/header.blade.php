<div class="PageHeader row margin0">

    <div class="LogoHeader col-md-10 col-xs-12 padding0">

       <div class="logoimage hidden-sm hidden-xs">

            <a class="SiteName" href="{{url('')}}/Systemadmin">

                <img style="max-height: 55px; max-width: 200px;background: #ececec;" border="0" class="imglogo img-responsive" src="{{asset('assets/admin/images/logo-1.png')}}" alt="logo" title="logo">

            </a>

       </div>

       <div class="linkroot">

          <a class="SiteName" href="{{url('')}}" target="_blank">

          {{url('')}}

          </a>

       </div>

       <div class="menutop">

          <ul class="aclr">

             <li class="fl"><i class="icon-trash"></i><a onclick="clearCache();return false;" href="Techsystem/deleteCache">Xóa cache</a></li>

             <li class="fl"><i class="icon-cogs"></i><a  href="Techsystem/historyAccess">Lịch sử truy cập</a></li>

             <li class="fl"><i class="icon-cogs"></i><a  href="Techsystem/editRobot">Robot</a></li>

             <li class="fl"><i class="icon-list-alt"></i><a href="Techsystem/viewSitemap">Sitemap</a></li>

             <li class="fl"><i class="icon-cogs"></i><a  href="Techsystem/editHtaccess">Htaccess</a></li>

          </ul>

          <script type="text/javascript">

          function clearCache(){

             $.ajax({

                url: 'Techsystem/deleteCache',

                type: 'POST',

                data: {param1: 'value1'},

             })

             .done(function() {

                window.location.reload();

             });

          }

          </script>

       </div>

    </div>

    <div class="SystemMenu col-md-2 col-xs-12">

       <div style="display: block;">

          <ul class="sysMenu">

             <li class="last">

                <div class="btn-group">

                   <a href="#" class="btn account-info btn-info"><i class="icon-user"></i> Admin</a>

                   <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle dropdown-toggle-acount" style="border-top: none;border-botom: none;line-height: 10px;"><span class="icon-caret-down"></span></a>

                   <ul class="dropdown-menu custome">

                      <li>
                        
                        <a href="" onclick="changePass();return false;"><i class="icon-key"></i>Đổi mật khẩu</a>

                      </li>

                      <li>

                        <a id="siteUser_Lbtn_Logout" class="NormalGray" href="Techsystem/logout"><i class="icon-signout"></i> Đăng xuất</a>

                      </li>

                   </ul>

                   <script type="text/javascript">

                    $(document).ready(function() {

                         $('#modal-login .close').click(function(event) {

                            $('#modal-login').hide(500);

                         });

                      });

                   function changePass(){

                         $('#modal-login').show(500);

                      }

                   </script>

                </div>

             </li>

          </ul>

          <div style="clear: both"></div>

       </div>

    </div>

 </div>