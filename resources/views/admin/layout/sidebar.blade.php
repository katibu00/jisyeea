@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    $user = auth()->user();
@endphp


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

                @if (auth()->user()->user_type == 'admin')
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
                        <a href="{{ route('collections.index') }}" class=" waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Collections</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('applications.index') }}" class=" waves-effect">
                            <i class="mdi mdi-clipboard-list"></i>
                            <span>Pre-Registrations</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-account"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('users.regular.index') }}">Applicants</a></li>
                            <li><a href="{{ route('users.admin.index') }}">Admins</a></li>
                        </ul>
                    </li>
                    <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-settings"></i>
                          <span>Settings</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('pop_up_notification') }}">PopUp Notification</a></li>
                      </ul>
                  </li>
                @endif

                @if (auth()->user()->user_type == 'regular')
                <li>
                    <a href="{{ route('regular.home') }}" class=" waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>Home</span>
                    </a>
                </li>
            
                <li>
                    <a href="{{ route('pre-registration') }}" class=" waves-effect">
                        <i class="mdi mdi-account-multiple-plus"></i>
                        <span>Pre-Registration</span>
                    </a>
                </li>
            
                @php
                    $user = auth()->user();
                    $isMemberOfCollection = $user->collections()->where('status', 'active')->exists();
                    $allowAccountDetails = $user->collections()->where('status', 'active')->where('allow_account_details', true)->exists();
                @endphp
            
                @if ($isMemberOfCollection && $allowAccountDetails)
                    <li>
                        <a href="{{ route('account-details') }}" class="waves-effect">
                            <i class="mdi mdi-bank"></i>
                            <span>Account Details</span>
                        </a>
                    </li>
                @endif
            @endif
            

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
