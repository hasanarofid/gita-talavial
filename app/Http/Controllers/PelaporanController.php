<?php

namespace App\Http\Controllers;

use App\GuruM;
use App\Models\Kategory;
use App\Models\TugaskerjaT;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\RencanaKerjaT;
use App\Models\SekolahbinaanT;
use App\Models\SubKategory;
use App\Models\UmpanbalikT;
use App\SekolahM;
use Auth;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\Http;
class PelaporanController extends Controller
{
     //index
     public function index(){
        $kegiatan = TugaskerjaT::with('tugas')
        ->where('id_pengawas',Auth::user()->id)->get();
        $kategory = Kategory::get();
        $subkategory = [];
        $binaan = SekolahbinaanT::with('sekolah')
        ->where('id_pengawas',Auth::user()->id)->get();
        // dd($binaan);

        return view('dashboard_pengawas.pelaporan.index',
        compact('kegiatan','kategory','subkategory','binaan')
    );
    }

    // save pelaporan
    public function save(Request $request){
        
        // dd($request);
        // if ($request->hasFile('foto')) {
        //     $image = $request->file('foto');

        //     // Generate a unique name based on the current date and time.
        //     $imageName = 'laporan'.now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        
        //     // Store the image in the "blog" directory within the "public" disk.
        //     $request->foto->storeAs('laporan', $imageName, 'public');
            
        // }else{
        //     $imageName = 'userdefault.jpg';
        // }
                // $pelaporan->foto = $imageName;

        $pelaporan = new Pelaporan();
        $pelaporan->id_sekolah = $request->post('id_sekolah');
        $pelaporan->id_tugas = $request->post('id_tugas');
        $pelaporan->kategori = $request->post('kategori');
        $pelaporan->sub_kategori = $request->post('sub_kategori');
        $pelaporan->sasaran = $request->post('sasaran');
        $pelaporan->object = $request->post('objek');
        $pelaporan->judul = $request->post('judul');
        $pelaporan->tgl_pendampingan = $request->post('tgl_pendampingan');
        $pelaporan->deskripsi_permasalahan = $request->post('deskripsi_permasalahan_hidden');
        $pelaporan->uraian = $request->post('uraian_hidden');
        $pelaporan->catatan_evaluasi = $request->post('catatan_hidden');
        $pelaporan->saran_rekomendasi = $request->post('saran_hidden');
        $pelaporan->id_pegawas = Auth::user()->id;
        $pelaporan->save();

        // $this->buildUmpanBalik($pelaporan->id);
        $this->buildUmpanBalik(1);
            
        return redirect()->route('pengawas.pelaporan')->with('success', 'Pelaporan berhasil disimpan!');
    }

    // build buildUmpanBalik
    public static function buildUmpanBalik($id){
        $pelaporan = Pelaporan::find($id);
        $user = GuruM::where('sekolah_id',$pelaporan->id_sekolah)
                    ->where('jabatan','Kepala Sekolah')->first();
                    // dd($user);
        $uniqueUrl = Str::uuid()->getHex();
        $umpanBalik = new UmpanbalikT();
        $umpanBalik->id_pelaporan = $id;
        $umpanBalik->id_user = $user->id;
        $umpanBalik->id_pengawas = $pelaporan->id_pegawas;
        $umpanBalik->generate_url = $uniqueUrl;
        $umpanBalik->save();
        //  kirim wa
        $token = env('WABLAS_TOKEN');
        // $phone = '62881026697527'; // Ganti dengan nomor telepon tujuan
        $phone = $user->no_telp; 
        $fullUrl = url('umpan-balik/' . $uniqueUrl);
        $pesan = 'Yth Bapak / Ibu '.$user->nama.' , 
        Pengawas Pembina '.Auth::user()->name.' baru saja menyelesaikan kunjungan ke sekolah Bapak/Ibu. 
        Mohon berkenan meluangkan Waktu untuk memberikan umpan balik terhadap kunjungan beliau melalui link berikut : 
        '.$fullUrl.'.
        Terimakasih
        Salam, 
        Admin Delman Super';

        // dd($decodedPesan);
        $response = Http::get("https://jogja.wablas.com/api/send-message", [
            'phone' => $phone,
            'message' => $pesan,
            'token' => $token,
        ]);

        $result = $response->body();

       return true;
    }

    // get data pelaporan
    public function getdata(Request $request){
        if ($request->ajax()) {

    
            $post = RencanaKerjaT::with('kategoriprogram')
            ->where('id_pengawas',Auth::user()->id)->latest()->get();
       
               return Datatables::of($post)
                       ->addIndexColumn()
                    ->addColumn('tanggal', function($row){
                   return $row->created_at->format('d M Y h:i:s');
               })
               ->addColumn('nama_kategori', function($row){
                   return $row->kategoriprogram->nama;
               })
   
                ->addColumn('nama_sekolah', function($row){
                   $sekolahIds = explode(',', $row->sekolah_id);
                   $sekolahs = SekolahM::whereIn('id', $sekolahIds)->get();
                   
                   $nama_sekolah = '';
                   foreach ($sekolahs as $sekolah) {
                       $nama_sekolah .= '<span class="badge bg-label-primary m-1">' . $sekolah->nama_sekolah . '</span> '; // Added a space for separation
                   }
                   // dd($nama_sekolah);
                   
                   return $nama_sekolah;
               })
   
               ->addColumn('action', function($row){
      
                              $btn = '<a  onclick="lihatPerencanaan('.$row->id.')" class="btn btn-sm bg-warning text-white " > <i class="fa fa-edit"></i> Edit</a>';
                              $btn = $btn. '<a href="#" onclick="addLampiran('.$row->id.')" class="btn btn-info btn-sm "><i class="fa fa-add"></i> Lampiran</a>';
       
                               return $btn;
                       })
                       ->rawColumns(['action','nama_kategori','nama_sekolah'])
                       ->make(true);
           }
    }

    public function edit($id)
    {
        // Ambil data dari model berdasarkan ID atau yang lain sesuai kebutuhan
        $data = RencanaKerjaT::findOrFail($id); // Gantilah YourModel dengan model yang sesuai
        
        return response()->json($data);
    }


}
