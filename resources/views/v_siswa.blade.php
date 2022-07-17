@extends('layout.v_template')

@section('title', 'Siswa')

@section('content')

<a href="/siswa/print" target="_blank" class="btn btn-sm btn-primary">Print To Printer</a>
<a href="/siswa/printPdf" target="_blank" class="btn btn-sm btn-success">Print To PDF</a>
<br>
<table id="example1" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;?>
        @foreach ($siswa as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nis}}</td>
                <td>{{$data->nama_siswa}}</td>
                <td>{{$data->kelas}}</td>
                <td>{{$data->mapel}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection