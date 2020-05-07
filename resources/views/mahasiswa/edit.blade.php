@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <h2>Edit Mahasiswa</h2>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{ route('mahasiswa.update',$mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Nama</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{$mahasiswa->nama }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>NIM</strong>
                <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" value="{{$mahasiswa->nim }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Prodi</strong>
                <input type="text" name="prodi" class="form-control" placeholder="Prodi" value="{{$mahasiswa->prodi }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Alamat</strong>
                <input type="text" name="alamat_tinggal" class="form-control" placeholder="Alamat Tinggal" value="{{$mahasiswa->alamat_tinggal }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>No Hp</strong>
                <input type="text" name="no_hp" class="form-control" placeholder="No Hp" value="{{$mahasiswa->no_hp }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
              <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection