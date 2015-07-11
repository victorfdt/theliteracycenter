<div id='cssmenu'>
   <ul>
      <li>
         <a href="{{ url('/index') }}">Home</a>
      </li>

      <li class='has-sub'><a href="{{ url('/student/') }}"><span>Student</span></a>
         <ul>
            <li>               
               <a href="{{ url('/student/faq') }}">FAQ</a>
            </li>
            <li>               
               <a href="{{ url('/student/client') }}">Client</a>
            </li>  
         </ul>
      </li>

      <li class='has-sub'><a href='#'><span>Donate</span></a>
         <ul>
            <li class='has-sub'><a href='#'><span>Product 1</span></a>
               <ul>
                  <li><a href='#'><span>Sub Product</span></a></li>
                  <li class='last'><a href='#'><span>Sub Product</span></a></li>
                  <li><a href='#'><span>Sub Product</span></a></li>
                  <li class='last'><a href='#'><span>Sub Product</span></a></li>
               </ul>
            </li>
            <li class='has-sub'><a href='#'><span>Product 2</span></a>
               <ul>
                  <li><a href='#'><span>Sub Product</span></a></li>
                  <li class='last'><a href='#'><span>Sub Product</span></a></li>
               </ul>
            </li>
         </ul>
      </li>         
      <li>
            <a href="{{ url('/about') }}">About</a>
      </li>
      <li><a href='#'><span>Blog</span></a></li>
      <li><a href='#'><span>Newsletter</span></a>   
      <li class='last'><a href='#'><span>Events</span></a></li>      
      
      <li class='has-sub'><a href="#"><span>Volunteer</span></a>
         <ul>
            <li>               
               <a href="{{ url('/volunteer/tutor') }}">Tutor</a>
            </li>
            <li>               
               <a href="{{ url('/volunteer/becomeavolunteer') }}">Become a volunteer</a>
            </li>
            <li>               
               <a href="{{ url('/volunteer/linkandfile') }}">Links and files</a>
            </li>
            <li>               
               <a href="{{ url('/volunteer/tutoringlocation') }}">Tutoring locations</a>
            </li> 
            <li>               
               <a href="{{ url('/volunteer/volunteerworkshop') }}">Workshop</a>
            </li> 
         </ul>
      </li>


   </ul>
</div>
