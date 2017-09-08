<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <meta charset="utf-8" />
    <title>學習記錄系統</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{ asset('note/css/app.v2.css') }}" type="text/css" />
    
    <link rel="icon" type="text/css" href="https://static.jianshukeji.com/highcharts/images/favicon.ico">
    <link rel="stylesheet" href="{{ asset('static/css/font.css') }}" type="text/css" cache="false" />
	<script src="{{ asset('note/js/app.v2.js') }}"></script>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
    <section class="vbox">
        <header class="bg-dark dk header navbar navbar-fixed-top-xs headerHeight">
            <div class="navbar-header aside-md" style="width:50em">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i>
                </a>
              
                <img src="{{ asset('note/images/logo.png') }}" width="35" height="35" class="imgStyle">
                <span class="navbar-brand headerTitle">学生管理系統</span>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i>
        </a>
            </div>
            <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
                <li class="dropdown ">
                   <a href=" " class="dropdown-toggle" data-toggle="dropdown">
                        <span class="thumb-sm avatar pull-left">
                            <img src="{{ asset('note/images/avatar.jpg') }}">
                        </span>
                        {{ Session::get('username') }}<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <span class="arrow top"></span>
                        <li>
                            <a href="{{url('/logout')}}">退出系统</a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#modifyPwd" id="passChange">修改密码</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <section>
            <section class="hbox stretch">
                 <!-- .aside -->
        <aside class="bg-dark lter aside-md hidden-print" id="nav">
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                <!-- nav -->
                <nav class="nav-primary hidden-xs">

                    <ul class="nav">
                    <li class="active">
                      <a href="index.html" class="active">
                        <i class="fa fa-dashboard icon"><b class="bg-danger"></b></i> 
                        <span>歷史記錄區</span>
                      </a>
                    </li>
                    <li>
                      <a href="#layout" >
                        <i class="fa fa-columns icon"><b class="bg-warning"></b></i> 
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>打卡活动</span>
                      </a>
                      <ul class="nav lt">
                        <li>
                          <a href="layout-c.html" >
                            <i class="fa fa-angle-right"></i>
                            <span>用户列表</span>
                          </a>
                        </li>
                        <li>
                          <a href="layout-r.html" >
                            <i class="fa fa-angle-right"></i>
                            <span>初始数据设置</span>
                          </a>
                        </li>
                        <li>
                          <a href="layout-h.html" >
                            <i class="fa fa-angle-right"></i>
                            <span>定時任務管理</span>
                          </a>
                        </li>
                        <li>
                          <a href="layout-h.html" >
                            <i class="fa fa-angle-right"></i>
                            <span>历史数据统计</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    </ul>
                </nav>
                <!-- / nav --> 
                </div>
                <div class="modal fade" id="modifyPwd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="color:black">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">修改密码</h4>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table" >      
                                <tr>                      
                                    <td>原密码</td>
                                    <td><input type="password" id="passBefore"></td>
                                </tr>
                                <tr>                      
                                    <td>新密码</td>
                                    <td><input type="password" id="passNow"></td>
                                </tr>
                                <tr>                      
                                    <td>确认密码</td>
                                    <td><input type="password" id="passNowConfirm"></td>
                                </tr>
                            </table>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <span id="errMsgNav" style="color: red;float: left;"></span>
                        <div id="info" class="modalFooterstyle"></div>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="cancel">
                            取消
                        </button>
                        <button type="button" class="btn btn-default" id="passSub" name="">
                            确认
                        </button>
                      </div>
                    </div>
                  </div>
            </div>
            </section>
            <footer class="footer lt hidden-xs b-t b-dark">
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
		    <section class="vbox">
                <section class="scrollable padder">
                        @yield('content')
                </section>
            </section>
    </section>
</body>

</html>
