<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CS-UBU Alumni</title>

  <!-- css -->
  <link href="index_alumni_csubu/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="index_alumni_csubu/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="index_alumni_csubu/plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="index_alumni_csubu/css/nivo-lightbox.css" rel="stylesheet" />
  <link href="index_alumni_csubu/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="index_alumni_csubu/css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="index_alumni_csubu/css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="index_alumni_csubu/css/animate.css" rel="stylesheet" />
  <link href="index_alumni_csubu/css/style.css" rel="stylesheet">

  <link href="css/home.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="index_alumni_csubu/bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="index_alumni_csubu/color/default.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Medicio
    Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


  <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="/index"><h3>CS-UBU</h3></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          @if (Route::has('login'))
            @auth
            <ul class="nav navbar-nav">
              <li><a href="/index">หน้าหลัก</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/memberdashboard"><i class="fa fa-user"></i> โปรไฟล์ของฉัน</a></li>
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form></li>
              </ul>
            </li>
            </ul>
            @else
                <ul class="nav navbar-nav">
                  <li ><a href="/index">หน้าหลัก</a></li>
                </ul>
          @endauth
        @endif
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

      <!-- Section: ทำเนียบศิษย์เก่า -->
      <section id="news" class="home-section bg-gray paddingbot-60">
        <div class="container marginbot-50">
          <ol class="breadcrumb">
            <li><a href="/index">หน้าหลัก</a></li>
            <li class="active">กระทู้ทั้งหมด</li>
          </ol>

          <div class="row">
    				<div class="col-md-8 col-sm-8">
                @foreach ($blog as $val)

              <div class="row">
    						<div class="col-md-12 col-sm-12">
    							 <h4><strong><a href="comment&{{$val->id}}">{{ $val->topic}}</a></strong></h4>
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-md-10 col-sm-10 left">
    							<p>{{iconv_substr($val->detail,0,440,"UTF-8")." ..." }}

    							</p>
    								<p><a href="">อ่านเพิ่มเติม...</a></p>
                    <p>
      								<i class="fa fa-user" aria-hidden="true"> {{ $val->name}}</i>
      								| <i class="fa fa-calendar"> {{ $val->created_at}}</i>

      								| <i class="fa fa-comments"></i> <a href="">  ความคิดเห็น</a>
      							</p>
    						</div>
                <div class="col-md-1 col-sm-1 right">
                  <p>
                    @if (Route::has('login'))
                      @auth
                        @if($val->name == Auth::user()->name)
                          <a href="blogdelete_member&{{$val->id}}"><i class="fa fa-close" style="color:red"></i></a>
                        @endif
                    @endauth
                  @endif
                  </p>
                </div>
    					</div>
              <hr>
              @endforeach
              {{$blog->links()}}
    				</div>
            <div class="col-md-4 col-sm-4">
              <h3>ตั้งกระทู้</h3><hr>
              @if (Route::has('login'))
                @auth
    					<div class="row">
                <form action="{{ url('/postblog') }}" method="get" >
    						<div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>ชื่อ</label>
                    <input type="text" name="name"  value="{{Auth::user()->name}}" class="form-control input-md" data-rule="minlen:3"required >
                    <div class="validation"></div>
                  </div>
    						</div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>อีเมล์</label>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control input-md" data-rule="minlen:3" required>
                    <div class="validation"></div>
                  </div>
    						</div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>หัวข้อกระทู้</label>
                    <input type="text" name="topic"  class="form-control input-md" data-rule="minlen:3" required>
                    <div class="validation"></div>
                  </div>
    						</div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>รายละเอียด</label>
                    <textarea type="text"  name="detail" class="form-control input-md" required ></textarea>
                    <div class="validation"></div>
                  </div>
    						</div>
                <div class="col-md-4 col-sm-4">
                  <input type="submit" value="ยืนยัน" class="btn btn-skin btn-block btn-lg">
                </div>
              </form>
    					</div>
                @else
                      <div class="row">
                        <form action="{{ url('/postblog') }}" method="get" >
            						<div class="col-md-12 col-sm-12">
                          <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" name="name"  class="form-control input-md" data-rule="minlen:3"required >
                            <div class="validation"></div>
                          </div>
            						</div>
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group">
                            <label>อีเมล์</label>
                            <input type="email" name="email"  class="form-control input-md" data-rule="minlen:3" required>
                            <div class="validation"></div>
                          </div>
            						</div>
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group">
                            <label>หัวข้อกระทู้</label>
                            <input type="text" name="topic"  class="form-control input-md" data-rule="minlen:3" required>
                            <div class="validation"></div>
                          </div>
            						</div>
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group">
                            <label>รายละเอียด</label>
                            <textarea type="text"  name="detail" class="form-control input-md" required ></textarea>
                            <div class="validation"></div>
                          </div>
            						</div>
                        <div class="col-md-4 col-sm-4">
                          <input type="submit" value="ยืนยัน" class="btn btn-skin btn-block btn-lg">
                        </div>
                      </form>
            					</div>

                      @endauth
                    @endif
    				</div>

    			</div><!-- /row  -->


        </div>
      </section >
    <footer>

      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>85 ถ.สถลมารค ต.เมืองศรีไค อ.วารินชำราบ จ.อุบลราชธานี 34190</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </footer>

  </div>

  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
  <!-- Core JavaScript Files -->
  <script src="index_alumni_csubu/js/jquery.min.js"></script>
  <script src="index_alumni_csubu/js/bootstrap.min.js"></script>
  <script src="index_alumni_csubu/js/jquery.easing.min.js"></script>
  <script src="index_alumni_csubu/js/wow.min.js"></script>
  <script src="index_alumni_csubu/js/jquery.scrollTo.js"></script>
  <script src="index_alumni_csubu/js/jquery.appear.js"></script>
  <script src="index_alumni_csubu/js/stellar.js"></script>
  <script src="index_alumni_csubu/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="index_alumni_csubu/js/owl.carousel.min.js"></script>
  <script src="index_alumni_csubu/js/nivo-lightbox.min.js"></script>
  <script src="index_alumni_csubu/js/custom.js"></script>

  <script src="js/home.js"></script>
</body>

</html>
