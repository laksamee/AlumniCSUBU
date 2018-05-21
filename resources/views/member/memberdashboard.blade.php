<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="users/assets/img/apple-icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CS-UBU Alumni</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <i class="material-icons">person</i>
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
                        <a class="navbar-brand" href="memberdashboard">การจัดการ </a>
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
                                            <span class="nav-tabs-title">ทั้งหมด :</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#allnews" data-toggle="tab">
                                                        <i class="material-icons">view_list</i> ข่าวสารของฉัน
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#allblog" data-toggle="tab">
                                                        <i class="material-icons">view_list</i> กระทู้ของฉัน
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="allnews">
                                          <input class="form-control" id="myInputmenews" type="text" placeholder="ค้นหา..">
                                          <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                  <th></th>
                                                  <th>หัวข้อข่าวสาร</th>
                                                  <th>เวลา</th>
                                                  <th></th>
                                                  <th><a href="#addnews" data-toggle="tab" title="เพิ่มข่าวสาร" >
                                                      <i class="material-icons">add_circle</i>
                                                      <div class="ripple-container"></div>
                                                  </a></th>

                                              </tr></thead>
                                                <tbody id="myTablemenews">
                                                  @foreach ($news as $menews )
                                                  @if($menews->name_user == Auth::user()->name)
                                                    <tr>
                                                      <td style="width:50px;"><span class="round">
                                                      @if( $menews->img != null)
                                                    <img src="/news/img/{{$menews->img}}" id =""  class="img-circle" width="200" >
                                                    @else
                                                    <img src="images/noimages.png" class="img-circle" width="200" >
                                                    @endif</span></td>
                                                        <td><a href="member_newsdetail&{{$menews->id}}">{{$menews->topic}}</a></td>
                                                        <td>{{$menews->created_at}}</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="แก้ไข" class="btn btn-primary btn-simple btn-xs">
                                                                <a href="member_newsedit&{{$menews->id}}"><i class="material-icons">edit</i></a>
                                                            </button>
                                                            </button>
                                                            @if( $menews->status == '1')
                                                              <button type="button" rel="tooltip" title="ไม่แสดงข่าวสาร" class="btn btn-primary btn-simple btn-xs">
                                                                  <a href="member_newsblock&{{$menews->id}}"><i class="fa fa-eye" style="color:green"></i></a>
                                                              </button>
                                                              @else
                                                              <button type="button" rel="tooltip" title="แสดงข่าวสาร" class="btn btn-primary btn-simple btn-xs">
                                                                  <a href="member_newsunblock&{{$menews->id}}"><i class="fa fa-eye-slash" style="color:red"></i></a>
                                                              </button>
                                                              @endif
                                                              <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                                  <a href="member_newsdelete&{{$menews->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                              </button>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                  @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="allblog">
                                          <input class="form-control" id="myInputmeblog" type="text" placeholder="ค้นหา..">
                                          <br>
                                          <table class="table">
                                            <thead class="text-primary">
                                                <tr>
                                                <th>หัวข้อกระทู้สนทนา</th>
                                                <th>เวลา</th>
                                                <th></th>
                                                <th><a href="#addblog" data-toggle="tab" title="ตั้งกระทู้สนทนา" >
                                                    <i class="material-icons">add_circle</i>
                                                    <div class="ripple-container"></div>
                                                </a></th>

                                            </tr></thead>
                                              <tbody id="myTablemeblog">
                                                @foreach ($blog as $meblog )
                                                @if($meblog->name == Auth::user()->name)
                                                  <tr>
                                                      <td><a href="member_blogdetail&{{$meblog->id}}">{{$meblog->topic}}</a></td>
                                                      <td>{{$meblog->created_at}}</td>
                                                      <td class="td-actions text-right">
                                                          <button type="button" rel="tooltip" title="แก้ไข" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="blogedit_member&{{$meblog->id}}"><i class="material-icons">edit</i></a>
                                                          </button>
                                                          <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                              <a href="blogdelete_member&{{$meblog->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                          </button>
                                                      </td>
                                                  </tr>
                                                  @endif
                                                  @endforeach
                                              </tbody>

                                          </table>
                                        </div>
                                        <!-- ====================================เพิ่มข่าวสาร===================================================== -->
                                        <div class="tab-pane" id="addnews">
                                          <div class="card-content table-responsive">
                                            <a href="#allnews" data-toggle="tab" title="ย้อนกลับ">  <i class="material-icons" style="font-size:30px ;color:black">reply</i></a>
                                            <form action="addnews_member" method="POST" enctype="multipart/form-data" >
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
                                                                <input type="text" name="topic" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-11">
                                                          <div class="form-group label-floating">
                                                              <label class="control-label">รายละเอียด</label>
                                                              <textarea  rows="20" name = "detail"  class="form-control"></textarea>
                                                          </div>
                                                      </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-3">
                                                          <label>เอกสารเพิ่มเติม</label>
                                                           <center class="m-t-30"><input type="file" name="pdfUpload"></center>
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                           <img src="images/noimages.png" id ="newsimg"  />
                                                            <center class="m-t-30"><input type="file" name="image" onchange="shownewsimage.call(this)"></center>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                                  <label>วิดีโอเพิ่มเติม</label>
                                                  <center class="m-t-30">
                                                    <video id ="newsaddvideo" class="img-thumbnail image" src="" width="80%" height="99%" controls></video>
                                                  </center>
                                                  <input type="file" name="video" onchange="showaddvideo.call(this)">
                                                </div>
                                              </div>
                                                <button type="submit" class="btn btn-primary pull-right">ยืนยัน</button>
                                                <div class="clearfix"></div>
                                            </form>
                                          </div>
                                          </div>
                                        <!-- ====================================เพิ่มข่าวสาร===================================================== -->
                                        <!-- ====================================ตั้งกระทู้===================================================== -->
                                        <div class="tab-pane" id="addblog">
                                          <div class="card-content table-responsive">
                                            <a href="#allblog" data-toggle="tab" title="ย้อนกลับ">  <i class="material-icons" style="font-size:30px ;color:black">reply</i></a>

                                            <form action="addblog_member" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                              <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">ชื่อ</label>
                                                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-11">
                                                          <div class="form-group label-floating">
                                                              <label class="control-label">อีเมล</label>
                                                              <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                                                          </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-11">
                                                          <div class="form-group label-floating">
                                                              <label class="control-label">หัวข้อกระทู้สนทนา</label>
                                                              <input type="text" name="topic"  class="form-control">
                                                          </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-11">
                                                          <div class="form-group label-floating">
                                                              <label class="control-label">รายละเอียด</label>
                                                              <textarea  rows="10" name = "detail" name="name" class="form-control"></textarea>
                                                          </div>
                                                      </div>
                                                    </div>

                                                  </div>
                                              </div>
                                                <button type="submit" class="btn btn-primary pull-right">ยืนยัน</button>
                                                <div class="clearfix"></div>
                                            </form>
                                          </div>
                                          </div>
                                        <!-- ====================================ตั้งกระทู้===================================================== -->

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
<!-- Search -->
<script src="js/Search.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>


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
        <!-- โชว์เพิ่มวิดีโอข่าวสารก่อนอัพโหลด -->
        <script>
        function showaddvideo()
        {
          if(this.files && this.files[0])
          {
            var obj = new FileReader();
            obj.onload = function(data){
              var video = document.getElementById("newsaddvideo");
              video.src = data.target.result;
            }
            obj.readAsDataURL(this.files[0]);
          }
        }
        </script><!-- โชว์เพิ่มวิดีโอข่าวสารก่อนอัพโหลด-->



</html>
