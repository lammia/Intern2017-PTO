<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="{{url('login')}}" class="site_title"><span>PTO MANAGEMENT</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      <img src="{{ asset('images/img.jpg') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>Manager</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Menu</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('manager/index')}}">Profile</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> PTO History<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('historymanager')}}">My PTO Request</a></li>
            <li><a href="{{url('historyofteam')}}">My team PTO request</a></li>
            <li><a href="{{url('responsePtoOfTeam')}}">Management PTO of team</a></li>
          </ul>
        </li>
        <li><a href={{url('newPTOManager')}}><i class="fa fa-edit"></i> Register PTO </a></li>
        <li><a><i class="fa fa-clone"></i> Suggestion Admin <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="tables.html">Suggestion Admin</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->

  <!-- /menu footer buttons -->
</div>