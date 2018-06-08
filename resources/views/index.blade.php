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
              <li class="active"><a href="#intro">หน้าแรก</a></li>
              <li><a href="#about">เกี่ยวกับ</a></li>
              <li><a href="#news">ข่าวสาร</a></li>
              <li><a href="#palace">ทำเนียบศิษย์เก่า</a></li>
              <li><a href="/blog">กระทู้สนทนา</a></li>
              @if(Auth::user()->type == 'member')
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
                      @else
                          <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
                            <ul class="dropdown-menu">

                              <li><a href="/dashboard"><i class="fa fa-user"></i> โปรไฟล์ของฉัน</a></li>
                              <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form></li>
                            </ul>
                          </li>
              @endif
            </ul>
            @else
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#intro">หน้าแรก</a></li>
                  <li><a href="#about">เกี่ยวกับ</a></li>
                  <li><a href="#news">ข่าวสาร</a></li>
                  <li><a href="#palace">ทำเนียบศิษย์เก่า</a></li>
                  <li><a href="/blog">กระทู้สนทนา</a></li>
                </ul>
          @endauth
        @endif
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
    @if (Route::has('login'))
      @auth
      @else
    <!-- Section: intro -->
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> เข้าสู่ระบบ</h3>
                    </div>
                    <div class="panel-body">
                      @if (session('error'))
                      <div class="flash-message">
                        <div class="alert alert-danger">
                          คุณยังไม่ได้ละทะเบียนหรือยังไม่ได้รับการยืนยัน
                        </div>
                      </div>
                      @endif

                      <form action="{{ route('login') }}" method="post" role="form" class="contactForm lead">
                        @csrf
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>อีเมล / รหัสนักศึกษา</label>
                                <input id="username" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email')}}</strong>
                                        </span>
                                    @endif
                            </div>
                          </div>

                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <input type="submit" value="เข้าสู่ระบบ" class="btn btn-skin btn-block btn-lg">
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <a href="{{ route('password.request') }}">
                            <p class="lead-footer">* ลืมรหัสผ่าน </p></a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> ลงทะเบียน</h3>
                    </div>
                    <div class="panel-body">
                        @if (session('success'))
                        <div class="flash-message">
                          <div class="alert alert-warning">
                            <strong>ลงทะเบียนสำเร็จ!</strong> กรุณารอการตรวจสอบผ่านทางอีเมล
                          </div>
                        </div>
                      @endif
                      <form action="{{ route('register') }}" method="post" role="form" class="contactForm lead">
                        @csrf
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>รหัสนักศึกษา</label>
                                  <input id="number" type="number" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="idstd" value="" required autofocus>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>ชื่อ - สกุล</label>
                                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback">
                                          <label style="color:red;">{{ $errors->first('name') }}</label>
                                      </span>
                                  @endif

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>ปีที่จบการศึกษา</label>
                                  <input id="years" type="number" class="form-control{{ $errors->has('years') ? ' is-invalid' : '' }}" name="years" value="" required autofocus>
                                  @if ($errors->has('years'))
                                      <span class="invalid-feedback">
                                          <label style="color:red;">{{ $errors->first('years') }}</label>
                                      </span>
                                  @endif
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>อีเมล</label>
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback">
                                      <label style="color:red;">{{ $errors->first('email') }}</label>
                                  </span>
                              @endif
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>รหัสผ่าน</label>
                              <input id="pass" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                  <!-- <label><span style = "display: inline-block;color:red;" id="result"></span>  </label> -->
                              @if ($errors->has('password'))
                                  <span class="invalid-feedback">
                                      <label style="color:red;">{{ $errors->first('password') }}</label>
                                  </span>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>ยืนยันรหัสผ่าน</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              <div class="validation"></div>
                            </div>
                          </div>
                        </div>

                        <input type="submit" value="ลงทะเบียน" class="btn btn-skin btn-block btn-lg">

                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: intro -->
    @endauth
  @endif


    <section id="about" class="home-section paddingtop-40">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="callaction bg-gray">
              <div class="row">
                <div class="col-md-8">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cta-text"><br><br>
                      <h3>สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์</h3>
                      <h3>มหาวิทยาลัยอุบลราชธานี</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="cta-btn">
                      <img src="images/ubu-logo.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: about -->
    <section id="about" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">เกี่ยวกับ</h2>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-4 pricing-box">
            <div class="wow bounceInUp" data-wow-delay="0.1s">
              <div class="pricing-content general">
                <h2>คณะวิทยาศาสตร์</h2>
                <div class="text-center">
                <p>คณะวิทยาศาสตร์ มหาวิทยาลัยอุบลราชธานี ประกอบด้วย สำนักงานเลขานุการคณะและ 4 ภาควิชา
                  คือ ภาควิชาคณิตศาสตร์ สถิติและคอมพิวเตอร์ ภาควิชาเคมี ภาคฟิสิกส์ และภาควิชาวิทยาศาสตร์ชีวภาพ
                  ทำหน้าที่หลักในการจัดการเรียนการสอนวิชาพื้นฐานทางวิทยาศาสตร์และคณิตศาสตร์ให้กับคณะต่าง ๆ
                  ตามหลักสูตรในระดับปริญญาตรีของมหาวิทยาลัย<br><br>
                    คณะวิทยาศาสตร์ มหาวิทยาลัยอุบลราชธานี ได้รับการริเริ่มขึ้นครั้งแรก เมื่อปีพุทธศักราช 2531
                    ในนาม ภาควิชาพื้นฐาน วิทยาลัยอุบลราชธานี สังกัดมหาวิทยาลัยขอนแก่น
                    ต่อมาในปีพุทธศักราช 2533 วิทยาลัยอุบลราชธานีได้รับการสถาปนาเป็นมหาวิทยาลัยอุบลราชธานี
                    ตามประกาศพระราชบัญญัติมหาวิทยาลัยอุบลราชธานีในราชกิจจานุเบกษา เมื่อวันที่ 29 กรกฎาคม พ.ศ. 2533
                    ดังนั้น จึงถือว่า วันที่ 30 กรกฎาคม ของทุกปี เป็นวันสถาปนามาหาวิทยาลัย และภาควิชาพื้นฐานจึงเปลี่ยนชื่อเป็น
                    "คณะวิทยาศาสตร์" นับตั้งแต่วันดังกล่าว</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 pricing-box featured-price">
            <div class="wow bounceInUp" data-wow-delay="0.3s">
              <div class="pricing-content featured">
                <h3>มหาวิทยาลัยอุบลราชธานี</h3>
                <div class="text-center">
                  <p>มหาวิทยาลัยอุบลราชธานี (ม.อบ.) (Ubon Ratchathani University) "ภูมิปัญญาแห่งภูมิภาคลุ่มน้ำโขง" เป็นสถาบันการศึกษาระดับอุดมศึกษาที่จัดตั้งในพื้นที่ของจังหวัดอุบลราชธานี ก่อตั้งเมื่อ วันที่ 14 กันยายน พ.ศ. 2530
                    โดยจัดตั้งเป็น วิทยาลัยอุบลราชธานี สังกัดมหาวิทยาลัยขอนแก่น และยกฐานะเป็น มหาวิทยาลัยอุบลราชธานี ในปี พ.ศ. 2533 จากความพยายามที่จะให้มีมหาวิทยาลัยในจังหวัดอุบลราชธานีของทุกฝ่าย
                    รวมทั้งประชาชนในจังหวัดและมีจุดมุ่งหมายที่จะให้เป็นสถาบันการศึกษาระดับอุดมศึกษาแห่งที่สองของภาคตะวันออกเฉียงเหนือ
                    ในปัจจุบันนี้มหาวิทยาลัยอุบลราชธานีเป็นศูนย์กลางของการศึกษาและการค้นคว้าวิจัยในเขตภาคตะวันออกเฉียงเหนือตอนล่าง
                    โดยครอบคลุมทั้งสาขาวิทยาศาสตร์สุขภาพ วิทยาศาสตร์และเทคโนโลยี มนุษยศาสตร์และสังคมศาสตร์</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 pricing-box">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div class="pricing-content general last">
                <h2><span>สาขาวิทยาการคอมพิวเตอร์</span></h2>
                <div class="text-center">
                  <p>ภาควิชาคณิตศาสตร์ สถิติ และคอมพิวเตอร์ได้จัดตั้งขึ้นพร้อมกับการจัดตั้งคณะวิทยาศาสตร์
                    เมื่อวันที่ 28 ตุลาคม พ.ศ. 2534 ตามประกาศทบวงมหาวิทยาลัย
                    เรื่องการแบ่งส่วนราชการในมหาวิทยาลัยอุบลราชธานี พ.ศ. 2534 ภาระงานหลักคือ
                    จัดการเรียนการสอนวิชาคณิตศาสตร์ สถิติและคอมพิวเตอร์ ให้แก่นักศึกษาคณะต่าง ๆ
                    และผลิตบัณฑิตสาขาวิทยาการคอมพิวเตอร์ และสาขาเทคโนโลยีสารสนเทศ
                    โดยเริ่มเปิดสอนระดับปริญญาตรีสาขาวิทยาการคอมพิวเตอร์ตั้งแต่ปีการศึกษา 2540 ในปีการศึกษา 2548
                    ทำการเปิดสอนสาขาเทคโนโลยีสารสนเทศ และ สาขาเทคโนโลยีสารสนเทศ (ต่อเนื่อง) ส
                    ่วนในระดับปริญญาโท ภาควิชาคณิตศาสตร์ฯ เริ่มเปิดสอนสาขาเทคโนโลยีสารสนเทศตั้งแต่ปีการศึกษา 2546
                    ในปีการศึกษา 2550 เปิดสอนสาขาวิทยาการคอมพิวเตอร์ และในปีการศึกษา 2551
                    เปิดสอนสาขาวิชาคณิตศาสตร์ระดับปริญญาโท นอกจากนั้นภาควิชาคณิตศาสตร์ฯยังมีภาระงานรองอื่นๆ
                    ได้แก่การบริการวิชาการแก่สังคมที่เกี่ยวกับการเรียนการสอนวิชาคณิตศาสตร์สถิติและคอมพิวเตอร์
                    การใช้งานทางด้านคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</p>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- /Section: about -->

    <!-- Section: ข่าวสาร -->

      <section id="news" class="home-section bg-gray paddingbot-60">
        <div class="container marginbot-50">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="wow fadeInDown" data-wow-delay="0.1s">
                <div class="section-heading text-center">
                  <h2 class="h-bold">ข่าวสาร</h2>
                </div>
              </div>
              <div class="divider-short"></div>
            </div>
          </div>
        </div>

      <div class="container">

        @foreach ($news as $val)
          @if($val->status == 1)
        <div class="row">
          <div class="col-md-12">
            <from >
              <h4><strong><a href="newsdetail&{{$val->id}}" >{{ $val->topic}}</a></strong></h4>
                  <i class="fa fa-user" aria-hidden="true"> {{ $val->name_user}}</i>
                  | <i class="fa fa-calendar"> {{ $val->created_at}}</i>
                  @if($val->file != null)
                  | <a href="news/file/{{$val->file}}"><i class=""></i>{{ $val->file}}</a>
                  @endif
          </div>
        </div><br>
        @endif
        @endforeach
      {{$news->links()}}
      </div>
    </section>
    <!-- /Section: ข่าวสาร-->




    <!-- Section: ทำเนียบศิษย์เก่า -->
    <section id="palace" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">ทำเนียบศิษย์เก่า</h2>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="grid-container" class="cbp-l-grid-team">
              <ul>
                @foreach ($users as $user)
                  @if(($user->type == 'member'&& $user->status == 'confirm'&& $user->block == '1'))
                <li class="cbp-item neurologist">
                  <a href="member&{{$user->id}}" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      @if($user->profile != null)
                      <img src="/user/profile/{{$user->profile}}" alt="" width="100%">
                      @else
                      <img src="/user/profile/no_img.jpg" alt="" width="100%">
                      @endif
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text">รายละเอียด</div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="member&{{$user->id}}" class="cbp-singlePage cbp-l-grid-team-name">{{$user->name}}</a>
                </li>
                  @endif
                @endforeach
              </ul>
            </div>

          </div>

        </div>

      </div>
    </section>
    <!-- /Section: ทำเนียบศิษย์เก่า -->


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
