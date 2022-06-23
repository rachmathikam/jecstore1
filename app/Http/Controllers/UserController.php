<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $data = User::all();

        // dd($data->all());


        return view('pages.users.index',compact('data','roles'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles  = Role::all();
        return view('pages.users.create', compact('roles'));
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
            'roles'         => 'required',
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



        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        // dd($user);
        if ($user) {
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
        $data = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $data->roles->first();
        return view('pages.users.show', compact('data','roles','userRole'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $data->roles->first();
        return view('pages.users.edit', compact('data','roles','userRole'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'nullable',
            'password'  => 'confirmed',
            'roles'      => 'required',

        ]);

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
        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        // dd($user);


        return redirect()->route('users.index')->with('success','User updated successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('users.index')->with(['error' => 'Data Gagal Dihapus!']);
         }
    }
}
