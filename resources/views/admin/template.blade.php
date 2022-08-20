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
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $categories->count() }} Tipe</span>
                                </h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        {{-- button modal tipe --}}
                                        <button type="button" class="btn btn-clean btn-light-primary" data-toggle="modal" data-target="#addType">
                                            <i class="fas fa-plus"></i> Tambah
                                        </button>
                                        <!-- begin::Modal tipe-->
                                        <div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ url('admin/template/add') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Tipe Event</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body px-10">
                                                            <div class="form-group">
                                                                <label for="tipeName">Nama</label>
                                                                <input type="text" class="form-control" placeholder="Nama Tipe Event" id="tipeName" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tipeDescription">Deskripsi</label>
                                                                <input type="text" class="form-control" placeholder="Deskripsi Tipe Event" id="tipeDescription" name="description" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tipeLayout">Tata letak teks</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="tipeLayout" name="layout">
                                                                    <label class="custom-file-label" for="tipeLayout">Pilih file (css)</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tipeHeader">Foto Header</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="tipeHeader" name="layout">
                                                                    <label class="custom-file-label" for="tipeHeader">Pilih file (gambar)</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-light-primary font-weight-bold">Hapus</button>
                                                            <button type="submit" class="btn btn-primary font-weight-bold">Tambah</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end::Modal tipe-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <div class="row">
                                    @if($categories->isEmpty())
                                        <div class="col-12 text-center font-weight-bold text-muted"> --- belum ada tipe --- </div>
                                    @else
                                        @foreach($categories as $category)
                                        <!-- begin::Modal tipe-->
                                        <div class="modal fade" id="typeEdit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ url('admin/template/edit/'.$category->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tipe Kategori</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body px-10">
                                                            <div class="form-group">
                                                                <label for="tipeName">Nama</label>
                                                                <input type="text" class="form-control" value="{{ $category->name }}" placeholder="{{ $category->name }}" id="tipeName" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tipeDescription">Deskripsi</label>
                                                                <input type="text" class="form-control" value="{{ $category->description }}" placeholder="{{ $category->description }}" id="tipeDescription" name="description" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-light-primary font-weight-bold">Kosongkan</button>
                                                            <button type="submit" class="btn btn-primary font-weight-bold">Ubah</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end::Modal tipe-->
                                        
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
                                                        <div class="card-toolbar m-0 p-0">
                                                            <div class="dropdown dropdown-inline m-0 p-0">
                                                                <button type="button" class="text-primary border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ki ki-bold-more-hor"></i>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <button class="dropdown-item" data-toggle="modal" data-target="#typeEdit{{ $category->id }}">Edit</button>
                                                                    <a href="{{ url('admin/template/delete/'.$category->id) }}" class="dropdown-item delete-confirm">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
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
                        <!--end: Card-->
                        <!--end: List Widget 9-->
                    </div>
                    <div class="col-12" id="input-detail">
                        <!--begin::List Widget 9-->
                        <div class="card card-custom card-stretch gutter-b" id="result">
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
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Tipe event ini akan dihapus secara permanen!',
            icon: 'warning',
            showConfirmButton: true,
            confirmButtonText: "Yakin!",
            showCancelButton: true,
            cancelButtonText: "Batal!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('input[name="tipe"]').click(function(){
        var tipe = $(this).val();
        console.log(tipe)
        if(tipe == null){
            $('#result').show();
        }else{
            var total;
            var template = new Array();
            $.ajax({
                url:"/admin/template/template",
                method:"POST",
                data:{tipe:tipe},
                success:function(data){
                    $('result').show();
                    total = data.total;
                    template.push(data.template);
                    template = data.template;

                    var list = '';
                    template.forEach(function(t) {
                        list +=`<div class="col-3">
                                    <label class="option">
                                        <span class="option-label">
                                            <img src="{{ asset('assets/media/template/tahlil00.jpg') }}" width="150px">
                                        </span>
                                        <div class="card-toolbar">
                                            <div class="dropdown dropdown-inline m-0 p-0">
                                                <button type="button" class="text-primary border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-hor"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <button class="dropdown-item" data-toggle="modal" data-target="#typeEdit{{ $category->id }}">Edit</button>
                                                    <a href="{{ url('admin/template/delete/'.$category->id) }}" class="dropdown-item delete-confirm">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>`;
                    });

                    var resultAjax = `
                                <!-- begin::Modal tipe-->
                                <div class="modal fade" id="addTemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ url('admin/template/`+tipe+`/add') }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Template Event</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body px-10">
                                                    <div class="form-group">
                                                        <label for="templatePreview">Foto Preview</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="templatePreview" name="preview">
                                                            <label class="custom-file-label" for="tipeHeader">Pilih file (gambar)</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="template">File Template</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="template" name="template">
                                                            <label class="custom-file-label" for="template">Pilih file (gambar)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-light-primary font-weight-bold">Hapus</button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end::Modal tipe-->

                                <!--begin::Header-->
                                <div class="card-header align-items-center border-0 mt-4">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="font-weight-bolder text-dark">Template</span>
                                        <span class="text-muted mt-3 font-weight-bold font-size-sm">`+ total +` Template</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-clean btn-light-primary" data-toggle="modal" data-target="#addTemplate">
                                                <i class="fas fa-plus"></i> Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Header-->

                                <!--begin::List-->
                                <div class="form-group m-5" id="detail-1">
                                    <div class="row">`+list+`</div>
                                </div>
                                <!--end::List-->`;

                    $('#result').html(resultAjax);
                }
            });
        }
    });
</script>
@endpush
