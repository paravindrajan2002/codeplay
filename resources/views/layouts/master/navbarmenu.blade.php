       <!-- ========== App Menu ========== -->
       <div class="app-menu navbar-menu">
  
  <div id="scrollbar">
      <div class="container-fluid">

          <div id="two-column-menu">
          </div>
          <ul class="navbar-nav" id="navbar-nav">

              <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                  <a href="{{route('master.home')}}" class="nav-link menu-link">  <i class="ph-gauge"></i> <span data-key="t-dashboards">Dashboards</span> </a>
              </li>


              <li class="nav-item">
                  <a href="#sidebarEcommerce" class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEcommerce">
                      <i class="ph-storefront"></i> <span data-key="t-ecommerce">Manage Users</span>
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarEcommerce">
                      <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                              <a href="{{route('master.roles')}}" class="nav-link" data-key="t-products">Roles & Permissions</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('master.users')}}" class="nav-link" data-key="t-products">All Users</a>
                          </li>

                          
                      </ul>
                  </div>
              </li>

              <li class="nav-item">
                <?php 
                    $new_sellers_count = DB::table('vendorusers')
                    ->join('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id')
                    ->where('vendorusers.status',0)   
                    ->count();
                ?>
                    <a href="{{route('master.sellers')}}" class="nav-link menu-link"> <i class="ph-user"></i> <span data-key="t-file-manager">Manage Sellers <span class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span class="notification-badge">{{$new_sellers_count}}</span><span class="visually-hidden">unread messages</span></span></span> </a>
                </li>



              <li class="nav-item">
                  <a href="#sidebarTickets" class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTickets">
                      <i class="ph-ticket"></i> <span data-key="t-support-tickets">Manage CMS</span>
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarTickets">
                      <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a href="{{route('master.category')}}" class="nav-link" data-key="t-list-view">Master categories</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('master.subcategory')}}" class="nav-link" data-key="t-list-view">categories</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('master.subcategorylist')}}" class="nav-link" data-key="t-list-view">Sub categories</a>
                          </li>
                      </ul>
                  </div>
              </li>
              

              <li class="nav-item">
                  <a href="#sidebarInvoices" class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices">
                      <i class="ph-file-text"></i> <span data-key="t-invoices">Manage Products & orders</span>
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarInvoices">
                      <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a href="#" class="nav-link" data-key="t-list-view">List View</a>
                          </li>

                      </ul>
                  </div>
              </li>


              <li class="nav-item">
                  <a href="#sidebarRealeEstate" class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRealeEstate">
                      <i class="ph-buildings"></i> <span data-key="t-real-estate">Manage Payments</span>
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarRealeEstate">
                      <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a href="#" class="nav-link" data-key="t-listing-grid">Cash</a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" data-key="t-listing-list">Online</a>
                          </li>

                        
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                    <a href="#" class="nav-link "> <i class="ph-phone"></i> <span data-key="t-phone">Customer Support</span> </a>
                </li>

                <li class="nav-item">
                <a href="#" class="nav-link "> <i class="ph-chats"></i> <span data-key="t-chat">Chat</span> </a>
                
                <a href="#" class="nav-link"> <i class="ph-folder-open"></i> <span data-key="t-file-manager">Security & Privacy Controls</span> </a>
                <a href="#" class="nav-link "> <i class="ph-folder-open"></i> <span data-key="t-file-manager">Promotion & Marketing</span> </a>
               
                </li>
          </ul>
      </div>
      <!-- Sidebar -->
  </div>

  <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->