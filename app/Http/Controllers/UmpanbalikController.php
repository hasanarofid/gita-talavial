<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\UmpanbalikM;
use App\Models\UmpanbalikT;
use App\TanggapanUmpanbalikT;
use App\User;
use Illuminate\Http\Request;

class UmpanbalikController extends Controller
{
   //index
   public function index(){
    return view('dashboard_pengawas.umpanbalik.index');
    }

    public function umpan($generate){
        $model = UmpanbalikT::where('generate_url',$generate)->first();
        $pengawas = User::find($model->id_pengawas);
        $pelaporan = Pelaporan::find($model->id_pelaporan);
        // dd($pengawas);
        $umpanBalikM = UmpanbalikM::where('aspek','pendampingan')->orderBy('urutan')->get();
        $umpanBalikM2 = UmpanbalikM::where('aspek','kompetensi')->orderBy('urutan')->get();
        $umpanBalikM3 = UmpanbalikM::where('aspek','lainnya')->orderBy('urutan')->get();

        return view('umpanbalik.index',compact(
            'pengawas',
            'model',
            'umpanBalikM',
            'umpanBalikM2',
            'umpanBalikM3',
            'pelaporan'
        ));
    }

    public function saveumpan(Request $request){
        $model = new TanggapanUmpanbalikT();
        $model->id_umpanbalik  = $request->post('id_umpanbalik');
        $model->jawaban_1  = $request->post('jawaban_1');
        $model->jawaban_2  = $request->post('jawaban_2');
        $model->jawaban_3  = $request->post('jawaban_3');
        $model->jawaban_4  = $request->post('jawaban_4');
        $model->jawaban_5  = $request->post('jawaban_5');
        $model->jawaban_6  = $request->post('jawaban_6');
        $model->jawaban_7  = $request->post('jawaban_7');
        $model->jawaban_8  = $request->post('jawaban_8');
        $model->jawaban_9  = $request->post('jawaban_9');
        $model->jawaban_10  = $request->post('jawaban_10');
        $model->jawaban_11  = $request->post('jawaban_11');
        $model->save();
        return redirect()->route('tanggapan')->with('success', 'Umpan Balik anda berhasil disimpan. terima kasih untuk tanggapan anda');
    }

    public function tanggapan(){
        return view('umpanbalik.umpanbalik');
    }

}
