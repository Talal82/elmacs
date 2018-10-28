
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ route('home') }}" class="logo"><span>{{ config('app.name') }}</span><i class="mdi mdi-layers"></i></a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">

            <!-- Page title -->
            <ul class="nav navbar-nav list-inline navbar-left" style="width: 100%;">
                <li class="list-inline-item">
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <li class="list-inline-item"">
                    <h4 class="page-title" style="display: inline;">@yield('page-title')</h4>

                    
                    <!--breadcrumbs-->
                    <ol class="breadcrumb pull-right m-t-15">
                        @foreach($breadCrumb as $crumb)
                            @if( $crumb['link'] != '')
                                <li class="breadcrumb-item"><a href="{{ $crumb['link'] }}">{{ $crumb['text'] }}</a></li>
                            @else
                                <li class="breadcrumb-item active">{{ $crumb['text'] }}</li>
                            @endif
                        @endforeach
                    </ol>

                </li>
            </ul>
        </div><!-- end container -->
    </div><!-- end navbar -->
</div><!-- Top Bar End