@php 
    $layout = Auth::check() ? 'user' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Tambah Event')

@section('content')

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid mt-7" id="kt_content">
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
                        <!--begin::Content-->
                        <div class="flex-row-fluid ml-lg-8">
                            <!--begin::Form-->
                            <form class="form" action="{{ url('event/add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="tipe" value="{{ session()->get('tipe') }}">
                                <input type="hidden" name="template" value="{{ session()->get('template') }}">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header py-3">
                                        <div class="card-title align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark">Buat Event
                                            </h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Buat Event untuk Segala Kegiatan Bersama</span>
                                        </div>
                                        <div class="card-toolbar">
                                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                                            <button type="reset" class="btn btn-secondary">Batal</button>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mt-10 mb-6">Info Pengirim</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama Pengirim</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" name="name" value="{{ old('name') ? old('name') : Auth::user()->name; }}" placeholder="{{ Auth::user()->name }}" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mt-10 mb-6">Data Acara</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Event</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-clipboard"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="title" value="{{ old('title') }}" placeholder="Event yang akan diselenggarakan" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Foto (optional)</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input type="file" class="form-control form-control-lg form-control-solid" name="image" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Deskripsi Event</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-clipboard"></i>
                                                        </span>
                                                    </div>
                                                    <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder="Deskripsi tentang event yang akan diselenggarakan" cols="30" rows="2" required>{{ old('description') }}</textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Tanggal & Waktu</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid" id="kt_datetimerangepicker_1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="date" class="form-control form-control-lg form-control-solid" value="{{ old('date') }}" placeholder="01/01/2022 00:05 - 31/12/2022 23:55" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Tempat</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text">
                                                            <i class="fas fa-map-marker-alt"></i></span></div>
                                                    <input type="text" name="location"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="Jl. Mawar, Ds. Melati" value="{{ old('location') }}" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Maps</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div id="leaflet_event_add" style="height:300px;"></div>
                                                <input type="hidden" name="map"  id="latlng" value="{{ old('map') }}" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mt-10 mb-6">Data Pendaftaran Event</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Maks. Pendaftar</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input type="number" name="total" min="1" max="30"
                                                        class="form-control form-control-lg form-control-solid" value="{{ old('total') ? old('total') : 1 }}" placeholder="30" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Biaya Pendaftaran</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                    <input type="text" min="0" name="price" class="form-control" value="{{ old('price') ? old('price') : 0 }}" placeholder="10.000" id="price" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Waktu Mulai Pendaftaran</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid date" id="kt_datetimepicker_custom_1" data-target-input="nearest">
                                                    <input type="text" name="start" class="form-control datetimepicker-input" value="{{ old('start') }}" placeholder="Pilih tanggal dan waktu" data-target="#kt_datetimepicker_custom_1" required/>
                                                    <div class="input-group-append" data-target="#kt_datetimepicker_custom_1" data-toggle="datetimepicker">
                                                        <span class="input-group-text">
                                                            <i class="ki ki-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Waktu Selesai Pendaftaran</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid date" id="kt_datetimepicker_custom_2" data-target-input="nearest">
                                                    <input type="text" name="end" class="form-control datetimepicker-input" value="{{ old('end') }}" placeholder="Pilih tanggal dan waktu" data-target="#kt_datetimepicker_custom_2" required/>
                                                    <div class="input-group-append" data-target="#kt_datetimepicker_custom_2" data-toggle="datetimepicker">
                                                        <span class="input-group-text">
                                                            <i class="ki ki-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Item-->  
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
    <link href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css">
@push('script')
    <script src="{{ asset('assets/js/pages/custom/profile/profile.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/pages/features/maps/leaflet.js?v=7.0.6') }}"></script>
    <script>
        var KTLeaflet = function () {

            // Private functions
            var demo5 = function () {
                // Define Map Location
                // navigator.geolocation.getCurrentPosition(function(position) {
                //     console.log(position.coords.latitude);
                // })

                var leaflet = L.map('leaflet_event_add', {
                    center: [-7.9772, 112.634],
                    zoom: 13
                });

                // Init Leaflet Map
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(leaflet);

                // Set Geocoding
                var geocodeService;
                if (typeof L.esri.Geocoding === 'undefined') {
                    geocodeService = L.esri.geocodeService();
                } else {
                    geocodeService = L.esri.Geocoding.geocodeService();
                }

                // Define Marker Layer
                var markerLayer = L.layerGroup().addTo(leaflet);

                // Set Custom SVG icon marker
                var leafletIcon = L.divIcon({
                    html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
                    bgPos: [10, 10],
                    iconAnchor: [20, 37],
                    popupAnchor: [0, -37],
                    className: 'leaflet-marker'
                });

                // Map onClick Action
                leaflet.on('click', function (e) {
                    geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
                        if (error) {
                            return;
                        }
                        markerLayer.clearLayers(); // remove this line to allow multi-markers on click
                        L.marker(result.latlng, { icon: leafletIcon }).addTo(markerLayer).bindPopup(result.address.Match_addr, { closeButton: false }).openPopup();
                        document.getElementById('latlng').value = e.latlng.lat + ',' + e.latlng.lng;
                    });
                });
            }

            return {
                // public functions
                init: function () {
                    // default charts
                    demo5();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTLeaflet.init();
        });
    </script>
    <script>
        var price = document.getElementById('price');
		price.addEventListener('keyup', function(e){
			price.value = formatRupiah(this.value);
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			price     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				price += separator + ribuan.join('.');
			}
 
			price = split[1] != undefined ? price + ',' + split[1] : price;
			return price;
		}
    </script>
@endpush