<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use Dompdf\Dompdf;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->SiswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'siswa'     => $this->SiswaModel->allData(),
        ];

        return view('v_siswa', $data);
    }

    public function print()
    {
        $data = [
            'siswa'     => $this->SiswaModel->allData(),
        ];

        return view('v_print', $data);
    }

    public function printPdf()
    {
        $data = [
            'siswa'     => $this->SiswaModel->allData(),
        ];
        $html = view('v_printPdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $options = $dompdf->getOptions();
        $options->setIsHtml5ParserEnabled(true);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
