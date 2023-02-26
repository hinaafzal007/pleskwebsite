
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Richview Admin Panel</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/admin/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/admin/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/admin/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/admin/assets/js/plugins/datatables/dataTables.bootstrap4.css">

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="/admin/assets/css/codebase.min.css">
    
    @yield('css')

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="/admin/assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
  </head>
  <body>

    <!-- Page Container -->
    <!--
        Available classes for #page-container:

    GENERIC

        'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

    SIDEBAR & SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-inverse'                           Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header

    HEADER STYLE

        ''                                          Classic Header style if no class is added
        'page-header-modern'                        Modern Header style
        'page-header-inverse'                       Dark themed Header (works only with classic Header style)
        'page-header-glass'                         Light themed Header with transparency by default
                                                    (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
        'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                    (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

    MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
    -->
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed" style="padding-top: 0%">
      <!-- Side Overlay-->
        <!-- Side Content -->
        <div class="content-side">

          <!-- Mini Stats -->
          <div class="block pull-r-l">
            <div class="block-content block-content-full block-content-sm bg-body-dark">
              <div class="row">
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted">Cody</div>
                </div>
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted">Content</div>
                  <div class="font-size-h4"></div>
                </div>
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted">Setting</div>
                </div>
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted">Stat</div>
                </div>
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted">Stat</div>
                </div>
                <div class="col-2">
                  <div class="content-header">

                    <!-- Right Section -->
                    <div class="content-header-section">
                      <!-- User Dropdown -->
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{auth()->user()->first_name.' '.auth()->user()->last_name}}<i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                          <a class="dropdown-item" href="">
                            <i class="si si-user mr-5"></i> Profile
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="si si-logout mr-5"></i> Sign Out
                          </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                      <!-- END User Dropdown -->
          
                      <!-- Toggle Side Overlay -->
                      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                      {{-- <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="fa fa-tasks"></i>
                      </button> --}}
                      <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END Mini Stats -->
        </div>
        <!-- END Side Content -->

      <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
          <!-- Sidebar Scrolling -->
          <div class="js-sidebar-scroll">
            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
           
              <div class="block-content block-content-full block-content-sm bg-body-light">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-secondary px-10">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
              <ul class="nav-main">
                <li>
                  <a class="active" href="{{asset('/admin/dashboard')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>

                          

                {{-- Users --}}
                <li>
                  <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-user-o"></i><span class="sidebar-mini-hide">Users</span></a>
                  <ul>
                    <li>
                      <a href="{{asset('/admin/user/')}}">All Users</a>
                    </li>
                  </ul>
                </li>
                {{-- End Users --}}


                {{-- Orders --}}
                <li>
                  <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-plane"></i><span class="sidebar-mini-hide">Orders</span></a>
                  <ul>
                    <li>
                      <a href="{{asset('/admin/order/all')}}">All Orders</a>
                    </li>
                  </ul>
                </li>
                {{-- End Orders --}}
              
                {{-- Products --}}
                <li>
                  <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-product-hunt"></i><span class="sidebar-mini-hide">Products</span></a>
                  <ul>
                    <li>
                      <a href="{{asset('/admin/product/pending')}}">Pending</a>
                    </li>
                    <li>
                      <a href="{{asset('/admin/product/inprocess')}}">In Process</a>
                    </li>
                    <li>
                      <a href="{{asset('/admin/product/approved')}}">Approved</a>
                    </li>
                    <li>
                      <a href="{{asset('/admin/product/unapproved')}}">Unapproved</a>
                    </li>
                  </ul>
                </li>
                {{-- Products End --}}


                {{-- Category --}}
                <li>
                  <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-cog"></i><span class="sidebar-mini-hide">Category</span></a>
                  <ul>
                    <li>
                      <a href="{{asset('/admin/category')}}">Category</a>
                    </li>
                    <li>
                      <a href="{{asset('/admin/subcategory')}}">Sub Category</a>
                    </li>
                    <li>
                      <a href="{{asset('/admin/subsubcategory')}}">Sub Sub Category</a>
                    </li>
                  </ul>
                </li>
                {{-- Category End --}}
              </ul>
            </div>
            <!-- END Side Navigation -->
          </div>
          <!-- END Sidebar Scrolling -->
        </div>
        <!-- Sidebar Content -->
      </nav>
      <!-- END Sidebar -->

      <!-- Header -->
      <header id="page-header">

        <!-- Header Loader -->
        <div id="page-header-loader" class="overlay-header bg-primary">
          <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
              <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
          </div>
        </div>
        <!-- END Header Loader -->
      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
       
        @yield('content')

        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <footer id="page-footer">
        <div class="content py-20 font-size-sm clearfix">
          <div class="float-right">
            Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="#">richview</a>
          </div>
          <div class="float-left">
            <a class="font-w600" href="#">Richview</a> &copy; <span class="js-year-copy"></span>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!-- Codebase JS -->
    <script src="/admin/assets/js/codebase.core.min.js"></script>
    <script src="/admin/assets/js/codebase.app.min.js"></script>

    <script src="/admin/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page JS Code -->
    <script src="/admin/assets/js/pages/be_tables_datatables.min.js"></script>

    @yield('scripts')


  </body>
</html>