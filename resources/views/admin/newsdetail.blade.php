<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>admin CS-UBU</title>
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
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="users/assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="dashboard" class="simple-text">
                    ADMIN CS-UBU
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
                  <li class="active">
                      <a href="/dashboard">
                          <i class="material-icons">dashboard</i>
                          <p>การจัดการ</p>
                      </a>
                  </li>
                  <li>
                      <a href="profileadmin">
                          <i class="fa fa-user"></i>
                          <p>โปรไฟล์ขอฉัน</p>
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
                        <a class="navbar-brand" href="dashboard"> การจัดการ </a>
                    </div>
                    <div class="collapse navbar-collapse">
                      <ul class="nav navbar-nav navbar-right">
                          <li>
                              <a href="profileadmin"lass="dropdown-toggle"  ><i class="material-icons">person</i>
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
                                            <h2><span class="nav-tabs-title">รายละเอียดข่าวสาร</span><h2>
                                            <ul class="nav nav-tabs" data-tabs="tabs">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====================================รายละเอียดข่าวสาร===================================================== -->
                                <div class="tab-pane" id="">
                                  <div class="card-content table-responsive">
                                    <form action="" >

                                      <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                          <div class="wow fadeInDown" data-wow-delay="0.1s">
                                            <div class="row">
                                              <div class="col-md-12 col-sm-12">

                                                <div class="row">
                                                  <div class="col-md-12 col-sm-12">
                                                    <h4><strong>{{$newsdetail->topic}}  </strong></h4>
                                                    <div class="row">
                                                      <div class="col-md-12 col-sm-12">
                                                        <p>
                                                          <i class="fa fa-user" aria-hidden="true"> {{ $newsdetail->name_user}} </i>
                                                          | <i class="fa fa-calendar"> {{ $newsdetail->created_at}}</i>

                                                          @if($newsdetail->file != null)
                                    											| <a href="news/file/{{$newsdetail->file}}"><i class=""></i>{{ $newsdetail->file}}</a>
                                    											@endif

                                                        </p>
                                                      </div>
                                                    </div><br>
                                                    @if($newsdetail->img  != null)
                                                      <img class="images-newsdelail" src="/news/img/{{$newsdetail->img}}" height="350" width="500" alt="" ><br>
                                                    @endif
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-12 col-sm-12">
                                                    <p>{!! nl2br(e($newsdetail->detail))!!}
                                                    </p>
                                                  </div>
                                                </div>
                                                @if($newsdetail->video  != null)
                                                <div class="row">
                                                  <div class="col-lg-12 col-xlg-12 col-md-12">
                                                    <center class="m-t-30">
                                                      <video class="img-thumbnail image" src="news\video\{{$newsdetail->video}}" width="80%" height="99%" controls></video>
                                                    </center>
                                                  </div>
                                                </div>
                                                @endif

                                              </div>
                                            </div><!-- /row  -->
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  </div>
                                <!-- ====================================รายละเอียดข่าวสาร===================================================== -->
                    </div>
                </div>
            </div>




        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="users/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="users/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="users/assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="users/assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="users/assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="users/assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="users/assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="users/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="users/assets/js/demo.js"></script>


</html>
