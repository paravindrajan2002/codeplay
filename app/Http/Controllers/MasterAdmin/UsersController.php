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
use App\Models\Master\UsersActivity;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Mail;
class UsersController extends Controller
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
    public function users(Request $request)
    {

        $roles = Role::get();
        $users = User::select('users.*','master_roles.role_name')->join('master_roles','master_roles.roles_id','=','users.master_role_id')
        ->where('users.master_delete',1)
        ->get();


        return view('master.users.list',compact('roles','users'));

    }

    public function addUsers(Request $request){

        $data = User::where('email',$request->email)->first();
        if($data != ''){
            toast('User Already Exist!','info');
            return redirect()->route('master.users');

        }else{
            $user = new User();
            if($request->file('images')){
                $userimageupload= $request->file('images');
                $userimage= $userimageupload->getClientOriginalName();
                $image=url('img/uploads/MasterUsersimage/').'/'.$userimage;
                $valtest = $userimageupload->move(public_path('/img/uploads/MasterUsersimage/'),$userimage);        
                $user->master_image = $image;        
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_master = 0;  // Master access 
            $user->is_master_role = 0;  // not approved yet
            $user->master_role_id = $request->role_id;
            $user->is_master_status = 2; // link send for password update
            $user->save();

            $r = Role::where('roles_id',$request->role_id)->first();
            $userId = User::latest()->first();
            
            $uId = Crypt::encrypt($userId->id);
            $resetUrl = url('master-reset-password')."/".$uId;

            $data1["email"] = $request->email;
            $data1["title"] = "Password update and  Verify your email to start Humtum Baby";
            $data1["name"] = $request->name;
            $data1["role"] = $r->role_name; 
            $data1["url"] = $resetUrl;

            Mail::send('master.emails.userlink', $data1, function($message)use($data1) {
                $message->to($data1["email"])
                ->cc(['mubarak@vividinfotech.com','rahathnavith@gmail.com','deva.m@vividinfotech.com'])
                        ->subject($data1["title"]);
        
            });


            $activity = new UsersActivity();
            $activity->user_id = $userId->id;
            $activity->title = auth()->user()->name." Created New User!";
            $activity->created_name = auth()->user()->name;
            $activity->created_by = auth()->user()->id;
            $activity->save();

            toast('User Added Successfully!','success');
            return redirect()->route('master.users');
        }
     

    }

    public function editUsers(Request $request){

        $data = User::where('email',$request->email)->first();

echo $request->file('images'); exit;

        if($request->file('images') ){
                $userimageupload= $request->file('images');
                $userimage= $userimageupload->getClientOriginalName();
                $image=url('img/uploads/MasterUsersimage/').'/'.$userimage;
                $imageName = time().'.'.$request->file('images')->extension();
                $valtest = $userimageupload->move(public_path('/img/uploads/MasterUsersimage/'),$imageName);        
                $data->master_image = $imageName;        
            }
            $data->name = $request->name;
            $data->email = $request->email;
            $data->master_role_id = $request->role_id;
            $data->update();

            $activity = new UsersActivity();
            $activity->user_id = $data->id;
            $activity->title = auth()->user()->name." Edited New User!";
            $activity->created_name = auth()->user()->name;
            $activity->created_by = auth()->user()->id;
            $activity->save();
            toast('User Edited Successfully!','success');

            $id = Crypt::encrypt($request->role_id);

            if($request->mode == 'list'){
                return redirect()->route('master.roles.view',['id'=>$id]);
            }else{
    
            return redirect()->route('master.users');
            }
        }
     


    public function deleteUser(Request $request){



        $id = Crypt::decrypt($request->id);
        $user = User::where('id', $id)->first();

        $role_id = Crypt::encrypt($user->master_role_id);

        $user->master_delete = '0';
        $user->update();
        toast('User Deleted Successfully!','success');
        if($request->mode == 'list'){
            return redirect()->route('master.roles.view',['id'=>$role_id]);
        }else{

        return redirect()->route('master.users');
            
        }


    }



    public function rolesview(Request $request){

        $id = Crypt::decrypt($request->id);

        $role = Role::find($id);
        $datas = RolePermission::select('master_permissions.permission_name','master_role_permissions.role_id','master_role_permissions.status','master_role_permissions.id as rp_id')
        ->leftjoin('master_permissions','master_permissions.permission_id','=','master_role_permissions.permission_id')
        ->where('master_role_permissions.status',1)
        ->where('master_role_permissions.role_id',$id)
        ->get(); 


        return view('master.roles.viewlist',compact('role','datas'));
    }


   

}
