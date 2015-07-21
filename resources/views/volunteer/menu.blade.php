<div id='cssmenu'>
   <ul>
      <li>
         <a href='/volunteer' id='menu_home'><span>Home</span></a>
      </li>   

      <!-- Layout -->   
      <li class='has-sub'><a href='#'><span>Report</span></a>
         <ul>
            <li>
               {!! link_to_route('image/index', 'Monthly tutoting report') !!}
            </li>            
         </ul>
      </li>

      <!-- Files -->
      <li class='has-sub'><a href='#'><span>Files</span></a>
         <ul>
            <li><a href='#'><span>Documents</span></a></li>
            <li><a href='#'><span>Reports</span></a></li>
            <li><a href='#'><span>Form</span></a></li>
         </ul>
      </li>  
   </ul>

   <!-- Right bar -->
   <ul class="navbar-right" style="padding-right: 40px; ">     
      <li class='has-sub'>
         <a href="#"> <span>{{ Auth::user()->name }}</span></a>
         <ul>
            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            <li><a href="{{ url('admin/password/edit') }}">Change password</a></li>
         </ul>
      </li>      
   </ul>
</div>
