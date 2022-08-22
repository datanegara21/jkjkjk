@php 
    $layout = Auth::check() ? 'user' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','List Event')

@section('content')

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-5 py-lg-10 gutter-b  subheader-transparent " id="kt_subheader"
        style="background-color: #663259; background-position: right bottom; background-size: auto 100%; background-repeat: no-repeat; background-image: url(assets/media/svg/patterns/taieri.svg)">
        <div class=" container  d-flex flex-column">
            <!--begin::Title-->
            <div class="d-flex align-items-sm-end flex-column flex-sm-row mb-5">
                <h2 class="text-white mr-5 mb-0">Cari Event</h2>
                <span class="text-white opacity-60 font-weight-bold">Cari event yang anda ikuti </span>
            </div>
            <!--end::Title-->

            <!--begin::Search Bar-->
            <div class="d-flex align-items-md-center mb-2 flex-column flex-md-row">
                <div class="bg-white rounded p-4 d-flex flex-grow-1 flex-sm-grow-0">
                    <!--begin::Form-->
                    <form
                        class="form d-flex align-items-md-center flex-sm-row flex-column flex-grow-1 flex-sm-grow-0">
                        <!--begin::Input-->
                        <div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <input type="text"
                                class="form-control border-0 font-weight-bold pl-2"
                                placeholder="Judul Event" />
                        </div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <span class="bullet bullet-ver h-25px d-none d-sm-flex mr-2"></span>
                        <div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7"
                                            rx="1.5" />
                                        <path
                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span> 
                            <input type="text"
                                class="form-control border-0 font-weight-bold pl-2"
                                placeholder="Kategori" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" data-target="kt_searchbar_7_category-options"
                                data-offset="0,10" readonly />
                            <div id="kt_searchbar_7_category-options"
                                class="dropdown-menu dropdown-menu-sm">
                                <div class="dropdown-item cursor-pointer">HR Management</div>
                                <div class="dropdown-item cursor-pointer">Developers</div>
                                <div class="dropdown-item cursor-pointer">Creative</div>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item cursor-pointer">Top Management</div>
                            </div>
                        </div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <span class="bullet bullet-ver h-25px d-none d-sm-flex mr-2"></span>
                        <div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Rec.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M12,16 C14.209139,16 16,14.209139 16,12 C16,9.790861 14.209139,8 12,8 C9.790861,8 8,9.790861 8,12 C8,14.209139 9.790861,16 12,16 Z M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span> 
                            <input id="kt_subheader_7_location" type="text"
                                class="form-control border-0 font-weight-bold pl-2"
                                placeholder="Lokasi" data-toggle="modal" aria-haspopup="true"
                                aria-expanded="false" data-target="#subheader7Modal" readonly />
                        </div>
                        <!--end::Input-->
                        <button type="submit"
                            class="btn btn-dark font-weight-bold btn-hover-light-primary mt-3 mt-sm-0 px-7">Cari</button>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Search Bar-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Modal-->
    <div class="modal fade" id="subheader7Modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="kt_subheader_leaflet" style="height:450px; width: 100%;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Cancel</button>
                    <button id="submit" type="button" class="btn btn-primary font-weight-bold"
                        data-dismiss="modal">Apply</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Dashboard-->
            <h3 class="text-left">Event yang Diikuti</h3>
            <!--begin::Row-->
            <div class="row">
                @for($i=0; $i<=8; $i++)
                <div class="col-xl-4">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Wrapper-->
                            <div class="d-flex justify-content-between flex-column h-100">
                                <!--begin::Container-->
                                <div class="h-100">
                                    <!--begin::Header-->
                                    <div class="d-flex flex-column flex-center">
                                        <!--begin::Image-->
                                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100"
                                            style="background-image: url({{ asset('assets/media/stock-600x400/img-72.jpg') }})">
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Title-->
                                        <a href="#" class="card-title font-weight-bolder text-center text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">
                                            Pelatihan Guru Kelas Industri Hummasoft
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Text-->
                                        <div class="font-weight-bold text-dark-50 font-size-sm pb-7">
                                            Hummasoft Technology
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="pt-1">
                                        {{-- begin::Item --}}
                                        <div class="py-9">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                
                                                <span class="font-weight-bold mr-1"><i class="far fa-calendar-alt mr-1"></i>Waktu:</span>
                                                <span class="text-muted text-right">Min, 24 Jul 22 10:00 WIB</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="font-weight-bold "><i class="fas fa-map-marker-alt mr-1"></i>Lokasi:</span>
                                                <span class="text-muted text-right">Perum Permata Regency, Ngijo</span>
                                            </div>
                                        </div>
                                        {{-- end::Item --}}
                                        
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--eng::Container-->

                                <!--begin::Footer-->
                                <div class="d-flex flex-center">
                                    <a href="{{ url('/event/detail') }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2">
                                        Lihat Event
                                    </a>
                                </div>
                                <!--end::Footer-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>
                @endfor
                
            </div>
            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap py-2 mr-3">
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
            
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">23</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">24</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">25</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">26</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">27</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">28</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
            
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a>
                </div>
                <div class="d-flex align-items-center py-3">

                    <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-muted">Displaying 10 of 230 records</span>
                </div>
            </div>
            <!--begin::Pagination-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@endsection

@push('style')

@push('script')

@endpush