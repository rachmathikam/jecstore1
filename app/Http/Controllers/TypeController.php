<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Type::all();
        // dd($item);
        return view('pages.type.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Type::get();
        return view('pages.type.create',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seri' => 'required',

        ]);

        $item = Type::create(['name' => $request->name,
                              'seri' => $request->seri]);

        if($item){
            return redirect()->route('type.index')->with('success', 'data was successfully Created');
        }else{
            return redirect()->route('type.create')->with('failed', 'failed created data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Type::find($id);
        // dd($item);
        return view('pages.type.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'seri' => 'required',
        ]);

        $data = $request->all();
        $item = Type::findOrFail($id);
        $item->update($data);
        // dd($item);
        return redirect()->route('type.index')
                        ->with('success','data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Type::findOrFail($id);
        $item->delete();
        if($item){
            //redirect dengan pesan sukses
            return redirect()->route('type.index')->with(['success' => 'Data Berhasil Dihapus!']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('type.index')->with(['error' => 'Data Gagal Dihapus!']);
         }
    }
}
