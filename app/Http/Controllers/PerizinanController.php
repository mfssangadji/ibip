<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use App\Models\Ibip;
use App\Models\Kepel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Perizinan::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kepel', function($relation) {
                        return $relation->kepel->kepel;
                    })

                    ->addColumn('tanggal_perizinan', function($tgl) {
                        return $tgl->created_at->format('d F Y');
                    })

                    ->addColumn('jenis_perizinan', function($jp) {
                        return array(1=>"Pesiar", 2=>"Berlibur")[$jp->jenis_perizinan];
                    })
                    ->addColumn('peserta', function($peserta) {
                        return $peserta->kepel->users->count().' peserta';
                    })
                    ->addColumn('berangkat', function($berangkat) {
                        return $berangkat->ibip->where('status', 0)->count();
                    })
                    ->addColumn('kembali', function($kembali) {
                        return $kembali->ibip->where('status', 1)->count();
                    })
                    ->addColumn('status', function($status) {
                        return array(0=>"Aktif", 1=>"Selesai")[$status->status];
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" class="status"><span class="badge bg-primary">cetak</span></a> ';
                        $btn .= '<a href="'.route('perizinan').'/'.$row->id.'/status" class="status"><span class="badge bg-orange">ubah status</span></a> ';
                        $btn .= '<a href="'.route('perizinan').'/'.$row->id.'/peserta" class="peserta"><span class="badge bg-green">peserta</span></a> ';
                        $btn .= '<a href="'.route('perizinan').'/'.$row->id.'/edit" class="edit"><span class="badge bg-blue">ubah</span></a> ';
                        $btn .= '<button class="badge bg-red btn-xs btn-flat delete-modal delete" style="border: none;"" style="">delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('auths.perizinan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function status(Request $request)
    {
        $perizinan = Perizinan::find($request->id);
        if($perizinan->status == 0){
            Perizinan::where('id', $request->id)
            ->update([
                'status' => 1,
            ]);
        }elseif($perizinan->status == 1){
            Perizinan::where('id', $request->id)
            ->update([
                'status' => 0,
            ]);
        }

        return redirect()->back();
    }

    public function peserta(Request $request)
    {
        $perizinan = Ibip::where('perizinan_id', $request->id)->get();
        $kepel = Perizinan::find($request->id);
        $kepel_title = $kepel->kepel->kepel;
        $jp = $kepel->jenis_perizinan;
        return view('auths.perizinan.peserta', compact('perizinan', 'kepel_title', 'jp'));
    }

    public function create()
    {
        $kepel = Kepel::all();
        return view('auths.perizinan.create', compact('kepel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Perizinan::create([
            'kepel_id' => $request->kepel_id,
            'jenis_perizinan' => $request->jenis_perizinan,
        ]);

        return redirect()->route('perizinan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function show(Perizinan $perizinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perizinan $perizinan)
    {
        $kepel = Kepel::all();
        $perizinan = Perizinan::find($perizinan->id);
        return view('auths.perizinan.edit', compact('perizinan', 'kepel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perizinan $perizinan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perizinan $perizinan)
    {
        Perizinan::destroy($perizinan->id);
    }
}
