@extends('layout.master')
@section('content')
  <div class="container" id="content">
    <div class="col">
      {{-- Button group --}}
      <div class="btn-group btn-group-toggle">
        <a href="{{url('/wisata')}}" class="btn btn-info"><i class="fas fa-table"></i> Tampilkan Data</a>
        <a href="{{url('/wisata/create')}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Tambah Data</a>
        <a href="{{url('/cetak')}}" class="btn btn-primary"><i class="fas fa-print"></i> Cetak PDF</a>
      </div>

      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Wisata</th>
            <th>Nama Wisata</th>
            <th>Gambar</th>
            <th>Alamat</th>
            <th>Aksi</t>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @isset($wisata) {{-- mengecek jika data ada --}}

            @foreach ($wisata as $w) {{-- lopping data --}}
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $w->kode_wisata }}</td>
                <td>{{ $w->nama_wisata }}</td>
                <td>
                  <img src="{{ asset('uploads/'.$w->gambar)}}" alt="Gambar Wisata" style="height:75px;">
                </td>
                <td>{{ $w->alamat }}</td>
                <td class="text-center">
                  <form action="{{ url('/wisata/'.$w->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="location.href='{{ url('/wisata/'.$w->id.'/edit') }}'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach

          @endisset
        @empty ($wisata) {{-- mengecek jika data tidak ada --}}
            <tr>
              <td colspan="6" class="text-center"><i>Tidak Ada Data</i></td>
            </tr>
          @endempty
        </tbody>
      </table>
    </div>
  </div>
@endsection
