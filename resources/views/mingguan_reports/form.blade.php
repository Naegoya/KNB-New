@extends('layouts.app')

@section('title', 'Form Foto Progresan')

@section('contents')
<form action="{{ isset($mingguan_reports) ? route('mingguan_reports.tambah.update', $mingguan_reports->id) : route('mingguan_reports.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($mingguan_reports) ? 'Form Edit Report' : 'Form Tambah Laporan' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_vendor">ID Vendor</label>
              <input type="text" class="form-control" id="id_vendor" name="id_vendor" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="no_pa">No PA</label>
              <input type="text" class="form-control" id="no_pa" name="no_pa" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
                                <label for="tanggal_update">Tanggal Update</label>
                                <input name="tanggal_update" type="date"
                                    class="form-control form-control-user @error('tanggal_update')is-invalid @enderror"
                                    id="exampleInputDate" placeholder="Tanggal Update"
                                    value="{{ isset($user) ? $user->tanggal_update : '' }}">
                                @error('tanggal_update')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
            <div class="form-group">
              <label for="status_pekerjaan">Status Pekerjaan</label>
              <input type="text" class="form-control" id="status_pekerjaan" name="status_pekerjaan" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="tipe_kendala">Tipe Kendala</label>
              <input type="text" class="form-control" id="tipe_kendala" name="tipe_kendala" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="deskripsi_kendala">Deskripsi Kendala</label>
              <input type="text" class="form-control" id="deskripsi_kendala" name="deskripsi_kendala" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="est_pig_tarikan">Est.Pig Tarikan</label>
              <input type="text" class="form-control" id="est_pig_tarikan" name="est_pig_tarikan" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="realisasi_tarikan">Realisasi Tarikan</label>
              <input type="text" class="form-control" id="realisasi_tarikan" name="realisasi_tarikan" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="est_pig_tracing">Est.Pig Tracing</label>
              <input type="text" class="form-control" id="est_pig_tracing" name="est_pig_tracing" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="realisasi_tracing">Realisasi tracing</label>
              <input type="text" class="form-control" id="realisasi_tracing" name="realisasi_tracing" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ isset($mingguan_reports) ? $mingguan_reports->id_mingguan_reports : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

         