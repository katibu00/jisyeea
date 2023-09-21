@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
$user = auth()->user();
@endphp




  {{-- <div class="content-side content-side-full">
    <ul class="nav-main">

      <li class="nav-main-item">
        <a class="nav-main-link  {{ $route == 'admin.home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
          <i class="nav-main-link-icon fa fa-house-user"></i>
          <span class="nav-main-link-name">Home</span>
        </a>
      </li>

      <li class="nav-main-item  {{ $prefix == '/blogs' ? 'open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
          <i class="nav-main-link-icon fa fa-cog"></i>
          <span class="nav-main-link-name">News & Articles</span>
        </a>
        <ul class="nav-main-submenu">
         
          <li class="nav-main-item">
            <a class="nav-main-link  {{ $route == 'blogs.index' ? 'active' : '' }}" href="{{ route('blogs.index') }}">
              <span class="nav-main-link-name">Blog</span>
            </a>
          </li>
          
        
        </ul>
      </li>
    
    </ul>
  </div> --}}


  <div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="/default.png" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-reset fw-medium font-size-16">{{ $user->name }}</a>
                <p class="text-muted mt-1 mb-0 font-size-13">{{ $user->user_type }}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                @if(auth()->user()->user_type == 'admin')

                <li>
                  <a href="{{ route('admin.home') }}" class=" waves-effect">
                      <i class="mdi mdi-home"></i>
                      <span>Home</span>
                  </a>
              </li>
                <li>
                  <a href="{{ route('blogs.index') }}" class=" waves-effect">
                      <i class="mdi mdi-newspaper"></i>
                      <span>Blog</span>
                  </a>
              </li>
              <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-code-tags"></i>
                    <span>Programs</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('programs.index') }}">Programs</a></li>
                    <li><a href="{{ route('programs.categories.index') }}">Categories</a></li>
                </ul>
            </li>
                <li>
                  <a href="{{ route('users.regular.index') }}" class=" waves-effect">
                    <i class="mdi mdi-account"></i>
                    <span>Users</span>
                  </a>
              </li>
              @endif

              @if(auth()->user()->user_type == 'regular')

              <li>
                <a href="{{ route('regular.home') }}" class=" waves-effect">
                    <i class="mdi mdi-home"></i>
                    <span>Home</span>
                </a>
            </li>

              <li>
                <a href="{{ route('apply') }}" class=" waves-effect">
                  <i class="mdi mdi-pen"></i>
                  <span>Register Yourself</span>
                </a>
            </li>
              <li>
                <a href="{{ route('application.lists') }}" class=" waves-effect">
                  <i class="mdi mdi-clipboard-list"></i>
                  <span>My Registration</span>
                </a>
            </li>
              @endif



              

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>