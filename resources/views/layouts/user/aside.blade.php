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
                data-boundary="window" title="Home">
                <a href="{{ url('/') }}" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg active">
                    <i class="flaticon-home-2 icon-lg"></i>
                </a>
            </li>
            <!--end::Item-->

            <!--begin::Item-->
            <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Daftar Event">
                <a href="{{ url('/event') }}" class="nav-link btn btn-icon btn-icon-white btn-lg">
                    <i class="flaticon2-list-3 icon-lg"></i>
                </a>
            </li>
            <!--end::Item-->

            <!--begin::Item-->
            <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Daftar Pembuat Event">
                <a href="{{ url('/organizer') }}" class="nav-link btn btn-icon btn-icon-white btn-lg">
                    <i class="flaticon2-calendar-3 icon-lg"></i>
                </a>
            </li>
            <!--end::Item-->

            <!--begin::Item-->
            <li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Event Diikuti">
                <a href="{{ url('/event/join') }}" class="nav-link btn btn-icon btn-icon-white btn-lg">
                    <i class="flaticon2-notepad icon-lg"></i>
                </a>
            </li>
            <!--end::Item-->

        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Nav Wrapper-->

</div>