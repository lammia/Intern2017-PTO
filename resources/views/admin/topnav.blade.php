            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>



              <ul class="nav navbar-nav navbar-right">



                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/img.jpg') }}" alt="">
                    
                    <?php 
                    $value = Session::get('session_admin');
                    echo $value;
                    ?>
                       <!--
                            @if(Auth::guard('admin')->check())
                            @if(isset($user))
                            {{"Ten : ".$user->fullname}}
                            @endif
                            @else
                            <h1>Ban chua dang nhap</h1>
                            @endif
                          -->
                          <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                          <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                      </li> 


                      <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-envelope-o"></i>
                          <span class="badge bg-green">6</span>
                        </a>
                        
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                          <li>
                            <a>
                              <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
                  