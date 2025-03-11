
<?php

$path=$_SERVER['REQUEST_URI'];
$path=explode('/', $path);
$page=end($path)

?>
<section class="sider_dashbord_login">

      <div class="side_nav" id="sidebar">

        <ul class="sidebar p-0">

        <div class="mobile_hidden_bar " onclick="sidebarToggle()" id="icon_sidebar">
          <i class="fa-solid fa-bars"></i>

        </div>
          <li class="nav-items <?php if($page=='Dashbord.php'){echo 'active';} ?> ">
            <div class="more_menu">
              <a href="{{ route('dashboard.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/dashboard.svg')}}" alt="" class="img" />
                </div>
                <div class="menu_name">Dashboard</div>
              </a>
            </div>
          </li>

          @if(Auth::check() && Auth::user()->user_type  == "superadmin")
          <li class="nav-items <?php if($page=='Product.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('admin.products.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/product.svg')}}" alt="" class="img" />
                </div>
                <div class="menu_name">Products</div>
              </a>
            </div>
          </li>

          <li class="nav-items <?php if($page=='Product.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('admin.subcategory.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/product.svg')}}" alt="" class="img" />
                </div>
                <div class="menu_name">Sub Products</div>
              </a>
            </div>
          </li>


          <li class="nav-items <?php if($page=='Product.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('admin.subcategory_deatil.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/product.svg')}}" alt="" class="img" />
                </div>
                <div class="menu_name">Sub Products Details</div>
              </a>
            </div>
          </li>

          <li class="nav-items <?php if($page=='Order.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('admin.users.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/order.svg')}}" alt="" class="img" />
                </div>
                <div class="menu_name">Users</div>
              </a>
            </div>
          </li>

          <li class="nav-items <?php if($page=='Setting.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('admin.settings.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/settings.svg')}}" class="img" />
                </div>
                <div class="menu_name">settings</div>
              </a>
            </div>
          </li>


          <li class="nav-items <?php if($page=='Report.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('admin.reports.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/reports.svg')}}" class="img" />
                </div>
                <div class="menu_name">reports</div>
              </a>
            </div>
          </li>


          <li class="nav-items <?php if($page=='Report.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('admin.email-settings.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/reports.svg')}}" class="img" />
                </div>
                <div class="menu_name">Email Settings</div>
              </a>
            </div>
          </li>

 @endif


          <li class="nav-items <?php if($page=='Order.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('orders.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/order.svg')}}" alt="" class="img" />
                </div>
                <div class="menu_name">Orders</div>
              </a>
            </div>
          </li>

            <li class="nav-items <?php if($page=='Payment.php'){echo 'active';} ?>">
                <div class="more_menu">
                    <a href="{{ route('payments') }}" class="menu_item">
                        <div class="menu_icon">
                            <img src="{{ asset('assets/images/wallet.svg')}}" alt="" class="img" />
                        </div>
                        <div class="menu_name">Payments</div>
                    </a>
                </div>
            </li>


          <hr />
          <li class="nav-items <?php if($page=='Profile.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('profile.index') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/users.svg')}}" class="img" />
                </div>
                <div class="menu_name">profile</div>
              </a>
            </div>
          </li>

          <li class="nav-items <?php if($page=='Setting.php'){echo 'active';} ?>">
            <div class="more_menu">
              <a href="{{ route('logout') }}" class="menu_item">
                <div class="menu_icon">
                  <img src="{{ asset('assets/images/settings.svg')}}" class="img" />
                </div>
                <div class="menu_name">Logout</div>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </section>
