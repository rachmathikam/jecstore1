<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komponen;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Sparepat;

class KomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Komponen::with('brand', 'type', 'sparepart')->get();
        return view('pages.komponen.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $types = Type::all();
        $spareparts = Sparepat::all();
        return view('pages.komponen.create',compact('brands','types','spareparts'));
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
            'komponen'      => 'required',
            'harga'         => 'required',
            'type_id'       => 'required',
            'brand_id'      => 'required',
            'sparepart_id'  => 'required',
            'stock'         => 'required',
            'image'        => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($request);
        $input = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('image/komponen', $nama_file);
            $input['image'] = $nama_file;
        }
        $item = Komponen::create($input);
        // dd($item);
        if($item){
            return redirect()->route('komponen.index')->with('success', 'data was successfully Created');
        }else{
            return redirect()->route('komponen.create')->with('failed', 'failed created data');
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
        $item = Komponen::find($id);
        return view('pages.komponen.edit',compact('item'));
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
            'komponen'      => 'required',
            'stock'         => 'required',
            'harga'         => 'required',
            'image'         => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // $input = $request->all();
        $input = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('image/komponen', $nama_file);
            $input['image'] = $nama_file;
        }else{
            unset($input['image']);
        }

        $item = Komponen::find($id);
        // $item = $request->input($input);
        $item->update($input);
        // dd($item);


    return redirect()->route('komponen.index')
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
