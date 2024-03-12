<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
/*
public function __construct()
{
    $this->middleware('auth');
}

public function indexUser(){
    $all = DB::table('users')
            ->get();
    return view('backend.user.all-user', compact('all'));
} */
                        public function __construct()
                        {
                            $this->middleware('auth');
                        }
                        public function index(Request $request)
                        {

                        $users = User::latest()->paginate(10);
                        $title = 'Supprimer ce utilisateur !';
                        $text = "Etes vous sur de vouloir supprime ce utilisateur ?";
                        confirmDelete($title, $text);

                        return view('backend.user.index-user',compact('users'));

                        }


/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/

                    public function create()
                    {
                    $roles = Role::pluck('name','name')->all();
            //      $data = [
            //          'roles' => $roles,
            //       ];

                    return view('backend.user.create-user',compact('roles'));

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
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|same:confirm-password',
                    'roles_name' => 'required|array'
                    ]);

                    $input = $request->all();


                    $input['password'] = Hash::make($input['password']);

                    $users = User::create($input);
                    $users->assignRole($request->input('roles_name'));
                    Alert::success('Nouveau', 'un nouveau utilisateur a ete ajoute !');
           //         return view('backend.user.index-user');
                    return Redirect::to('users');
                    }

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
/*public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
                public function edit($id)
                {
                $user = User::find($id);
                $roles = Role::pluck('name','name')->all();
                $userRole = $user->roles->pluck('name','name')->all();
                return view('backend.user.edit-user',compact('user','roles','userRole'));
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
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'same:confirm-password',
                'roles' => 'required'
                ]);
                $input = $request->all();
                if(!empty($input['password'])){
                $input['password'] = Hash::make($input['password']);
                }else{

                $input = Arr::except($input,array('password'));
                }
                $user = User::find($id);
                $user->update($input);
                DB::table('model_has_roles')->where('model_id',$id)->delete();
                $user->assignRole($request->input('roles'));
                Alert::info('Modifier', 'Utilisateur a ete modifier');
                return Redirect::to('users');
                }
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
            public function show($id)
            {
                $user = User::find($id);
                return view('backend.user.show-user', compact('user'));
            }

            public function destroy(User $user)
            {
            //User::find($request->user_id)->delete();
            $user->delete();
            return redirect()->route('users.index')->with('success','utilisateur a ete supprime ');
            }

}
