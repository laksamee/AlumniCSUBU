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
                                <p class="hidden-lg hidden-md">Profile</p>{{Auth::user()->name}}
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
                                            <h2><span class="nav-tabs-title">ความคิดเห็น</span><h2>
                                            <ul class="nav nav-tabs" data-tabs="tabs">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====================================กระทู้===================================================== -->
                                <div class="tab-pane" id="">
                                  <div class="card-content table-responsive">
                                      <div class="row">
                                				<div class="col-md-7 col-sm-7">
                                					<div class="row">
                                						<div class="col-md-12 col-sm-12">
                                							<h3><strong>{{$topic->topic}}</a></h3>
                                						</div>
                                					</div>
                                					<div class="row">
                                						<div class="col-md-12 col-sm-12">
                                							<p>
                                                {!! nl2br(e($topic->detail))!!}
                                							</p>

                                  								<i class="fa fa-user" aria-hidden="true"> {{$topic->name}}</i>
                                  								| <i class="fa fa-calendar"> </i> {{$topic->created_at}}
                                  							</p>
                                						</div>
                                					</div>
                                        <hr>
                                        <!-- Comment -->
                                          <div class="row">
                                						<div class="col-md-12 col-sm-12">
                                              <h2 >ความคิดเห็น</h2>
                                                <section class="comment-list">
                                                  @foreach ($comment as $val)
                                                  <article class="row">

                                                    <div class="col-md-1 col-sm-1 right">
                                                      @if( Auth::user()->name == $val->name)
                                                      <button type="button" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs">
                                                          <a href="commentdeletemember&{{$val->id}}"><i class="material-icons" style="color:red">close</i></a>
                                                      </button>
                                                      @endif
                                                    </div>
                                                    <div class="col-md-10 col-sm-10">
                                                      <div class="panel panel-default arrow left">
                                                        <div class="panel-body">
                                                          <header class="text-left">
                                                            <div class="comment-user"><i class="fa fa-user"></i> {{$val->name}}</div>
                                                              @if($val->email != null)
                                                            <div class="comment-email"><i class="fa fa-envelope"></i> {{$val->email}}</div>
                                                            @endif
                                                          </header><br>
                                                          <div class="comment-post">
                                                            <p>
                                                              {{$val->detail}}
                                                            </p>
                                                          </div>
                                                          <div class="comment-date"><i class="fa fa-calendar"></i> {{$val->created_at}}</div>

                                                      </div>

                                                    </div>
                                                  </div>

                                                </article>
                                                	@endforeach
                                                    {{$comment->links()}}
                                            </section>
                                					</div>
                                				</div>
                                      </div>
                                              <!-- Comment -->


                                        <div class="col-md-5 col-sm-5">
                                          <h3>แสดงความคิดเห็น</h3><hr>
                                            <form action="membercomments&{{$topic->id}}" method="get" class="form-horizontal form-material" enctype="multipart/form-data">

                                          <div class="row">
                                						<div class="col-md-12 col-sm-12">
                                              <div class="form-group label-floating">
                                                <label>ชื่อ</label>
                                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control input-md" data-rule="minlen:3"required >
                                              </div>
                                						</div>
                                            <div class="col-md-12 col-sm-12">
                                              <div class="form-group label-floating">
                                                <label>อีเมล</label>
                                                <input type="email" name="email"  value="{{ Auth::user()->email }}"class="form-control input-md" data-rule="minlen:3">

                                              </div>
                                						</div>
                                            <div class="col-md-12 col-sm-12">
                                              <divclass="form-group label-floating">
                                                <label>รายละเอียด</label>
                                                <textarea type="text"  rows="5" name="detail" class="form-control input-md" required ></textarea>

                                              </div>
                                						</div>
                                              <button type="submit" class="btn btn-primary pull-right">ยืนยัน</button>
                                              <div class="clearfix"></div>
                                              </form>
                                        </div>

                                		</div><!-- /row  -->
                                  </div>
                                </div>
                                <!-- ========================================================================================= -->
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

<!--  Dynamic Elements plugin -->
<script src="users/assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="users/assets/js/perfect-scrollbar.jquery.min.js"></script>


<!-- Material Dashboard javascript methods -->
<script src="users/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="users/assets/js/demo.js"></script>


</html>
