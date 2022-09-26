@php 
    $layout = Auth::check() ? Auth::user()->role == 1 ? 'user' : 'admin' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Pembuat Event')

@section('content')

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-5 py-lg-10 gutter-b  subheader-transparent " id="kt_subheader"
        style="background-color: #663259; background-position: right bottom; background-size: auto 100%; background-repeat: no-repeat; background-image: url(assets/media/svg/patterns/taieri.svg)">
        <div class=" container  d-flex flex-column">
            <!--begin::Title-->
            <div class="d-flex align-items-sm-end flex-column flex-sm-row mb-5">
                <h2 class="text-white mr-5 mb-0">Cari Pembuat Event</h2>
                <span class="text-white opacity-60 font-weight-bold"> </span>
            </div>
            <!--end::Title-->

            <!--begin::Search Bar-->
            <div class="d-flex align-items-md-center mb-2 flex-column flex-md-row">
                <div class="bg-white rounded p-4 d-flex flex-grow-1 flex-sm-grow-0">
                    <!--begin::Form-->
                    <form method="GET" action="{{ url('organizer') }}"
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
                            <input type="text" class="form-control border-0 font-weight-bold pl-2" name="search" placeholder="Pembuat Event" />
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
            <h3 class="text-left">Pembuat Event</h3>
            <!--begin::Row-->
            <div class="row">
                @if($events->isEmpty())
                <div class="col-12">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body text-center">
                            <!--begin::Wrapper-->
                            --- Belum Ada Pembuat Event ---
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>
                @endif
                @foreach($events as $event)
                <!--begin::Item-->
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom my-2">
                        <!--begin::Body-->
                        <div class="card-body pt-15">
                            <!--begin::User-->
                            <div class="text-center mb-10">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label"
                                        style="background-image:url('{{ asset($event->profile->image) }}')">
                                    </div>
                                </div>

                                <h4 class="font-weight-bold my-2">
                                    <a class="text-dark" href="{{ url('profile/'.$event->profile->email) }}">{{ $event->profile->name }}</a>
                                </h4>
                                <span class="label label-light-warning label-inline font-weight-bold label-lg">
                                    {{ $event->profile->event->count() }} Event Dibuat
                                </span>
                                <div class="text-muted mb-2">
                                    {{ $event->profile->descrtiption ? $event->profile->description : '--- tidak ada deskripsi ---' }}
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="mb-10 text-center">
                                <a href="mailto:{{ $event->profile->email }}" target="_blank" class="btn btn-icon btn-circle btn-light-google">
                                    <i class="socicon-mail"></i>
                                </a>
                                @if($event->profile->whatsapp)
                                <a href="https://www.wa.me/62{{ $event->profile->whatsapp }}" target="_blank" class="btn btn-icon btn-circle btn-light-success">
                                    <i class="socicon-whatsapp"></i>
                                </a>
                                @endif
                                @if($event->profile->facebook)
                                <a href="{{ $event->profile->facebook }}" target="_blank" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                    <i class="socicon-facebook"></i>
                                </a>
                                @endif
                                @if($event->profile->instagram)
                                <a href="https://www.instagram.com/{{ $event->profile->instagram }}" target="_blank" class="btn btn-icon btn-circle btn-light-instagram mr-2">
                                    <i class="socicon-instagram"></i>
                                </a>
                                @endif
                                @if($event->profile->twitter)
                                <a href="https://www.twitter.com/{{ $event->profile->twitter }}" target="_blank" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                    <i class="socicon-twitter"></i>
                                </a>
                                @endif
                                @if($event->profile->website)
                                <a href="{{ $event->profile->website }}" target="_blank" class="btn btn-icon btn-circle btn-secondary">
                                    <i class="flaticon2-world"></i>
                                </a>
                                @endif
                            </div>
                            <!--end::Contact-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Item-->
                @endforeach
                
            </div>
            <!--end::Row-->

            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap py-2 mr-3">
                    {{ $events->links() }}
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