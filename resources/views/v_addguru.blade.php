@extends('layout.v_template')

@section('title', 'Add Guru')

@section('content')
<div class="content">
    <form action="/guru/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{old('nip')}}">
                    <div class="text-danger">
                        @error('nip')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control" value="{{old('nama_guru')}}">
                    <div class="text-danger">
                        @error('nama_guru')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" value="{{old('mapel')}}">
                    <div class="text-danger">
                        @error('mapel')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto Guru</label>
                    <input type="file" name="foto" class="form-control" value="{{old('foto')}}">
                    <div class="text-danger">
                        @error('foto')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection