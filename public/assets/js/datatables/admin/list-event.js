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
                source: HOST_URL + '/api/admin/event/data',
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
            },  {
                field: 'title',
                title: 'Judul',
                width: 130,
                template: function(data) {
                    var out = `<a href="/event/`+data.id+`" class="text-dark">`+data.title+`</a>`;
                    return out
                }
                
            }, {
                field: 'email',
                title: 'Pembuat',
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
                field: 'created_at',
                title: 'Tanggal dibuat',
                template: function(data) {
                    return data.created_at
                }
            }, 
            // {
            //     field: 'Status',
            //     title: 'Status',
            //     // callback function support for column rendering
            //     template: function(row) {
            //         var status = {
            //             'active': {
            //                 'class': ' label-light-success',
            //                 'title': 'aktif'
            //             },
            //             'banned': {
            //                 'class': ' label-light-danger',
            //                 'title': 'diblokir'
            //             },
            //             'warning': {
            //                 'class': ' label-light-warning',
            //                 'title': 'dilaporkan'
            //             },
            //         };
            //         return '<span class="label font-weight-bold label-lg label-inline'+status[row.status].class+'">'+status[row.status].title+'</span>';
            //     },
            // },
             {
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
                        <div class="modal fade" id="eventDelete`+data.id+`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body px-10">
                                        <div>Apakah anda yakin ingin menghapus event `+data.title+`</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light-primary font-weight-bold" data-dismiss="modal" aria-label="Close">Batal</button>
                                        <a href="/admin/event/delete/`+data.id+`" class="btn btn-primary font-weight-bold">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end::DelModal-->
                        
                        <button class="btn btn-sm btn-clean btn-icon" title="Hapus Akun" data-toggle="modal" data-target="#eventDelete`+data.id+`">
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
            datatable.search($(this).val().toLowerCase(), 'status');
        });

        $('#kt_datatable_search_status').selectpicker();
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
