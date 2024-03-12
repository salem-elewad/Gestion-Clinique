<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
class RoleController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
/*
function __construct()
{
    $this->middleware('auth');

$this->middleware('permission:Afficher Permission', ['only' => ['index']]);
$this->middleware('permission:Ajouter une permission', ['only' => ['create','store']]);
$this->middleware('permission:modifier permission', ['only' => ['edit','update']]);
$this->middleware('permission:supprimer permission', ['only' => ['destroy']]);


}
*/
function __construct()
{
    $this->middleware('permission:index-role|create-role|edit-role|delete-role', ['only' => ['index','store','create','edit']]);
//    $this->middleware('permission:index-user|create-user|edit-user|delete-user', ['only' => ['index','store','edit','delete']]);
  //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
   // $this->middleware('permission:role-delete', ['only' => ['destroy']]);

/*
$this->middleware('permission: index-role',['only' => ['index']]);
$this->middleware('permission: create-role',['only' => ['create','store']]);
$this->middleware('permission: edit-role',['only' => ['edit','update']]);
$this->middleware('permission: delete-role',['only' => ['delete']]);
*/
}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$roles = Role::orderBy('id','DESC')->paginate(5);
return view('backend.roles.index-role', ['roles' => $roles])->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/

public function create()
{
$permission = Permission::get();
return view('backend.roles.create-role',compact('permission'));
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
'name' => 'required|unique:roles,name',
'permission' => 'required',
]);
$role = Role::create(['name' => $request->input('name')]);
$role->syncPermissions($request->input('permission'));
return view('backend.roles.index-role');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$role = Role::find($id);
$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
->where("role_has_permissions.role_id",$id)
->get();
return view('backend.roles.show-role',compact('role','rolePermissions'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function edit($id)
{
$role = Role::find($id);
$permission = Permission::get();
$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
->all();
return view('backend.roles.edit-role',compact('role','permission','rolePermissions'));
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
'permission' => 'required',
]);
$role = Role::find($id);
$role->name = $request->input('name');
$role->save();
$role->syncPermissions($request->input('permission'));
return view('backend.roles.index-role');

}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/

        public function destroy(Role $role)
        {
        //DB::table("roles")->where('id',$id)->delete();

                $role->delete();
                return Redirect::to('roles')->with('success','Role deleted successfully');
            }

        }
