<div id='cssmenu'>
   <ul>
      <li>
         <a href='/admin' id='menu_home'><span>Home</span></a>
      </li>   

      <!-- Layout -->   
      <li class='has-sub'><a href='#'><span>Layout</span></a>
         <ul>
            <li>
               <a href='#'><span>Index</span></a>               
            </li>
            <li>
               {!! link_to_route('image/index', 'Images') !!}
            </li>
            <li>
               {!! link_to_route('wishlist/index', 'Wish List') !!}
            </li>
            <li>
               {!! link_to_route('member/index', 'Member') !!}
            </li>
            <li>
               {!! link_to_route('job/index', 'Job Opportunities') !!}
            </li>
         </ul>
      </li>

      <!-- Volunteers -->
      <li class='has-sub'><a href='#'><span>Volunteers</span></a>
         <ul>
            <li>
               {!! link_to_route('monthlyreport/index', 'Monthly report') !!}
            </li>
            <li><a href='#'><span>Reports</span></a></li>
            <li><a href='#'><span>Form</span></a></li>

         </ul>
      </li>      

      <!-- Accounts -->
      <li>
         {!! link_to_route('users.index', 'User') !!}
      </li>
      
      <!-- Files -->
      <li class='has-sub'><a href='#'><span>Files</span></a>   
         <li class='last'><a href='#'><span>Newletters</span></a></li>         
      </li>

      <!-- Accounts -->
      <li><a href='#'><span>Events</span></a></li>

   </ul>

   <ul class="navbar-right" style="padding-right: 40px; ">
      @if (Auth::guest())

         <!--
         <li><a href="{{ url('/auth/login') }}">Login</a></li>
         <li><a href="{{ url('/auth/register') }}">Register</a></li>

      -->
      @else
      <li class='has-sub'>
         <a href="#"> <span>{{ Auth::user()->name }}</span></a>
         <ul>
            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            <li><a href="{{ url('admin/password/edit') }}">Change password</a></li>
         </ul>
      </li>
      @endif
   </ul>
</div>
