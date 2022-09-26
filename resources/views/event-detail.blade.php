@php 
    $layout = Auth::check() ? Auth::user()->role == 1 ? 'user' : 'admin' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Detail Event')

@section('content')

@if(Auth::check())
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
            </div>
        </form>
    </div>
</div>
{{-- end::modal free --}}
@else
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
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="youremail@mail.com" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lengkap" required/>
                    </div>
                    <label class="checkbox">
                        <input type="checkbox" name="yakin" id="yakin"/>
                        <span></span>
                        Saya yakin ingin mendaftar di event ini!
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" id="submitRegister" class="btn btn-primary font-weight-bold" disabled>Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end::modal free --}}
@endif

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid mt-15" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
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
                                            style="background-image: url({{ asset($event->event_template->event_category->image) }})">
                                        </div>
                                        <!--end::Image-->
                                        <div class="row mt-10 container mx-0 px-0">
                                            <div class="col-8 px-0 text-center">
                                                <!--begin::Title-->
                                                <div class="card-title font-weight-bolder text-center text-dark-75 font-size-h4 m-0 pt-7 pb-1">
                                                    {{ $event->title }}
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Text-->
                                                <a href="{{ url('profile/'.$event->profile->email) }}" class="d-block font-weight-bold text-dark-50 font-size-sm pb-7">
                                                    {{ $event->profile->name }}
                                                </a>
                                                <!--end::Text-->
                                            </div>
                                            <div class="col-2"></div>
                                            <div class="col-2 px-0 ">
                                                <div class="d-flex flex-center ml-auto pl-auto">
                                                    @if(!\App\Http\Controllers\EventController::checkMaker($event->id) && $event->end > now() && !\App\Http\Controllers\EventController::isJoined($event->id))
                                                    <a class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2" data-toggle="modal" data-target="#eventFreeModal">
                                                        Daftar
                                                    </a>
                                                    @endif
                                                    <a href="{{ url('event/like/'.$event->id) }}" class="btn btn-outline-light bg-dark-50 font-weight-bolder font-size-sm">
                                                        <i class="fas fa-heart {{ \App\Http\Controllers\EventController::checkLiked($event->id) ? 'text-danger' : '' }}"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="pt-1 row">
                                        {{-- begin::Item --}}
                                        <div class="mt-3 col-lg-8 col-sm-12">
                                            <div class="container">
                                                <div class="font-size-h4 font-weight-bold mb-3">Tentang event dan informasi tambahan</div>
                                                <div class="font-size-h6">
                                                    {{ $event->description }}
                                                </div>
                                            </div>
                                        </div>  
                                        {{-- end::Item --}}
                                        {{-- begin::Item --}}
                                        <div class="mt-5 col-lg-4 col-sm-12 row">
                                            {{-- <div class="mx-5 my-5"> --}}
                                                <div class="font-weight-bold col-6 "><i class="fas fa-user mr-1"></i>Pemilik Event:</div>
                                                <div class="text-muted text-right col-5">{{ $event->name }}</div>
                                            {{-- </div> --}}
                                            {{-- <div class="mx-5 my-5"> --}}
                                                <div class="font-weight-bold col-5 mr-1"><i class="far fa-calendar-alt mr-1"></i>Waktu:</div>
                                                <div class="col-6 text-muted text-right">
                                                    {{ $time[0] }} - {{ $time[1] }}
                                                </div>
                                            {{-- </div> --}}
                                            {{-- <div class="mx-5 my-5"> --}}
                                                <div class="font-weight-bold col-6 "><i class="fas fa-map-marker-alt mr-1"></i>Lokasi:</div>
                                                <div class="text-muted text-right col-5">{{ $event->location }}</div>
                                            {{-- </div> --}}
                                            {{-- <div class="mx-5 my-5"> --}}
                                                <div class="font-weight-bold col-6 "><i class="fas fa-map-marker-alt mr-1"></i>Biaya:</div>
                                                <div class="text-muted text-right col-5">{{ $event->price ? 'Rp '.$event->price : 'gratis' }}</div>
                                            {{-- </div> --}}
                                            
                                        </div>
                                        <div class="col-12">
                                            <div class="container mt-5">
                                                <div class="font-size-h5 font-weight-bold mb-3">bagikan:
                                                    <!--begin::share-->
                                                    <div class="">
                                                        <a href="#" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                                            <i class="socicon-facebook"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                                            <i class="socicon-twitter"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-circle btn-light-google mr-2">
                                                            <i class="socicon-google"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-circle btn-light-success">
                                                            <i class="socicon-whatsapp"></i>
                                                        </a>
                                                    </div>
                                                    <!--end::share-->
                                                </div>
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
            <!--end::Row-->
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
                @if(\App\Http\Controllers\EventController::isJoined($event->id, csrf_token()))
                <div class="col-lg-12 col-xl-8">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Wrapper-->
                            <h3>Undangan</h3>
                            {{-- <iframe class="d-block w-100" style="height: 500px" src="{{ asset('assets/media/undangan/00.pdf') }}#toolbar=0&view=fitH" frameborder="0"></iframe> --}}
                            <iframe class="d-block w-100" style="height: 500px" src="{{ asset('assets/event/tes/index.html') }}#toolbar=0&view=fitH" frameborder="0"></iframe>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>    
                @endif 
            </div>
            <!--end::Row-->
            
            <!--begin::Row-->
            <div class="row">
                <h3 class="text-left mt-7 mb-5">Tentang Pembuat Event</h3>
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
                                                style="background-image: url('{{ asset($e->event_template->event_category->image) }}')">
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
        var submit = document.getElementById('submitRegister'),
            checkbox = document.getElementById('yakin'),
            disableSubmit = function(e) {
                submit.disabled = !this.checked
            };

        checkbox.addEventListener('change', disableSubmit);
    </script>
@endpush