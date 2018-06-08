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
                            <p>โปรไฟล์ของฉัน</p>
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
                        <a class="navbar-brand" href="#"> การจัดการ </a>
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
                                          <span class="nav-tabs-title">สมาชิก :</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#admin" data-toggle="tab">
                                                        <i class="material-icons">person</i> ผู้ดูแลระบบ
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#member" data-toggle="tab">
                                                        <i class="material-icons">group</i> ศิษย์เก่า
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#settings" data-toggle="tab">
                                                        <i class="material-icons">report_problem</i> คำร้องขอลงทะเบียน
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="admin">
                                          <div class="card-content table-responsive">
                                            <input class="form-control" id="myInputadmin" type="text" placeholder="ค้นหา..">
                                            <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                  <th></th>
                                                  <th>ชื่อ</th>
                                                  <th>อีเมล</th>
                                                  <th></th>
                                                  <th><a href="#adminadd" data-toggle="tab" title="เพิ่มผู้ดูแลระบบ">
                                                      <i class="material-icons">person_add</i>
                                                      <div class="ripple-container"></div>
                                                  </a></th>
                                              </tr></thead>
                                                @foreach ($users as $user)
                                                @if($user->type == 'admin')
                                              <tbody id="myTableadmin">
                                                  <tr>
                                                      <td style="width:50px;"><span class="round">
                                                        @if( $user->profile != null)
                                                        <img src="/user/profile/{{$user->profile}}"   class="img-circle" width="200" >
                                                        @else
                                                        <img src="/user/profile/no_img.jpg" class="img-circle" width="200" >
                                                        @endif</center></span></td>
                                                      <td>{{$user->name}} </td>
                                                      <td>{{$user->email}}</td>

                                                      <td class="td-actions text-right">
                                                        @if( Auth::user()->name != $user->name)
                                                        <button type="button" rel="tooltip" title="แก้ไข" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="adminedit&{{$user->id}}"><i class="material-icons">edit</i></a>
                                                        </button>

                                                          @if( $user->block == '1')
                                                            <button type="button" rel="tooltip" title="ระงับบัญชีผู้ใช้" class="btn btn-primary btn-simple btn-xs">
                                                                <a href="adminblock&{{$user->id}}"><i class="fa fa-eye" style="color:green"></i></a>
                                                            </button>
                                                            @else
                                                            <button type="button" rel="tooltip" title="ยกเลิกระงับบัญชีผู้ใช้" class="btn btn-primary btn-simple btn-xs">
                                                                <a href="adminunblock&{{$user->id}}"><i class="fa fa-eye-slash" style="color:red"></i></a>
                                                            </button>
                                                            @endif

                                                            <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                                  <a href="admindelete&{{$user->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                            </button>
                                                              @endif

                                                      </td>
                                                  </tr>
                                              </tbody>
                                              @endif
                                              @endforeach
                                            </table>

                                          </div>
                                        </div>
                                        <div class="tab-pane" id="member">
                                          <div class="card-content table-responsive">
                                            <input class="form-control" id="myInputmember" type="text" placeholder="ค้นหา..">
                                            <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                  <th></th>
                                                  <th>ชื่อ - สกุล</th>
                                                  <th>รหัสนักศึกษา</th>
                                                  <th>ปีที่จบการศึกษา</th>
                                                  <th>รุ่นที่เข้าศึกษา</th>
                                                  <th></th>
                                                  <th><a href="#useradd" data-toggle="tab" title="เพิ่มศิษย์เก่า">
                                                      <i class="material-icons">person_add</i>
                                                      <div class="ripple-container"></div>
                                                  </a></th>
                                              </tr></thead>
                                              @foreach ($users as $user)
                                              @if(($user->type == 'member'&& $user->status == 'confirm'))
                                              <tbody id="myTablemember">
                                                  <tr>
                                                      <td style="width:50px;"><span class="round">
                                                        @if( $user->profile != null)
                                                        <img src="/user/profile/{{$user->profile}}" id =""  class="img-circle" width="200" >
                                                        @else
                                                        <img src="/user/profile/no_img.jpg" class="img-circle" width="200" >
                                                        @endif</center></span></td>
                                                      <td>{{$user->name}}<small> <br>{{$user->email}}</small></td>
                                                      <td>{{$user->id_std}}</td>
                                                      <td>{{$user->years}}</td>
                                                      <td class="text-primary">{{$user->generation}}</td>
                                                      <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="แก้ไข" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="memberedit&{{$user->id}}"><i class="material-icons">edit</i></a>
                                                        </button>
                                                        @if( $user->block == '1')
                                                          <button type="button" rel="tooltip" title="ระงับบัญชีผู้ใช้" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="memberblock&{{$user->id}}"><i class="fa fa-eye" style="color:green"></i></a>
                                                          </button>
                                                          @else
                                                          <button type="button" rel="tooltip" title="ยกเลิกระงับบัญชีผู้ใช้" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="memberunblock&{{$user->id}}"><i class="fa fa-eye-slash" style="color:red"></i></a>
                                                          </button>
                                                          @endif

                                                          <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                                <a href="memberdelete&{{$user->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                          </button>
                                                      </td>
                                                  </tr>

                                              </tbody>
                                              @endif
                                              @endforeach
                                            </table>
                                          </div>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                          <div class="card-content table-responsive">
                                            <input class="form-control" id="myInputunconfirm" type="text" placeholder="ค้นหา..">
                                            <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                  <th>ชื่อ - สกุล</th>
                                                  <th>รหัสนักศึกษา</th>
                                                  <th>ปีที่จบการศึกษา</th>

                                                  <th></th>
                                              </tr></thead>

                                                @foreach ($users as $user)
                                                @if(($user->type == 'member'&& $user->status == 'unconfirm'))
                                                <tbody id="myTableunconfirm">
                                                    <tr>
                                                        <td>{{$user->name}} <small> <br>{{$user->email}}</small></td>
                                                        <td>{{$user->id_std}}</td>
                                                        <td>{{$user->years}}</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="ตรวจสอบ" class="btn btn-danger btn-simple btn-xs">
                                                              <a href="userchack&{{$user->id}}"><i class="fa fa-exclamation-triangle" style="font-size:27px ;color:red"></i></a>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                @endif
                                                @endforeach
                                            </table>
                                          </div>
                                        </div>

                                        <!-- ====================================เพิ่มผู้ดูแลระบบ===================================================== -->
                                        <div class="tab-pane" id="adminadd">
                                          <div class="card-content table-responsive">
                                            <a href="#admin" data-toggle="tab" title="ย้อนกลับ">  <i class="material-icons" style="font-size:30px ;color:black">reply</i></a>
                                            <form action="{{ url('/adminadd') }}" method="POST" enctype="multipart/form-data" >
                                                {{ csrf_field() }}
                                              <div class="row">
                                                <div class="col-md-3">
                                                      <center class="m-t-30"> <img src="/user/profile/no_img.jpg" id ="adminimg" class="img-circle"  /></center>
                                                        <center class="m-t-30"><input type="file" name="admin_img" onchange="showadminimage.call(this)"></center>
														<label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .PNG,.JPEG)</label>
                                                  </div>
                                                  <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">ผู้ดูแลระบบ</label>
                                                                <input type="text" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">ชื่อ</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">อีเมล</label>
                                                                <input type="email" name = "email" class="form-control">
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
                                        <!-- ====================================/เพิ่มผู้ดูผู้ดูแลระบบ===================================================== -->


                                        <!-- ====================================เพิ่มศิษย์เก่า===================================================== -->
                                        <div class="tab-pane" id="useradd">
                                          <div class="card-content table-responsive">
                                            <a href="#member" data-toggle="tab" title="ย้อนกลับ">  <i class="material-icons" style="font-size:30px ;color:black">reply</i></a>
                                            <form action="{{ url('/memberadd') }}" method="POST" enctype="multipart/form-data" >
                                                {{ csrf_field() }}
                                              <div class="row">
                                                <div class="col-md-3">
                                                      <img src="/user/profile/no_img.jpg" id ="memberimg" class="img-circle"  />
                                                        <center class="m-t-30"><input type="file" name="image" onchange="showaddimage.call(this)"></center>
														<label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .PNG,.JPEG)</label>
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
                                                                <input type="number" name="userid" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">ชื่อ - สกุล</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">ปีที่จบการศึกษา</label>
                                                                <input type="number" name="years" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">รุ่นที่เข้าศึกษา</label>
                                                                <input type="text" name="generation" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">อีเมล</label>
                                                                <input type="email" name="email"class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">ที่อยู่</label>

                                                                <input type="text" name="address"  class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                          <label>ไฟล์รายงานโครงงาน</label>
                                                           <center class="m-t-30"><input type="file" name="pdfUpload"></center>
														   <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .doc,.pdf)</label>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                                  <label>วิดีโอตัวอย่างการใช้งานโปรแกรม</label>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                                  <center><video id ="projectvideo" class="img-thumbnail image" src="" width="80%" height="99%" controls></video></center>
                                                  <input type="file" name="video" onchange="showprojectvideo.call(this)">
                                                  <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .mp4 ขนาดความยาวไม่เกิน 10 นาที)</label>
                                                </div>
                                              </div>
                                                <button type="submit" class="btn btn-primary pull-right">ยืนยัน</button>
                                                <div class="clearfix"></div>
                                            </form>
                                          </div>
                                        </div>
                                        <!-- ====================================/เพิ่มศิษย์เก่า===================================================== -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ================ข่าวสาร======================== -->
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="purple">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">ข่าวสาร :</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#allnews" data-toggle="tab">
                                                        <i class="material-icons">view_list</i> ข่าวสารทั้งหมด
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#menews" data-toggle="tab">
                                                        <i class="material-icons">code</i> ข่าวสารของฉัน
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#addnews" data-toggle="tab" >
                                                        <i class="material-icons">add_circle</i> เพิ่มข่าวสาร
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
                                          <div class="card-content table-responsive">
                                            <input class="form-control" id="myInputallnews" type="text" placeholder="ค้นหา..">
                                            <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                  <th></th>
                                                  <th>หัวข้อข่าวสาร</th>
                                                  <th>ชื่อผู้ประกาศข่าวสาร</th>
                                                  <th></th>
                                              </tr></thead>
                                              @foreach ($news as $allnews )

                                              <tbody id="myTableallnews">
                                                  <tr>
                                                      <td style="width:50px;"><span class="round">
                                                      @if( $allnews->img != null)
                                                      <img src="/news/img/{{$allnews->img}}" id =""  class="img-circle" width="200" >
                                                      @else
                                                      <img src="images/noimages.png" class="img-circle" width="200" >
                                                      @endif</span></td>
                                                      <td><a href="news_detail&{{$allnews->id}}">{{$allnews->topic}}</a> </td>
                                                      <td>{{$allnews->name_user}} </td>

                                                      <td class="td-actions text-right">


                                                          @if( $allnews->status == '1')
                                                            <button type="button" rel="tooltip" title="ไม่แสดงข่าวสาร" class="btn btn-primary btn-simple btn-xs">
                                                                <a href="newsblock&{{$allnews->id}}"><i class="fa fa-eye" style="color:green"></i></a>
                                                            </button>
                                                            @else
                                                            <button type="button" rel="tooltip" title="แสดงข่าวสาร" class="btn btn-primary btn-simple btn-xs">
                                                                <a href="newsunblock&{{$allnews->id}}"><i class="fa fa-eye-slash" style="color:red"></i></a>
                                                            </button>
                                                            @endif
                                                          <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                              <a href="newsdelete&{{$allnews->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                          </button>
                                                      </td>
                                                  </tr>


                                              </tbody>
                                              @endforeach
                                           </table>

                                          </div>
                                        </div>
                                        <div class="tab-pane" id="menews">
                                          <div class="card-content table-responsive">
                                            <input class="form-control" id="myInputmenews" type="text" placeholder="ค้นหา..">
                                            <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                  <th></th>
                                                  <th>หัวข้อข่าวสาร</th>
                                                  <th>ชื่อผู้ประกาศข่าวสาร</th>
                                                  <th></th>
                                              </tr></thead>
                                              @foreach ($news as $menews )
                                              @if($menews->name_user == Auth::user()->name)

                                              <tbody id="myTablemenews">
                                                  <tr>
                                                      <td style="width:50px;"><span class="round">
                                                      @if( $menews->img != null)
                                                    <img src="/news/img/{{$menews->img}}" id =""  class="img-circle" width="200" >
                                                    @else
                                                    <img src="images/noimages.png" class="img-circle" width="200" >
                                                    @endif</span></td>
                                                      <td><a href="news_detail&{{$allnews->id}}">{{$menews->topic}}</a></td>
                                                      <td>{{$menews->name_user}}</td>

                                                      <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="แก้ไข" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="menewsedit&{{$menews->id}}"><i class="material-icons">edit</i></a>
                                                        </button>

                                                        @if( $menews->status == '1')
                                                          <button type="button" rel="tooltip" title="ไม่แสดงข่าวสาร" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="newsblock&{{$menews->id}}"><i class="fa fa-eye" style="color:green"></i></a>
                                                          </button>
                                                          @else
                                                          <button type="button" rel="tooltip" title="แสดงข่าวสาร" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="newsunblock&{{$menews->id}}"><i class="fa fa-eye-slash" style="color:red"></i></a>
                                                          </button>
                                                          @endif
                                                        <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                            <a href="newsdelete&{{$menews->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                        </button>
                                                      </td>
                                                  </tr>

                                              </tbody>
                                              @endif
                                            @endforeach

                                           </table>

                                          </div>
                                        </div>

                                        <!-- ====================================เพิ่มข่าวสาร===================================================== -->
                                        <div class="tab-pane" id="addnews">
                                          <div class="card-content table-responsive">
                                            <a href="#menews" data-toggle="tab" title="ย้อนกลับ">  <i class="material-icons" style="font-size:30px ;color:black">reply</i></a>
                                            <form action="addnews" method="POST" enctype="multipart/form-data">
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
														   <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .doc,.pdf)</label>
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                           <img src="images/noimages.png" id ="newsimg" class="img-thumbnail image" width="80%" height="99%" />
                                                            <center class="m-t-30"><input type="file" name="image" onchange="shownewsimage.call(this)"></center>
															<label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .png,.jpeg)</label>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                                  <label>วิดีโอเพิ่มเติม</label>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                                  <center><video id ="newsvideo" class="img-thumbnail image" src="" width="80%" height="99%" controls></video></center>
                                                  <input type="file" name="video" onchange="shownewsvideo.call(this)">
                                                  <label class="control-label">(ชื่อไฟล์เป็นภาษาอังกฤษไม่เว้นวรรค นาสกุลไฟล์ .mp4 ขนาดความยาวไม่เกิน 10 นาที)</label>
                                                </div>
                                              </div>
                                                <button type="submit" class="btn btn-primary pull-right">ยืนยัน</button>
                                                <div class="clearfix"></div>
                                            </form>
                                          </div>
                                          </div>
                                        <!-- ====================================เพิ่มข่าวสาร===================================================== -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- =================/ข่าวสาร========================== -->

                        <!-- ================กระทู้======================== -->
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="purple">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">กระทู้สนทนา :</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#allblog" data-toggle="tab">
                                                        <i class="material-icons">view_list</i>กระทู้สนทนาทั้งหมด
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#meblog" data-toggle="tab">
                                                        <i class="material-icons">code</i> กระทู้สนทนาของฉัน
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                <a href="#addblog" data-toggle="tab">
                                                    <i class="material-icons">message</i> ตั้งกระทู้สนทนา
                                                    <div class="ripple-container"></div>
                                                </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="allblog">
                                          <div class="card-content table-responsive">
                                            <input class="form-control" id="myInputallblog" type="text" placeholder="ค้นหา..">
                                            <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                    <th>หัวข้อกระทู้สนทนา</th>
                                                    <th>ชื่อผู้ตั้งกระทู้สนทนา</th>
                                                    <th>Time</th>
                                                    <th></th>
                                                  </tr>
                                              </thead>
                                                @foreach ($blog as $allblog )
                                                <tbody id="myTableallblog">
                                                  <tr>
                                                      <td><a href="blogdetail&{{$allblog->id}}">{{$allblog->topic}} </a></td>
                                                      <td>{{$allblog->name}}  <small> <br>{{$allblog->email}}</small></td>
                                                      <td>{{$allblog->created_at}} </td>

                                                      <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                            <a href="blog_del&{{$allblog->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                        </button>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                              @endforeach
                                            </table>

                                          </div>
                                        </div>
                                        <div class="tab-pane" id="meblog">
                                          <div class="card-content table-responsive">
                                            <input class="form-control" id="myInputmeblog" type="text" placeholder="ค้นหา..">
                                            <br>
                                            <table class="table">
                                              <thead class="text-primary">
                                                  <tr>
                                                    <th>หัวข้อกระทู้สนทนา</th>
                                                    <th>ชื่อผู้ตั้งกระทู้สนทนา</th>
                                                    <th>เวลา</th>
                                                    <th></th>
                                                  </tr>
                                              </thead>
                                                @foreach ($blog as $meblog )
                                                @if($meblog->name == Auth::user()->name)
                                                <tbody id="myTablemeblog">
                                                  <tr>
                                                      <td><a href="blogdetail&{{$meblog->id}}">{{$meblog->topic}}</a> </td>
                                                      <td>{{$meblog->name}} <small><br>{{$meblog->email}}</small></td>
                                                      <td>{{$meblog->created_at}} </td>

                                                      <td class="td-actions text-right">

                                                          <button type="button" rel="tooltip" title="แก้ไข" class="btn btn-primary btn-simple btn-xs">
                                                              <a href="admin_blogedit&{{$meblog->id}}"><i class="material-icons">edit</i>
                                                          </button>
                                                          <button type="button" rel="tooltip" title="ลบ" class="btn btn-danger btn-simple btn-xs">
                                                              <a href="blog_del&{{$meblog->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                          </button>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                              @endif
                                              @endforeach
                                            </table>

                                          </div>
                                        </div>
                                        <!-- ====================================ตั้งกระทู้===================================================== -->
                                        <div class="tab-pane" id="addblog">
                                          <div class="card-content table-responsive">

                                            <form action="addblog" method="POST" enctype="multipart/form-data" >
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
                                        <!-- ====================================/ตั้งกระทู้===================================================== -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ====================/กระทู้======================= -->

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
<!-- โชว์รูปภาพก่อนอัพโหลด เพิ่มศิษย์เก่า -->
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
    </script><!-- โชว์รูปภาพก่อนอัพโหลด -->

        <!-- โชว์รูปภาพก่อนอัพโหลด เพิ่มผู้ดูแลระบบ -->
            <script>
            function showadminimage(){
              if(this.files && this.files[0]){
                var obj = new FileReader();
                obj.onload = function(data){
                  var image = document.getElementById("adminimg");
                  image.src = data.target.result;
                }
                obj.readAsDataURL(this.files[0]);
              }
            }
            </script><!-- โชว์รูปภาพก่อนอัพโหลด -->

            <!-- โชว์รูปภาพก่อนอัพโหลด เพิ่มข่าวสาร -->
            <script>
                function shownewsimage(){
                  if(this.files && this.files[0]){
                    var obj = new FileReader();
                    obj.onload = function(data){
                      var image = document.getElementById("newsimg");
                      image.src = data.target.result;
                    }
                    obj.readAsDataURL(this.files[0]);
                  }
                }
            </script><!-- โชว์รูปภาพก่อนอัพโหลด -->

            <!-- โชว์videoก่อนอัพโหลด เพิ่มตัวอย่างการใช้งานโปรแกรม -->
              <script>
                function showprojectvideo(){
                  if(this.files && this.files[0]){
                    var obj = new FileReader();
                      obj.onload = function(data){
                          var video = document.getElementById("projectvideo");
                          video.src = data.target.result;
                      }
                          obj.readAsDataURL(this.files[0]);
                  }
                }
            </script>
          <!-- โชว์videoรูปภาพก่อนอัพโหลดเพิ่มตัวอย่างการใช้งานโปรแกรม -->

          <!-- โชว์videoก่อนอัพโหลด เพิ่มข่าวสาร -->
            <script>
              function shownewsvideo(){
                if(this.files && this.files[0]){
                  var obj = new FileReader();
                    obj.onload = function(data){
                        var video = document.getElementById("newsvideo");
                        video.src = data.target.result;
                    }
                        obj.readAsDataURL(this.files[0]);
                }
              }
          </script>
        <!-- โชว์videoรูปภาพก่อนอัพโหลด -->



</html>
