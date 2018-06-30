
</body>

<div class="container">
  <div class="container">
    <div class="row">
        <div class="panel-heading">  <h4 >ประวัติ</h4></div>
        <div class="container">
          <div class="row">
          <div class="panel-body">
            <div class="row" >
             <div class="col-md-3 " >
               @if($user->profile != null)
               <img src="/user/profile/{{$user->profile}}"alt="" width="100%" align="center">
               @else
               <img src="/user/profile/no_img.jpg" alt="" width="100%">
               @endif
             </div>
             <div class="col-md-9 " >
                 <div class="container" >
                   <h2>{{$user->name}}</h2>
                  <hr>
                 <div class="cbp-l-member-desc">
               		<h4><p><span>รุ่นทีเข้าศึกษา </span> : {{$user->generation}}</p></h4>
               		<h4><p><span>ปีที่จบการศึกษา</span> : {{$user->years}}</p></h4>
               		<h4><p><span>ที่อยู่</span> : {{$user->address}}</p></h4>
               		<h4><p><span>สถานที่ทำงาน</span> : {{$user->office}}</p></h4>
                  <h4><p><span>ไฟล์รายงายโครงาน </span> :
                    @if($user->senior_project != null)
                     <a href="user\file\{{$user->senior_project}}"><i class=""></i>{{$user->senior_project}}</a>
                  @endif
                  </p></h4>
               	</div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        @if($user->video_project != null)
          <div class= "row" align ="center" >
        		<div class="col-md-12 ">
        			<video  width="70%" controls>
        				<source src="/user/video_project/{{$user->video_project}}" type="video/mp4" >
        			</video><br><br>
        		</div>
        </div>
     @endif

    </div>
  </div>
</div>
