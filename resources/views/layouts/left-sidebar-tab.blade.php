<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a class="logo logo-metrica d-block text-center">
            <span>
                <img src="{{URL::asset('assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <div class="main-icon-menu-body">
            <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
                <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" data-bs-trigger="hover">
                        <a href="#MetricaDashboard" id="dashboard-tab" class="nav-link">
                            <i class="ti ti-smart-home menu-icon"></i>
                        </a><!--end nav-link-->
                    </li><!--end nav-item-->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Apps" data-bs-trigger="hover">
                        <a href="#MetricaApps" id="apps-tab" class="nav-link">
                            <i class="ti ti-apps menu-icon"></i>
                        </a><!--end nav-link-->
                    </li><!--end nav-item-->
                </ul><!--end nav-->
            </div><!--end /div-->
        </div><!--end main-icon-menu-body-->
        <div class="pro-metrica-end">
            <a href="" class="profile">
                <img src="{{URL::asset('assets/images/users/user-4.jpg')}}" alt="profile-user" class="rounded-circle thumb-sm">
            </a>
        </div><!--end pro-metrica-end-->
    </div>
    <!--end main-icon-menu-->

    <div class="main-menu-inner">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="#" class="logo">
                <span>
                    <img src="{{URL::asset('assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark">
                    <img src="{{URL::asset('assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light">
                </span>
            </a><!--end logo-->
        </div><!--end topbar-left-->
        <!--end logo-->
        <div class="menu-body navbar-vertical tab-content" data-simplebar>
            <div id="MetricaDashboard" class="main-icon-menu-pane tab-pane" role="tabpanel"
                aria-labelledby="dasboard-tab">
                <div class="title-box">
                    <h6 class="menu-title">Dashboard</h6>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="crm-index">CRM</a>
                    </li><!--end nav-item-->
                   
                </ul><!--end nav-->
            </div><!-- end Dashboards -->

            <div id="MetricaApps" class="main-icon-menu-pane tab-pane" role="tabpanel"
                aria-labelledby="apps-tab">
                <div class="title-box">
                    <h6 class="menu-title">Apps</h6>
                </div>

                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarCRM" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarCRM">
                                CRM
                            </a>
                            <div class="collapse " id="sidebarCRM">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="crm-contacts">Contacts</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="crm-opportunities">Opportunities</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="crm-leads">Leads</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="crm-customers">Customers</a>
                                    </li><!--end nav-item--> 
                                </ul><!--end nav-->
                            </div><!--end sidebarCRM-->
                        </li><!--end nav-item-->

            </div><!-- end Authentication-->
        </div>
        <!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>