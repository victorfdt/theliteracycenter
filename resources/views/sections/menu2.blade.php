<div id='cssmenu'>
   <ul>
      <li id="menu_home">
         <a href="{{ url('/index') }}">Home</a>
      </li>

      <li id="menu_student" class='has-sub'><a href="#>"<span>Student</span></a>
         <ul>
            <li>               
               <a href="{{ url('/student/faq') }}">FAQ</a>
            </li>
            <li>               
               <a href="{{ url('/student/client') }}">Client</a>
            </li>  
         </ul>
      </li>

      <li id="menu_donate" class='has-sub'><a href="#"><span>Donate</span></a>
         <ul>
            <li>               
               <a href="{{ url('/donate/contribution') }}">Contribution</a>
            </li>
            <li>               
               <a href="{{ url('/donate/wishlist') }}">Wish list</a>
            </li>  
         </ul>
      </li>

<!-- 
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

      -->       
      <li id="menu_about"  class='has-sub'><a href="#">About</a>
         <ul>
            <li>               
               <a href="{{ url('/about/theliteracycenter') }}">The Literacy Center</a>
            </li>

            <li>               
               <a href="{{ url('/about/staff') }}">Staff</a>
            </li>

            <li>               
               <a href="{{ url('/about/boardofdirectors') }}">Board of directors</a>
            </li>

            <li> 
               {!! link_to_route('about/jobOpportunities', 'Job Opportunities') !!} 
            </li>                      
         </ul>
      </li>
      <li><a href='http://www.litcenter.org/'><span>Blog</span></a></li>

      <li><a href="{{ url('newsletter') }}"><span>Newsletter</span></a>   

      <li id="menu_event" class='has-sub'><a href='#'><span>Events</span></a>
         <ul>
            <li>               
               <a href="{{ url('event/main') }}">Main events</a>
            </li>
            <li>               
               <a href="{{ url('/event/calendar') }}">Calendar</a>
            </li>                      
         </ul>
      </li>      
      
      <li id="menu_volunteer" class='has-sub'><a href="#"><span>Volunteer</span></a>
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
            <li>               
               <a href="{{ url('/volunteer/tutorreport') }}">Monthly tutor report</a>
            </li>
         </ul>
      </li>


   </ul>
</div>
