@extends('layout.app')

@section('content')

<div class="grid grid-cols-1 gap-6 lg:p-10 rounded-box">
    <div class="card shadow-lg">
        <div class="card-body">
          @if (Auth::user())
            <a href="{{ url('tambah') }}" class="btn btn-primary w-60">Tambah Data</a> 
          @endif
          <div class="flex justify-between mb-5">
            <form action="{{ url('cari') }}" method="get">
              <div class="form-control mt-10">
                <div class="flex space-x-2">
                  <input type="text" placeholder="Search" name="q" {{ isset($_GET['q']) ? 'value='.$_GET['q'].'' : '' }} class="w-full input input-bordered"> 
                  <button class="btn btn-primary" type="submit">go</button>
                  <a class="btn btn-square btn-error" href="{{ url('/') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">   
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>                       
                    </svg>
                  </a> 
                </div>
              </div>          
            </form>
           
          </div>
          <div class="overflow-x-auto">
                <table class="table w-full">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nama Lengkap</th> 
                      <th>NIK</th> 
                      <th>Jabatan</th>
                      <th>Alamat</th>
                      <th>Nomor HP</th>
                      <th>Foto</th>
                      @if (Auth::user())
                        <th>Aksi</th>
                      @endif
                    </tr>
                  </thead> 
                  <tbody>
                    @php $i=1 @endphp
                    @foreach ($data as $item)
                    <tr class="hover">
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->nama_lengkap }}</td> 
                        <td>{{ $item->NIK }}</td> 
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->alamat }}</td> 
                        <td>{{ $item->nomor_hp }}</td> 
                        <td><img src="{{ asset('assets/img/' . $item->foto) }}"></td> 
                        @if (Auth::user())
                        <td>
                          <a href="{{ url('edit/' . $item->id) }}" class="btn btn-warning">Edit</a>
                          <a href="{{ url('hapus/' . $item->id) }}" class="btn btn-error">Hapus</a>
                        </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{ $data->links() }}
        </div>
    </div>
</div>
@endsection