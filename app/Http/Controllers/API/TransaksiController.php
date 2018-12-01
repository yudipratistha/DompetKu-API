<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;
use App\User;
use app\Kategori;
use Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_kategori' => 'required',
            'id_penyimpanan' => 'required',
            'tanggal'=> 'required',
            'catatan' => 'required|date',
            'jumlah' => 'required',
        ]);

        $input = $request->all();
        $data_transaksi = transaksi::create($input);

        return response()->json(['buatTransaksi'=>$data_transaksi]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_transaksi = transaksi::where('id_user','=', $id)->get();
        return response()->json(['lihatTransaksi'=>$data_transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transaksi)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_kategori' => 'required',
            'id_penyimpanan' => 'required',
            'tanggal'=> 'required',
            'catatan' => 'required|date',
            'jumlah' => 'required',
        ]);

        $data_transaksi = transaksi::where('id','=', $transaksi)->first();
        $data_transaksi->id_kategori = $request->id_kategori;
        $data_transaksi->id_penyimpanan = $request->id_penyimpanan;
        $data_transaksi->tanggal = $request->tanggal;
        $data_transaksi->catatan = $request->catatan;
        $data_transaksi->jumlah = $request->jumlah;

        $data_transaksi->save();

        return response()->json(['updateTransaksi'=>$data_transaksi]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaksi)
    {
        $data_transaksi = transaksi::find($transaksi);
        $data_transaksi->delete();
        return response()->json(['deleteTransaksi'=>'Sukses', 'dataDeleteTransaksi'=>$data_transaksi]);
    }
}
