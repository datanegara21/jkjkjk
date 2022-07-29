@php 
    $layout = Auth::check() ? 'user' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Detail Event')

@section('content')

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid mt-15" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">

                <!--begin::Item-->
                <div class="col-12">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <!--begin::Body-->
                        <div class="card-body pt-15">
                            <!--begin::User-->
                            <div class="text-center mb-10">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label"
                                        style="background-image:url('{{ asset('assets/media/users/300_21.jpg') }}')">
                                    </div>
                                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                </div>

                                <h4 class="font-weight-bold my-2">
                                    Hummasoft
                                </h4>
                                <span class="label label-light-warning label-inline font-weight-bold label-lg">
                                    23 Event Dibuat
                                </span>
                                <div class="text-muted mb-2">
                                    Perusahaan di bidang IT yang berlokasi di Perum Permata Regency, Ngijo, Karangploso, Malang
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="mb-10 text-center">
                                <a href="#" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                    <i class="socicon-facebook"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                    <i class="socicon-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-circle btn-light-google">
                                    <i class="socicon-google"></i>
                                </a>
                            </div>
                            <!--end::Contact-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Item-->
                
            </div>

            <hr>
            <!--end::Row-->
            <div class="row">
            <h3 class="text-left col-10">Event dari Hummasoft</h3>
            <div class="btn btn-dark col-2">Tampilkan</div>
            </div>
            <!--begin::Row-->
            <div class="row">
                @for($i=0;$i<6;$i++)
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
                                        <a href="{{ url('/event/detail') }}" class="card-title font-weight-bolder text-center text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">
                                            Pelatihan Guru Kelas Industri Hummasoft
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Text-->
                                        <div class="font-weight-bold text-dark-50 font-size-sm pb-7">
                                            PT. Hummasoft Technology
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
                                    <a class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2">
                                        Lihat Event
                                    </a>
                                    <a class="btn btn-outline-light bg-dark-50 font-weight-bolder font-size-sm p-3">
                                        <i class="fas fa-heart {{ $i%4 == 1 ? 'text-danger' : '' }}"></i>
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
            <!--end::Row-->

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