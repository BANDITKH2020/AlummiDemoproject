@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="">
                <div class="card-header text-bg-light text-center mt-1"><h3 style="font-weight: bold;">Login Admin</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('loginAdmin') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" style="font-size: 24px;font-family:'TH Niramit AS';"class="col-md-4 col-form-label text-md-end">{{ __('ชื่อบัญชีผู้ใช้งาน') }}</label>

                            <div class="col-md-6">
                                <input id="email" style="font-size: 24px;font-family:'TH Niramit AS';"type="text" class="form-control" name="email" value="{{ old('email') }}" required >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" style="font-size: 24px;font-family:'TH Niramit AS';"class="col-md-4 col-form-label text-md-end">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password"style="font-size: 24px;font-family:'TH Niramit AS';" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" style="font-size: 24px;font-family:'TH Niramit AS';"class="btn btn-primary">
                                    {{ __('เข้าสู่ระบบ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
