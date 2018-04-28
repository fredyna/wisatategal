@extends('layout.master')
@section('content')
  <div class="container" id="content">
    <div class="col-sm-10 offset-sm-1">
      {{-- Button group --}}
      <div class="btn-group btn-group-toggle">
        <a href="{{url('/wisata')}}" class="btn btn-info"><i class="fas fa-table"></i> Tampilkan Data</a>
        <a href="{{url('/wisata/tambah')}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Tambah Data</a>
        <a href="{{url('/wisata/cetak')}}" class="btn btn-primary"><i class="fas fa-print"></i> Cetak PDF</a>
      </div>

      {{-- form tambah data --}}

      <form method="post" action="{{url('/wisata/'.$wisata->id)}}" enctype="multipart/form-data">
        @csrf {{-- untuk mencegah serangan csrf --}}
        @method('PUT') {{-- untuk keperluan update --}}

        <div class="form-group row">
          <label for="kode_wisata" class="col-sm-2 col-form-label">Kode Wisata</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="kode_wisata" id="kode_wisata" placeholder="Kode Wisata" value="{{ $wisata->kode_wisata }}" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="nama_wisata" class="col-sm-2 col-form-label">Nama Wisata</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_wisata" id="nama_wisata" placeholder="Nama Tempat Wisata" value="{{ $wisata->nama_wisata }}" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat.." value="{{ $wisata->alamat }}" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="gambar" id="gambar">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </div>
      </form>

      {{-- end form tambah data --}}

    </div>
  </div>
@endsection
