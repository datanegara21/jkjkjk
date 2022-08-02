<div id="kt_header" class="header bg-white  header-fixed ">
    <!--begin::Container-->
    <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
        <!--begin::Left-->
        <div class="d-flex align-items-stretch mr-2">
            <!--begin::Page Title-->
            <h3 class="d-none text-dark d-lg-flex align-items-center mr-10 mb-0">
                @yield('title')</h3>
            <!--end::Page Title-->

            
        </div>
        <!--end::Left-->

        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Wishlist-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item mr-3" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg pulse pulse-primary">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo4\dist/../src/media/svg/icons\General\Heart.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div
                    class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url({{ asset('assets/media/misc/bg-1.jpg') }})">
                            <!--begin::Title-->
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">User Notifications</span>
                                <span
                                    class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23
                                    new</span>
                            </h4>
                            <!--end::Title-->

                            <!--begin::Tabs-->
                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                role="tablist">
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            <div class="tab-pane active show" id="topbar_notifications_events" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4" data-scroll="true"
                                    data-height="300" data-mobile-height="200">
                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-line-chart text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New report has been received
                                                </div>
                                                <div class="text-muted">
                                                    23 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-paper-plane text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Finance report has been generated
                                                </div>
                                                <div class="text-muted">
                                                    25 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i
                                                    class="flaticon2-user flaticon2-line- text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New order has been received
                                                </div>
                                                <div class="text-muted">
                                                    2 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-pin text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer is registered
                                                </div>
                                                <div class="text-muted">
                                                    3 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-sms text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Application has been approved
                                                </div>
                                                <div class="text-muted">
                                                    3 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-pie-chart-3 text-warning"></i>
                                            </div>
                                            <div class="navinavinavi-text">
                                                <div class="font-weight-bold">
                                                    New file has been uploaded
                                                </div>
                                                <div class="text-muted">
                                                    5 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-pie-chart-1 text-info"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New user feedback received
                                                </div>
                                                <div class="text-muted">
                                                    8 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-settings text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    System reboot has been successfully completed
                                                </div>
                                                <div class="text-muted">
                                                    12 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i
                                                    class="flaticon-safe-shield-protection text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New order has been placed
                                                </div>
                                                <div class="text-muted">
                                                    15 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-notification text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Company meeting canceled
                                                </div>
                                                <div class="text-muted">
                                                    19 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-fax text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New report has been received
                                                </div>
                                                <div class="text-muted">
                                                    23 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-download-1 text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Finance report has been generated
                                                </div>
                                                <div class="text-muted">
                                                    25 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-security text-warning"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer comment recieved
                                                </div>
                                                <div class="text-muted">
                                                    2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-analytics-1 text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer is registered
                                                </div>
                                                <div class="text-muted">
                                                    3 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Wishlist-->
            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item mr-3" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg pulse pulse-primary">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo4\dist/../src/media/svg/icons\General\Notifications1.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div
                    class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url({{ asset('assets/media/misc/bg-1.jpg') }})">
                            <!--begin::Title-->
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">User Notifications</span>
                                <span
                                    class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23
                                    new</span>
                            </h4>
                            <!--end::Title-->

                            <!--begin::Tabs-->
                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                role="tablist">
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            <div class="tab-pane active show" id="topbar_notifications_events" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4" data-scroll="true"
                                    data-height="300" data-mobile-height="200">
                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-line-chart text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New report has been received
                                                </div>
                                                <div class="text-muted">
                                                    23 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-paper-plane text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Finance report has been generated
                                                </div>
                                                <div class="text-muted">
                                                    25 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i
                                                    class="flaticon2-user flaticon2-line- text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New order has been received
                                                </div>
                                                <div class="text-muted">
                                                    2 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-pin text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer is registered
                                                </div>
                                                <div class="text-muted">
                                                    3 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-sms text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Application has been approved
                                                </div>
                                                <div class="text-muted">
                                                    3 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-pie-chart-3 text-warning"></i>
                                            </div>
                                            <div class="navinavinavi-text">
                                                <div class="font-weight-bold">
                                                    New file has been uploaded
                                                </div>
                                                <div class="text-muted">
                                                    5 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-pie-chart-1 text-info"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New user feedback received
                                                </div>
                                                <div class="text-muted">
                                                    8 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-settings text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    System reboot has been successfully completed
                                                </div>
                                                <div class="text-muted">
                                                    12 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i
                                                    class="flaticon-safe-shield-protection text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New order has been placed
                                                </div>
                                                <div class="text-muted">
                                                    15 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-notification text-primary"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Company meeting canceled
                                                </div>
                                                <div class="text-muted">
                                                    19 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-fax text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New report has been received
                                                </div>
                                                <div class="text-muted">
                                                    23 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-download-1 text-danger"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    Finance report has been generated
                                                </div>
                                                <div class="text-muted">
                                                    25 hrs ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon-security text-warning"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer comment recieved
                                                </div>
                                                <div class="text-muted">
                                                    2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="flaticon2-analytics-1 text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">
                                                    New customer is registered
                                                </div>
                                                <div class="text-muted">
                                                    3 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Notifications-->

            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2"
                    id="kt_quick_user_toggle">
                    <span class="symbol symbol-35 symbol-light-primary">
                        <span class="symbol-label font-size-h5 font-weight-bold">{{ substr(Auth::user()->name,0,1) }}</span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>