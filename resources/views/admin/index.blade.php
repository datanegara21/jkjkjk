@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <div class="mt-10 content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid ">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                        <!--begin::Mixed Widget 1-->
                        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 bg-danger py-5">
                                <h3 class="card-title font-weight-bolder text-white">Data Website</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body p-0 position-relative overflow-hidden">
                                <!--begin::Chart-->
                                <div class="card-rounded-bottom bg-danger"
                                    style="height: 60px; min-height: 60px;">

                                </div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer mt-n25">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-warning px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <i class="fas fa-users icon-xxl text-warning"></i>
                                                </span> <a href="#" class="text-warning font-weight-bold font-size-h6">
                                                    {{ $user }} Pengguna
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-primary px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                                    <i class="fas fa-calendar-alt icon-xxl text-primary"></i>
                                                </span> <a href="#"
                                                    class="text-primary font-weight-bold font-size-h6 mt-2">
                                                    {{ $event }} event
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-danger px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                    <i class="fas fa-list icon-xxl text-danger"></i>
                                                </span> <a href="#"
                                                    class="text-danger font-weight-bold font-size-h6 mt-2">
                                                    {{ $category }} Kategori
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-success px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                    <i class="fas fa-file-invoice icon-xxl text-success"></i>
                                                </span> <a href="#"
                                                    class="text-success font-weight-bold font-size-h6 mt-2">
                                                    {{ $template }} Template
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 534px; height: 448px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 1-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div
                                    class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol  symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            opacity="0.3" />
                                                        <path
                                                            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h3">+259</span>
                                        <span class="text-muted font-weight-bold mt-2">Data Pendaftaran Pengguna</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom"
                                    data-color="info" style="height: 150px"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <!--begin::Stats Widget 11-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div
                                    class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol  symbol-50 symbol-light-success mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-success">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="4" y="4" width="7"
                                                            height="7" rx="1.5" />
                                                        <path
                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h3">+750</span>
                                        <span class="text-muted font-weight-bold mt-2">Data Pembuatan Event</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_11_chart" class="card-rounded-bottom"
                                    data-color="success" style="height: 150px"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 11-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <!--begin::Advance Table Widget 4-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Pengguna Terbaru</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Pengguna yang mendaftar baru ini</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-0 pb-3">
                                <div class="tab-content">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table
                                            class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                            <thead>
                                                <tr class="text-left text-uppercase">
                                                    <th style="width: 50px"></th>
                                                    <th style="min-width: 100px" class="pl-7"><span>Nama</span></th>
                                                    <th class="text-center" style="min-width: 100px">Tanggal Daftar</th>
                                                    <th class="text-center" style="min-width: 100px">Waktu Daftar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($penggunas as $pengguna)
                                                    <tr>
                                                        <td class="pl-0 py-8">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-50 symbol-light mr-4">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset($pengguna->image) }}"
                                                                            class="h-100 align-self-end" alt="">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$pengguna->name}}</a>
                                                                <span class="text-muted font-weight-bold d-block">{{ $pengguna->email }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted text-center font-weight-bolder d-block font-size-lg">
                                                                {{ $carbon::parse( $pengguna->created_at )->isoFormat('DD MMMM Y') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted text-center font-weight-bolder d-block font-size-lg">
                                                                {{ $carbon::parse($pengguna->created_at)->isoFormat('HH:mm') }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>

                                        @if($penggunas->isEmpty())
                                        <div class="text-center font-weight-bolder text-muted">
                                            --- belum ada pengguna ---
                                        </div>
                                        @endif
                                    </div>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 4-->
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <!--begin::Advance Table Widget 2-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Event Terbaru</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Event yang baru-baru ini dibuat</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-3 pb-0">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead >
                                            <tr class="text-uppercase">
                                                <th class="" style="width: 50px"></th>
                                                <th class=" text-center" style="min-width: 200px">Event</th>
                                                <th class=" text-center" style="min-width: 145px">Tanggal Dibuat</th>
                                                <th class=" text-center" style="min-width: 125px">Waktu Dibuat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach($acaras as $acara)
                                            @php $i++ @endphp
                                            <tr>
                                                <td class="pl-0 py-4">
                                                    <div class="symbol symbol-50 symbol-light-primary mr-1">
                                                        <span class="symbol-label">
                                                              {{ $i }}  
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                        {{ $acara->title }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bolder d-block font-size-lg">
                                                        {{ $carbon::parse( $acara->created_at )->isoFormat('DD MMMM Y') }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bolder">
                                                        {{ $carbon::parse( $acara->created_at )->isoFormat('HH:mm') }}
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @if($acaras->isEmpty())
                                    <div class="text-center font-weight-bolder text-muted">
                                        --- belum ada event ---
                                    </div>
                                    @endif
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 2-->
                    </div>
                </div>
                <!--end::Row-->
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@push('style')

@push('script')
    <script src="{{ asset('assets/js/pages/widgets.js?v=7.0.6') }}"></script>
@endpush
