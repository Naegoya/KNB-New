@extends('layouts.customer')

@section('title', 'Form Laporan')

@section('contents')

    @php
        use App\Models\User;
        use App\Models\MingguanReport;


        $user = User::get();
        $mingguan_reports = MingguanReport::get();

        $id_vendor = 'TR' . mt_rand(1000, 9999);
        $existing_ids = \App\Models\MingguanReport::pluck('id_vendor')->toArray();
        while (in_array($id_vendor, $existing_ids)) {
            $id_vendor = 'TR' . mt_rand(1000, 9999);
        }
    @endphp

    <form action="{{ route('mingguan_reports.tambahData.simpanData') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($mingguan_reports) ? 'Form Edit Data' : 'Form Tambah Laporan' }}</h6>
                    </div>
                    <!-- <div class="card-body">
                        <div class="form-group">
                            <label for="id_vendor">ID Vendor</label>
                            <input type="text" class="form-control" id="id_vendor" name="id_vendor"
                                value="{{ isset($mingguan_reports) ? $mingguan_reports->id_vendor : $id_vendor }}" readonly>
                        </div> -->

                        <div class="form-group">
                            <label for="id_user">User</label>
                            <input type="text" class="form-control" id="id_user" name="id_user"
                                value="{{ auth()->user()->id }}" hidden>
                            <input type="text" class="form-control" id="id_jadwal" value="{{ auth()->user()->nama }}"
                                readonly>
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

                        <!-- <div class="form-group">
                            <label for="id_jenis_pencuci">Jenis Pencuci</label>
                            <select name="id_jenis_pencuci" id="id_jenis_pencuci" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Jenis Pencuci --</option>
                                @foreach ($jenis_pencuci as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_jenis_pencuci == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->jenis_pencuci }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ isset($transaksi) ? $transaksi->catatan : '' }}</textarea>
                        </div> -->

                        <p><strong>Petunjuk Pembayaran Offline Laundry Qyalin</strong></p>
                        <ol>
                            <li>Silahkan Anda Datang Langsung Ke Gerai <b>Laundry Qyalin</b></li>
                            <li>Alamat <b>Laundry Qyalin</b> Ada Pada Bio IG Kami <b>Silahkan Akses Link Tersebut</b></li>
                            <li><b>Berikan</b> Laundry Yang Anda Pesan Pada <b>Ibu Siti Badriyah</b> Untuk Pengambilan Nota
                                Yang Akan Gunakan Untuk Mengambil Pakaian Anda</li>
                            <li>Kembali Pada <b>Tanggal Selesai</b>,
                                Untuk Mengambil Serta Membayar Laundry Anda Atas Nama <b>
                                    {{ auth()->user()->nama }}. </b></li>
                            <li>Selesai. <b>Kami Menyambut Anda Dengan Hangat</b> Terima Kasih</li>
                        </ol>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="submit" class="btn btn-primary" name="pesan_lagi" value="true">Pesan Lagi</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

@endsection
