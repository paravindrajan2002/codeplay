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
// Log activity Modules
use App\Models\Master\MasterCategory;
use App\Models\Master\SubCategory;
use App\Models\Master\SubCategoryList;
// end Log
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Mail;
class CategoryController extends Controller
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
    public function masterCategory(Request $request)
    {
        $roles = Role::get();
        $categorys = DB::table('categories')->where('deleted_at','=',NULL)->orderBy('ordering_number','desc')->get();
        $count =DB::table('categories')->count();
        return view('master.category.categorylist',compact('roles','categorys','count'));

    }

    public function addMasterCategory(Request $request){
        $data = DB::table('categories')->where('category_name',$request->name)->first();
        if($data != ''){
            toast('Category Already Exist!','info');
            return redirect()->route('master.category');
        }else{
           
            if($request->file()){
                $imageName = time().'.'.$request->file('images')->extension();
                $request->file('images')->move(public_path('/assets/category/'), $imageName); 
      
            }else{ $imageName =  "20230713085319_Images-08.png"; }
            if($request->featured == 1){$featured = 1; }else{ $featured = 0;  }
            if($request->displayheader == 1) { $displayheader = 1; }else{ $displayheader = 0; }
            $count =DB::table('categories')->count();
            DB::table('categories')->insert(
                [
                'category_name' => $request->name,
                'image' => $imageName,
                'ordering_number' => $count+1,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'slug' => $request->slug,
                'featured' => $featured,
                'displayInHeader' => $displayheader,
                'created_by' => auth()->user()->id                
                ]
            );
            $cat_id = DB::table('categories')->latest()->first();          
            $activity = new MasterCategory();
            $activity->action_id = $cat_id->id;
            $activity->user_id = auth()->user()->id;
            $activity->title = auth()->user()->name." Created New Category!";
            $activity->created_name = auth()->user()->name;
            $activity->created_by = auth()->user()->id;
            $activity->save();
            toast('Master Category Added Successfully!','success');
            return redirect()->route('master.category');
        }
     

    }

    public function editMasterCategory(Request $request){
        $id = Crypt::decrypt($request->cat_id1);
        $data = DB::table('categories')->where('id',$id)->first();
        if($request->file('images1')){
            $imageName = time().'.'.$request->file('images1')->extension();
                $request->file('images1')->move(public_path('assets/category/'), $imageName);   
         }else{  $imageName =  $data->image;  }
               if($request->featured == 1){$featured = 1; }else{ $featured = 0;  }
        if($request->displayheader == 1) { $displayheader = 1; }else{ $displayheader = 0; }
        if($request->meta_title != ''){$metaData = $request->meta_title; }else{ $metaData = null;  }
        if($request->meta_description != ''){$metadescription = $request->meta_description; }else{ $metadescription = null;  }
        if($request->slug != ''){$slug = $request->slug; }else{ $slug = null;  }
        $date = Carbon::now(); 
        DB::table('categories')->where('id',$id)->update(
            [
            'category_name' => $request->name,
            'image' => $imageName,
            'meta_title' => $metaData,
            'meta_description' => $metadescription,
            'slug' => $slug,
            'status' => $request->status,
            'featured' => $featured,
            'displayInHeader' => $displayheader,
            'updated_by' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')

            ]
        );
        $cat_id = DB::table('categories')->where('id',$id)->first();
        $activity = new MasterCategory();
        $activity->action_id = $cat_id->id;
        $activity->user_id = auth()->user()->id;
        $activity->title = auth()->user()->name." Edited New Category!";
        $activity->created_name = auth()->user()->name;
        $activity->updated_by = auth()->user()->id;
        $activity->save();
            toast('Master Category Edited Successfully!','success');
            return redirect()->route('master.category');          
        }

        public function updateOrderNumber(Request $request) {
            $old_order_number = $request->old_order_number;
            $order_number = $request->order_number;
            $category_id = Crypt::decrypt($request->id);
            $update_order_no = array();
            if($old_order_number < $order_number) {
                $set = "ordering_number = ordering_number - 1";
                $where = "ordering_number > $old_order_number and ordering_number <= $order_number ";
            } else {     
                $set = "ordering_number = ordering_number + 1";
                $where = "ordering_number < $old_order_number and ordering_number >= $order_number ";
            }
            DB::statement("UPDATE categories SET $set where  $where");    
            $update_order_no['ordering_number'] = $order_number;        
            DB::table('categories')->where([
                ['id', '=', $category_id]
            ])->update($update_order_no);            
            toast('Master Sequence No. Edited Successfully!','success');
            $data['id'] = 1;
            return $data;
            }     
    public function deleteMasterCategory(Request $request){
        $id = Crypt::decrypt($request->id);    
        DB::table('categories')->where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        toast('Master Category Deleted Successfully!','success'); 
        return redirect()->route('master.category');
    }

    public function masterSubCategory(Request $request)    {
        $categorys = DB::table('categories')->where('deleted_at','=',NULL)->orderBy('ordering_number','desc')->get();
        $subcategorys = DB::table('sub_categories')
        ->select('sub_categories.*',
        'categories.id as cat_id','categories.category_name as cat_name','categories.slug as cat_slug','categories.image as cat_image')
        ->join('categories','categories.id','=','sub_categories.category_id')
        ->where('sub_categories.deleted_at','=',NULL)->orderBy('sub_categories.ordering_number','desc')->get();
        $count =DB::table('sub_categories')->count();
        return view('master.category.subcategory',compact('subcategorys','categorys','count'));
    }

    public function addSubCategory(Request $request){

        $data = DB::table('sub_categories')->where('sub_category_name',$request->name)->first();
        if($data != ''){
            toast('Sub Category Already Exist!','info');
            return redirect()->route('master.subcategory');

        }else{
            if($request->featured == 1){$featured = 1; }else{ $featured = 0;  }

            $count =DB::table('sub_categories')->count();

            DB::table('sub_categories')->insert(
                [
                'sub_category_name' => $request->name,
                'category_id' => $request->master_category,
                'ordering_number' => $count+1,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'status' => 0,
                'slug' => $request->slug,
                'featured' => $featured,
                'created_by' => auth()->user()->id                
                ]
            );

            $cat_id = DB::table('sub_categories')->latest()->first();          
            $activity = new SubCategory();
            $activity->action_id = $cat_id->id;
            $activity->user_id = auth()->user()->id;
            $activity->title = auth()->user()->name." Created New Sub Category!";
            $activity->created_name = auth()->user()->name;
            $activity->created_by = auth()->user()->id;
            $activity->save();

            toast('Sub Category Added Successfully!','success');
            return redirect()->route('master.subcategory');
        }
     

    }

    public function deleteSubCategory(Request $request){

        $id = Crypt::decrypt($request->id);    

        DB::table('sub_categories')->where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);

        toast('Sub Category Deleted Successfully!','success'); 
        return redirect()->route('master.subcategory');

    }
public function editSubCategory(Request $request){

    $id = Crypt::decrypt($request->cat_id);

    $data = DB::table('sub_categories')->where('id',$id)->first();

    
    
    if($request->featured == 1){$featured = 1; }else{ $featured = 0;  }
    if($request->meta_title != ''){$metaData = $request->meta_title; }else{ $metaData = null;  }
    if($request->meta_description != ''){$metadescription = $request->meta_description; }else{ $metadescription = null;  }
    if($request->slug != ''){$slug = $request->slug; }else{ $slug = null;  }

    $date = Carbon::now(); 

    DB::table('sub_categories')->where('id',$id)->update(
        [
        'sub_category_name' => $request->name,
        'category_id' => $request->master_category,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'status' => 0,
        'slug' => $request->slug,
        'featured' => $featured,
        'updated_by' => auth()->user()->id, 
        'updated_at' => date('Y-m-d H:i:s')

        ]
    );

    $cat_id = DB::table('sub_categories')->where('id',$id)->first();
        
    $activity = new SubCategory();
    $activity->action_id = $cat_id->id;
    $activity->user_id = auth()->user()->id;
    $activity->title = auth()->user()->name." Edited Sub Category!";
    $activity->created_name = auth()->user()->name;
    $activity->updated_by = auth()->user()->id;
    $activity->save();

        toast('Sub Category Edited Successfully!','success');


        return redirect()->route('master.subcategory');
        
    }
    public function updateOrderNumbersub(Request $request) {
        $old_order_number = $request->old_order_number;
        $order_number = $request->order_number;
        $category_id = Crypt::decrypt($request->id);
        $update_order_no = array();
        if($old_order_number < $order_number) {

            $set = "ordering_number = ordering_number - 1";
            $where = "ordering_number > $old_order_number and ordering_number <= $order_number ";
        } else {
    
            $set = "ordering_number = ordering_number + 1";
            $where = "ordering_number < $old_order_number and ordering_number >= $order_number ";
        }
        DB::statement("UPDATE sub_categories SET $set where  $where");

        $update_order_no['ordering_number'] = $order_number; 


        DB::table('sub_categories')->where([
            ['id', '=', $category_id]
        ])->update($update_order_no);
        
        toast('Category Sequence No. Changed!','success');

        $data['id'] = 1;

        return $data;

    }


    public function masterSubCategorylist(Request $request)
    {
        $categorys = DB::table('categories')->where('deleted_at','=',NULL)->orderBy('ordering_number','desc')->get();
        $subcategorys = DB::table('sub_categories')
        ->select('sub_categories.*',
        'categories.id as cat_id','categories.category_name as cat_name','categories.slug as cat_slug','categories.image as cat_image')
        ->join('categories','categories.id','=','sub_categories.category_id')
        ->where('sub_categories.deleted_at','=',NULL)->orderBy('sub_categories.ordering_number','desc')->get();
        $subcategorylists = DB::table('sub_category_lists')
        ->select('sub_category_lists.*',
        'categories.id as cat_id','categories.category_name as cat_name','categories.slug as cat_slug','categories.image as cat_image','sub_categories.sub_category_name as sub_name','sub_categories.slug as sub_slug')
        ->join('categories','categories.id','=','sub_category_lists.category_id')
        ->join('sub_categories','sub_categories.id','=','sub_category_lists.sub_category_id')
        ->where('sub_category_lists.deleted_at','=',NULL)
        ->where('sub_categories.deleted_at','=',NULL)
        ->where('categories.deleted_at','=',NULL)
        ->orderBy('sub_category_lists.id','desc')->get();        
        $count =DB::table('sub_category_lists')->count();
        return view('master.category.subcategorylist',compact('subcategorylists','subcategorys','categorys','count'));

    }
    public function deleteSubCategoryList(Request $request){

        $id = Crypt::decrypt($request->id);    
        DB::table('sub_category_lists')->where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        toast('Sub Category  Deleted Successfully!','success'); 
        return redirect()->route('master.subcategorylist');

    }
    public function updateOrderNumbersublist(Request $request) {
        $old_order_number = $request->old_order_number;
        $order_number = $request->order_number;
        $category_id = Crypt::decrypt($request->id);
        $update_order_no = array();
        if($old_order_number < $order_number) {

            $set = "ordering_number = ordering_number - 1";
            $where = "ordering_number > $old_order_number and ordering_number <= $order_number ";
        } else {
    
            $set = "ordering_number = ordering_number + 1";
            $where = "ordering_number < $old_order_number and ordering_number >= $order_number ";
        }
        DB::statement("UPDATE sub_category_lists SET $set where  $where");

        $update_order_no['ordering_number'] = $order_number; 


        DB::table('sub_category_lists')->where([
            ['id', '=', $category_id]
        ])->update($update_order_no);
        
        toast('Sub Category Sequence No. Changed!','success');

        $data['id'] = 1;

        return $data;

    }
   
    public function  allsubcategorylist(Request $request)
    {
     
        $data = DB::table('sub_categories')
        ->select('sub_categories.*')
        ->where('sub_categories.deleted_at','=',NULL)
        ->where('sub_categories.category_id',$request->id)
        ->orderBy('sub_categories.id','desc')->get();               
        return $data;

    }
    public function addSubCategorylist(Request $request){

        $data = DB::table('sub_category_lists')->where('sub_category_list',$request->name)->first();
        if($data != ''){
            toast('Sub Category Already Exist!','info');
            return redirect()->route('master.subcategory');
        }else{
            if($request->featured == 1){$featured = 1; }else{ $featured = 0;  }
            $count =DB::table('sub_category_lists')->count();
            DB::table('sub_category_lists')->insert(
                [
                'category_id' => $request->master_category,
                'sub_category_id' => $request->category,
                'sub_category_list' => $request->name,
                'ordering_number' => $count+1,
                'sub_category_name' => '',
                'itemwise_description' => '',
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'status' => 0,
                'slug' => $request->slug,
                'featured' => $featured,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => auth()->user()->id                
                ]
            );
            $cat_id = DB::table('sub_category_lists')->latest()->first();          
            $activity = new SubCategoryList();
            $activity->action_id = $cat_id->id;
            $activity->user_id = auth()->user()->id;
            $activity->title = auth()->user()->name." Created New Sub Category!";
            $activity->created_name = auth()->user()->name;
            $activity->created_by = auth()->user()->id;
            $activity->save();

            toast('Sub Category Added Successfully!','success');
            return redirect()->route('master.subcategorylist');
        }    
    }

    public function editSubCategorylist(Request $request){

        $id = Crypt::decrypt($request->cat_id);
    
        $data = DB::table('sub_category_lists')->where('id',$id)->first();
           
        
        if($request->featured == 1){$featured = 1; }else{ $featured = 0;  }
        if($request->meta_title != ''){$metaData = $request->meta_title; }else{ $metaData = null;  }
        if($request->meta_description != ''){$metadescription = $request->meta_description; }else{ $metadescription = null;  }
        if($request->slug != ''){$slug = $request->slug; }else{ $slug = null;  }
    
        $date = Carbon::now(); 
    
        DB::table('sub_category_lists')->where('id',$id)->update(
            [
                'category_id' => $request->master_category,
                'sub_category_id' => $request->category,
                'sub_category_list' => $request->name,
                'sub_category_name' => '',
                'itemwise_description' => '',
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'status' => 0,
                'slug' => $request->slug,
                'featured' => $featured,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
    
            ]
        );
    
        $cat_id = DB::table('sub_category_lists')->where('id',$id)->first();
            
        $activity = new SubCategory();
        $activity->action_id = $cat_id->id;
        $activity->user_id = auth()->user()->id;
        $activity->title = auth()->user()->name." Edited Sub Category!";
        $activity->created_name = auth()->user()->name;
        $activity->updated_by = auth()->user()->id;
        $activity->save();
    
            toast('Sub Category Edited Successfully!','success');   
    
            return redirect()->route('master.subcategorylist');
            
        }
}
