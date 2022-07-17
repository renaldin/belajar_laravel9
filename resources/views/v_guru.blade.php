@extends('layout.v_template')

@section('title', 'Guru')

@section('content')
<a href="/guru/add" class=" btn btn-primary btn-sm">Add</a><br>
<br>
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        {{session('pesan')}}
    </div>
@endif
<br>
<table id="example1" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;?>
        @foreach ($guru as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nip}}</td>
                <td>{{$data->nama_guru}}</td>
                <td>{{$data->mapel}}</td>
                <td><img src="{{ url('fotoGuru/'.$data->foto) }}" width="100px" alt="Foto {{$data->nama_guru}}"></td>
                <td>
                    <a href="/guru/detail/{{$data->id_guru}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/guru/edit/{{$data->id_guru}}" class="btn btn-sm btn-success">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{$data->id_guru}}">
                        Hapus
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@foreach ($guru as $data)
    <div class="modal modal-danger fade" id="hapus{{$data->id_guru}}">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Guru</h4>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <a href="/guru/hapus/{{$data->id_guru}}" class="btn btn-outline">Yes</a>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
@endsection