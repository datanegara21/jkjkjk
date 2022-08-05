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
            

            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                    <div class="d-flex flex-column text-right">
                        <a href="{{ url('/login') }}" class="btn btn-pill btn-primary font-weight-bold opacity-90 px-5 py-3 m-1">
                            Login
                        </a>
                    </div>
                    <div class="d-flex flex-column text-right pr-3">
                        <a href="{{ url('/register') }}" class="btn btn-pill btn-outline-primary font-weight-bold opacity-90  py-3 m-1">
                            Sign Up
                        </a>
                    </div>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>