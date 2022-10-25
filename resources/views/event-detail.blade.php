@php 
    $layout = Auth::check() ? Auth::user()->role == 1 ? 'user' : 'admin' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Detail Event')

@section('content')

@inject('carbon', 'Carbon\Carbon')

{{-- begin::modal free --}}
<div class="modal fade" id="eventFreeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('event/'.$event->id) }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar {{ $event->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    Apakah anda yakin ingin daftar / mengikuti event ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Yakin!</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end::modal free --}}

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid mt-10" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid ">
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
                                            style="background-image: url({{ $event->image ? asset($event->image) : asset($event->event_template->event_category->image) }})">
                                        </div>
                                        <!--end::Image-->
                                        <div class="row mt-10 container mx-0 px-0">
                                            <div class="col-8 px-0 text-center">
                                                <!--begin::Title-->
                                                <div class="card-title font-weight-bolder text-center text-dark-75 font-size-h4 m-0">
                                                    {{ $event->title }}
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Text-->
                                                <a href="{{ url('profile/'.$event->profile->email) }}" class="d-block font-weight-bold text-dark-50 font-size-sm">
                                                    {{ $event->profile->name }}
                                                </a>
                                                <!--end::Text-->
                                            </div>
                                            <div class="col-2"></div>
                                            <div class="col-2 px-0 ">
                                                <div class="d-flex justify-content-end ml-auto pl-auto">
                                                    @if(!Auth::check())
                                                    <form action="{{ url('event/'.$event->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2">Daftar</button>
                                                    </form>
                                                    @elseif(\App\Http\Controllers\EventController::checkMaker($event->id))
                                                    <a href="{{ url('event/edit/'.$event->id) }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2">
                                                        Edit Event
                                                    </a>
                                                    @elseif( $event->end > now() && !\App\Http\Controllers\EventController::isJoined($event->id))
                                                        @if( $event->price == 0 )
                                                        <a class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2" data-toggle="modal" data-target="#eventFreeModal">
                                                            Daftar
                                                        </a>
                                                        @else
                                                        <button type="button" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2" id="pay-button">
                                                            Daftar
                                                        </button>
                                                        @endif
                                                    @endif
                                                    <a href="{{ url('event/like/'.$event->id) }}" class="btn btn-outline-light bg-dark-50 font-weight-bolder font-size-sm">
                                                        <i class="fas fa-heart {{ \App\Http\Controllers\EventController::checkLiked($event->id) ? 'text-danger' : '' }}"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->
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
            <!--end::Row-->

            {{-- Begin::Row --}}
            <div class="row gutter-b">
                <div class="col-lg-8 col-sm-12">
                    <div class="bg-transparent border-0 card card-custom card-stretch d-flex flex-column justify-content-between">
                        <div class="card card-custom card-stretch gutter-b container py-5">
                            <div class="font-size-h4 font-weight-bold mb-3">Tentang event dan informasi tambahan</div>
                            <div class="font-size-h6">
                                {{ $event->description }}
                            </div>
                        </div>
                        <div class="container card card-custom py-5">
                            <!--begin::share-->
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-3 col-lg-6 font-size-h5 font-weight-bold">Bagikan:</div>
                                <div class="col-sm-12 col-md-9 col-lg-6 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ url('event/'.$event->id) }}" id="copylink" readonly/>
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" onclick="copyFunction()">
                                                <i class="far fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::share-->
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card card-custom card-stretch">
                        <div class="py-5 mx-5 d-flex align-items-between flex-wrap">
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-2 rounded bg-light-success p-2">
                                <span class="mr-4">
                                    <i class="flaticon2-user icon-2x text-success font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bold font-size-sm">Pemilik Event</span>
                                    <span class="text-dark font-weight-bolder">{{ $event->name }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-2 rounded bg-light-primary p-2">
                                <span class="mr-4">
                                    <i class="flaticon2-calendar-1 icon-2x text-primary font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bold font-size-sm">Waktu</span>
                                    <span class="text-dark font-weight-bolder">{{ $event->date }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-2 rounded bg-light-danger p-2">
                                <span class="mr-4">
                                    <i class="flaticon2-map icon-2x text-danger font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bold font-size-sm">Lokasi</span>
                                    <span class="text-dark font-weight-bolder">{{ $event->location }}</span>
                                </div>
                            </div>                                            
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-2 rounded bg-light-warning p-2">
                                <span class="mr-4">
                                    <i class="flaticon-price-tag icon-2x text-warning font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bold font-size-sm">Biaya</span>
                                    <span class="text-dark font-weight-bolder">{{ $event->price ? $event->price : 'gratis' }}</span>
                                </div>
                            </div>                                            
                        </div>
                    </div>
                </div>
            </div>
            {{-- End::Row --}}



            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12 col-xl">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Wrapper-->
                            <div class="">
                                <div class="">
                                    <h3 class="">Peta</h3>
                                </div>
                                <div id="map" style="height:500px"></div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>
                @if(\App\Http\Controllers\EventController::isJoined($event->id))
                <div class="col-lg-12 col-xl-8">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Wrapper-->
                            <h3>Undangan</h3>
                            {{-- <iframe class="d-block w-100" style="height: 500px" src="{{ asset('assets/media/undangan/00.pdf') }}#toolbar=0&view=fitH" frameborder="0"></iframe> --}}
                            <iframe class="d-block w-100" style="height: 500px" src="{{ url('event/'.$event->id.'/'.Auth::user()->id) }}#toolbar=0&view=fitH" frameborder="0"></iframe>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>    
                @endif 
            </div>
            <!--end::Row-->
            
            @if(!\App\Http\Controllers\EventController::checkMaker($event->id))
            <!--begin::Row-->
            <div class="row">
                <div class="col-5">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Tentang Pembuat Event</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-15">
                            <!--begin::User-->
                            <div class="text-center mb-10">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label" style="background-image:url('{{ asset($event->profile->image) }}')">
                                    </div>
                                </div>

                                <h4 class="font-weight-bold my-2">
                                    <a href="{{ url('profile/'.$event->profile->id) }}" class="text-dark">
                                    {{ $event->profile->name }}
                                    </a>
                                </h4>
                                <span class="label label-light-warning label-inline font-weight-bold label-lg">
                                    {{ $event->profile->event->count() }} Event Dibuat
                                </span>
                                <div class="text-muted mb-2">
                                    {{ $event->profile->description ? $event->profile->description : '-' }}
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
                </div>
                <div class="col-7">
                    <!--begin::List Widget 17-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Event lain dari {{ $event->profile->name }}</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $events->count() }} akan diselenggarakan</span>
                            </h3>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::Container-->
                            <div>
                                @foreach($events->take(3) as $e)
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-8">
                                    <!--begin::Symbol-->
                                    <div class="symbol mr-5 pt-1">
                                        <div class="symbol-label min-w-120px min-h-75px"
                                            style="background-image: url('{{ $e->image ? asset($e->image) : asset($e->event_template->event_category->image) }}')">
                                        </div>
                                    </div>
                                    <!--end::Symbol-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Title-->
                                        <a href="{{ url('event/'.$e->id) }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                            {{ $e->title }}
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Text-->
                                        <span class="text-muted font-weight-bold font-size-sm">
                                            {{ $e->date }}
                                        </span>
                                        <!--end::Text-->

                                        <!--begin::Action-->
                                        <div>
                                            <a href="{{ url('event/'.$e->id) }}" class="btn btn-primary font-weight-bolder font-size-sm py-2">
                                                Lihat Event
                                            </a>
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                                @endforeach

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 17-->
                </div>
            </div>
            <!--end::Row-->
            @else
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <!--begin::Advance Table Widget 4-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Data Pengikut Event</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">Pengguna yang mengikuti event ini</span>
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
                                                <th style="min-width: 100px" class="text-center"><span>Nama</span></th>
                                                <th class="text-center" style="min-width: 100px">Email</th>
                                                <th class="text-center" style="min-width: 100px">Waktu Daftar</th>
                                                @if($event->price != 0)
                                                <th class="text-center" style="min-width: 100px">Dibayar</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($joins as $join)
                                            <tr>
                                                <td>
                                                    <span class="text-center font-weight-bolder d-block font-size-lg">
                                                        {{ $join->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-center font-weight-bolder d-block font-size-lg">
                                                        {{ $join->email }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-center font-weight-bolder d-block font-size-lg">
                                                        {{ $carbon::parse($join->created_at)->isoFormat('DD MMMM Y') }}
                                                    </span>
                                                </td>
                                                @if($event->price != 0)
                                                <td>
                                                    <center>
                                                        @if($join->paid == 0)
                                                        <span class="label label-pill label-light-danger text-center label-inline label-center label-lg">
                                                            Belum Dibayar
                                                        </span>
                                                        @else
                                                        <span class="label label-pill label-light-success text-center label-inline label-center label-lg">
                                                            Telah Dibayar
                                                        </span>
                                                        @endif
                                                    </center>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--begin::Pagination-->
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="d-flex flex-wrap py-2 mr-3">
                                            {!! $joins->links() !!}
                                        </div>
                                        <div class="d-flex align-items-center py-3">
                                            <span class="text-muted">Menampilkan 1 dari 1 data</span>
                                        </div>
                                    </div>
                                    <!--begin::Pagination-->
                                    @if ($joins->isEmpty())
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
            </div>
            <!--end::Row-->
            @endif


            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

<form action="{{url('payment')}}" id="json_form" method="POST">
    @csrf
    <input type="hidden" name="event_id" value="{{ $id }}">
    <input type="hidden" name="json" id="json_callback"/>
</form>

@endsection

@push('style')
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" /> --}}
    <link href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css">
@push('script')
    {{-- <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script> --}}
    <script src="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/pages/features/maps/leaflet.js?v=7.0.6') }}"></script>
    <script>
        // var latlng = {!! json_encode($event->toArray()) !!};
        var map = L.map('map').setView([{{ $event->map }}], 16);
        var leafletIcon = L.divIcon({
			html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
			bgPos: [10, 10],
			iconAnchor: [20, 37],
			popupAnchor: [0, -37],
			className: 'leaflet-marker'
		});
        var marker = L.marker([{{ $event->map }}], { icon: leafletIcon }).addTo(map);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);        
    </script>
    <script>
        function copyFunction() {
            var copylink = document.getElementById('copylink');

            copylink.focus()
            copylink.select()
            copylink.setSelectionRange(0, 99999)
            document.execCommand('copy');

            alert('link berhasil dicopy');
        }
    </script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-1yYH1aHUzaZcwewN"></script>
    <script>
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snapToken}}', {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    send_res_to_form(result)
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    send_res_to_form(result)
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    send_res_to_form(result)
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
            // customer will be redirected after completing payment pop-up
        });

        function send_res_to_form(result){
            document.getElementById('json_callback').value = JSON.stringify(result)
            $('#json_form').submit()
        }
    </script>
@endpush