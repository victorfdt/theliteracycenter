<div id='cssmenu'>
   <ul>
      <li>
         {!! link_to_route('/', 'Home', [], array('id' => 'menu_home')) !!}
      </li>
      <li><a href='#'><span>Student</span></a></li>
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
            {!! link_to_route('pages.about', 'About', [], array('id' => 'menu_about')) !!}
      </li>
      <li><a href='#'><span>Blog</span></a></li>
      <li><a href='#'><span>Newsletter</span></a>   
      <li class='last'><a href='#'><span>Events</span></a></li>
      <li class='last'><a href='#'><span>Volunteers</span></a></li>
   </ul>
</div>
