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

                <div class="col-12">
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
                                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-350px w-100"
                                            style="background-image: url({{ asset('assets/media/stock-600x400/img-72.jpg') }})">
                                        </div>
                                        <!--end::Image-->
                                        <div class="row mt-10 container mx-0 px-0">
                                            <div class="col-8 px-0 text-center">
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
                                            <div class="col-2"></div>
                                            <div class="col-2 px-0 ">
                                                <div class="d-flex flex-center ml-auto pl-auto">
                                                    <a class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2">
                                                        Daftar
                                                    </a>
                                                    <a class="btn btn-outline-light bg-dark-50 font-weight-bolder font-size-sm">
                                                        <i class="fas fa-heart text-danger"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="pt-1 row">
                                        {{-- begin::Item --}}
                                        <div class="col-8">
                                            <div class="container">
                                                <div class="font-size-h4 font-weight-bold mb-3">Tentang event dan informasi tambahan</div>
                                                <div class="font-size-h6">
                                                    Event ini diselenggarakan oleh PT. Hummasoft Technology, yang berlokasi di Ngijo, Karangploso, Kab. Malang. Acara ini bertujuan untuk melatih guru-guru yang akan menjadi bagian dari pengajar di kelas industri Hummasoft. Para guru tidak perlu memikirkan tentang penginapan karena akan disediakan penginapan untuk beberapa hari secara gratis.
                                                </div>
                                            </div>
                                            <div class="container mt-5">
                                                <div class="font-size-h5 font-weight-bold mb-3">tags</div>
                                                @for($i=1;$i<6;$i++)
                                                <div class="font-size-h6 btn btn-outline-dark mx-3">
                                                    tags {{ $i }}
                                                </div>
                                                @endfor
                                            </div>
                                        </div>  
                                        {{-- end::Item --}}
                                        {{-- begin::Item --}}
                                        <div class=" col-4">
                                            <div class="mx-5 my-5">
                                                
                                                <div class="font-weight-bold mr-1"><i class="far fa-calendar-alt mr-1"></i>Waktu:</div>
                                                <div class="text-muted text-right">Min, 24 Jul 22 10:00 WIB -</div>
                                                <div class="text-muted text-right">Min, 24 Jul 22 10:00 WIB</div>
                                            </div>
                                            <div class="mx-5 my-5">
                                                <div class="font-weight-bold "><i class="fas fa-map-marker-alt mr-1"></i>Lokasi:</div>
                                                <div class="text-muted text-right">Perum Permata Regency, Ngijo, Karangploso, Kab. Malang, Jawa Timur</div>
                                            </div>
                                        </div>
                                        {{-- end::Item --}}
                                        
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--eng::Container-->

                                <!--begin::Footer-->
                                
                                <!--end::Footer-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>
                
            </div>

            <hr>
            <!--end::Row-->
            <h3 class="text-left mt-7 mb-5">Tentang Pembuat Event</h3>
            <!--begin::Row-->
            <div class="row">
                <div class="col-12 row bg-white rounded">
                    <!--begin::Item-->
                    <div class="col-4 border-right border-secondary">
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
                    <!--begin::Item-->
                    <div class="col-8">
                        <!--begin::List Widget 17-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Event lain dari Hummasoft</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">3 akan diselenggarakan</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::Container-->
                                <div>
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-8">
                                        <!--begin::Symbol-->
                                        <div class="symbol mr-5 pt-1">
                                            <div class="symbol-label min-w-120px min-h-75px"
                                                style="background-image: url('{{ asset('assets/media/books/4.png') }}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Title-->
                                            <a href="{{ url('/event/detail') }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                                Perjalanan ke Barat Demi Mencari Kitab Suci
                                            </a>
                                            <!--end::Title-->

                                            <!--begin::Text-->
                                            <span class="text-muted font-weight-bold font-size-sm">
                                                Min, 21 Agu 22 - 10:00 | Malang
                                            </span>
                                            <!--end::Text-->

                                            <!--begin::Action-->
                                            <div>
                                                <a href="{{ url('/event/detail') }}" class="btn btn-primary font-weight-bolder font-size-sm py-2">
                                                    Lihat Event
                                                </a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-8">
                                        <!--begin::Symbol-->
                                        <div class="symbol mr-5 pt-1">
                                            <div class="symbol-label min-w-120px min-h-75px"
                                                style="background-image: url('{{ asset('assets/media/books/12.png') }}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Title-->
                                            <a href="{{ url('/event/detail') }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                                Tahlil Memperingati Setahun Berdirinya "Tok Dalang Homestay"
                                            </a>
                                            <!--end::Title-->

                                            <!--begin::Text-->
                                            <span class="text-muted font-weight-bold font-size-sm">
                                                Min, 21 Agu 22 - 10:00 | Malang
                                            </span>
                                            <!--end::Text-->

                                            <!--begin::Action-->
                                            <div>
                                                <a href="{{ url('/event/detail') }}" class="btn btn-primary font-weight-bolder font-size-sm py-2">
                                                    Lihat Event
                                                </a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol mr-5 pt-1">
                                            <div class="symbol-label min-w-120px min-h-75px"
                                                style="background-image: url('{{ asset('assets/media/books/1.png') }}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Title-->
                                            <a href="{{ url('/event/detail') }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                                Debat dengan Tema "Siapakah Dalang dari Hilangnya Munir?"
                                            </a>
                                            <!--end::Title-->

                                            <!--begin::Text-->
                                            <span class="text-muted font-weight-bold font-size-sm">
                                                Min, 21 Agu 22 - 10:00 | Malang
                                            </span>
                                            <!--end::Text-->

                                            <!--begin::Action-->
                                            <div>
                                                <a href="{{ url('/event/detail') }}" class="btn btn-primary font-weight-bolder font-size-sm py-2">
                                                    Lihat Event
                                                </a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 17-->
                    </div>
                    <!--end::Item-->
                </div>
                
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