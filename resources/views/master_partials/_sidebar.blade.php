<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{ asset('public/assets/images/users/dummy-user.jpg') }}" alt="user-img" title="{{ Auth::user() -> name }}" class="rounded-circle img-thumbnail img-responsive">
                <div class="user-status online"><i class="mdi mdi-adjust"></i></div>
            </div>
            <h5><a href="{{ route('home') }}">{{ Auth::user() -> name }}</a> </h5>
            <ul class="list-inline">

                <li class="list-inline-item">
                    <a href="#" class="text-custom" href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" title="Logout">
                    <i class="mdi mdi-power"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="GET" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
    <!-- End User -->

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <ul>
            <li class="text-muted menu-title">Navigation</li>

            <li>
                <a href="{{ route('home') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
            </li>

             <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-texture"></i> <span> Home Page</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('admin.home-about') }}">Short About</a></li>
                    <li><a href="{{ route('admin.chairman-info') }}">Chairman's Message</a></li>
                    <li><a href="{{ route('admin.quotes.index') }}">Quotes</a></li>
                    <li><a href="{{ route('admin.advertisements.index') }}">Advertisements</a></li>
                    <li><a href="{{ route('admin.bg.index') }}">Backgrounds</a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-texture"></i> <span> CMS</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('admin.about.index') }}">About Us</a></li>
                    <li><a href="{{ route('admin.careers.index') }}">Careers</a></li>
                    <li><a href="{{ route('admin.clients.index') }}">Clients</a></li>
                    <li><a href="{{ route('admin.certificates.index') }}">Certificates</a></li>
                    <li><a href="{{ route('admin.news.index') }}">News</a></li>
                    <li><a href="{{ route('admin.offices.index') }}">Offices</a></li>
                    <li><a href="{{ route('admin.nationality.index') }}">Nationalities</a></li>
                    <li><a href="{{ route('admin.teams.index') }}">Our Team</a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-texture"></i> <span> Services</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('admin.services.index') }}">Services</a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-texture"></i> <span> Banners</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('admin.home-banners.index') }}">Home Banners</a></li>
                    <li><a href="{{ route('admin.banners.show', 'about') }}">About Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'services') }}">Services Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'projects') }}">Projects Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'careers') }}">Careers Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'inquiry') }}">Inquiry Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'contact') }}">Contact Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'clients') }}">Clients Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'teams') }}">Teams Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'certificates') }}">Certificates Banner</a></li>
                    <li><a href="{{ route('admin.banners.show', 'news') }}">New & Events Banner</a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('admin.settings.index') }}">General Site Settings</a></li>
                    <li><a href="{{ route('account.index') }}">Account Settings</a></li>
                </ul>
            </li>


        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>

</div>