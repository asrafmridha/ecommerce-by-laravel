<!DOCTYPE html>
<html class="loading
 {{ (themesetting(Auth::id()) == null) ? 'light-layout' : themesetting(Auth::id())->theme }}

" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('backend.includes.meta')

    <!-- BEGIN: Vendor CSS-->

    @include('backend.includes.css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static 
    @if(themesetting(Auth::id()) == null)
      menu-expanded
    @else
         @if(themesetting(Auth::id())->nav == 'collapsed')
            menu-collapsed
         @else
            menu-expanded
        @endif
    @endif 
" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('backend.includes.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('backend.includes.mainmenu')
    <!-- END: Main Menu-->

    
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper @yield('content-wrapper-class')">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrumb-right">

                    </div>
                </div>
            </div>
            <div class="content-body">
                {{-- Content Start From Here --}}
                    @yield('content')
                {{-- Content End Here --}}
            </div>
        </div>
    </div>

    <!-- BEGIN: Content-->
    {{-- @include('backend.includes.content') --}}
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('backend.includes.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    
    @include('backend.includes.script')
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
