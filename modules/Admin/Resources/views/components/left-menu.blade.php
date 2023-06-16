<?php
?>
<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="{{ route("admin.view.dashboard") }}" class="logo logo-metrica d-block text-center">
            <span>
                <img src="{{ asset('modules/admin/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <div class="main-icon-menu-body">
            <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
                <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" data-bs-trigger="hover">
                        <a href="#WDirectDashboard" id="dashboard-tab" class="nav-link">
                            <i class="ti ti-smart-home menu-icon"></i>
                        </a><!--end nav-link-->
                    </li><!--end nav-item-->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Apps" data-bs-trigger="hover">
                        <a href="#WDirectApps" id="apps-tab" class="nav-link">
                            <i class="ti ti-apps menu-icon"></i>
                        </a><!--end nav-link-->
                    </li><!--end nav-item-->

                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Uikit" data-bs-trigger="hover">
                        <a href="#WDirectUikit" id="uikit-tab" class="nav-link">
                            <i class="ti ti-planet menu-icon"></i>
                        </a><!--end nav-link-->
                    </li><!--end nav-item-->

                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Pages" data-bs-trigger="hover">
                        <a href="#WDirectPages" id="pages-tab" class="nav-link">
                            <i class="ti ti-files menu-icon"></i>
                        </a><!--end nav-link-->
                    </li><!--end nav-item-->
                </ul><!--end nav-->
            </div><!--end /div-->
        </div><!--end main-icon-menu-body-->
        <div class="pro-WDirect-end">
            <a href class="profile">
                <img src="{{ asset('modules/admin/images/user-4.jpg') }}" alt="profile-user" class="rounded-circle thumb-sm">
            </a>
        </div><!--end pro-WDirect-end-->
    </div>
    <!--end main-icon-menu-->

    <div class="main-menu-inner">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route("admin.view.dashboard") }}" class="logo">
                <span>
                    <img src="{{ asset('modules/admin/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                    <img src="{{ asset('modules/admin/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                </span>
            </a><!--end logo-->
        </div><!--end topbar-left-->
        <!--end logo-->
        <div class="menu-body navbar-vertical tab-content" data-simplebar>
            <div id="WDirectDashboard" class="main-icon-menu-pane tab-pane" role="tabpanel" aria-labelledby="dasboard-tab">
                <div class="title-box">
                    <h6 class="menu-title">{{ trans("admin::messages.admin.view.dashboard") }}</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("admin.view.dashboard") }}">
                            {{ trans("admin::messages.admin.view.dashboard.all") }}
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("admin.view.dashboard.google-analytics") }}">
                            {{ trans("admin::messages.admin.view.dashboard.google-analytics") }}
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("admin.view.dashboard.google-adwords") }}">
                            {{ trans("admin::messages.admin.view.dashboard.google-adwords") }}
                        </a>
                    </li><!--end nav-item-->
                </ul><!--end nav-->
            </div><!-- end Dashboards -->

            <div id="WDirectApps" class="main-icon-menu-pane tab-pane" role="tabpanel" aria-labelledby="apps-tab">
                <div class="title-box">
                    <h6 class="menu-title">Apps</h6>
                </div>

                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAnalytics">
                               Google Analytics
                            </a>
                            <div class="collapse " id="sidebarAnalytics">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.view.apps.google-analytics-websites') }}" class="nav-link ">Websites</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a href="{{ route('admin.view.apps.google-analytics-reports') }}" class="nav-link ">Reports</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end sidebarAnalytics-->
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAdwords" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdwords">
                                Google Adwords
                            </a>
                            <div class="collapse " id="sidebarAdwords">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.view.app.google-adwords-campaigns') }}">Campaigns</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.view.app.google-adwords-reports') }}">Reports</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end sidebarAdwords-->
                        </li><!--end nav-item-->
                    </ul>
                </div><!--end sidebarCollapse-->
            </div><!-- end Crypto -->
        </div>
        <!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>
