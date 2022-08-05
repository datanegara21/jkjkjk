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
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Tambah Event
                                </h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Pilih tipe dan template event</span>
                            </div>
                            <div class="card-toolbar">
                                <a href="{{ url('event/add') }}" class="btn btn-success mr-2">Lanjut</a>
                                <button type="reset" class="btn btn-secondary batal">Batal</button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="flex-row-fluid ml-lg-8">
                            <!--begin::Form-->
                            <form class="form">
                                <div class="card-body">
                                    <div class="form-group m-0">
                                        <label>Pilih tipe event:</label>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="option">
                                                    <span class="option-control">
                                                        <span class="radio">
                                                            <input type="radio" name="tipe" value="1" class="tipe"/>
                                                            <span></span>
                                                        </span>
                                                    </span>
                                                    <span class="option-label">
                                                        <span class="option-head">
                                                            <span class="option-title">
                                                                Tahlil
                                                            </span>
                                                        </span>
                                                        <span class="option-body">
                                                            Tahlil atau doa bersama
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label class="option">
                                                    <span class="option-control">
                                                        <span class="radio">
                                                            <input type="radio" name="tipe" value="2" class="tipe"/>
                                                            <span></span>
                                                        </span>
                                                    </span>
                                                    <span class="option-label">
                                                        <span class="option-head">
                                                            <span class="option-title">
                                                                Pernikahan
                                                            </span>
                                                        </span>
                                                        <span class="option-body">
                                                            Pernikahan, akad nikah, anniversary, atau lainnya
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label class="option">
                                                    <span class="option-control">
                                                        <span class="radio">
                                                            <input type="radio" name="tipe" value="3" class="tipe"/>
                                                            <span></span>
                                                        </span>
                                                    </span>
                                                    <span class="option-label">
                                                        <span class="option-head">
                                                            <span class="option-title">
                                                                Walimahan
                                                            </span>
                                                        </span>
                                                        <span class="option-body">
                                                            Walimatul khitan, atau lainnya
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label class="option">
                                                    <span class="option-control">
                                                        <span class="radio">
                                                            <input type="radio" name="tipe" value="4" class="tipe"/>
                                                            <span></span>
                                                        </span>
                                                    </span>
                                                    <span class="option-label">
                                                        <span class="option-head">
                                                            <span class="option-title">
                                                                Lainnya
                                                            </span>
                                                        </span>
                                                        <span class="option-body">
                                                            Jenis acara lainnya
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="input-detail">
                                        <div class="separator separator-dashed my-8"></div>
                                        <div class="form-group m-0" id="detail-1">
                                            <label>Pilih Template:</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="option">
                                                        <span class="option-control">
                                                            <span class="radio">
                                                                <input type="radio" name="m_option_1" value="1" class="detail"/>
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="option-label">
                                                            <img src="{{ asset('assets/media/template/tahlil00.jpg') }}" width="150px">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-0" id="detail-2">
                                            <label>Pilih Template:</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="option">
                                                        <span class="option-control">
                                                            <span class="radio">
                                                                <input type="radio" name="m_option_1" value="1" class="detail"/>
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="option-label">
                                                            <img src="{{ asset('assets/media/template/nikah00.jpg') }}" width="150px">
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="option">
                                                        <span class="option-control">
                                                            <span class="radio">
                                                                <input type="radio" name="m_option_1" value="1" class="detail"/>
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="option-label">
                                                            <img src="{{ asset('assets/media/template/nikah01.jpg') }}" width="150px">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-0" id="detail-3">
                                            <label>Pilih Template:</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="option">
                                                        <span class="option-control">
                                                            <span class="radio">
                                                                <input type="radio" name="m_option_1" value="1" class="detail"/>
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="option-label">
                                                            <img src="{{ asset('assets/media/template/hajatan00.jpg') }}" width="150px">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-0" id="detail-4">
                                            <label>Pilih Template:</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="option">
                                                        <span class="option-control">
                                                            <span class="radio">
                                                                <input type="radio" name="m_option_1" value="1" class="detail"/>
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="option-label">
                                                            <img src="{{ asset('assets/media/template/tahlil00.jpg') }}" width="150px">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
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
    <script>
        $(document).ready(function(){
            $("#input-detail").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".tipe").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
                if ($("input[name='tipe']:checked").val() == "1" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                    $("#input-detail").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
                    $("#detail-1").css("display","block");
                    $("#detail-2").css("display","none");
                    $("#detail-3").css("display","none");
                    $("#detail-4").css("display","none");
                }else if ($("input[name='tipe']:checked").val() == "2" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                    $("#input-detail").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
                    $("#detail-1").css("display","none");
                    $("#detail-2").css("display","block");
                    $("#detail-3").css("display","none");
                    $("#detail-4").css("display","none");
                }else if ($("input[name='tipe']:checked").val() == "3" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                    $("#input-detail").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
                    $("#detail-1").css("display","none");
                    $("#detail-2").css("display","none");
                    $("#detail-3").css("display","block");
                    $("#detail-4").css("display","none");
                }else if ($("input[name='tipe']:checked").val() == "4" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                    $("#input-detail").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
                    $("#detail-1").css("display","none");
                    $("#detail-2").css("display","none");
                    $("#detail-3").css("display","none");
                    $("#detail-4").css("display","block");
                } else {
                    $("#input-detail").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
                }
            })
            $(".batal").click(function(){
                $("#input-detail").slideUp("fast");
                
            })
        });
        </script>
@endpush