"use strict";
// Class definition

var KTDatatableJsonRemoteDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {
        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: HOST_URL + '/api/admin/user/data',
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                footer: false // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: '#',
                sortable: false,
                width: 15,
                autoHide: false,
                type: 'number',
                selector: false,
                textAlign: 'center',
                template: function(data, index) {
                    index++
                    return index
                }
            }, {
                field: 'image',
                title: 'Foto',
                width: 60,
                autoHide: false,
                textAlign: 'center',
                template: function(data) {
                    return '<img src="/'+data.image+'" class="h-50 w-50">'
                }
            }, {
                field: 'name',
                title: 'Nama',
                width: 130,
                
            }, {
                field: 'email',
                title: 'Email',
                width: 130,
                autoHide: false,
            }, {
                field: 'description',
                title: 'Deskripsi',
                template: function(data) {
                    if(data.description == null){
                        return '<div class="text-muted">--kosong--</div>'
                    }else{
                        return data.description
                    }
                }
            }, {
                field: 'status',
                title: 'Status',
                // callback function support for column rendering
                template: function(data) {
                    var status = {
                        'active': {
                            'class': ' label-light-success',
                            'title': 'aktif'
                        },
                        'banned': {
                            'class': ' label-light-danger',
                            'title': 'diblokir'
                        },
                        'warning': {
                            'class': ' label-light-warning',
                            'title': 'dilaporkan'
                        },
                    };
                    return '<span class="label font-weight-bold label-lg label-inline'+status[data.status].class+'">'+status[data.status].title+'</span>';
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                autoHide: false,
                overflow: 'visible',
                template: function(data) {
                    var active = '';
                    var banned = '';
                    if(data.status == 'active'){
                        active = 'checked'
                    }
                    if(data.status == 'banned'){
                        banned = 'checked'
                    }
                    
                    return `
                        <!-- begin::DelModal-->
                        <div class="modal fade" id="userDelete`+data.id+`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body px-10">
                                        <div>Apakah anda yakin ingin menghapus user `+data.name+`</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light-primary font-weight-bold" data-dismiss="modal" aria-label="Close">Batal</button>
                                        <a href="/admin/user/delete/`+data.id+`" class="btn btn-primary font-weight-bold">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end::DelModal-->
                        
                        <!-- begin::StatusModal-->
                        <div class="modal fade" id="userStatus`+data.id+`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                
                                <form class="form" action="/admin/user/status" method="get">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pengguna</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body px-10">
                                            <div>Ubah status dari `+data.name+`</div>
                                                <div class="form-group row">
                                                    <input type="hidden" name="user_id" value="`+data.id+`">
                                                    <div class="col-9 col-form-label">
                                                        <div class="radio-inline">
                                                            <label class="radio radio-success">
                                                                <input type="radio" name="status" value="active" `+active+`/>
                                                                <span></span>
                                                                Aktif
                                                            </label>
                                                            <label class="radio radio-danger">
                                                                <input type="radio" name="status" value="banned" `+banned+`/>
                                                                <span></span>
                                                                Diblokir
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-light-primary font-weight-bold" data-dismiss="modal" aria-label="Close">Batal</button>
                                            <button type="submit" class="btn btn-primary font-weight-bold">Ubah</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- end::StatusModal-->

                        <button class="btn btn-sm btn-clean btn-icon mr-2" title="Ubah" data-toggle="modal" data-target="#userStatus`+data.id+`"></buttom>
                            <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                </g>
                            </svg>
                            </span>
                        </a>
                        <button class="btn btn-sm btn-clean btn-icon" title="Hapus Akun" data-toggle="modal" data-target="#userDelete`+data.id+`">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    `;
                    
                },
            }],

        });

        

        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        }
    };
}();

jQuery(document).ready(function() {
    KTDatatableJsonRemoteDemo.init();
});
