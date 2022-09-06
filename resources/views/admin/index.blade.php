@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <div class="mt-10 content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid ">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                        <!--begin::Mixed Widget 1-->
                        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 bg-primary py-5">
                                <h3 class="card-title font-weight-bolder text-white">Data Website</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body p-0 position-relative overflow-hidden">
                                <!--begin::Chart-->
                                <div class="card-rounded-bottom bg-primary"
                                    style="height: 60px; min-height: 60px;">

                                </div>
                                <!--end::Chart-->

                                <!--begin::Stats-->
                                <div class="card-spacer mt-n25">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-warning px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <i class="fas fa-users icon-xxl text-warning"></i>
                                                </span> 
                                                <a href="#" class="text-warning font-weight-bold font-size-h6">
                                                    {{ $user }} Pengguna
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-primary px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                                    <i class="fas fa-calendar-alt icon-xxl text-primary"></i>
                                                </span> <a href="#"
                                                    class="text-primary font-weight-bold font-size-h6 mt-2">
                                                    {{ $event }} event
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-danger px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                    <i class="fas fa-list icon-xxl text-danger"></i>
                                                </span> <a href="#"
                                                    class="text-danger font-weight-bold font-size-h6 mt-2">
                                                    {{ $category }} Kategori
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="bg-light-success px-6 py-8 rounded-xl mx-2 my-1">
                                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                    <i class="fas fa-file-invoice icon-xxl text-success"></i>
                                                </span> <a href="#"
                                                    class="text-success font-weight-bold font-size-h6 mt-2">
                                                    {{ $template }} Template
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 534px; height: 448px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 1-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <!--begin::Stats Widget 10-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div
                                    class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol  symbol-50 symbol-light-info mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-info">
                                                <i class="fas fa-users icon-xxl text-primary"></i>
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h3">+{{ $user }}</span>
                                        <span class="text-muted font-weight-bold mt-2">Data Pendaftaran Pengguna</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_10_chart" class="card-rounded-bottom"
                                    data-color="info" style="height: 150px"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 10-->
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <!--begin::Stats Widget 11-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div
                                    class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                    <span class="symbol  symbol-50 symbol-light-success mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-xl svg-icon-success">
                                                <i class="fas fa-calendar-alt icon-xxl text-success"></i>
                                            </span> </span>
                                    </span>
                                    <div class="d-flex flex-column text-right">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h3">+{{ $event }}</span>
                                        <span class="text-muted font-weight-bold mt-2">Data Pembuatan Event</span>
                                    </div>
                                </div>
                                <div id="kt_stats_widget_11_chart" class="card-rounded-bottom"
                                    data-color="success" style="height: 150px"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 11-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <!--begin::Advance Table Widget 4-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Pengguna Terbaru</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Pengguna yang mendaftar baru ini</span>
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
                                                    <th style="width: 50px"></th>
                                                    <th style="min-width: 100px" class="pl-7"><span>Nama</span></th>
                                                    <th class="text-center" style="min-width: 100px">Tanggal Daftar</th>
                                                    <th class="text-center" style="min-width: 100px">Waktu Daftar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($penggunas as $pengguna)
                                                    <tr>
                                                        <td class="pl-0 py-8">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-50 symbol-light mr-4">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ asset($pengguna->image) }}"
                                                                            class="h-100 align-self-end" alt="">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$pengguna->name}}</a>
                                                                <span class="text-muted font-weight-bold d-block">{{ $pengguna->email }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted text-center font-weight-bolder d-block font-size-lg">
                                                                {{ $carbon::parse( $pengguna->created_at )->isoFormat('DD MMMM Y') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted text-center font-weight-bolder d-block font-size-lg">
                                                                {{ $carbon::parse($pengguna->created_at)->isoFormat('HH:mm') }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>

                                        @if($penggunas->isEmpty())
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
                    <div class="col-lg-6 col-sm-12">
                        <!--begin::Advance Table Widget 2-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Event Terbaru</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Event yang baru-baru ini dibuat</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-3 pb-0">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead >
                                            <tr class="text-uppercase">
                                                <th class="" style="width: 50px"></th>
                                                <th class=" text-center" style="min-width: 200px">Event</th>
                                                <th class=" text-center" style="min-width: 145px">Tanggal Dibuat</th>
                                                <th class=" text-center" style="min-width: 125px">Waktu Dibuat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach($acaras as $acara)
                                            @php $i++ @endphp
                                            <tr>
                                                <td class="pl-0 py-4">
                                                    <div class="symbol symbol-50 symbol-light-primary mr-1">
                                                        <span class="symbol-label">
                                                              {{ $i }}  
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                        {{ $acara->title }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bolder d-block font-size-lg">
                                                        {{ $carbon::parse( $acara->created_at )->isoFormat('DD MMMM Y') }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bolder">
                                                        {{ $carbon::parse( $acara->created_at )->isoFormat('HH:mm') }}
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @if($acaras->isEmpty())
                                    <div class="text-center font-weight-bolder text-muted">
                                        --- belum ada event ---
                                    </div>
                                    @endif
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 2-->
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

        var chartUser = @php echo json_encode ($chartUser) @endphp;

        var monthUser = @php echo json_encode ($monthUser) @endphp;

        Highcharts.chart('kt_stats_widget_10_chart', {

            title : {
                text: 'Pendaftaran User'
            },

            xAxis : {
                categories : monthUser
            },

            yAxis : {
                title: {
                    text : 'Jumlah Pendaftaran User'
                }
            },

            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },

            series: [{
                name: 'Pendaftaran User',
                // data: newUser
            }]
        });
    </script>
    <script>

        var chartEvent = @php echo json_encode ($chartEvent) @endphp;

        var monthEvent = @php echo json_encode ($monthEvent) @endphp;

        Highcharts.chart('kt_stats_widget_10_chart', {

            title : {
                text: 'Pendaftaran User'
            },

            xAxis : {
                categories : monthEvent
            },

            yAxis : {
                title: {
                    text : 'Jumlah Pendaftaran User'
                }
            },

            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },

            series: [{
                name: 'Pendaftaran User',
                // data: newUser
            }]
        });
    </script>
    <script src="{{ asset('assets/js/pages/widgets.js?v=7.0.6') }}"></script>
@endpush
