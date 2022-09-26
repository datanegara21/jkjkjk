@php 
    $layout = Auth::check() ? Auth::user()->role == 1 ? 'user' : 'admin' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Undanganmu')

@section('content')

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid mt-15" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col">
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