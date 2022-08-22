<div class="aside aside-left d-flex flex-column " id="kt_aside">
    <!--begin::Brand-->
    <div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-4 py-lg-8">
        <!--begin::Logo-->
        <a href="{{ url('/') }}">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-letter-9.png') }}" class="max-h-30px" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->

    <!--begin::Nav Wrapper-->
    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pt-7">
        <!--begin::Nav-->
        <ul class="nav flex-column">
            <!--begin::Item-->
            <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Dashboard">
                <a href="{{ url('admin') }}" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg {{ Route::is('home') ? 'active' : ''}}">
                    <i class="flaticon2-protection icon-lg"></i>
                </a>
            </li>
            <!--end::Item-->

            <!--begin::Item-->
            <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Template">
                <a href="{{ url('admin/template') }}" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg {{ Route::is('template') ? 'active' : ''}}">
                    <i class="flaticon2-list-3 icon-lg"></i>
                </a>
            </li>
            <!--end::Item-->
            
            <!--begin::Item-->
            <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Daftar Pengguna">
                <a href="{{ url('admin/user') }}" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg {{ Route::is('user') ? 'active' : ''}}">
                    <i class="flaticon2-user-outline-symbol"></i>
                </a>
            </li>
            <!--end::Item-->

            
        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Nav Wrapper-->

</div>