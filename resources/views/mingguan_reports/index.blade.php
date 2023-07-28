@extends('layouts.app')

@section('title', 'Data Report Mingguan')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('mingguan_reports.search') }}" method="GET">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" name="query" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    <div class="card-body">
        <a href="{{ route('mingguan_reports.tambah') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Laporan</a>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Vendor</th>
              <th>NO PA</th>
              <th>Alamat</th>
              <th>Tanggal Update</th>
              <th>Status Pekerjaan</th>
              <th>Tipe Kendala</th>
              <th>Deskripsi Kendala</th>
              <th>Est. PIG Tarikan</th>
              <th>Realisasi Tarikan</th>
              <th>Est. PIG Tracing</th>
              <th>Realisasi Tracing</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->id_vendor }}</td>
                <td>{{ $row->no_pa}}</td>
                <td>{{ $row->alamat}}</td>
                <td>{{ $row->tanggal_update }}</td>
                <td>{{ $row->status_pekerjaan }}</td>
                <td>{{ $row->tipe_kendala }}</td>
                <td>{{ $row->deskripsi_kendala }}</td>
                <td>{{ $row->est_pig_tarikan }}</td>
                <td>{{ $row->realisasi_tarikan }}</td>
                <td>{{ $row->est_pig_tracing }}</td>
                <td>{{ $row->realisasi_tracing }}</td>
                <td>{{ $row->keterangan }}</td>
                <td>
                    <a href="{{ route('mingguan_reports.edit', $row->id) }}" class="btn btn-warning">Edit &nbsp;&nbsp;&nbsp;<i class="fas fa-pen"></i></a>
                    <a href="{{ route('mingguan_reports.hapus', $row->id) }}" class="btn btn-danger">Hapus &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt "></i></a>
            </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

