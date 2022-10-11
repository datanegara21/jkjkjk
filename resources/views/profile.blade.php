@php 
    $layout = Auth::check() ? Auth::user()->role == 1 ? 'user' : 'admin' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Profile')

@section('content')

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid mt-15" id="kt_content">
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
                        <!--begin::Body-->
                        <div class="card-body">
                            @if(isset($edit))
                            <div class="text-right">
                                <a href="{{ url('/profile/edit') }}">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-edit"></i>Edit
                                    </div>
                                </a>
                            </div>
                            @else
                            <div class="text-right">
                                <a href="{{ url('/profile/report/'.$profile->id) }}">
                                    <div class="btn btn-danger">
                                        <i class="flaticon-exclamation-1"></i>Laporkan
                                    </div>
                                </a>
                            </div>
                            @endif
                            <!--begin::User-->
                            <div class="text-center mb-10">
                                
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label"
                                        style="background-image:url('{{ asset($profile->image) }}')">
                                    </div>
                                </div>

                                <h4 class="font-weight-bold my-2">
                                    {{ $profile->name }}
                                </h4>
                                <span class="label label-light-warning label-inline font-weight-bold label-lg">
                                    {{ count($profile->event) }} Event Dibuat
                                </span>
                                <div class="text-muted mb-2">
                                    {{ $profile->description ? $profile->description : '- - - deskripsi belum diatur - - -' }}
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="mb-10 text-center">
                                <a href="mailto:{{ $profile->email }}" target="_blank" class="btn btn-icon btn-circle btn-light-google">
                                    <i class="socicon-mail"></i>
                                </a>
                                @if($profile->whatsapp)
                                <a href="https://www.wa.me/62{{ $profile->whatsapp }}" target="_blank" class="btn btn-icon btn-circle btn-light-success">
                                    <i class="socicon-whatsapp"></i>
                                </a>
                                @endif
                                @if($profile->facebook)
                                <a href="{{ $profile->facebook }}" target="_blank" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                    <i class="socicon-facebook"></i>
                                </a>
                                @endif
                                @if($profile->instagram)
                                <a href="https://www.instagram.com/{{ $profile->instagram }}" target="_blank" class="btn btn-icon btn-circle btn-light-instagram mr-2">
                                    <i class="socicon-instagram"></i>
                                </a>
                                @endif
                                @if($profile->twitter)
                                <a href="https://www.twitter.com/{{ $profile->twitter }}" target="_blank" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                    <i class="socicon-twitter"></i>
                                </a>
                                @endif
                                @if($profile->website)
                                <a href="{{ $profile->website }}" target="_blank" class="btn btn-icon btn-circle btn-secondary">
                                    <i class="flaticon2-world"></i>
                                </a>
                                @endif
                            </div>
                            <!--end::Contact-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Item-->
                
            </div>

            <hr>
            <!--end::Row-->
            <div class="row mb-2">
            <h3 class="text-left col-10">Event dari Hummasoft</h3>
            <div class="col-2">
                
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tampilkan
                    </button>
                    <div class="dropdown-menu text-center">
                        <a class="dropdown-item" href="{{ url($url.'?show=all') }}">Semua</a>
                        <a class="dropdown-item" href="{{ url($url.'?show=new') }}">Event baru</a>
                        <a class="dropdown-item" href="{{ url($url.'?show=miss') }}">Terlewat</a>
                    </div>
                    
                </div>
            </div>
            </div>
            <!--begin::Row-->
            <div class="row">
                @if($events->isEmpty())
                <div class="col-12">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body text-center">
                            <!--begin::Wrapper-->
                            --- Belum Ada Event ---
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>
                @endif
                @foreach($events as $event)
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <!--begin::Nav Panel Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Wrapper-->
                            <div class="d-flex justify-content-between flex-column h-100">
                                <!--begin::Container-->
                                <div class="h-100">
                                    <!--begin::Header-->
                                    <div class="d-flex flex-column flex-center">
                                        <!--begin::Image-->
                                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100"
                                            style="background-image: url({{ asset($event->image ? $event->image : $event->event_template->event_category->image) }})">
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Title-->
                                        <a href="{{ url('event/'.$event->id) }}" class="card-title font-weight-bolder text-center text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">
                                            {{ $event->title }}
                                        </a>
                                        <!--end::Title-->

                                        <!--begin::Text-->
                                        <a href="{{ url('profile/'.$event->profile->email) }}" class="font-weight-bold text-dark-50 font-size-sm pb-7">
                                            {{ $event->profile->name }}
                                        </a>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="pt-1">
                                        {{-- begin::Item --}}
                                        <div class="py-9">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                
                                                <span class="font-weight-bold mr-1"><i class="far fa-calendar-alt mr-1"></i>Waktu:</span>
                                                <span class="text-muted text-right">{{ $event->date }}</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="font-weight-bold "><i class="fas fa-map-marker-alt mr-1"></i>Lokasi:</span>
                                                <span class="text-muted text-right">{{ $event->location }}</span>
                                            </div>
                                        </div>
                                        {{-- end::Item --}}
                                        
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--eng::Container-->

                                <!--begin::Footer-->
                                <div class="d-flex flex-center">
                                    <a href="{{ url('event/'.$event->id) }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-7 mr-2">
                                        Lihat Event
                                    </a>
                                    <a href="{{ url('event/like/'.$event->id) }}" class="btn btn-outline-light bg-dark-50 font-weight-bolder font-size-sm p-3">
                                        <i class="fas fa-heart {{ \App\Http\Controllers\EventController::checkLiked($event->id) ? 'text-danger' : '' }}"></i>
                                    </a>
                                </div>
                                <!--end::Footer-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panel Widget 4-->
                </div>
                @endforeach
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

@endpush