@extends('layout.v_template')

@section('title', 'Detail Guru')

@section('content')
<table class="table">
    <tr>
        <th width="100px">NIP</th>
        <td width="30px">:</td>
        <td>{{$guru->nip}}</td>
    </tr>
    <tr>
        <th width="150px">Nama Guru</th>
        <td width="30px">:</td>
        <td>{{$guru->nama_guru}}</td>
    </tr>
    <tr>
        <th width="150px">Mata Pelajaran</th>
        <td width="30px">:</td>
        <td>{{$guru->mapel}}</td>
    </tr>
    <tr>
        <th width="150px">Foto</th>
        <td width="30px">:</td>
        <td><img src="{{url('fotoGuru/'.$guru->foto)}}" width="200px" alt="Foto {{$guru->nama_guru}}"></td>
    </tr>
    <tr>
        <td>
            <a href="/guru" class="btn btn-sm btn-primary">Kembali</a>
        </td>
    </tr>
</table>
@endsection