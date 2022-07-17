<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;

class GuruController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->GuruModel = new GuruModel();
    }

    public function index()
    {
        $data = [
            'guru'  => $this->GuruModel->allData(),
        ];
        return view('v_guru', $data);
    }

    public function detail($idGuru)
    {
        if (!$this->GuruModel->detailData($idGuru)) {
            abort(404);
        }

        $data = [
            'guru' => $this->GuruModel->detailData($idGuru)
        ];
        return view('v_detailGuru', $data);
    }

    public function add()
    {
        return view('v_addguru');
    }

    public function insert()
    {
        Request()->validate([
            'nip'   => 'required|unique:tbl_guru,nip|min:4|max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg|max:1024',
        ], [
            'nip.required' => 'Nip harus diisi',
            'nip.unique' => 'Nip sudah ada',
            'nip.min' => 'Minimal 4 karakter',
            'nip.max' => 'Maksimal 5 karakter',
            'nama_guru.required' => 'Nip harus diisi',
            'mapel.required' => 'Nip harus diisi',
            'foto.required' => 'Nip harus diisi',
            'foto.mimes' => 'Format harus jpg , jpeg, png',
        ]);

        // upload foto
        $file = Request()->foto;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('fotoGuru'), $fileName);

        $data = [
            'nip'       => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel'     => Request()->mapel,
            'foto'      => $fileName,
        ];

        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan', 'Data berhsail ditambahkan');
    }

    public function edit($idGuru)
    {
        if (!$this->GuruModel->detailData($idGuru)) {
            abort(404);
        }

        $data = [
            'guru'  => $this->GuruModel->detailData($idGuru)
        ];
        return view('v_editguru', $data);
    }

    public function update($idGuru)
    {
        Request()->validate([
            'nip'       => 'required|min:4|max:5',
            'nama_guru' => 'required',
            'mapel'     => 'required',
            'foto'      => 'mimes:png,jpg,jpeg|max:1024',
        ], [
            'nip.required'          => 'Nip harus diisi',
            'nip.min'               => 'Minimal 4 karakter',
            'nip.max'               => 'Maksimal 5 karakter',
            'nama_guru.required'    => 'Nip harus diisi',
            'mapel.required'        => 'Nip harus diisi',
            'foto.mimes'            => 'Format harus jpg , jpeg, png',
        ]);

        if (Request()->foto <> "") {
            // upload foto

            $guru = $this->GuruModel->detailData($idGuru);
            if ($guru->foto <> "") {
                unlink(public_path('fotoGuru') . '/' . $guru->foto);
            }

            $file       = Request()->foto;
            $fileName   = Request()->nip . '.' . $file->extension();
            $file->move(public_path('fotoGuru'), $fileName);

            $data = [
                'id_guru'   => $idGuru,
                'nip'       => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel'     => Request()->mapel,
                'foto'      => $fileName,
            ];

            $this->GuruModel->editData($data);
        } else {
            // jika tidak ganti foto
            $data = [
                'id_guru'   => $idGuru,
                'nip'       => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel'     => Request()->mapel,
            ];

            $this->GuruModel->editData($data);
        }
        return redirect()->route('guru')->with('pesan', 'Data berhsail diupdate');
    }

    public function hapus($idGuru)
    {
        $data = [
            'id_guru'   => $idGuru
        ];

        $guru = $this->GuruModel->detailData($idGuru);
        if ($guru->foto <> "") {
            unlink(public_path('fotoGuru') . '/' . $guru->foto);
        }

        $this->GuruModel->deleteData($data);
        return redirect()->route('guru')->with('pesan', 'Data berhasil dihapus');
    }
}
