<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Box;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\DonutChart;
use ArielMejiaDev\LarapexCharts\HeatMapChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){

        if(Auth::check() && Auth::user()->user_type === 'admin'){

            $appointments = Appointment::selectRaw('Month(drop_off_date) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();

        $monthlyCounts3 = array_fill(0, 12, 0);
        foreach($appointments as $appointment){
            $monthlyCounts3[$appointment['month']-1] = $appointment['count'];
        }

        $boxes = Box::selectRaw('Month(created_at) as month, count(*) as count')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get()
                    ->toArray();

        $monthlyCounts2 = array_fill(0, 12, 0);
        foreach ($boxes as $box) {
            $monthlyCounts2[$box['month'] - 1] = $box['count'];
        }

        $orders = Order::selectRaw('Month(order_date) as month, count(*) as count')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();

        $monthlyCounts1 = array_fill(0, 12, 0);
        foreach ($orders as $order) {
            $monthlyCounts1[$order['month'] - 1] = $order['count'];
        }

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $chart4 = (new LarapexChart)
            ->setType('heatmap') 
            ->setTitle('Seasonal Trends in Appointments') 
            ->setXAxis($months) 
            ->setDataset([
                [
                    'name' => 'Appointments',
                    'data' => $monthlyCounts3, 
                ],
                [
                    'name' => 'Boxes',
                    'data' => $monthlyCounts2, 
                ],
                [
                    'name' => 'Orders',
                    'data' => $monthlyCounts1, 
                ],
            ])
            ->setGrid(true) 
            ->setHeight(450);


        $appointments = Appointment::selectRaw('Month(drop_off_date) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();

        $monthlyCounts3 = array_fill(0, 12, 0);
        foreach($appointments as $appointment){
            $monthlyCounts3[$appointment['month']-1] = $appointment['count'];
        };

        $boxes = Box::selectRaw('Month(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();

        $monthlyCounts2 = array_fill(0, 12, 0);
        foreach ($boxes as $box) {
            $monthlyCounts2[$box['month'] - 1] = $box['count'];
        }


        

        $orders = Order::selectRaw('Month(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();



        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


        $monthlyCounts1 = array_fill(0, 12, 0);

        foreach ($orders as $order) {
            $monthlyCounts1[$order['month'] - 1] = $order['count'];
        }

        // dd($monthlyCounts1);
        $chart3 = (new LarapexChart)
            ->setTitle('Orders and Subscriptions')
            ->setType('bar')
            ->setXAxis($months)
            ->setGrid(true)
            ->setDataset([
                [
                    'name' => 'Orders',
                    'data' => $monthlyCounts1,

                ],
                [
                    'name' => 'Boxes',
                    'data' => $monthlyCounts2,
                ],
                [
                    'name' => 'Appointments',
                    'data' => $monthlyCounts3,
                ]
            ]);

        $usersCount = User::selectRaw('Month(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


        $monthlyCounts = array_fill(0, 12, 0);

        foreach ($usersCount as $user) {
            $monthlyCounts[$user->month - 1] = $user->count;
        }

        $chart2 = (new LarapexChart)->setTitle('User Registration')
            ->setType('area')
            ->setXAxis($months)
            ->setGrid(true)
            ->setSubtitle('From January to December')
            ->setDataset([
                [
                    'name' => 'Registrations',
                    'data' => $monthlyCounts
                ]
            ]);

        
        
        $petTypeCounts = Appointment::selectRaw('pet_type, count(*) as count') 
        ->groupBy('pet_type') 
        ->get(); 

        $petTypes = $petTypeCounts->pluck('pet_type')->toArray(); 
        $counts = $petTypeCounts->pluck('count')->toArray(); 
        $chart5 = (new LarapexChart)
            ->setTitle("Appointment Categories")
            ->setType('pie') 
            ->setLabels($petTypes)
            ->setDataset(
                    $counts
                
            );

        $products = Product::all();
        $productCat = $products->pluck('category')->unique()->toArray();

        $productCat = collect($products->pluck('category')->unique());

        $quantities = $productCat->map(function ($category) use ($products) {
            return $products->where('category', $category)->sum('quantity');
        });

        $quantities = $quantities->toArray();
        $productCat = $productCat->toArray();

        $chart = (new LarapexChart)->setTitle("Product Quantities")
            ->setXAxis($productCat)
            ->setType('pie')
            ->setDataset(
                $quantities
            )
            ->setLabels($productCat);


            return view('admin.home', compact('chart', 'chart2', 'chart3', 'chart4', 'chart5'));
        }
        abort(403, 'Unauthorized access');
    }
}
