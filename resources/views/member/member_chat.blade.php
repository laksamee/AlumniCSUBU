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
  <div id="app">
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
                          <p>home</p>
                      </a>
                  </li>
                  <li >
                      <a href="memberdashboard">
                          <i class="material-icons">dashboard</i>
                          <p>Dashboard</p>
                      </a>
                  </li>

                    <li>
                        <a href="member_profile">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="member_listfriend">
                            <i class="fa fa-comments"></i>
                            <p>chat</p>
                        </a>
                    </li>
                    <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out"></i> logout</a>
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
                        <a class="navbar-brand" href="member_chat">Chat </a>
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
                                            <span class="nav-tabs-title">แชททั้งหมด</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs"></ul>
                                        </div>
                                    </div>
                                </div>

                                <audio id="ChatAudio">
                                    <source src="{{ asset('sounds/chat.mp3') }}">
                                </audio>
                                <meta name="friendId" content="{{ $friend->id }}">
                                    <div class="column is-12 is-offset-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                              <div class="contain is-pulled-right">
                                                  <a href="member_listfriend" class="is-link"><i class="fa fa-arrow-left"></i> Go Back </a>
                                              </div>
                                                {{ $friend->name }}
                                                <chat v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:friendid="{{ $friend->id }}"></chat>
                                            </div>
                                        </div>
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
<script src="{{ asset('js/app.js') }}"></script>
<!--   Core JS Files   -->
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