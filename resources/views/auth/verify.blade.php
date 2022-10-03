@extends('layouts.user')

@section('title', 'Verifikasi email')

@section('content')
<div class="content  d-flex flex-column flex-column-fluid mt-15" id="kt_content">
    <div class="row justify-content-center my-7">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Alamat Emailmu</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link verifikasi yang baru telah dikirim ke alamat email.
                        </div>
                    @endif

                    Sebelum melanjutkan, silahkan cek emailmu untuk mendapat link verifikasi.
                    Jika kamu tidak mendapatkan email, 
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"> klik  disini untuk mendapat pesan baru</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
