<?php

namespace App\Http\Controllers;

use App\Models\MingguanReport;
use Illuminate\Http\Request;

class MingguanReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mingguan_reports = MingguanReport::get();

        return view('mingguan_reports.index', ['data' => $mingguan_reports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('mingguan_reports.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $data = [
            'id_vendor' => $request->input('id_vendor'),
            'no_pa' => $request->input('no_pa'),
            'alamat' => $request->input('alamat'),
            'tanggal_update' => $request->input('tanggal_update'),
            'status_pekerjaan' => $request->input('status_pekerjaan'),
            'tipe_kendala' => $request->input('tipe_kendala'),
            'deskripsi_kendala' => $request->input('deskripsi_kendala'),
            'est_pig_tarikan' => $request->input('est_pig_tarikan'),
            'realisasi_tarikan' => $request->input('realisasi_tarikan'),
            'est_pig_tracing' => $request->input('est_pig_tracing'),
            'realisasi_tracing' => $request->input('realisasi_tracing'),
            'keterangan' => $request->input('keterangan'),
        ];
        $mingguan_reports = MingguanReport::create($data);

        if ($request->has('pesan_lagi') && $request->pesan_lagi === 'true') {
            return redirect()->route('mingguan_reports.tambahCustomer')->with('id_vendor', $request->id_vendor)->with('id_user', $request->id_user);
        }

        return redirect()->route('mingguan_reports');
    }

    /**
     * Display the specified resource.
     */
    public function show(MingguanReport $mingguanReports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mingguan_reports = MingguanReport::find($id);

        return view('mingguan_reports.form', ['mingguan_reports' => $mingguan_reports]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        MingguanReport::find($id)->update([
            'id_vendor' => $request->input('id_vendor'),
            'no_pa' => $request->input('no_pa'),
            'alamat' => $request->input('alamat'),
            'tanggal_update' => $request->input('tanggal_update'),
            'status_pekerjaan' => $request->input('status_pekerjaan'),
            'tipe_kendala' => $request->input('tipe_kendala'),
            'deskripsi_kendala' => $request->input('deskripsi_kendala'),
            'est_pig_tarikan' => $request->input('est_pig_tarikan'),
            'realisasi_tarikan' => $request->input('realisasi_tarikan'),
            'est_pig_tracing' => $request->input('est_pig_tracing'),
            'realisasi_tracing' => $request->input('realisasi_tracing'),
            'keterangan' => $request->input('keterangan'),
        ]);
        
        return redirect()->route('mingguan_reports');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        //try {
        $mingguan_reports = MingguanReport::find($id);

        // cek apakah kereta memiliki relasi dengan gerbong
        // if ($jenis_pencuci->transaksi()->exists()) {
        //     throw new GlobalException("Tidak dapat menghapus jenis pencuci yang masih memiliki transaksi terkait.");
        // }

        $mingguan_reports->delete();

        return redirect()->route('mingguan_reports')->with('success', 'Data berhasil dihapus');
        // } catch (FFIException $e) {
        //     return redirect()->back()->withErrors([$e->getMessage()]);
        // }
    }
    public function destroy(MingguanReport $mingguan_reports)
    {
        //
    }
    public function tambahData()
    {
        $user = User::get();
        $mingguan_reports = MingguanReport::get();

        $id_vendor = session('id_vendor');
        $id_user = session('id_user');

        $mingguan_reports = null;
        if ($id_vendor && $id_user) {
            $mingguan_reports = new MingguanReport();
            $mingguan_reports->id_vendor = $id_vendor;
            $mingguan_reports->id_user = $id_user;
        }

        return view('tambahData', [
            'user' => $user,
            'mingguan_reports' => $mingguan_reports
        ]);
    }



    public function simpanData(Request $request)
    {
        $data = [
            'id_vendor' => $request->id_vendor,
            'no_pa' => $request->no_pa,
            'alamat'=> $request->alamat,
            'tanggal_update' => $request->tanggal_update,
            'status_pekerjaan' => $request->status_pekerjaan,
            'tipe_kendala' => $request->tipe_kendala,
            'deskripsi_kendala' => $request->deskripsi_kendala,
            'est_pig_tarikan' => $request->est_pig_tarikan,
            'realisasi_tarikan' => $request->realisasi_tarikan,
            'est_pig_tracing' => $request->est_pig_tracing,
            'realisasi_tracing' => $request->realisasi_tracing,
            'keterangan' => $request->keterangan,
        ];

        $mingguan_reports = MingguanReport::create($data);

        if ($request->has('pesan_lagi') && $request->pesan_lagi === 'true') {
            return redirect()->route('mingguan_reports.tambahData')->with('id_vendor', $request->id_vendor)->with('id_user', $request->id_user);
        }

        return redirect()->route('home');
    }

}