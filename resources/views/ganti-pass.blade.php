@extends('layout.app')

@section('content')
<div class="grid grid-cols-5 gap-4 lg:p-10 rounded-box">
    <div class="col-start-2 col-span-3">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="text-2xl text-center font-bold">Ganti Password</div>
                <form action="{{ url('ganti-password/action') }}" method="post">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password Lama</span>
                        </label> 
                        <input type="password" name="oldPass" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password Baru</span>
                        </label> 
                        <input type="password" name="newPass" class="input input-bordered">
                    </div>
                    <button class="btn btn-primary mt-3 w-48" type="submit">Simpan</button>
                    <a class="btn btn-secondary mt-3 w-48" href="{{ url('/') }}">Kembali</a> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection