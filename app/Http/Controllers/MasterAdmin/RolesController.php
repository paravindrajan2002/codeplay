<?php

namespace App\Http\Controllers\MasterAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Master\Role;
use App\Models\Master\Permission;
use App\Models\Master\RolePermission;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function roles(Request $request)
    {
        $data['total_roles_count'] = Role::where('status',1)->count();
        $roles = Role::where('is_deleted',1)->orderBy('roles_id','desc')->get();

        $permissions = permission::get();

        $datas = RolePermission::select('master_permissions.permission_name','master_role_permissions.role_id','master_role_permissions.status','master_role_permissions.id as rp_id')
        ->leftjoin('master_permissions','master_permissions.permission_id','=','master_role_permissions.permission_id')
        // ->where('master_role_permissions.status',1)
        ->get();

        

        return view('master.roles.list',compact('data','roles','permissions','datas'));

    }
    public function rolesview(Request $request){

        $id = Crypt::decrypt($request->id);

        $role = Role::find($id);
        $roles = Role::get();
        $users = User::select('users.*','master_roles.role_name')->join('master_roles','master_roles.roles_id','=','users.master_role_id')
        ->where('users.master_delete',1)
        ->where('master_roles.roles_id',$id)->get();

        $user_counts = DB::table('users')
        ->where('master_role_id',$role->roles_id)   
        ->groupBy('master_role_id')
        ->count();
        

        $datas = RolePermission::select('master_permissions.permission_name','master_role_permissions.role_id','master_role_permissions.status','master_role_permissions.id as rp_id')
        ->leftjoin('master_permissions','master_permissions.permission_id','=','master_role_permissions.permission_id')
        ->where('master_role_permissions.status',1)
        ->where('master_role_permissions.role_id',$id)
        ->get(); 


        return view('master.roles.viewlist',compact('role','datas','users','roles','user_counts'));
    }
    public function permissions(Request $request)
    {
        return view('master.permissions.list');
    }
    public function rolesandpermissions(Request $request)
    {
        return view('master.managepermissions.list');
    }
  
    public function rolesStore(Request $request){

        $roles  = $request->role_name;

        if(empty($roles)){
            return redirect()->route('master.roles');   
        }
        $data = Role::where('role_name','=',$request->role_name)->first();
        if(isset($data) && !empty($data)){
            return redirect()->route('master.roles');

        }else{

        
        $role = new Role();
        $role->role_name = $request->role_name;
        $role->created_by = Auth::user()->id;
        $role->save();

        $role_id = Role::latest()->first();
        foreach($request->input('permission_id') as $key => $value) {
            $Record=new RolePermission;
             $Record->role_id = $role_id->roles_id;
             $Record->permission_id = $request->get('permission_id')[$key];         
             if(isset($request->get('check')[$key])){
                $Record->status = $request->get('check')[$key];
             }else{
                $Record->status = 0;
             }                         
             $Record->created_by = Auth::user()->id;            
             $Record->updated_by = Auth::user()->id; 
             $Record->save();
         }
         toast('Role Added Successfully!','success');
        return redirect()->route('master.roles');
        }

    }


    public function rolesEdit(Request $request){

        $id = Crypt::decrypt($request->id);

        $role = Role::find($id);

        $data = Role::where('roles_id','=',$id)->first();


        $role_id = RolePermission::where('role_id', $id)->delete();
        
        foreach($request->input('permission_id') as $key => $value) {
            $Record=new RolePermission;
             $Record->role_id = $id;
             $Record->permission_id = $request->get('permission_id')[$key];         
             if(isset($request->get('check')[$key])){
                $Record->status = $request->get('check')[$key];
             }else{
                $Record->status = 0;
             }                         
             $Record->created_by = Auth::user()->id;            
             $Record->updated_by = Auth::user()->id; 
             $Record->save();
         }

         toast('Role Edited Successfully!','success');
        return redirect()->route('master.roles');

    }




    public function rolesEditView(Request $request){

        $id = Crypt::decrypt($request->id);

        $role = Role::find($id);

        $datas = RolePermission::select('master_permissions.permission_name','master_role_permissions.role_id','master_role_permissions.status','master_role_permissions.id as rp_id')
        ->leftjoin('master_permissions','master_permissions.permission_id','=','master_role_permissions.permission_id')
        ->where('master_role_permissions.status',1)
        ->where('master_role_permissions.role_id',$id)
        ->get();   
        $permissions = RolePermission::select('master_permissions.permission_name','master_role_permissions.role_id','master_role_permissions.status','master_role_permissions.id as rp_id','master_role_permissions.permission_id')
        ->leftjoin('master_permissions','master_permissions.permission_id','=','master_role_permissions.permission_id')
        ->where('master_role_permissions.role_id',$id)
        ->get();  

        return view('master.roles.edit',compact('role','datas','permissions'));
    }

    public function rolesUpdate(Request $request){

        echo "hai"; exit;

    }

}
