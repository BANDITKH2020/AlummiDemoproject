<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\LoginHistory;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = User::count();
        $currentYear = now()->year + 543;
        $educational_status = User::where('educational_status', 'จบการศึกษา')->where('graduatesem', '=', $currentYear)->count();
        $threeMonthsAgo = Carbon::now()->subMonths(3);
        $inactiveUserCount = LoginHistory::where('login_at', '<=', $threeMonthsAgo)->count();

        
        $loginCounts = User::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('year', 'month')
        ->orderBy('year')
        ->orderBy('month')
        ->get();

        // สร้างรายชื่อเดือนและนับผู้เข้าสู่ระบบในแต่ละเดือน
        $monthlyCounts = [];
        foreach ($loginCounts as $count) {
            $year = $count->year;
            $month = $count->month;
            $count = $count->count;
            $date = Carbon::create($year, $month, 1)->format('m');
            $monthlyCounts[$date] = $count;
        }
        
        $countone = Contart_info::where('attention', 'like', '%งานพบประสังสรรค์ประจำปี%')->count();
        $counttwo = Contart_info::where('attention', 'like', '%อบรมให้ความรู้วิชาการ%')->count();
        $countthree = Contart_info::where('attention', 'like', '%งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์%')->count();
        $countfour = Contart_info::where('attention', 'like', '%กิจกรรมศิษย์เก่าสัมพันธ์%')->count();
        $countOthers = Contart_info::where(function ($query) {
            $query->where('attention', 'not like', '%งานพบประสังสรรค์ประจำปี%')
                  ->where('attention', 'not like', '%อบรมให้ความรู้วิชาการ%')
                  ->where('attention', 'not like', '%งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์%')
                  ->where('attention', 'not like', '%กิจกรรมศิษย์เก่าสัมพันธ์%');
        })->count();
        $totalCount = Contart_info::count();
        $percentageOne = $totalCount === 0 ? null : intval(($countone / $totalCount) * 100);
        $percentageTwo = $totalCount === 0 ? null : intval(($counttwo / $totalCount) * 100);
        $percentageThree = $totalCount === 0 ? null : intval(($countthree / $totalCount) * 100);
        $percentageFour = $totalCount === 0 ? null : intval(($countfour / $totalCount) * 100);
        $percentageOthers = $totalCount === 0 ? null : intval(($countOthers / $totalCount) * 100);
        
        
        return view('Admin.dashboard.dashboard',compact('user','educational_status','inactiveUserCount','monthlyCounts'
        ,'percentageOne','percentageTwo','percentageThree','percentageFour','percentageOthers'));
    }
}
