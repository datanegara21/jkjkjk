@extends('layouts.admin')

@section('title', 'Test')

@section('content')
    <div class="mt-10 content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">

                        <!--begin::List Widget 9-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark">Tipe Event</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">3 Tipe</span>
                                </h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="{{ url('admin/template/add') }}" class="btn btn-clean btn-light-primary">
                                            <i class="fas fa-plus"></i> Tambah
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-4">
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
                                                    <div class="card-toolbar m-0 p-0">
                                                        <a href="{{ url('admin/template/del') }}" class="test-secondary m-0 p-0">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
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
                            <!--end: Card Body-->
                        </div>
                        <!--end: Card-->
                        <!--end: List Widget 9-->
                    </div>
                    <div class="col-12" id="input-detail">

                        <!--begin::List Widget 9-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark">Template</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">2 Template</span>
                                </h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="{{ url('admin/template/add') }}" class="btn btn-clean btn-light-primary">
                                            <i class="fas fa-plus"></i> Tambah
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="form-group m-5" id="detail-1">
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
                            <div class="form-group m-5" id="detail-2">
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
                            <div class="form-group m-5" id="detail-3">
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
                            <div class="form-group m-5" id="detail-4">
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
                            <!--end: Card Body-->
                        </div>
                        <!--end: Card-->
                        <!--end: List Widget 9-->
                    </div>
                </div>
                <!--end::Row-->
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@push('style')

@push('script')
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
