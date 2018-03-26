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
              <li class="active"><a href="/index">หน้าหลัก</a></li>
              <li><a href="/index">เกี่ยวกับ</a></li>
              <li><a href="/index">ข่าวสาร</a></li>
              <li><a href="/index">ทำเนียบศิษย์เก่า</a></li>
              <li><a href="/blog">กระทู้</a></li>
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
                  <li><a href="/index">หน้าหลัก</a></li>
                  <li><a href="/index">เกี่ยวกับ</a></li>
                  <li class="active"><a href="/index">ข่าวสาร</a></li>
                  <li><a href="/index">ทำเนียบศิษย์เก่า</a></li>
                  <li><a href="/blog">กระทู้</a></li>
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
            <li><a href="/index">หน้าแรก</a></li>
            <li class="active">รายละเอียดข่าวสาร</li>
          </ol>
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="wow fadeInDown" data-wow-delay="0.1s">
                <div class="row">
                  <div class="col-md-12 col-sm-12">

                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <h4><strong>{{ $detail->topic}}  </strong></h4>
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                            <p>
                              <i class="fa fa-user" aria-hidden="true"> {{ $detail->name_user}} </i>
                              | <i class="fa fa-calendar"> {{ $detail->created_at}}</i>

                              @if($detail->file != null)
        											| <a href="news/file/{{$detail->file}}"><i class=""></i>{{ $detail->file}}</a>
        											@endif

                            </p>
                          </div>
                        </div><br>
                        @if($detail->img  != null)
                          <center class="m-t-30"><img class="images-newsdelail" src="/news/img/{{$detail->img}}" height="350" width="500" alt="" ><br>
                          </center>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <p>{!! nl2br(e($detail->detail))!!}
                        </p>
                      </div>
                    </div>
                    @if($detail->video  != null)
                    <div class="row">
                      <div class="col-lg-12 col-xlg-12 col-md-12">
                        <center class="m-t-30">
                          <video class="img-thumbnail image" src="news\video\{{$detail->video}}" width="80%" height="99%" controls></video>
                        </center>
                      </div>
                    </div>
                    @endif

                  </div>
                </div><!-- /row  -->
              </div>
            </div>
          </div>
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
