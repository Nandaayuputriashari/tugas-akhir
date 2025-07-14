@extends('layouts.auth')

@section('content')
<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-xl-6 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Lengkap">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" required placeholder="Email">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" name="password" required placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" name="password_confirmation" required placeholder="Ulangi Password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar Akun
                        </button>
                    </form>

                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Sudah punya akun? Login!</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
