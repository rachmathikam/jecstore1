<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;
use DB;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teknisi = User::role('teknisi')->get();
        // dd($data);
        return view('pages.teknisi.index', compact('teknisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teknisi = User::role('teknisi')->get();

        return view('pages.teknisi.create', compact('teknisi'));
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



        $teknisi = User::create($input);
        $teknisi->assignRole($request->input('roles'));
        dd($teknisi);
        // dd($user);
        if ($teknisi) {
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
        $teknisi = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $teknisi->roles->first();
        return view('pages.teknisi.edit', compact('teknisi','roles','userRole'));
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
        $teknisi = User::find($id);
        $teknisi->update($input);

        // DB::table('model_has_roles')->where('model_id',$id)->delete();
        // $teknisi->assignRole($request->input('roles'));


        return redirect()->route('teknisi.index')->with('success','User updated successfully');
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
