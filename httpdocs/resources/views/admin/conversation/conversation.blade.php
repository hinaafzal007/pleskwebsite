
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

   
  </head>
  <body>

    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed" style="padding-top: 0%">
      <!-- Side Overlay-->
        <!-- Side Content -->
        <div class="content-side">

          <!-- Mini Stats -->
          <div class="block pull-r-l">
            <div class="block-content block-content-full block-content-sm bg-body-dark">
              <div class="row">
                <div class="col-2">
                    <div class="font-size-sm font-w600 text-uppercase text-muted"><a href="{{asset('/conversation')}}">Cody</a></div>
                  </div>
                  <div class="col-2">
                    <div class="font-size-sm font-w600 text-uppercase text-muted"><a href="{{asset('/dashboard')}}">Content</a></div>
                    <div class="font-size-h4"></div>
                </div>
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted"><a href="{{asset('/setting/users')}}">Setting</a></div>
                </div>
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted"></div>
                </div>
                <div class="col-2">
                  <div class="font-size-sm font-w600 text-uppercase text-muted"></div>
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
        
                    </div>
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
                      <a href="{{asset('/conversation')}}" class="btn btn-primary">
                        ADD
                      </a>
                    </div>
                                  <!-- Button trigger modal -->
                    
                  </div>
                </form>
              </div>
              
              
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
              <ul class="nav-main">
                @foreach ($conversations as $conversation)
                  <li>
                    <a class="active" href="{{asset('/conversation/'.$conversation->id)}}">
                        <i class="si si-cup"></i><span class="sidebar-mini-hide">{{$conversation->name}}</span>
                    </a>
                  </li>
                @endforeach
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
       
        <div class="content">
            <div class="block">
                {{-- <div class="block-header block-header-default">
                    <h3 class="block-title">All Orders</h3>
                    <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                        <i class="si si-pin"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                        <i class="si si-close"></i>
                    </button>
                    </div>
                </div> --}}
                  <!-- Modal -->
                
                <div class="block-content">
                  
                    @if (Session()->has('message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">??</button>	
                        <strong>{{ Session()->get('message') }}</strong>
                    </div>
                    @endif


                    
        
                    <h4 class="content-heading"></h4>

                    <div class="container mt-3">

                        <form method="POST" action="/conversation">
                            @csrf
                            <div class="row" >
                                <div class="col-4">
    
                                </div>
                                <div class="col-4">
                                    <h4>Give this conversation a name</h4>
                                    <input type="text" class="form-control" name="conversation_name" placeholder="Enter a name">
                                </div>
                                <div class="col-4 mb-5">
    
                                </div>
                            </div>
    
                            <div class="row mt-5"  >
                               <div class="col-3 mt-5"></div>
                                <div class="col-6 text-center mt-5">
                                    <h5 style="margin-top: 20px;">Select directories you want to use as context</h5>
                                </div>
                                <div class="col-3"></div>
                            </div>
    
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">Available Directory</h5>
                                            <div class="form-check">
                                            @foreach ($directories as $directory)
                                            <div class="form-check">
                                                <input class="form-check-input position-static" multiple name="name[]" type="checkbox" id="{{$directory->name}}" value="{{$directory->id}}">
                                                <label class="form-check-label" for="{{$directory->name}}">{{$directory->name}}</label>    
                                            </div>
                                            @endforeach
                                        </div>
                                            
                                        </div>
                                        </div>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row">
                                <div class="col text-center mt-5">
                                    <button type="submit" class="btn btn-primary mt-5 mb-5">New Conversation</button>
                                </div>
                            </div>
                        </form>
                     
                      
                    </div>
                    
            
                    <!-- Full Table -->

        
                </div>       <!-- END Full Table -->
            </div>
        </div>
        

        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

    </div>
    <!-- END Page Container -->

    <!-- Codebase JS -->
    <script src="/admin/assets/js/codebase.core.min.js"></script>
    <script src="/admin/assets/js/codebase.app.min.js"></script>

    <script src="/admin/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page JS Code -->
    <script src="/admin/assets/js/pages/be_tables_datatables.min.js"></script>

  </body>
</html>