<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CS-UBU Alumni</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">

    <!-- Bootstrap core CSS     -->
    <link href="users/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="users/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="users/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="js/go.js"></script>
    <script id="code" src="js/take.js"></script>
</head>

<body>
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
                          <i class="material-icons">home </i>
                          <p>หน้าแรก</p>
                      </a>
                  </li>
                    <li >
                        <a href="memberdashboard">
                            <i class="material-icons">dashboard</i>
                            <p>การจัดการ</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="member_profile">
                            <i class="fa fa-user"></i>
                            <p>โปรไฟล์ของฉัน</p>
                        </a>
                    </li>
                    <li>
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
                        <a class="navbar-brand" href="member_profile"> โปรไฟล์ของฉัน </a>
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
                                            <h2><span class="nav-tabs-title">โปรไฟล์ของฉัน</span><h2>
                                            <ul class="nav nav-tabs" data-tabs="tabs">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====================================แก้ไขข้อมูลส่วนตัว===================================================== -->
                                <div class="tab-pane" id="">
                                  <div class="card-content table-responsive">
                                    <form action="member_updateprofile&{{ Auth::user()->id }}" method="post"  enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      <div class = "row">
                                        <div class="col-md-3">
                                              <center class="m-t-30">
                                                @if( Auth::user()->profile != null)
                                                <img src="/user/profile/{{ Auth::user()->profile }}" id ="memberimg"  class="img-ci rcle" width="200" >
                                                @else
                                                <img src="/user/profile/no_img.jpg" id ="memberimg" class="img-circle" width="200" >
                                                @endif</center>
                                                <center class="m-t-30"><input type="file" name="member_img" onchange="showaddimage.call(this)"></center>
                                                <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .png,.jpeg)</label>

                                        </div>
                                          <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">ศิษย์เก่า</label>
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">รหัสนักศึกษา</label>
                                                        <input type="number" name="idstd" value="{{Auth::user()->id_std}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">ชื่อ - สกุล</label>
                                                        <input type="text" value="{{Auth::user()->name}}" name="name"class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">ปีที่จบการศึกษา</label>
                                                        <input type="number" value="{{Auth::user()->years}}" name="years"class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">รุ่นที่เข้าศึกษา</label>
                                                        <input type="text" value="{{Auth::user()->generation}}" name ="generation" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">อีเมล</label>
                                                        <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">ที่อยู่</label>
                                                        <input type="text" value="{{Auth::user()->address}}" name="address"class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">สถานที่ทำงาน</label>
                                                        <input type="text" value="{{Auth::user()->office}}" name="office" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                  <label>ไฟล์รายงานโครงงาน</label>
                                                  @if( Auth::user()->senior_project != null)
                                                  <a href="/user/file/{{Auth::user()->senior_project}}"><i class=""></i>{{Auth::user()->senior_project}}</a>
                                                  @endif
                                                   <input type="file" name="pdfUpload">
                                                   <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .doc,.pdf)</label>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12 col-xlg-12 col-md-12">
                                          <label>วิดีโอตัวอย่างโปรแกรม</label>
                                            <center class="m-t-30">
                                              <video id ="membervideo" class="img-thumbnail image" src="user\video_project\{{Auth::user()->video_project}}" width="80%" height="99%" controls></video>
                                            </center>
                                          <input type="file" name="video" onchange="showaddvideo.call(this)">
                                          <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟลต้องเป็น .mp4 ขนาดความยาวไม่เกิน 10 นาที)</label>
                                        </div>
                                      </div>


                                        <button type="submit" class="btn btn-primary pull-right">ยืนยัน</button>
                                        <div class="clearfix"></div>
                                    </form>


                                  </div>
                                </div>

                                <!-- ====================================/แก้ไขข้อมูลส่วนตัว===================================================== -->
                        </div>
                    </div>
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

<!-- Material Dashboard javascript methods -->
<script src="users/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="users/assets/js/demo.js"></script>

<!-- โชว์รูปภาพก่อนอัพโหลด  -->
    <script>
    function showaddimage()
    {
      if(this.files && this.files[0])
      {
        var obj = new FileReader();
        obj.onload = function(data){
          var image = document.getElementById("memberimg");
          image.src = data.target.result;
        }
        obj.readAsDataURL(this.files[0]);
      }
    }
    </script><!-- โชว์วิดีโอตัวอย่างโปรแกรมก่อนอัพโหลด -->
    <script>
    function showaddvideo()
    {
      if(this.files && this.files[0])
      {
        var obj = new FileReader();
        obj.onload = function(data){
          var video = document.getElementById("membervideo");
          video.src = data.target.result;
        }
        obj.readAsDataURL(this.files[0]);
      }
    }
    </script><!-- โชว์วิดีโอตัวอย่างโปรแกรมก่อนอัพโหลด -->

</html>
