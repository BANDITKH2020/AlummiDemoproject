<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\add_fileMassage;
use App\Models\Massage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MassageAdminController extends Controller
{
    public function massege(Request $request)
    {
        $queryMassage = Massage::query();
        $search = $request->input('search');
        $searchdata = $request->searchdata;
        if ($search === null) {
            $search = 1;
        }
        if (!empty($search)) {
            switch ($searchdata) {
                case 'all':
                    if ($search === 1) {
                        $search = null;
                    }
                    $queryMassage->where('firstname', 'LIKE', "%{$search}%")
                            ->orWhere('lastname', 'LIKE', "%{$search}%")
                            ->orWhere('massage_name', 'LIKE', "%{$search}%");
                    if ($search === 'อ่านแล้ว' || $search === 'ติดดาว') {
                        $search = 1;
                    } elseif ($search === 'ยังไม่ได้อ่าน' || $search === 'ไม่ติดดาว') {
                        $search = 0;
                    }
                    $queryMassage->where('status_read', $search)
                            ->orWhere('status_massage', $search);
                    break;
                case 'massage_name':
                    $queryMassage->where('massage_name', 'LIKE', "%{$search}%");
                    break;
                case 'status_read':
                    if ($search === 'อ่านแล้ว') {
                        $search = 1;
                    } elseif ($search === 'ยังไม่ได้อ่าน') {
                        $search = 0;
                    }
                    $queryMassage->where('status_read', $search);
                    break;
                case 'status_massage':
                    if ($search === 'ติดดาว') {
                        $search = 1;
                    } elseif ($search === 'ไม่ติดดาว') {
                        $search = 0;
                    }
                    $queryMassage->where('status_massage', $search);
                    break;
            }
        }
        $messages = $queryMassage->orderBy('created_at', 'desc')->paginate(8);
        $fileMassage = add_fileMassage::query()->paginate(8);
        $users = User::query()->paginate(8);
        return view('Admin.massege.massege',compact('messages','fileMassage','users'));
    }
    public function readmassege($id, Request $request)
    { 
        $massage = Massage::find($id);
        $star = $request->input('star');
        // ใช้ Eloquent เพื่ออัพเดตค่า status_massage และ status_read
        if ($star == 1) {
            $massage->status_massage = !$massage->status_massage; // สลับค่า status_massage
            $massage->save(); // บันทึกการเปลี่ยนแปลงลงในฐานข้อมูล
            if ($massage !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', 'บันทึกข้อความสำคัญเรียบร้อย');
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อความสำคัญ');
            }
        }
    }
    public function read_massege($id,Request $request)
    { 
        $view = $request->input('view');
        $massage = Massage::find($id);
        if ($view == 1) {
            $status_read ='1';
            $massage->status_read = $status_read; // กำหนดค่า status_read เป็น 1
            $massage->save(); // บันทึกการเปลี่ยนแปลงลงในฐานข้อมูล
            return redirect()->back();
        }
    }
}
