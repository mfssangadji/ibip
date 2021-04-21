<?php

namespace App\Http\Controllers;

use App\Models\Kepel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class KepelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kepel::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('peserta', function($relation) {
                        return $relation->users->count().' Peserta';
                    })
                    ->addColumn('tahun', function($data) {
                        return $data->created_at->format("Y");
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('kepel').'/'.$row->id.'/edit" class="edit"><span class="badge bg-blue">ubah</span></a> ';
                        $btn .= '<button class="badge bg-red btn-xs btn-flat delete-modal delete" style="border: none;"" style="">delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('auths.kepel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auths.kepel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kepel' => 'required',
        ]);

        Kepel::create([
            'kepel' => $request->kepel,
        ]);

        return redirect()->route('kepel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kepel  $kepel
     * @return \Illuminate\Http\Response
     */
    public function show(Kepel $kepel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kepel  $kepel
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepel $kepel)
    {
        $kepel = Kepel::find($kepel->id);
        return view('auths.kepel.edit', compact('kepel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kepel  $kepel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kepel $kepel)
    {
        $this->validate($request, [
            'kepel' => 'required',
        ]);
        
        Kepel::where('id', $kepel->id)
        ->update([
            'kepel' => $request->kepel,
        ]);

        return redirect()->route('kepel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kepel  $kepel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepel $kepel)
    {
        Kepel::destroy($kepel->id);
    }
}
