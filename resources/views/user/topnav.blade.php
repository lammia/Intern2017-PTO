            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">
                            <?php 
                            $id = Session::get('session_id');
                            //echo $id;
                            $value = Session::get('session_user');
                            echo $value;
                            ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>  

                <?php  
                        $tam = DB::table('users')
                        ->where('email',$id)
                        ->select('id')
                        ->get();

                        //echo '<pre>';
                        //print_r($tam);
                        //echo '</pre>';

                      
                        $list = DB::table('users')
                        ->join('pto_request', 'pto_request.id', '=', 'users.id')      
                        ->where('pto_request.id',$tam['0']->id)
                        ->select('users.email',
                                 'pto_request.status')
                        ->get();
                        //echo '<pre>';
                        //print_r($list);
                        //echo '</pre>';

                        $dem = $list->count();
                        //echo $dem;
                ?>
                @for($i=0;$i<$dem;$i++)
                @if ($list[$i]->email == $id && $list[$i]->status == 1)
                  
                
                  
                <li role="presentation" class="dropdown">
                  <a href="#" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-check" style="color:green"></i>
                    <span class="badge bg-green"></span>
                  </a>
                  
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a href ="historyuser">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Admin</span>                         
                        </span>                       
                          <span class="message">Admin accept </span>
                       
                      </a>
                    </li>
                    </ul>
                  </li>  
                  
                  @endif
                   
                @if ($list[$i]->email == $id && $list[$i]->status == 2)
                   

                  
               <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-times" style="color:red"></i>
                    <span class="badge bg-green"></span>
                  </a>
                  
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a href ="historyuser">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Admin</span>
                          
                        </span>
                        <span class="message">
                          Admin rejected PTO
                        </span>
                      </a>
                    </li>
                    </ul>
                  </li>

                  @endif  
                 
                 @endfor

              </ul>
            </nav>
   