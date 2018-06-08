<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
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
                  <li class="active">
                      <a href="memberdashboard">
                          <i class="material-icons">dashboard</i>
                          <p>การจัดการ</p>
                      </a>
                  </li>
                  <li>
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
                        <a class="navbar-brand" href="memberdashboard"> การจัดการ </a>
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
                                            <h2><span class="nav-tabs-title">แก้ไขรายละเอียดข่าวสาร</span><h2>
                                            <ul class="nav nav-tabs" data-tabs="tabs">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====================================แก้ไขข่าวสาร===================================================== -->
                                <div class="tab-pane" id="">
                                  <div class="card-content table-responsive">
                                    <form action="member_newsupdate&{{$newsedit->id}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                      <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">ชื่อ</label>
                                                        <input type="text" name="name_user" value="{{ Auth::user()->name }}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">หัวข้อข่าวสาร</label>
                                                        <input type="text" name="topic"  value="{{$newsedit->topic}}"class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-11">
                                                  <div class="form-group label-floating">
                                                      <label class="control-label">รายละเอียด</label>
                                                      <textarea  rows="20" name = "detail"  class="form-control">{{$newsedit->detail}}</textarea>
                                                  </div>
                                              </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                  <label>เอกสารเพิ่มเติม</label>
                                                  @if( $newsedit->file != null)
                                                  <a href="/news/file/{{$newsedit->file}}"><i class=""></i>{{$newsedit->file}}</a>
                                                  @endif
                                                  <input type="file" name="pdfUpload">
                                                  <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .doc,.pdf)</label>

                                                </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4">

                                                   @if( $newsedit->img != null)
                                                 <img src="/news/img/{{$newsedit->img}}" id ="newsimg"  width="200" >
                                                 @else
                                                 <img src="images/noimages.png"  id ="newsimg"  width="200" >
                                                 @endif
                                                    <center class="m-t-30"><input type="file" name="image" onchange="shownewsimage.call(this)"></center>
                                                    <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค  นาสกุลไฟล์ .png,.jpeg)</label>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12 col-xlg-12 col-md-12">
                                          <label>วิดีโอเพิ่มเติม</label>
                                          <center class="m-t-30">
                                            <video id ="newsvideo" class="img-thumbnail image" src="news\video\{{$newsedit->video}}" width="80%" height="99%" controls></video>
                                          </center>
                                          <input type="file" name="video" onchange="showeditvideo.call(this)">
                                          <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค  นาสกุลไฟล์ .mp4 ขนาดความยาวไม่เกิน 10 นาที)</label>
                                        </div>
                                      </div>
                                        <button type="submit" class="btn btn-primary pull-right">ยืนยัน</button>
                                        <div class="clearfix"></div>
                                    </form>
                                  </div>
                                  </div>
                                <!-- ====================================แก้ไขข่าวสาร===================================================== -->
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
<!-- โชว์รูปภาพก่อนอัพโหลด เพิ่มข่าวสาร -->
    <script>
    function shownewsimage()
    {
      if(this.files && this.files[0])
      {
        var obj = new FileReader();
        obj.onload = function(data){
          var image = document.getElementById("newsimg");
          image.src = data.target.result;
        }
        obj.readAsDataURL(this.files[0]);
      }
    }
    </script><!-- โชว์รูปภาพก่อนอัพโหลด -->

    <!-- โชว์แก้ไขวิดีโอข่าวสารก่อนอัพโหลด -->
    <script>
    function showeditvideo()
    {
      if(this.files && this.files[0])
      {
        var obj = new FileReader();
        obj.onload = function(data){
          var video = document.getElementById("newsvideo");
          video.src = data.target.result;
        }
        obj.readAsDataURL(this.files[0]);
      }
    }
    </script><!-- โชว์แก้ไขวิดีโอข่าวสารก่อนอัพโหลด-->


</html>
