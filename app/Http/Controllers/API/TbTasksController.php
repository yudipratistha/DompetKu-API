<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\tb_tasks;
use Illuminate\Http\Request;
use App\User;
use Validator;

class TbTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $data_task = tb_tasks::where('id_user','=', $id);
      // return response()->json(['data'=>$data_task]);
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
            'nama_task' => 'required',
            'deskripsi'=> 'required',
            'tanggal_deadline' => 'required|date',
            'waktu_deadline' => 'required',
            'repeat' => 'required|boolean',
            'repeat_number' =>'required|integer',
            'repeat_type' => 'required',
            'active' => 'required|boolean'
        ]);

        $input = $request->all();
          $data_task = tb_tasks::create($input);

        return response()->json(['buatTask'=>$data_task]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tb_tasks  $tb_tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data_task = tb_tasks::where('id_user','=', $id)->get();
      return response()->json(['lihatTask'=>$data_task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tb_tasks  $tb_tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_tasks $tb_tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tb_tasks  $tb_tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_task)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'nama_task' => 'required',
            'deskripsi'=> 'required',
            'tanggal_deadline' => 'required|date',
            'waktu_deadline' => 'required',
            'repeat' => 'required|boolean',
            'repeat_number' =>'required|integer',
            'repeat_type' => 'required',
            'active' => 'required|boolean'
        ]);

        $data_task = tb_tasks::where('id_task','=', $id_task)->first();
        $data_task->nama_task = $request->nama_task;
        $data_task->deskripsi = $request->deskripsi;
        $data_task->tanggal_deadline = $request->tanggal_deadline;
        $data_task->waktu_deadline = $request->waktu_deadline;
        $data_task->repeat = $request->repeat;
        $data_task->repeat_number = $request->repeat_number;
        $data_task->repeat_type = $request->repeat_type;
        $data_task->active = $request->active;

        $data_task->save();

        return response()->json(['updateTask'=>$data_task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tb_tasks  $tb_tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_task)
    {
        $data_task = tb_tasks::find($id_task);
        $data_task->delete();
        return response()->json(['deleteTask'=>'Sukses', 'dataDeleteTask'=>$data_task]);




    }
}
