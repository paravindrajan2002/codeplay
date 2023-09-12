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
use App\Models\Master\SellersActivity;

use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Mail;
class SellersController extends Controller
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
    public function sellers(Request $request)
    {
        $new_sellers = DB::table('vendorusers')
        ->select('vendorusers.*','vendoruser_details.business_address',)
        ->join('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id')
        ->where('vendorusers.status','=',0)  
        ->orderBy('vendorusers.id','desc')
        ->get();

        $new_sellers_count = DB::table('vendorusers')
        ->join('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id')
        ->where('vendorusers.status',0)   
        ->count();

        $sellers = DB::table('vendorusers')
        ->select('vendorusers.*','vendoruser_details.business_address')
        ->leftjoin('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id')
        ->where('vendorusers.status',1)   
        ->orderBy('vendorusers.id','desc')
        ->get();

        $rsellers = DB::table('vendorusers')
        ->select('vendorusers.*','vendoruser_details.business_address')
        ->leftjoin('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id')
        ->where('vendorusers.status',2)   
        ->orderBy('vendorusers.id','desc')
        ->get();

        return view('master.seller.list',compact('new_sellers','sellers','new_sellers_count','rsellers'));

    }

    public function viewSeller(Request $request){


        $id = Crypt::decrypt($request->id);

        $seller = DB::table('vendorusers')
        ->select('vendorusers.*','vendoruser_details.business_name','vendoruser_details.business_address','vendoruser_details.business_zip','vendoruser_details.address_proof','vendoruser_details.signature','vendoruser_details.signature','vendor_bank_details.bank_name','vendor_bank_details.holder_name','vendor_bank_details.account_number','vendor_bank_details.ifsc')        
        ->leftjoin('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id')
        ->leftjoin('vendor_bank_details','vendor_bank_details.vendor_id','=','vendorusers.id')
        ->where('vendorusers.id',$id)   
        ->first();


        return view('master.seller.view',compact('seller'));

    }

    public function changeSellerStatus(Request $request){

        $id = Crypt::decrypt($request->id);
      

        if($request->mode == 'accept'){

            DB::table('vendorusers')
                    ->where('id', $id)  
                    ->limit(1)  
                    ->update(array('status' => 1));  // Accepted
      
        $data = DB::table('vendorusers')
                    ->where('id', $id)->first();
        $data1["email"] = $data->email;
        $data1["title"] = "Your Application Accepted from Humtum Baby";
        $data1["name"] = $data->first_name." ".$data->last_name;
        
        Mail::send('master.emails.acceptSeller', $data1, function($message)use($data1) {
        $message->to($data1["email"])
        ->cc(['rahathnavith@gmail.com','deva.vivid@vividinfotech.com'])
                ->subject($data1["title"]);
    
        });



        $activity = new SellersActivity();
        $activity->user_id = $data->id;
        $activity->title = auth()->user()->name." Accepted the Seller.!";
        $activity->created_name = auth()->user()->name;
        $activity->created_by = auth()->user()->id;
        $activity->save();

            toast('Accepted Successfully!','success');
            return redirect()->route('master.sellers');

        }else{

            DB::table('vendorusers')
            ->where('id', $id)  
            ->limit(1)  
            ->update(array('status' => 2)); // rejected 

            $data = DB::table('vendorusers')
            ->where('id', $id)->first();
            $data1["email"] = $data->email;
            $data1["title"] = "Your Application Rejected from Humtum Baby";
            $data1["name"] = $data->first_name." ".$data->last_name;

            Mail::send('master.emails.rejectedSeller', $data1, function($message)use($data1) {
            $message->to($data1["email"])
            ->cc(['rahathnavith@gmail.com','deva.vivid@vividinfotech.com'])
                    ->subject($data1["title"]);

            });

            $activity = new SellersActivity();
            $activity->user_id = $data->id;
            $activity->title = auth()->user()->name." Rejected the Seller!";
            $activity->created_name = auth()->user()->name;
            $activity->created_by = auth()->user()->id;
            $activity->save();

            toast('Rejected Successfully !','info');
            return redirect()->route('master.sellers');
        }



    }

    public function newSellerSearch(Request $request){

        $search = $request->filter;
        if($request->mode == 'new1'){
            $data = DB::table('vendorusers')
            ->select('vendorusers.*','vendoruser_details.business_address',)
            ->join('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id');
            if($search != ''){
                $data =$data->where('vendorusers.first_name', 'LIKE', '%'.$search.'%') ;
                // ->orWhere('vendorusers.last_name', 'LIKE', '%'.$search.'%');
            }
            $data =$data->where('vendorusers.status',0)  
            ->orderBy('vendorusers.id','desc')
            ->get();
    
            return $data;
        }

        if($request->mode == 'list'){
            $data = DB::table('vendorusers')
            ->select('vendorusers.*','vendoruser_details.business_address',)
            ->join('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id');
            if($search != ''){
                $data =$data->where('vendorusers.first_name', 'LIKE', '%'.$search.'%') ;
                // ->orWhere('vendorusers.last_name', 'LIKE', '%'.$search.'%');
            }
            $data =$data->where('vendorusers.status',1)  
            ->orderBy('vendorusers.id','desc')
            ->get();
    
            return $data;
        }

        if($request->mode == 'reject'){
            $data = DB::table('vendorusers')
            ->select('vendorusers.*','vendoruser_details.business_address',)
            ->join('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id');
            if($search != ''){
                $data =$data->where('vendorusers.first_name', 'LIKE', '%'.$search.'%') ;
                // ->orWhere('vendorusers.last_name', 'LIKE', '%'.$search.'%');
            }
            $data =$data->where('vendorusers.status',2)  
            ->orderBy('vendorusers.id','desc')
            ->get();
    
            return $data;
        }

    }

    public function sellerDetails(Request $request){
        $id = Crypt::decrypt($request->id);


        // $data['total_order'] =   DB::table('order_items')
        //     ->where([
        //     ['order_items.vendor_id', '=', $id]
        //     ])
        //     ->distinct()
        //     ->count('order_id');

        $data['earnings'] = DB::table('order_items')
        ->leftjoin('orders','orders.order_id','=','order_items.order_id')
        ->leftjoin('products','products.id','=','order_items.product_id')
        ->where([
            ['orders.payment_status','=','unpaid'],
            ['products.created_by_user', '=', $id]
        ])->sum('order_items.price');


        $earning_order = DB::table('order_items')->select(
                        DB::raw('sum(order_items.price) as sums'), 
                        DB::raw("DATE_FORMAT(orders.created_at,'%m') as monthKey")
            )
            ->leftjoin('orders','orders.order_id','=','order_items.order_id')
            ->leftjoin('products','products.id','=','order_items.product_id')
            ->whereYear('orders.created_at', date('Y'))
            ->where('orders.payment_status','=','unpaid')
            ->where('products.created_by_user', '=', $id)
            ->groupBy('monthKey')
            ->get();
           
            $earning = [0,0,0,0,0,0,0,0,0,0,0,0];

            foreach($earning_order as $earning_orde){
                $earning[$earning_orde->monthKey-1] = $earning_orde->sums;
            }

        $data['refund'] = DB::table('order_items')
        ->leftjoin('orders','orders.order_id','=','order_items.order_id')
        ->leftjoin('products','products.id','=','order_items.product_id')
        ->where([
            ['orders.payment_status','=','refund'],
            ['products.created_by_user', '=', $id]
        ])->sum('order_items.price');

        $refund_order = DB::table('order_items')->select(
            DB::raw('sum(order_items.price) as sums'), 
            DB::raw("DATE_FORMAT(orders.created_at,'%m') as monthKey")
            )
            ->leftjoin('orders','orders.order_id','=','order_items.order_id')
            ->leftjoin('products','products.id','=','order_items.product_id')
            ->whereYear('orders.created_at', date('Y'))
            ->where('orders.payment_status','=','refund')
            ->where('products.created_by_user', '=', $id)
            ->groupBy('monthKey')
            ->get();

            $refund1 = [0,0,0,0,0,0,0,0,0,0,0,0];

            foreach($refund_order as $refund_orde){
                $refund1[$refund_orde->monthKey-1] = $refund_orde->sums;
            }



        $seller = DB::table('vendorusers')
        ->select('vendorusers.*','vendoruser_details.business_name','vendoruser_details.business_address','vendoruser_details.business_zip','vendoruser_details.address_proof','vendoruser_details.signature','vendoruser_details.signature','vendor_bank_details.bank_name','vendor_bank_details.holder_name','vendor_bank_details.account_number','vendor_bank_details.ifsc')        
        ->leftjoin('vendoruser_details','vendoruser_details.vendor_id','=','vendorusers.id')
        ->leftjoin('vendor_bank_details','vendor_bank_details.vendor_id','=','vendorusers.id')
        ->where('vendorusers.id',$id)   
        ->first();


        $products  = DB::table('products')
        ->select('products.*','categories.category_name','sub_categories.sub_category_name','product_images.mainimage')
        ->leftjoin('categories','categories.id','=','products.category_id')
        ->leftjoin('sub_categories','sub_categories.id','=','products.subcategory')
        ->leftjoin('product_images','product_images.product_id','=','products.id')
        ->where('products.created_by_user', '=', $id)
        ->where('products.created_by_role', '=', 'VENDOR')
        ->distinct()
        ->get();

        $data['total_order'] =   DB::table('order_items')
        ->leftjoin('orders','orders.order_id','=','order_items.order_id')
        ->leftjoin('products','products.id','=','order_items.product_id')
        ->where([
        ['products.created_by_user', '=', $id]
        ])        
        ->distinct()
        ->count('order_items.order_id');

        $product_orders =   DB::table('order_items')
        ->select( DB::raw('count(order_items.order_id) as order_count, order_items.product_id as pid') )
        ->leftjoin('orders','orders.order_id','=','order_items.order_id')
        ->leftjoin('products','products.id','=','order_items.product_id')
        ->where([
        ['products.created_by_user', '=', $id]
        ])        
        ->groupBy('order_items.product_id')
        ->get();


     
        return view('master.seller.details',compact('id','data','seller','earning','refund1','products','product_orders'));
    }

    public function sellerFiltergraph(Request $request){
        $data['text'] = $request->filter;
        $sid = Crypt::decrypt($request->sid);
        $earning_order = DB::table('order_items')->select(
            DB::raw('sum(order_items.price) as sums'), 
            DB::raw("DATE_FORMAT(orders.created_at,'%m') as monthKey")
            )
            ->leftjoin('orders','orders.order_id','=','order_items.order_id')
            ->leftjoin('products','products.id','=','order_items.product_id');

            if($data['text'] == '1M'){
                $earning_order = $earning_order->whereMonth('orders.created_at', date('m'));
    
            }
            if($data['text'] == '6M'){
                $earning_order = $earning_order->whereBetween('orders.created_at', [Carbon::now()->subMonth(6), Carbon::now()]);
    
            }
            if($data['text'] == '1Y'){
                $earning_order = $earning_order->whereYear('orders.created_at', date('Y'));
            }


            $earning_order = $earning_order->where('orders.payment_status','=','unpaid')
            ->where('products.created_by_user', '=', $sid)
            ->groupBy('monthKey')
            ->get();

            $data['earning'] = [0,0,0,0,0,0,0,0,0,0,0,0];

            foreach($earning_order as $earning_orde){
                $data['earning'][$earning_orde->monthKey-1] = $earning_orde->sums;
            }


// Refund

        $refund_order = DB::table('order_items')->select(
            DB::raw('sum(order_items.price) as sums'), 
            DB::raw("DATE_FORMAT(orders.created_at,'%m') as monthKey")
            )
            ->leftjoin('orders','orders.order_id','=','order_items.order_id')
            ->leftjoin('products','products.id','=','order_items.product_id');

            if($data['text'] == '1M'){
                $refund_order = $refund_order->whereMonth('orders.created_at', date('m'));

            }
            if($data['text'] == '6M'){
                $refund_order = $refund_order->whereBetween('orders.created_at', [Carbon::now()->subMonth(6), Carbon::now()]);

            }
            if($data['text'] == '1Y'){
                $refund_order = $refund_order->whereYear('orders.created_at', date('Y'));
            }


            $refund_order = $refund_order->where('orders.payment_status','=','unpaid')
            ->where('products.created_by_user', '=', $sid)
            ->groupBy('monthKey')
            ->get();
            $data['refund'] = [0,0,0,0,0,0,0,0,0,0,0,0];

            foreach($refund_order as $refund_orde){
                $data['refund'][$refund_orde->monthKey-1] = $refund_orde->sums;
            }

           return $data;

    }


    public function editUsers(Request $request){

        $data = User::where('email',$request->email)->first();
        if($request->file('images')){
                $userimageupload= $request->file('images');
                $userimage= $userimageupload->getClientOriginalName();
                $image=url('img/uploads/MasterUsersimage/').'/'.$userimage;
                $valtest = $userimageupload->move(public_path('/img/uploads/MasterUsersimage/'),$userimage);        
                $user->master_image = $image;        
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
