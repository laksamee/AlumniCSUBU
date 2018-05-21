<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="users/assets/img/apple-icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CS-UBU Alumni</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="users/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="users/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="users/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

</head>

<body>
  <div id="app">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="users/assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="memberdashboard" class="simple-text">
                    CS-UBU Alumni
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                  <li >
                      <a href="index">
                          <i class="material-icons">home</i>
                          <p>หน้าแรก</p>
                      </a>
                  </li>
                  <li >
                      <a href="memberdashboard">
                          <i class="material-icons">dashboard</i>
                          <p>การจัดการ</p>
                      </a>
                  </li>

                    <li>
                        <a href="member_profile">
                            <i class="material-icons">person</i>
                            <p>โปรไฟล์ของฉัน</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="chat">
                            <i class="fa fa-comments"></i>
                            <p>แชท</p>
                        </a>
                    </li>
                    <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="member_listfriend">แชท</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                              <a href="member_profile"lass="dropdown-toggle"  ><i class="material-icons">person</i>
                                {{Auth::user()->name}}
                              </a>
                          </li>

                        </ul>

                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="purple">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">แชท</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs"></ul>
                                        </div>
                                    </div>
                                </div>
                            <div class="tab-pane" id="">
                              <div class="card-content table-responsive">
                                <input class="form-control" id="myInputchat" type="text" placeholder="ค้นหา..">
                                <br>
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                          <th></th>
                                          <th>ชื่อ - สกุล</th>
                                          <th>รุ่นที่เข้าศึกษา</th>

                                        </tr>
                                      </thead>
                                    @forelse ($friends as $friend)
                                    <tbody id="Tablechat">
                                      @if(($friend->type == 'member'&& $friend->status == 'confirm' && $friend->name != Auth::user()->name) )
                                      <tr>
                                          <td style="width:50px;"><span class="round">
                                              @if( $friend->profile != null)
                                               <img src="/user/profile/{{$friend->profile}}" id =""  class="img-circle" width="200" >
                                                @else
                                                <img src="/user/profile/no_img.jpg" class="img-circle" width="200" >
                                                @endif</center></span></td>
                                            <td>  <a href="chat&{{$friend->id}}" class="panel-block" style="justify-content: space-between;">
                                                      {{ $friend->name }}
                                                   </a></td>
                                            <td>{{$friend->generation}}</td>
                                        </tr>
                                        @endif
                                      </tbody>
                                            @empty
                                                <div class="panel-block">
                                                    ไม่มีรายชื่อสมาชิก
                                                </div>

                                            @endforelse
                                  </table>
                                </div>
                              </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<!--   Core JS Files   -->
<!--   Core JS Files   -->
<script src="users/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="users/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="users/assets/js/material.min.js" type="text/javascript"></script>


<!--  PerfectScrollbar Library -->
<script src="users/assets/js/perfect-scrollbar.jquery.min.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="users/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="users/assets/js/demo.js"></script>
<!-- Search -->
<script src="js/Search.js"></script>

</html>
