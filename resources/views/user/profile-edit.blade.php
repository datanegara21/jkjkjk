@php 
    $layout = Auth::check() ? 'user' : 'guest';
@endphp

@extends('layouts.'.$layout)

@section('title','Ubah Profil')

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
                            <form class="form" action="{{ url('/profile/edit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header py-3">
                                        <div class="card-title align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark">Profil
                                            </h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah profil mu</span>
                                        </div>
                                        <div class="card-toolbar">
                                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                                            <button type="reset" class="btn btn-secondary">Batal</button>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label
                                                class="col-xl-3 col-lg-3 col-form-label text-right">Foto</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="image-input image-input-outline"
                                                    id="kt_profile_avatar"
                                                    style="background-image: url({{ asset('assets/media/users/blank.png') }})">
                                                    <div class="image-input-wrapper"
                                                        style="background-image: url({{ asset ($user->image) }})">
                                                    </div>

                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="profile_avatar"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="profile_avatar_remove" />
                                                    </label>

                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>

                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="remove" data-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                                <span class="form-text text-muted">Tipe file yang diperbolehkan: png, jpg,
                                                    jpeg.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}" name="name" required/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Email</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" value="{{ Auth::user()->email }}" placeholder="{{ Auth::user()->email }}" name="email" required/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Deskripsi</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder="{{ $user->description != null ? $user->description : 'Deskripsikan tentang diri anda' }}">{{ $user->description != null ? $user->description : old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mt-10 mb-6">Info Kontak (opsional)</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Whatsapp</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text">wa.me/62</span></div>
                                                    <input type="text" name="whatsapp"
                                                        class="form-control form-control-lg form-control-solid"
                                                        value="{{ $user->whatsapp != null ? $user->whatsapp : old('whatsapp') }}" placeholder="{{ $user->whatsapp != null ? $user->whatsapp : '81234567890' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Facebook</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text"></span></div>
                                                    <input type="text" name="facebook"
                                                        class="form-control form-control-lg form-control-solid"
                                                        value="{{ $user->facebook != null ? $user->facebook : old('facebook') }}" placeholder="{{ $user->facebook != null ? $user->facebook : 'https://www.facebook.com/your.url' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Instagram</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text">@</span></div>
                                                    <input type="text" name="instagram"
                                                        class="form-control form-control-lg form-control-solid"
                                                        value="{{ $user->instagram != null ? $user->instagram : old('instagram') }}" placeholder="{{ $user->instagram != null ? $user->instagram : 'your.name' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Twitter</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text">@</span></div>
                                                    <input type="text" name="twitter"
                                                        class="form-control form-control-lg form-control-solid"
                                                        value="{{ $user->twitter != null ? $user->twitter : old('twitter') }}" placeholder="{{ $user->twitter != null ? $user->twitter : 'your.name' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Website</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text"></span></div>
                                                    <input type="text" name="website"
                                                        class="form-control form-control-lg form-control-solid"
                                                        value="{{ $user->website != null ? $user->website : old('website') }}" placeholder="{{ $user->website != null ? $user->website : 'https://www.yourweb.com' }}"/>
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
                    <!--begin::Card-->
                    <div class="card mt-5 card-custom">
                        <!--begin::Content-->
                        <div class="flex-row-fluid ml-lg-8">
                            <!--begin::Form-->
                            <form class="form" action="{{ url('/password/edit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header py-3">
                                        <div class="card-title align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark">Password
                                            </h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah password akun mu</span>
                                        </div>
                                        <div class="card-toolbar">
                                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                                            <button type="reset" class="btn btn-secondary">Batal</button>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Password Lama</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input type="password" name="old_password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="old_password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Password Baru</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input type="password" name="new_password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="new_password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Konfirmasi Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input type="password" name="confirm_password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="new_password" />
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
@endpush