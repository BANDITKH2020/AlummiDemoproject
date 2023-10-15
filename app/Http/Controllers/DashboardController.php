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
        $currentYear = now()->year + 543;//ดึงปีการศึกษาล่าสุดในตารางและrole_acc=student
        $educational_status = User::where('educational_status', 'จบการศึกษา')->where('graduatesem', '=', $currentYear)->count();
        $threeMonthsAgo = Carbon::now()->subMonths(12);
        $inactiveUserCount = LoginHistory::where('login_at', '<=', $threeMonthsAgo)->count();

        
        $loginCounts = LoginHistory::select(
            DB::raw('YEAR(login_at) as year'),
            DB::raw('MONTH(login_at) as month'),
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
        
        $countone = Contart_info::where('attention', 'like', '%งานพบประสังสรรค์%')->count();
        $counttwo = Contart_info::where('attention', 'like', '%งานวิชาการ%')->count();
        $countthree = Contart_info::where('attention', 'like', '%งานแข่งขันกีฬา%')->count();
        $countfour = Contart_info::where('attention', 'like', '%กิจกรรมศิษย์เก่าสัมพันธ์%')->count();
        $countOthers = Contart_info::whereNotNull('attention')
        ->where(function ($query) {
                $query->where('attention', 'like', '%งานพบประสังสรรค์%')
                ->orWhere('attention', 'like', '%งานวิชาการ%')
                ->orWhere('attention', 'like', '%งานแข่งขันกีฬา%')
                ->orWhere('attention', 'like', '%กิจกรรมศิษย์เก่าสัมพันธ์%');
            })
        ->count();
       
        $totalCount = Contart_info::count();
        $countALL=$totalCount-$countOthers;
        $percentageOne = $totalCount === 0 ? null : intval(($countone / $totalCount) * 100);
        $percentageTwo = $totalCount === 0 ? null : intval(($counttwo / $totalCount) * 100);
        $percentageThree = $totalCount === 0 ? null : intval(($countthree / $totalCount) * 100);
        $percentageFour = $totalCount === 0 ? null : intval(($countfour / $totalCount) * 100);
        $percentageOthers = $totalCount === 0 ? null : intval(($countALL / $totalCount) * 100);
        
        
        
        return view('Admin.dashboard.dashboard',compact('user','educational_status','inactiveUserCount','monthlyCounts'
        ,'percentageOne','percentageTwo','percentageThree','percentageFour','percentageOthers','currentYear'));
    }
}
