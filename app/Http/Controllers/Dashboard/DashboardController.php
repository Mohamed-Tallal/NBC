<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testmonial;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnSelf;

class DashboardController extends Controller
{
    public function index(){
        $user = User::get()->count();
        $product = Product::get()->count();
        $service = Service::get()->count();
        $testmioinal = Testmonial::get()->count();
        $post = Product::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(item) as sum')
        )->whereYear('created_at', '=', Carbon::now()->format('Y'))->groupBy('month')->get();
        return view('dashboard.index',compact('post','user','product','service','testmioinal'));
    }
}
