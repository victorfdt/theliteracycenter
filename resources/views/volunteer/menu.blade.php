<div id='cssmenu'>
   <ul>
      <li>
         <a href='/volunteer'><span>Home</span></a>
      </li>   

      <!-- Layout -->   
      <li class='has-sub'><a href='#'><span>Report</span></a>
         <ul>
            <li>
               {!! link_to_route('monthlyreport/index', 'Monthly tutoting report') !!}
            </li>            
         </ul>
      </li>

      <!-- Files -->
      <li>
         <a href="{{ url('volunteer/file') }}"><span>Files</span></a>         
      </li>  
   </ul>

   <!-- Right bar -->
   <ul class="navbar-right" style="padding-right: 40px; ">     
      <li class='has-sub'>
         <a href="#"> <span>{{ Auth::user()->name }}</span></a>
         <ul>
            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            <li><a href="{{ url('editpassword') }}">Change password</a></li>
         </ul>
      </li>      
   </ul>
</div>
