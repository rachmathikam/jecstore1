<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;
use DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = User::role('pelanggan')->where('id',auth()->user()->id)->get();
        // dd($data);
        return view('pages.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = User::role('pelanggan')->get();

        return view('pages.pelanggan.create', compact('pelanggan'));
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
            'name'          => 'required',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'confirmed',
            'address'       => 'nullable',
            'image'         => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        if ($request->file('image')) {
            $file = $request->file('image');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('image/profile', $nama_file);
            $input['image'] = $nama_file;
        }



        $pelanggan = User::create($input);
        $pelanggan->assignRole($request->input('roles'));
        dd($pelanggan);
        // dd($user);
        if ($pelanggan) {
            return redirect()->route('users.index')->with('success', 'Created User Successfully.');
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
        $pelanggan = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $pelanggan->roles->first();
        return view('pages.pelanggan.edit', compact('pelanggan','roles','userRole'));
        // dd();

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
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'nullable',
            'password'  => 'confirmed',
            // 'roles'     => 'nullable',
            'image'     => 'mimes:jpeg,png,jpg,gif,svg',

        ]);

        // dd($request);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('image/profile', $nama_file);
            $input['image'] = $nama_file;
        }else{
            unset($input['image']);
        }
        // $user->syncRole($request->input('role'));
        $pelanggan = User::findOrFail(auth()->id());
        $pelanggan->update($input);

        // DB::table('model_has_roles')->where('model_id',$id)->delete();
        // $pelanggan->assignRole($request->input('roles'));


        return redirect()->route('pelanggan.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();
        if($pelanggan){
            //redirect dengan pesan sukses
            return redirect()->route('pelanggan.index')->with(['success' => 'Data Berhasil Dihapus!']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('pelanggan.index')->with(['error' => 'Data Gagal Dihapus!']);
         }
    }
}
