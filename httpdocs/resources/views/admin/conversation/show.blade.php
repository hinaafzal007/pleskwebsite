
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

      <main id="main-container">
        <!-- Page Content -->
        <!-- Chat layout and demo functionality is initialized in js/pages/be_comp_chat.min.js which was auto compiled from _js/pages/be_comp_chat.js -->
        <!--
            You can use the following JS function to add a header message to a chat window:
            BeCompChat.addHeader(chatId, chatMsg)

            chatId         : the data-chat-id attribute of the chat window
            chatMsg        : the header message you would like to add

            You can use the following JS function to add a message to a chat window:
            BeCompChat.addMessage(chatId, chatMsg, chatMsgLevel)

            chatId         : the data-chat-id attribute of the chat window
            chatMsg        : the message you would like to add
            chatMsgLevel   : 'self' the user sends the message, '' empty if the user receives the message (changes its style)
        -->
        <div class="js-chat-container content content-full js-appear-enabled animated fadeIn" data-toggle="appear" data-chat-height="auto">
          <!-- Multiple Chat (auto height) -->
          <div class="block mb-0">
            <ul class="js-chat-head nav nav-tabs nav-tabs-alt bg-body-light js-tabs-enabled" data-toggle="tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#chat-window1">
                  <span class="ml-5">{{$conversation->name}}</span>
                </a>
              </li>
  
            </ul>
            <div class="tab-content overflow-hidden">
              <!-- Chat Window #1 -->
              <div class="tab-pane fade show active" id="chat-window1" role="tabpanel">
                <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
                <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="1" style="height: 401.516px;">
                    {{-- <div class="font-size-sm font-italic text-muted text-center mt-20 mb-10">5 hours ago</div> --}}
                    {{-- question --}}
                    @foreach($conversation_datas as $conversation_data)
                        <div class="rounded font-w600 p-10 mb-10 animated fadeIn mr-50 bg-body-light">
                            {{$conversation_data->question}}
                        </div>
                        {{-- answer --}}
                        <div class="rounded font-w600 p-10 mb-10 animated fadeIn mr-50 bg-primary-lighter text-primary-darker">
                           {{$conversation_data->answer}}
                        </div>
                    @endforeach
                </div>
                <!-- Chat Input -->
                <div class=" block-content block-content-full block-content-sm bg-body-light">
                  <form action="{{asset('/conversation_data')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-11">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-comment text-primary"></i>
                                  </span>
                                </div>
                                <input type="hidden" name="conversation_id" value="{{$conversation->id}}">
                                <input class="js-chat-input form-control" name="question" type="text" placeholder="Type your message and hit enter..">
                            </div>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-primary" type="submit"> Ask</button>
                        </div>
                    </div>
                  </form>
                </div>
                <!-- END Chat Input -->
              </div>
              <!-- END Chat Window #1 -->
            </div>
          </div>
          <!-- END Multiple Chat (auto height) -->
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
    <script src="/admin/assets/js/pages/be_comp_chat.min.js"></script>
    <!-- Page JS Code -->
    <script src="/admin/assets/js/pages/be_tables_datatables.min.js"></script>

  </body>
</html>