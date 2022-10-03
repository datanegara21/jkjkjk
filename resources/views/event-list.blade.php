@php 
    $layout = Auth::check() ? Auth::user()->role == 1 ? 'user' : 'admin' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Daftar Event')

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
                <span class="text-white opacity-60 font-weight-bold">Cari event sesuka anda </span>
            </div>
            <!--end::Title-->

            <!--begin::Search Bar-->
            <div class="d-flex align-items-md-center mb-2 flex-column flex-md-row">
                <div class="bg-white rounded p-4 d-flex flex-grow-1 flex-sm-grow-0">
                    <!--begin::Form-->
                    <form method="GET" action="{{ url('event') }}"
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
                            <input type="text" class="form-control border-0 font-weight-bold pl-2" name="search" placeholder="Judul Event" />
                        </div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <span class="bullet bullet-ver h-25px d-none d-sm-flex mr-2"></span>
                        <div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <input type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Kategori" name="category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="kt_searchbar_7_category-options" data-offset="0,10" readonly="">
                            <div id="kt_searchbar_7_category-options" class="dropdown-menu dropdown-menu-sm">
                                @foreach ($categories as $category)
                                <div class="dropdown-item cursor-pointer">{{ $category->name }}</div>
                                @endforeach
                            </div>
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

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Dashboard-->
            <h3 class="text-left">Event Terbaru</h3>
            <!--begin::Row-->
            <div class="row">
                @if($events->isEmpty())
                <div class="col-12">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body text-center">
                            <!--begin::Wrapper-->
                            --- Belum Ada Event yang Sedang Berjalan ---
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>
                @endif
                @foreach($events as $event)
                <div class="col-sm-12 col-md-6 col-xl-4">
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
                                            style="background-image: url({{ $event->image ? asset($event->image) : asset($event->event_template->event_category->image) }})">
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Title-->
                                        <a href="{{ url('event/'.$event->id) }}" class="card-title font-weight-bolder text-center text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">
                                            {{ $event->title }}
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Text-->
                                        <a href="{{ url('profile/'.$event->profile->email) }}" class="font-weight-bold text-dark-50 font-size-sm pb-7">
                                            {{ $event->profile->name }}
                                        </a>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="pt-1">
                                        {{-- begin::Item --}}
                                        <div class="py-9">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                
                                                <span class="font-weight-bold mr-1"><i class="far fa-calendar-alt mr-1"></i>Waktu:</span>
                                                <span class="text-muted text-right">{{ $event->date }}</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="font-weight-bold "><i class="fas fa-map-marker-alt mr-1"></i>Lokasi:</span>
                                                <span class="text-muted text-right">{{ $event->location }}</span>
                                            </div>
                                        </div>
                                        {{-- end::Item --}}
                                        
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--eng::Container-->

                                <!--begin::Footer-->
                                <div class="d-flex flex-center">
                                    <a href="{{ url('event/'.$event->id) }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2">
                                        Lihat Event
                                    </a>
                                    <a href="{{ url('event/like/'.$event->id) }}" class="btn btn-outline-light bg-dark-50 font-weight-bolder font-size-sm p-3">
                                        <i class="fas fa-heart {{ \App\Http\Controllers\EventController::checkLiked($event->id) ? 'text-danger' : '' }}"></i>
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
                @endforeach
                
            </div>
            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap py-2 mr-3">
                    {!! $events->links() !!}
                </div>
                <div class="d-flex align-items-center py-3">
                    <span class="text-muted">Menampilkan {{ $events->lastItem() }} dari {{ $events->total() }} data</span>
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