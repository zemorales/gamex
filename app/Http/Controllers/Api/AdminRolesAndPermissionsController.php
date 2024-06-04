<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AdminRolesAndPermissionsController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:crear_permisos'])->only(['storePermission']);
    }
   
    public function index(Request $request){

        try {
            $roles = Role::with(['permissions'=> function ($q) {
                $q->selectRaw('id,name,guard_name');
            }])            
            ->get();
            $permissions = Permission::all();
            return response()->json([
                'roles'=>$roles,
                'permissions'=>$permissions,                
                'errors'=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'errors'=>[$th]
            ],500);
        }
  
    }

    public function syncRolPermissions(Request $request){

        try {
            $role = Role::find($request->role_id);
            $permission = Permission::find($request->permission_id);
            if($request->ismethod == 'insert'){
                $role->givePermissionTo($permission);
            }else{
                $role->revokePermissionTo($permission);
            }
            return response()->json([
                'permission'=>$permission
            ],200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'errors'=>[$th]
            ],500);
        }
        
    }

    public function adminRoles(Request $request){
        try {
            $roles = Role::all();
            return response()->json([
                'roles'=>$roles
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'errors'=>[$th]
            ],500);
        }
      
    }

    public function storeRole(Request $request){
        
        try {
            $messages = [
                'name.unique' => 'El nombre ya existe',
                'name.required'=>"El nombre es requerido"
                
            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:roles'                
            ],$messages);    
        if($validator->fails())return response()->json(["errors"=>$validator->errors()->all()],201);
        $role = Role::create($request->all());
        $roles = Role::all();
        return response()->json([
            'roles'=>$roles
        ],200);
        } catch (\Throwable $th) {
            return response()->json(["errors"=>$th],500);
        }

      
    }
    public function updateRole(Request $request,$id){


        try {
            $role = Role::find($id);
            $messages = [
                'name.unique' => 'El nombre ya existe',
                'name.required' => 'El nombre es requerido',
                
            ];
            $validator = Validator::make($request->all(), [
                'name' => ['required', Rule::unique('roles')->ignore($role->id)]  
                ],$messages);    
        if($validator->fails())return response()->json(["errors"=>$validator->errors()->all()],201);
            
            $role->fill($request->all());
            $role->save();
            $roles = Role::all();
            return response()->json([
                'roles'=>$roles
            ],200);
        } catch (\Throwable $th) {
            return response()->json(["errors"=>$th],500);
        }
        

    }

    public function deleteRole($id){     
        
        try {
        $role = Role::find($id);
        $role->delete();    
        $roles = Role::all();
        return response()->json([
            'roles'=>$roles
        ],200);
        } catch (\Throwable $th) {
            return response()->json(["errors"=>$th],500);
        }  
    }

/////////////////////////////////////////////////////////////////
    public function adminPermissions(Request $request){
        
        try {
           
            $permissions = Permission::all();
            return response()->json([
                'permissions'=>$permissions
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'errors'=>[$th]
            ],500);
        }

    }

    public function storePermission(Request $request){
        try {
            $messages = [
                'name.unique' => 'El nombre ya existe',
                'name.required'=>"El nombre es requerido"
                
            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:permissions'                
            ],$messages); 
            if($validator->fails())return response()->json(["errors"=>$validator->errors()->all()],201);
            $permission = Permission::create($request->all());
            $permissions = Permission::all();
            return response()->json([
                'permissions'=>$permissions
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'errors'=>[$th]
            ],500);
        }

       
    }
    public function updatePermission(Request $request,$id){

        try {
            $permission = Permission::find($id);
            $messages = ['name.unique' => 'El nombre ya existe',
                            'name.required'=>"El nombre es requerido"];
            $validator = Validator::make($request->all(), [
                'name' => ['required', Rule::unique('permissions')->ignore($permission->id)]  
                ],$messages);  
            if($validator->fails())return response()->json(["errors"=>$validator->errors()->all()],201);
       
        $permission->fill($request->all());
        $permission->save();
        $permissions = Permission::all();
        return response()->json([
            'permissions'=>$permissions
        ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'errors'=>[$th]
            ],500);
        }
      

    }

    public function deletePermission($id){
       try {
        $permission = Permission::find($id);
        $permission->delete();    
        $permissions = Permission::all();
        return response()->json([
            'permissions'=>$permissions
        ],200);
       } catch (\Throwable $th) {
        return response()->json([
            'errors'=>[$th]
        ],500);
       }
       

    }
}
