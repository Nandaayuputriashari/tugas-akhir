@extends('layouts.auth')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-6 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-4">
                    <!-- Nested Row -->
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan Email...">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" required placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>

                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('register') }}">Belum punya akun? Daftar!</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
