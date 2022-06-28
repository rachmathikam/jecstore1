<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepat;

class SparepatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spareparts = Sparepat::all();
        return view('pages.sparepat.index',compact('spareparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sparepat.create');
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
            'sparepart' => 'required',
        ]);

        $data = $request->all();
        $sparepart = Sparepat::create($data);

        if($sparepart){
            return redirect()->route('sparepat.index')->with('success', 'data was successfully Created');
        }else{
            return redirect()->route('sparepat.create')->with('failed', 'failed created data');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Sparepat::find($id);
        return view('pages.sparepat.edit',compact('item'));
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
        $this->validate($request,[
            'sparepat' => 'required',
        ]);
        $item = Sparepat::find($id);
        $item->sparepat = $request->input('sparepat');
        // dd($item);
        $item->save();

    return redirect()->route('sparepat.index')
                ->with('success','sparepart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
