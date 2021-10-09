<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::orderBy('nama_lengkap', 'ASC')->paginate(10);
        return view('index', compact('data'));
        // dd($data);
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function tambah_aksi(Request $request)
    {  
        if ($request->file('foto')) {
            $file = $request->file('foto');       
            $tujuan_upload = 'assets/img';
            $file->move($tujuan_upload,$file->getClientOriginalName());
            
            $data = $request->all();
            $data['foto'] = $file->getClientOriginalName();
            Employee::create($data);
            return back()->with('sukses', 'Sukses menambah data');
            // dd($request->all());
        } else {
            return back()->with('error', 'Gagal menambah data');
        }
    }

    public function edit($id)
    {
        $data = Employee::findOrFail($id);
        return view('edit', compact('data'));
    }

    public function edit_aksi($id, Request $request)
    {
        $data = Employee::findOrFail($id);
        $params = $request->all();
        if ($request->file('foto')) {
            $file = $request->file('foto');       
            $tujuan_upload = 'assets/img';
            $file->move($tujuan_upload,$file->getClientOriginalName());
            
            $params['foto'] = $file->getClientOriginalName();
        } else {
            $params['foto'] = $data->foto;
        }
        
       if($data->update($params)) {
            return back()->with('sukses', 'Sukses mengedit data');
        } else {
            return back()->with('error', 'Gagal mengedit data');
        }
    }

    public function delete($id)
    {
        $data = Employee::findOrFail($id);
        if ($data->delete()) {
            return back()->with('sukses', 'Sukses menghapus data');
        } else {
            return back()->with('error', 'Gagal menghapus data');
        }
    }

    public function cari(Request $request)
    {
        $data = Employee::where('nama_lengkap', 'LIKE', '%'.$request->q.'%')->paginate(10);
        return view('index', compact('data'));
    }

    public function filter(Request $request)
    {
        $data = Employee::where('tglSidang', $request->tglSidang)->orderBy('namaLengkap', 'ASC')->paginate(10);
        return view('index', compact('data'));
    }

    public function ubahStatus($id, Request $request)
    {
        $data = Employee::findOrFail($id);
        if ($data->update(['perkaraSelesai' => $request->statusPerkara ? '1' : '0'])) {
            return back()->with('sukses', 'Sukses mengubah status');
        } else {
            return back()->with('error', 'Gagal mengubah status');
        }
    }
}
