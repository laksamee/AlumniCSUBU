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
            <ul class="nav navbar-nav">
              <li ><a href="/index">หน้าแรก</a></li>
            </ul>

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
            <li><a href="/blog">กระทู้สนทนาทั้งหมด</a></li>
            <li class="active">ความคิดเห็น</li>
          </ol>

          <div class="row">
    				<div class="col-md-8 col-sm-8">

    					<div class="row">
    						<div class="col-md-12 col-sm-12">
    							<h4><strong><a href="">{{$topic->topic}}</a></strong></h4>
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-md-12 col-sm-12">
    							<p>{{$topic->detail}}

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
                  <h2 class="page-header">ความคิดเห็น</h2>
                    <section class="comment-list">
                      @foreach ($comment as $val)
                      <article class="row">
                        @if (Route::has('login'))
                          @auth
                          @if($val->name == Auth::user()->name)
                          <div class="col-md-1 col-sm-1">
                              <a href="commentdeletemember&{{$val->id}}"><i class="fa fa-close" style="color:red"></i></a>
                          </div>
                        @endif
                        @endauth
                      @endif


                        <div class="col-md-11 col-sm-11">
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
                  <!-- Comment -->
    				</div>


            <div class="col-md-4 col-sm-4">
              <h3>แสดงความคิดเห็น</h3><hr>
              @if (Route::has('login'))
                @auth
    				<div class="row">
              <form action="postcomment&{{$topic->id}}" method="get" >
    						<div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>ชื่อ</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}"  class="form-control input-md" data-rule="minlen:3"required >
                    <div class="validation"></div>
                  </div>
    						</div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>อีเมล</label>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control input-md" data-rule="minlen:3" >
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
              <form action="postcomment&{{$topic->id}}" method="get" >
    						<div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>ชื่อ</label>
                    <input type="text" name="name"  class="form-control input-md" data-rule="minlen:3"required >
                    <div class="validation"></div>
                  </div>
    						</div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>อีเมล</label>
                    <input type="email" name="email"  class="form-control input-md" data-rule="minlen:3" >
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
