@extends('layout.app')

@section('content')
<div class="grid grid-cols-5 gap-4 lg:p-10 rounded-box">
    <div class="col-start-2 col-span-3">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="text-2xl text-center font-bold">Tambah Data</div>
                <form action="{{ url('add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </label> 
                        <input type="text" name="nama_lengkap" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NIK</span>
                        </label> 
                        <input type="text" name="NIK" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Jabatan</span>
                        </label> 
                        <input type="text" name="jabatan" class="input input-bordered">
                    </div> 
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Alamat</span>
                        </label> 
                        <textarea name="alamat" class="input input-bordered"></textarea>
                    </div>           
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nomor HP</span>
                        </label> 
                        <input type="numeric" name="nomor_hp" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Foto</span>
                        </label> 
                        <input type="file" name="foto" class="input input-bordered">
                    </div>
                    <button class="btn btn-primary mt-3 w-48" type="submit">Simpan</button>
                    <a class="btn btn-secondary mt-3 w-48" href="{{ url('/') }}">Kembali</a> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection