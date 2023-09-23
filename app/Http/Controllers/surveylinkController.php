<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RMUTT_Alumni;
use App\Models\Surveylink;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class surveylinkController extends Controller
{
    public function index(){
        $surveylink = Surveylink::paginate(3);
        return view('admin.link.index',compact('surveylink'));
    }
    public function search(Request $request){
        $searchTerm = $request->input('search'); // Get the search term from the request
        $surveylink = SurveyLink::where('graduatedyear', 'like', '%' . $searchTerm . '%')
                            ->paginate(10); // Perform the search and paginate the results

        return view('admin.link.index', compact('surveylink'));
        
    }
    public function store(Request $request){
        $request->validate(
            [
                'graduatedyear'=>'required',
                'link'=>'required',
                'sendEmail'=>'required',
            ],
            [
                'graduatedyear.required'=>"กรุณาป้อนปีการศึกษาที่จบ",
                'link.required'=>"กรุณาป้อนลิงก์แบบสอบถาม",
                'sendEmail.required'=>"กรุณาเลือกจะส่งแบบสอบถามหรือไม่",
            ]
        );
        
        Surveylink::insert([
            'graduatedyear'=>$request->graduatedyear,
            'link'=>$request->link,
            'created_at'=>Carbon::now()
        ]);

        $sendEmail = $request->sendEmail;
        $users = User::all();
        $link = Surveylink::query()->latest()->first();

        foreach ($users as $user) {
            if ($user->graduatesem === $link->graduatedyear) {
                if ($sendEmail == 1 ) {
                    $userEmail = $user->email;
                    Mail::to($userEmail)->send(new RMUTT_Alumni());
                }
            }
        }
        if ($sendEmail == 1 ) {
            return redirect()->route('links')->with('alert', "บันทึกข้อมูลและส่งข้อความเรียบร้อย");
        } else {
            return redirect()->route('links')->with('alert', "บันทึกข้อมูลเรียบร้อย");
        }
    }
    
    public function update(Request $request, $id){
        if ($request->isMethod('post')) {
            $surveylink = $request->all();
            Surveylink::where(['id'=>$id])->update(['graduatedyear'=>$surveylink['graduatedyear'],'link'=>$surveylink['link']]);
            return redirect()->route('links')->with('alert',"บันทึกข้อมูลเรียบร้อย");  
        }
    }
    public function delete($id){
        //ลบข้อมูลฐาน
        $delete= Surveylink::find($id)->delete();
        return redirect()->back()->with('alert','ลบข้อมูลเรียบร้อย');
    }

}
