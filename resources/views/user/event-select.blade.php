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
                    <!--begin::Form-->
                    <form class="form" action="{{ url('event/select') }}" method="post">
                        @csrf
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Tambah Event
                                    </h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Pilih kategori dan template event</span>
                                </div>
                                <div class="card-toolbar">
                                    <button type="submit" class="btn btn-success mr-2">Lanjut</button>
                                    <button type="reset" name="reset" class="btn btn-secondary batal">Batal</button>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Content-->
                            <div class="flex-row-fluid ml-lg-8">
                                <div class="card-body">
                                    <div class="form-group m-0">
                                        <label>Pilih kategori event:</label>
                                        <!--begin::Body-->
                                        <div class="card-body pt-4">
                                            <div class="row">
                                                @if($categories->isEmpty())
                                                    <div class="col-12 text-center font-weight-bold text-muted"> --- belum ada kategori --- </div>
                                                @else
                                                    @foreach($categories as $category)
                                                    
                                                    <div class="col-3">
                                                        <label class="option">
                                                            <span class="option-control">
                                                                <span class="radio">
                                                                    <input type="radio" name="tipe" value="{{ $category->id }}" class="tipe"/>
                                                                    <span></span>
                                                                </span>
                                                            </span>
                                                            <span class="option-label">
                                                                <span class="option-head">
                                                                    <span class="option-title">
                                                                        {{ $category->name }}
                                                                    </span>
                                                                
                                                                </span>
                                                                <span class="option-body">
                                                                    {{ $category->description }}
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!--end: Card Body-->
                                    </div>

                                    <div id="result">
                                    </div>

                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Card-->
                    </form>
                    <!--end::Form-->
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('input[name="tipe"]').click(function(){
            var tipe = $(this).val();
            if(tipe == null){
                $('#result').show();
            }else{
                var total;
                var template = new Array();
                $.ajax({
                    url:"/event/template",
                    method:"POST",
                    data:{tipe:tipe},
                    success:function(data){
                        $('result').show();
                        total = data.total;
                        template.push(data.template);
                        template = data.template;
                        
                        var list = '';
                        if(template.length != 0) {
                            template.forEach(function(t) {
                                list +=` <div class="col-3">
                                                <label class="option">
                                                    <span class="option-control">
                                                        <span class="radio">
                                                            <input type="radio" name="template" value="`+t.id+`" class="detail"/>
                                                            <span></span>
                                                        </span>
                                                    </span>
                                                    <span class="option-label">
                                                        <img src="/`+t.preview+`" width="150px">
                                                    </span>
                                                </label>
                                            </div>`;
                            });
                        } else {
                            list+='<div class="col-12 text-center font-weight-bold text-muted"> --- belum ada template --- </div>'
                        }
    
                        var resultAjax = `
                                    <!--begin::List-->
                                    <div class="separator separator-dashed my-8"></div>
                                    <div class="form-group m-0" id="detail-1">
                                        <label>Pilih Template:</label>
                                        <div class="row">
                                            `+list+`
                                        </div>
                                    </div>
                                    <!--end::List-->`;

                        $('#result').html(resultAjax);
                    }
                });
            }
        });
        $('button[name="reset"]').click(function(){
            $('#result').html(``);
        });
    </script>
    
@endpush