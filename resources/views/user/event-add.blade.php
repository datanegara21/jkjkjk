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
                            <form class="form" action="{{ url('event/add') }}" method="post">
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
                                                    type="text" name="name" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}"/>
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
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text"><i
                                                                class="far fa-clipboard"></i></span></div>
                                                    <input type="text" name="title"
                                                        class="form-control form-control-lg form-control-solid" name="title" placeholder="Event yang akan diselenggarakan" />
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
                                                    <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder="Deskripsi tentang event yang akan diselenggarakan" cols="30" rows="2"></textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Hari, Tanggal</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text"><i
                                                                class="far fa-calendar-alt"></i></span></div>
                                                    <input type="text" name="date"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="Senin, 1 Agustus 2022" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Waktu</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text"><i
                                                                class="fas fa-stopwatch"></i></span></div>
                                                    <input type="text" name="time"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="08:00 WIB" />
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
                                                        placeholder="Jl. Mawar, Ds. Melati" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Maps</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text">
                                                            <i class="fas fa-map-marker-alt"></i></span></div>
                                                    <input type="text" name="maps"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="map" readonly/>
                                                </div>
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
                                                        class="form-control form-control-lg form-control-solid" name="title" placeholder="30" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Biaya Pendaftaran</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                    <input type="text" name="price" class="form-control" placeholder="10000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Waktu Mulai Pendaftaran</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid date" id="kt_datetimepicker_custom_1" data-target-input="nearest">
                                                    <input type="text" name="start" class="form-control datetimepicker-input" placeholder="Pilih tanggal dan waktu" data-target="#kt_datetimepicker_custom_1"/>
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
                                                    <input type="text" name="end" class="form-control datetimepicker-input" placeholder="Pilih tanggal dan waktu" data-target="#kt_datetimepicker_custom_2"/>
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

@push('script')
    <script src="{{ asset('assets/js/pages/custom/profile/profile.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6') }}"></script>
@endpush