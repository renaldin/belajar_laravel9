@extends('layout.v_template')

@section('title', 'Edit Guru')

@section('content')
<div class="content">
    <form action="/guru/update/{{$guru->id_guru}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{$guru->nip}}" readonly>
                    <div class="text-danger">
                        @error('nip')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control" value="{{$guru->nama_guru}}">
                    <div class="text-danger">
                        @error('nama_guru')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" value="{{$guru->mapel}}">
                    <div class="text-danger">
                        @error('mapel')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{url('fotoGuru/'.$guru->foto)}}" alt="Foto {{$guru->nama_guru}}" width="150px">
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Foto Guru</label>
                            <input type="file" name="foto" class="form-control" value="{{$guru->foto}}">
                            <div class="text-danger">
                                @error('foto')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection