<?php

namespace App\Http\Controllers\MasterAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

use Carbon\Carbon;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }
    public function dashboard(){

        // Summary Dashboard sales
        $data['total_sales'] = DB::table('orders')->where([
            // ['status', '=', 'delivered'],
            ['payment_status','=','paid']
        ])->whereYear('created_at', Carbon::now()->year)->sum('total_price');

        $data['sales_p'] = DB::table('orders')->where([
            // ['status', '=', 'delivered'],
            ['payment_status','=','paid']
        ])->whereYear('created_at', Carbon::now()->year)->sum('total_price');
        $data['lsales_p'] = DB::table('orders')->where([
            // ['status', '=', 'delivered'],
            ['payment_status','=','paid']
        ])->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'))->sum('total_price');

        if($data['lsales_p'] != 0){
            $sales_percentage = ($data['sales_p'] - $data['lsales_p']) / $data['lsales_p'] ;
        }else{
            $sales_percentage = ($data['sales_p'] - $data['lsales_p']) * 0.001 ;
        }
        
        // End Sales Summary Dashboard

        // Orders Summary Dashboard

        $data['total_number_of_orders'] = DB::table('orders')
        ->whereNotIn('status',['return','refund','cancelled'])
        ->whereYear('created_at', Carbon::now()->year)
        ->get()->count();

        $data['ltotal_number_of_orders'] = DB::table('orders')
        ->whereNotIn('status',['return','refund','cancelled'])
        ->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'))
        ->get()->count();

        if($data['ltotal_number_of_orders'] != 0){
            $orders_percentage = ($data['total_number_of_orders'] - $data['ltotal_number_of_orders']) / $data['ltotal_number_of_orders']  ;
        }else{
            $orders_percentage = ($data['total_number_of_orders'] - $data['ltotal_number_of_orders']) * 0.1 ;
        }

        // End Summary Dashboard


        // Vendors Summary Daashboard

        $data['total_vendors'] = DB::table('vendorusers')
        ->where([
            ['status', '=', '0']
        ])->whereYear('created_at', Carbon::now()->year)->get()->count();
        $data['ltotal_vendors'] = DB::table('vendorusers')
        ->where([
            ['status', '=', '0']
        ])->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'))->get()->count();

        if($data['ltotal_vendors'] != 0){
            $vendors_percentage = ($data['total_vendors'] - $data['ltotal_vendors']) / $data['ltotal_vendors']  ;
        }else{
            $vendors_percentage = ($data['total_vendors'] - $data['ltotal_vendors']) * 0.1 ;
        }

        // End Vendors Summary Dashboard

        // Customer Summary Dashboard

        $data['total_customers'] = DB::table('customerusers')
        ->where([
            ['status', '=', '1']
        ])->whereYear('created_at', Carbon::now()->year)->get()->count();
        $data['ltotal_customers'] = DB::table('customerusers')
        ->where([
            ['status', '=', '1']
        ])->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'))->get()->count();

        if($data['ltotal_customers'] != 0){
            $customers_percentage = ($data['total_customers'] - $data['ltotal_customers']) / $data['ltotal_customers']  ;
        }else{
            $customers_percentage = ($data['total_customers'] - $data['ltotal_customers']) * 0.1 ;
        }


        // End Customer Summary Dashboard


        // Pending Orders Summary Dashboard
        $data['total_pending_orders'] = DB::table('orders')->where([
            ['status', '=', 'pending']
        ])->whereYear('created_at', Carbon::now()->year)->get()->count();

        $data['ltotal_pending_orders'] = DB::table('orders')->where([
            ['status', '=', 'pending']
        ])->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'))->get()->count();
        if($data['ltotal_pending_orders'] != 0){
            $pending_orders_percentage = ($data['total_pending_orders'] - $data['ltotal_pending_orders']) / $data['ltotal_pending_orders']  ;
        }else{
            $pending_orders_percentage = ($data['total_pending_orders'] - $data['ltotal_pending_orders']) * 0.1 ;
        }
        // End Pending Orders Summary Dashboard
        


       // Delivered Orders Summary Dashboard
       $data['total_delivered_orders'] = DB::table('orders')->where([
        ['status', '=', 'delivered']
    ])->whereYear('created_at', Carbon::now()->year)->get()->count();

    $data['ltotal_delivered_orders'] = DB::table('orders')->where([
        ['status', '=', 'delivered']
    ])->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'))->get()->count();
    if($data['ltotal_delivered_orders'] != 0){
        $delivered_orders_percentage = ($data['total_delivered_orders'] - $data['ltotal_delivered_orders']) / $data['ltotal_delivered_orders']  ;
    }else{
        $delivered_orders_percentage = ($data['total_delivered_orders'] - $data['ltotal_delivered_orders']) * 0.1 ;
    }
    // End Pending Orders Summary Dashboard


        $recentOrders = DB::table('orders')
        ->select('orders.total_price','orders.created_at','customer_details.first_name','customer_details.last_name')
        ->leftJoin('customer_details', 'customer_details.customer_id', '=', 'orders.order_id')
        ->where('orders.total_price','>',0)
        ->orderBy('orders.order_id','desc')
        ->limit(10)
        ->get();

        $latestOrders = DB::table('orders')
        ->select('orders.total_price as amount',
        'orders.created_at as order_date',
        'orders.order_code as order_code',
        'customer_details.first_name',
        'customer_details.last_name',
        'vendorusers.first_name as vendor_fname',
        'vendorusers.last_name as vendor_lname',
        'products.product_name as product_name',
        'orders.status as status')
        ->leftJoin('order_items', 'order_items.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
        ->leftJoin('vendorusers', 'vendorusers.id', '=', 'order_items.vendor_id')
        ->leftJoin('customer_details', 'customer_details.customer_id', '=', 'orders.order_id')
        ->where('orders.total_price','>',0)
        ->orderBy('orders.order_id','desc')
        ->limit(6)
        ->get();

        $status = DB::table('orders')->distinct()->pluck('status')->toArray();
        $order_status = DB::table('orders')
        ->select( DB::raw('count(status) as status_count, status') )
        ->whereIn('status', $status)
        ->whereYear('created_at', date('Y'))
        ->groupBy('status')
        ->get();

        // Dash Popular Product
        $p_products = DB::table('order_items')->distinct()->pluck('product_id')->toArray();
        $popular_products = DB::table('order_items')
        ->select( DB::raw('CONCAT(vendorusers.first_name,vendorusers.last_name) AS vendor_name,products.product_name,count(order_items.product_id) as product_count,sum(order_items.subtotal) as total,product_images.mainimage as image') )
        ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
        ->leftJoin('vendorusers', 'vendorusers.id', '=', 'order_items.vendor_id')
        ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
        ->whereIn('order_items.product_id', $p_products)
        ->whereNotNull('products.product_name')
        ->whereYear('order_items.created_at', date('Y'))
        ->orderBy('total','desc')
        ->groupBy('order_items.product_id')
        ->groupBy('order_items.vendor_id')
        ->groupBy('product_images.mainimage')
        ->get();
        // End Poular product



        $revenue = DB::table('orders')->select(
            DB::raw('year(created_at) as year'),
            DB::raw('month(created_at) as month'),
            DB::raw('sum(total_price) as total_price'),
        )
        ->whereBetween('created_at', ["2023-01-01", "2024-01-01"]) // filter sales by date
        ->where(DB::raw('date(created_at)'), '>=', "2023-01-01")
        ->groupBy('year')
        ->groupBy('month')
        ->pluck('total_price');



        $orders_chart = DB::table('orders')->select(
                            DB::raw('sum(total_price) as sums'), 
                            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
                )
                ->whereYear('created_at', date('Y'))
                ->groupBy('monthKey')
                ->get();
                $revenue = [0,0,0,0,0,0,0,0,0,0,0,0];

                foreach($orders_chart as $order){
                    $revenue[$order->monthKey-1] = $order->sums;
                }
                


        return view('master.dashboard',compact('data','recentOrders','latestOrders','order_status','popular_products','revenue','sales_percentage','orders_percentage','pending_orders_percentage','delivered_orders_percentage','vendors_percentage','customers_percentage'));
    }

    public function dashboardFiltergraph(Request $request){

        $data['text'] = $request->filter; 

        $orders_chart = DB::table('orders')->select(
                        DB::raw('sum(total_price) as sums'), 
                        DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
        );


        if($data['text'] == '1M'){
            $orders_chart = $orders_chart->whereMonth('created_at', date('m'));

        }
        if($data['text'] == '6M'){
            $orders_chart = $orders_chart->whereBetween('created_at', [Carbon::now()->subMonth(6), Carbon::now()]);

        }
        if($data['text'] == '1Y'){
            $orders_chart = $orders_chart->whereYear('created_at', date('Y'));
        }
           
            $orders_chart = $orders_chart->groupBy('monthKey')
            ->get();
            $data['revenue'] = [0,0,0,0,0,0,0,0,0,0,0,0];

            foreach($orders_chart as $order){
                $data['revenue'][$order->monthKey-1] = $order->sums;
            }

            return $data;

    }

    public function dashboardFilterOrderStatus(Request $request){
        $data['text'] = $request->filter;

        $status = DB::table('orders')->distinct()->pluck('status')->toArray();
        $data['Ostatus'] = DB::table('orders')
        ->select( DB::raw('count(status) as status_count, status') )
        ->whereIn('status', $status);
        if( $data['text'] == 'Current Year'){
            $data['Ostatus'] = $data['Ostatus']->whereYear('created_at', date('Y'));
        }
        if( $data['text'] == 'Last Year'){
            $data['Ostatus'] = $data['Ostatus']->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'));
        }        
        $data['Ostatus'] = $data['Ostatus']->groupBy('status')
        ->get();

        return $data;

    }


    public function dashboardFilterPopularProduct(Request $request){
        $data['text'] = $request->filter;        

                // Dash Popular Product
                $p_products = DB::table('order_items')->distinct()->pluck('product_id')->toArray();
                $data['products'] = DB::table('order_items')
                ->select( DB::raw('CONCAT(vendorusers.first_name,vendorusers.last_name) AS vendor_name,products.product_name,count(order_items.product_id) as product_count,sum(order_items.subtotal) as total,product_images.mainimage as image') )
                ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                ->leftJoin('vendorusers', 'vendorusers.id', '=', 'order_items.vendor_id')
                ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
                ->whereIn('order_items.product_id', $p_products)
                ->whereNotNull('products.product_name');
                if( $data['text'] == 'Current Year'){
                    $data['products'] = $data['products']->whereYear('order_items.created_at', date('Y'));
                }
                if($data['text'] == 'Today'){
                    $data['products'] = $data['products']->whereDate('order_items.created_at', Carbon::today());
                }
                if($data['text'] == 'Yesterday'){
                    $data['products'] = $data['products']->whereDate('order_items.created_at', Carbon::Yesterday());
                }
                if($data['text'] == 'Last 7 Days'){
                    $data['products'] = $data['products']->whereDate('order_items.created_at', Carbon::now()->subDays(7));
                }
                if($data['text'] == 'Last 30 Days'){
                    $data['products'] = $data['products']->whereDate('order_items.created_at', Carbon::now()->subDays(30));
                }
                if($data['text'] == 'This Month'){
                    $data['products'] = $data['products']->whereMonth('order_items.created_at', Carbon::now()->month);
                }
                if($data['text'] == 'Last Month'){
                    $data['products'] = $data['products']->whereMonth('order_items.created_at', Carbon::now()->subMonth()->format('Ym'));
                }
                $data['products'] = $data['products']->orderBy('total','desc')
                ->groupBy('order_items.product_id')
                ->groupBy('order_items.vendor_id')
                ->groupBy('product_images.mainimage')
                ->get();
                // End Poular product

                return $data;
    }


    public function dashboardFilterCustomers(Request $request){

        $data['text'] = $request->filter;


        $data['total_customers'] = DB::table('customerusers')
        ->where([
            ['status', '=', '1']
        ]);
        if($data['text'] == 'Today'){
            $data['total_customers'] = $data['total_customers']->whereDate('created_at', Carbon::today());
        }
        if($data['text'] == 'This Week'){

            $data['total_customers'] = $data['total_customers']->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        };
        if($data['text'] == 'This Month'){
            $data['total_customers'] = $data['total_customers']->whereMonth('created_at', Carbon::now()->month);
        }
        if($data['text'] == 'Current Year'){
            $data['total_customers'] = $data['total_customers']->whereYear('created_at', Carbon::now()->year);
        }        
        $data['total_customers'] = $data['total_customers']->get()->count();

        $data['ltotal_customers'] = DB::table('customerusers')
        ->where([
            ['status', '=', '1']
        ]);
        if($data['text'] == 'Today'){
            $data['ltotal_customers'] = $data['ltotal_customers']->whereDate('created_at', Carbon::yesterday());
        }
        if($data['text'] == 'This Week'){
            $startWeek = Carbon::now()->subWeek()->startOfWeek(); 
            $endWeek   = Carbon::now()->subWeek()->endOfWeek();
            $data['ltotal_customers'] = $data['ltotal_customers']->whereBetween('created_at',[ $startWeek,$endWeek ]
        );
        }
        if($data['text'] == 'This Month'){
            $data['ltotal_customers'] = $data['ltotal_customers']->whereMonth('created_at', Carbon::now()->subMonth()->format('Ym'));
        }
        if($data['text'] == 'Current Year'){
            $data['ltotal_customers'] = $data['ltotal_customers']->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'));
        }
        $data['ltotal_customers'] = $data['ltotal_customers']->get()->count();

        if($data['ltotal_customers'] != 0){
            $data['percentage'] = ($data['total_customers'] - $data['ltotal_customers']) / $data['ltotal_customers'] ;
        }else{
            $data['percentage'] = number_format(($data['total_customers'] - $data['ltotal_customers']) * 0.1 ,1);
        }
        
        return $data;

    }






    public function dashboardFilterVendors(Request $request){

        $data['text'] = $request->filter;

        

        $data['total_vendors'] = DB::table('vendorusers')
        ->where([
            ['status', '=', '0']
        ]);
        if($data['text'] == 'Today'){
            $data['total_vendors'] = $data['total_vendors']->whereDate('created_at', Carbon::today());
        }
        if($data['text'] == 'This Week'){

            $data['total_vendors'] = $data['total_vendors']->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        };
        if($data['text'] == 'This Month'){
            $data['total_vendors'] = $data['total_vendors']->whereMonth('created_at', Carbon::now()->month);
        }
        if($data['text'] == 'Current Year'){
            $data['total_vendors'] = $data['total_vendors']->whereYear('created_at', Carbon::now()->year);
        }        
        $data['total_vendors'] = $data['total_vendors']->get()->count();

        $data['ltotal_vendors'] = DB::table('vendorusers')
        ->where([
            ['status', '=', '0']
        ]);
        if($data['text'] == 'Today'){
            $data['ltotal_vendors'] = $data['ltotal_vendors']->whereDate('created_at', Carbon::yesterday());
        }
        if($data['text'] == 'This Week'){
            $startWeek = Carbon::now()->subWeek()->startOfWeek(); 
            $endWeek   = Carbon::now()->subWeek()->endOfWeek();
            $data['ltotal_vendors'] = $data['ltotal_vendors']->whereBetween('created_at',[ $startWeek,$endWeek ]
        );
        }
        if($data['text'] == 'This Month'){
            $data['ltotal_vendors'] = $data['ltotal_vendors']->whereMonth('created_at', Carbon::now()->subMonth()->format('Ym'));
        }
        if($data['text'] == 'Current Year'){
            $data['ltotal_vendors'] = $data['ltotal_vendors']->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'));
        }
        $data['ltotal_vendors'] = $data['ltotal_vendors']->get()->count();

        if($data['ltotal_vendors'] != 0){
            $data['percentage'] = ($data['total_vendors'] - $data['ltotal_vendors']) / $data['ltotal_vendors'] ;
        }else{
            $data['percentage'] = number_format(($data['total_vendors'] - $data['ltotal_vendors']) * 0.1 ,1);
        }
        
        return $data;

    }



    public function dashboardFilterDeliveredOrders(Request $request){

        $data['text'] = $request->filter;

        $data['total_delivered_orders'] = DB::table('orders')
        ->where([
            ['status', '=', 'delivered']
        ]);
        if($data['text'] == 'Today'){
            $data['total_delivered_orders'] = $data['total_delivered_orders']->whereDate('created_at', Carbon::today());
        }
        if($data['text'] == 'This Week'){

            $data['total_delivered_orders'] = $data['total_delivered_orders']->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        };
        if($data['text'] == 'This Month'){
            $data['total_delivered_orders'] = $data['total_delivered_orders']->whereMonth('created_at', Carbon::now()->month);
        }
        if($data['text'] == 'Current Year'){
            $data['total_delivered_orders'] = $data['total_delivered_orders']->whereYear('created_at', Carbon::now()->year);
        }        
        $data['total_delivered_orders'] = $data['total_delivered_orders']->get()->count();


        $data['ltotal_delivered_orders'] = DB::table('orders')
        ->where([
            ['status', '=', 'delivered']
        ]);
        if($data['text'] == 'Today'){
            $data['ltotal_delivered_orders'] = $data['ltotal_delivered_orders']->whereDate('created_at', Carbon::yesterday());
        }
        if($data['text'] == 'This Week'){
            $startWeek = Carbon::now()->subWeek()->startOfWeek(); 
            $endWeek   = Carbon::now()->subWeek()->endOfWeek();
            $data['ltotal_delivered_orders'] = $data['ltotal_delivered_orders']->whereBetween('created_at',[ $startWeek,$endWeek ]
        );
        }
        if($data['text'] == 'This Month'){
            $data['ltotal_delivered_orders'] = $data['ltotal_delivered_orders']->whereMonth('created_at', Carbon::now()->subMonth()->format('Ym'));
        }
        if($data['text'] == 'Current Year'){
            $data['ltotal_delivered_orders'] = $data['ltotal_delivered_orders']->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'));
        }
        $data['ltotal_delivered_orders'] = $data['ltotal_delivered_orders']->get()->count();

        if($data['ltotal_delivered_orders'] != 0){
            $data['percentage'] = ($data['total_delivered_orders'] - $data['ltotal_delivered_orders']) / $data['ltotal_delivered_orders'] ;
        }else{
            $data['percentage'] = number_format(($data['total_delivered_orders'] - $data['ltotal_delivered_orders']) * 0.1 ,1);
        }
        
        return $data;

    }



    public function dashboardFilterPendingOrders(Request $request){

        $data['text'] = $request->filter;

        $data['total_pending_orders'] = DB::table('orders')
        ->where([
            ['status', '=', 'pending']
        ]);
        if($data['text'] == 'Today'){
            $data['total_pending_orders'] = $data['total_pending_orders']->whereDate('created_at', Carbon::today());
        }
        if($data['text'] == 'This Week'){

            $data['total_pending_orders'] = $data['total_pending_orders']->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        };
        if($data['text'] == 'This Month'){
            $data['total_pending_orders'] = $data['total_pending_orders']->whereMonth('created_at', Carbon::now()->month);
        }
        if($data['text'] == 'Current Year'){
            $data['total_pending_orders'] = $data['total_pending_orders']->whereYear('created_at', Carbon::now()->year);
        }        
        $data['total_pending_orders'] = $data['total_pending_orders']->get()->count();


        $data['ltotal_pending_orders'] = DB::table('orders')
        ->where([
            ['status', '=', 'pending']
        ]);
        if($data['text'] == 'Today'){
            $data['ltotal_pending_orders'] = $data['ltotal_pending_orders']->whereDate('created_at', Carbon::yesterday());
        }
        if($data['text'] == 'This Week'){
            $startWeek = Carbon::now()->subWeek()->startOfWeek(); 
            $endWeek   = Carbon::now()->subWeek()->endOfWeek();
            $data['ltotal_pending_orders'] = $data['ltotal_pending_orders']->whereBetween('created_at',[ $startWeek,$endWeek ]
        );
        }
        if($data['text'] == 'This Month'){
            $data['ltotal_pending_orders'] = $data['ltotal_pending_orders']->whereMonth('created_at', Carbon::now()->subMonth()->format('Ym'));
        }
        if($data['text'] == 'Current Year'){
            $data['ltotal_pending_orders'] = $data['ltotal_pending_orders']->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'));
        }
        $data['ltotal_pending_orders'] = $data['ltotal_pending_orders']->get()->count();

        if($data['ltotal_pending_orders'] != 0){
            $data['percentage'] = ($data['total_pending_orders'] - $data['ltotal_pending_orders']) / $data['ltotal_pending_orders'] ;
        }else{
            $data['percentage'] = number_format(($data['total_pending_orders'] - $data['ltotal_pending_orders']) * 0.1 ,1);
        }
        
        return $data;

    }

    public function dashboardFilterOrders(Request $request){

        $data['text'] = $request->filter;

        $data['total_number_of_orders'] = DB::table('orders')
        ->whereNotIn('status',['return','refund','cancelled']);
        if($data['text'] == 'Today'){
            $data['total_number_of_orders'] = $data['total_number_of_orders']->whereDate('created_at', Carbon::today());
        }
        if($data['text'] == 'This Week'){

            $data['total_number_of_orders'] = $data['total_number_of_orders']->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        };
        if($data['text'] == 'This Month'){
            $data['total_number_of_orders'] = $data['total_number_of_orders']->whereMonth('created_at', Carbon::now()->month);
        }
        if($data['text'] == 'Current Year'){
            $data['total_number_of_orders'] = $data['total_number_of_orders']->whereYear('created_at', Carbon::now()->year);
        }        
        $data['total_number_of_orders'] = $data['total_number_of_orders']->get()->count();


        $data['ltotal_number_of_orders'] = DB::table('orders')
        ->whereNotIn('status',['return','refund','cancelled']);
        if($data['text'] == 'Today'){
            $data['ltotal_number_of_orders'] = $data['ltotal_number_of_orders']->whereDate('created_at', Carbon::yesterday());
        }
        if($data['text'] == 'This Week'){
            $startWeek = Carbon::now()->subWeek()->startOfWeek(); 
            $endWeek   = Carbon::now()->subWeek()->endOfWeek();
            $data['ltotal_number_of_orders'] = $data['ltotal_number_of_orders']->whereBetween('created_at',[ $startWeek,$endWeek ]
        );
        }
        if($data['text'] == 'This Month'){
            $data['ltotal_number_of_orders'] = $data['ltotal_number_of_orders']->whereMonth('created_at', Carbon::now()->subMonth()->format('Ym'));
        }
        if($data['text'] == 'Current Year'){
            $data['ltotal_number_of_orders'] = $data['ltotal_number_of_orders']->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'));
        }
        $data['ltotal_number_of_orders'] = $data['ltotal_number_of_orders']->get()->count();

        if($data['ltotal_number_of_orders'] != 0){
            $data['percentage'] = ($data['total_number_of_orders'] - $data['ltotal_number_of_orders']) / $data['ltotal_number_of_orders'] ;
        }else{
            $data['percentage'] = number_format(($data['total_number_of_orders'] - $data['ltotal_number_of_orders']) * 0.1 ,1);
        }
        
        return $data;

    }

    public function dashboardFilterSales(Request $request){

        $data['text'] = $request->filter;

        $data['sales'] = DB::table('orders')->where([
            // ['status', '=', 'delivered'],
            ['payment_status','=','paid']
        ]);
        if($data['text'] == 'Today'){
            $data['sales'] = $data['sales']->whereDate('created_at', Carbon::today());
        }
        if($data['text'] == 'This Week'){

            $data['sales'] = $data['sales']->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        };
        if($data['text'] == 'This Month'){
            $data['sales'] = $data['sales']->whereMonth('created_at', Carbon::now()->month);
        }
        if($data['text'] == 'Current Year'){
            $data['sales'] = $data['sales']->whereYear('created_at', Carbon::now()->year);
        }
        
        $data['sales'] = $data['sales']->sum('total_price');

        $data['lsales'] = DB::table('orders')->where([
            // ['status', '=', 'delivered'],
            ['payment_status','=','paid']
        ]);
        if($data['text'] == 'Today'){
            $data['lsales'] = $data['lsales']->whereDate('created_at', Carbon::yesterday());
        }
        if($data['text'] == 'This Week'){
            $startWeek = Carbon::now()->subWeek()->startOfWeek(); 
            $endWeek   = Carbon::now()->subWeek()->endOfWeek();
            $data['lsales'] = $data['lsales']->whereBetween('created_at',[ $startWeek,$endWeek ]
        );
        }
        if($data['text'] == 'This Month'){
            $data['lsales'] = $data['lsales']->whereMonth('created_at', Carbon::now()->subMonth()->format('Ym'));
        }
        if($data['text'] == 'Current Year'){
            $data['lsales'] = $data['lsales']->whereYear('created_at',  Carbon::now()->subYear()->format('Ym'));
        }
        $data['lsales'] = $data['lsales']->sum('total_price');

        if($data['lsales'] != 0){
            $data['percentage'] = ($data['sales'] - $data['lsales']) / $data['lsales'] ;
        }else{
            $data['percentage'] = ($data['sales'] - $data['lsales']) * 0.001 ;
        }
        
        return $data;

    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        toast('Logout Successfully!','success');
        return redirect()->route('master-admin');
    }
}
