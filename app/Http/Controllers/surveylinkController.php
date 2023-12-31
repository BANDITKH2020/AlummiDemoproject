<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\link_Alumni;
use App\Mail\Update_link_Alumni;
use App\Models\Surveylink;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class surveylinkController extends Controller
{
    public function index(){
        $surveylink = Surveylink::orderBy('graduatedyear', 'desc')->paginate(3);

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
        $users = User::query()->get();
        $link = Surveylink::query()->latest()->first();
        $graduatedyear = $link->graduatedyear;

        if ($sendEmail == 1) {
            $userEmails = [];
            
            foreach ($users as $user) {
                $graduatesem = $user->graduatesem;
                
                // Check if the user's graduatesem matches graduatedyear
                if ($graduatesem === $graduatedyear) {
                    $userEmails[] = $user->email;
                }
            }
            
            $batchSize = 30;
            $recipientBatches = array_chunk($userEmails, $batchSize);

            foreach ($recipientBatches as $batch) {
                $customEmail = new link_Alumni('ขอความร่วมมือตอบแบบสอบถาม');
                Mail::bcc($batch)->send($customEmail);
            }

            return redirect()->route('links')->with('alert', "บันทึกข้อมูลและส่งข้อความเรียบร้อย");
        } else {
            return redirect()->route('error')->with('alert', "เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        }

    }
    
    public function update(Request $request, $id){
        if ($request->isMethod('post')) {
            $surveylink = $request->all();
            $surveylink = Surveylink::where(['id'=>$id])->update(['graduatedyear'=>$surveylink['graduatedyear'],'link'=>$surveylink['link']]);
            $sendEmail = $request->sendEmail;
            $users = User::query()->get();
            $link = Surveylink::query()->latest('updated_at')->first();
            $graduatedyear = $link->graduatedyear;

            if ($sendEmail == 1) {
                $userEmails = [];
                
                foreach ($users as $user) {
                    $graduatesem = $user->graduatesem;
                    
                    // Check if the user's graduatesem matches graduatedyear
                    if ($graduatesem === $graduatedyear) {
                        $userEmails[] = $user->email;
                    }
                }
                
                $batchSize = 30;
                $recipientBatches = array_chunk($userEmails, $batchSize);

                foreach ($recipientBatches as $batch) {
                    $customEmail = new Update_link_Alumni('ขอความร่วมมือตอบแบบสอบถาม');
                    Mail::bcc($batch)->send($customEmail);
                }

                return redirect()->route('links')->with('alert', "บันทึกข้อมูลและส่งข้อความเรียบร้อย");
            } else {
                return redirect()->route('error')->with('alert', "เกิดข้อผิดพลาดในการส่งข้อความ");
            }
        }
    }
    public function delete($id){
        //ลบข้อมูลฐาน
        $delete= Surveylink::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }

}
