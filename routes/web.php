<?php

use App\Http\Controllers\activityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EducationInfomController;
use App\Http\Controllers\graduateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\LanguageSkillController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageAccountController;
use App\Http\Controllers\MassageAdminController;
use App\Http\Controllers\MassageController;
use App\Http\Controllers\NewsandActivitiesController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\RewardUserController;
use App\Http\Controllers\SkillInfoController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\surveylinkController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeachersetController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\TokenTeacherController;
use App\Http\Controllers\TranningInfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersetController;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\WorkhistoryInfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcomeproject');
})->name('welcome');
Auth::routes();
//สมัครAdmin
Route::get('/admin/home', [HomeController::class,'index'])->name('index');
Route::get('/home/view/{id}', [HomeController::class,'view'])->name('view')->middleware('auth', 'checkRole:Admin');
Route::get('/home/viewNew/{id}', [NewsandActivitiesController::class,'viewnew'])->name('view')->middleware('auth', 'checkRole:Admin');
Route::get('/home/viewactivity/{id}', [activityController::class,'viewactivity'])->name('view')->middleware('auth', 'checkRole:Admin');
//สมัครสมาชิก google
Route::get('users/login', [LoginController::class, 'login'])->name('login.ris')->block();
Route::post('/users/input', [SocialController::class, 'inputgoogle'])->name('inputgoogle')->block();
Route::get('auth/google', [SocialController::class,'googleRedirect'])->name('googleRedirect')->block();
Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle'])->block();
Route::get('users/register', [SocialController::class, 'register'])->name('register.ris')->block();
//ออกจากระบบ
Route::delete('/logout', [HomeUserController::class, 'logout'])->name('logout');
//---------------------ข่าว-----------------------
Route::get('/new/all', [NewsandActivitiesController::class, 'index'])->name('news')->middleware('auth', 'checkRole:Admin');
Route::get('/new/savenews', [NewsandActivitiesController::class, 'savenews'])->name('savenews')->middleware('auth', 'checkRole:Admin');
Route::post('/new/savenews/add', [NewsandActivitiesController::class, 'store'])->name('addsavenews')->middleware('auth', 'checkRole:Admin');
Route::get('/new/editnews/{id}',[NewsandActivitiesController::class,'edit'])->middleware('auth', 'checkRole:Admin');
Route::post('/new/update/{id}',[NewsandActivitiesController::class,'update'])->middleware('auth', 'checkRole:Admin');
Route::get('/new/delete/{id}',[NewsandActivitiesController::class,'delete'])->middleware('auth', 'checkRole:Admin');
//----------------------กิจกรรม--------------------
Route::get('/activity/all',[activityController::class,'index'])->name('activitys')->middleware('auth', 'checkRole:Admin');
Route::get('/activity/saveactivity', [activityController::class, 'saveactivitys'])->name('saveactivitys')->middleware('auth', 'checkRole:Admin');
Route::post('/activity/saveactivity/add', [activityController::class, 'store'])->name('addactivitys')->middleware('auth', 'checkRole:Admin');
Route::get('/activity/editactivity/{id}',[activityController::class,'edit'])->middleware('auth', 'checkRole:Admin');
Route::post('/activity/update/{id}',[activityController::class,'update'])->middleware('auth', 'checkRole:Admin');
Route::get('/activity/delete/{id}',[activityController::class,'delete'])->middleware('auth', 'checkRole:Admin');
Route::post('/activity/addImage/{id}',[activityController::class,'addImage'])->name('addImage')->middleware('auth', 'checkRole:Admin');
//----------------------จัดการแบบสอบถาม--------------------------------
Route::get('/link/all',[surveylinkController::class,'index'])->name('links')->middleware('auth', 'checkRole:Admin');
Route::post('/link/savelink/add', [surveylinkController::class, 'store'])->name('addlinks')->middleware('auth', 'checkRole:Admin');
Route::match(['get','post'],'/link/update/{id}',[surveylinkController::class, 'update'])->middleware('auth', 'checkRole:Admin');
Route::get('/link/delete/{id}',[surveylinkController::class,'delete'])->middleware('auth', 'checkRole:Admin');
Route::get('/search',[surveylinkController::class,'search'])->middleware('auth', 'checkRole:Admin');
//--------------จัดการโค้ด------------------------
Route::get('/Token/all',[TokenController::class,'viewtoken'])->name('viewtoken');
Route::post('/Admin/Token/save',  [TokenController::class,'store'])->name('admin.code.save')->middleware('auth', 'checkRole:Admin');
Route::get('/Token/delete/{id}',[TokenController::class,'delete'])->middleware('auth', 'checkRole:Admin');
//---------------ช่องทางการติดต่อ--------------------
Route::get('/contact/rmutt',[DepartmentController::class,'contact'])->name('contact')->middleware('auth', 'checkRole:Admin');

//---------------จัดการรางวัล-----------------------
Route::get('/Admin/reward/all',[RewardController::class,'reward'])->name('reward')->middleware('auth', 'checkRole:Admin');
Route::get('/Admin/reward/savereward',[RewardController::class,'savereward'])->name('savereward')->middleware('auth', 'checkRole:Admin');
Route::post('/Admin/reward/savereward/add', [RewardController::class, 'store'])->name('addreward')->middleware('auth', 'checkRole:Admin');
Route::get('/Admin/reward/editreward/{id}',[RewardController::class,'edit'])->middleware('auth', 'checkRole:Admin');
Route::post('/Admin/reward/update/{id}',[RewardController::class,'update'])->middleware('auth', 'checkRole:Admin');
Route::get('/Admin/reward/delete/{id}',[RewardController::class,'delete'])->middleware('auth', 'checkRole:Admin');


//---------------ปรับสภาพนักศึกษา-------------------------
Route::get('/Admin/student/status',[StatusController::class,'status'])->name('status')->middleware('auth', 'checkRole:Admin');
Route::post('/Admin/student/status/graduatesem_up', [StatusController::class,'graduatesem_up'])->name('graduatesem_up')->middleware('auth', 'checkRole:Admin');
Route::post('/Admin/student/Editstatus/graduatesem', [StatusController::class,'Editstatus'])->middleware('auth', 'checkRole:Admin');
//----------------------หน้าทำเนียบบัณฑิต------------------
Route::get('/Admin/graduate/view',[graduateController::class,'graduate'])->name('graduate')->middleware('auth', 'checkRole:Admin');
//-----------------------หน้าจัดการบัญชี------------------
Route::get('/Admin/manage/manage_account',[ManageAccountController::class,'manage'])->name('manage')->middleware('auth', 'checkRole:Admin');
Route::match(['get','post'],'/update-user-status/{id}',[ManageAccountController::class, 'update'])->middleware('auth', 'checkRole:Admin');
Route::get('/Admin/manage/delete/{id}',[ManageAccountController::class,'delete'])->middleware('auth', 'checkRole:Admin');
//---------------รายการข้อความ---------------------------
Route::get('/Admin/masseges/massege',[MassageAdminController::class,'massege'])->name('massege')->middleware('auth', 'checkRole:Admin');
//--------------เพิ่ม admin---------------------------
Route::get('/register/Admin', [RegisterAdminController::class,'registerAdmin'])->middleware('auth', 'checkRole:Admin');
Route::post('/register/Admin/add', [RegisterAdminController::class, 'addAdmin'])->name("addAdmin")->middleware('auth', 'checkRole:Admin');
//--------------เพิ่ม อาจารย์---------------------------
Route::get('/register/teacher', [RegisterAdminController::class,'registerteacher'])->middleware('auth', 'checkRole:Admin');
Route::post('/register/teacher/add', [RegisterAdminController::class, 'addteacher'])->name("addteacher")->middleware('auth', 'checkRole:Admin');
//------------------ข้อความ admin---------------
Route::get('/Admin/post/starandread/{id}', [MassageAdminController::class, 'readmassege'])->name('readmassege')->middleware('auth', 'checkRole:Admin');
Route::post('/Admin/post/starandread/{id}', [MassageAdminController::class, 'readmassege'])->name('readmassege')->middleware('auth', 'checkRole:Admin');
Route::post('/Admin/post/read/{id}', [MassageAdminController::class, 'read_massege'])->name('read_massege')->middleware('auth', 'checkRole:Admin');
//----------------ข้อมูลติดต่อ----------------------
Route::post('/Admin/Contact/save', [DepartmentController::class, 'store'])->name('Contactsave')->middleware('auth', 'checkRole:Admin');
//----------------แดชบอร์ด----------------------
Route::get('/Admin/view/dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth', 'checkRole:Admin');



 //user
 Route::get('/User/studentslist', [UserController::class,'studentslist'])->name('studentslist')->middleware('auth', 'checkRole:student');
 Route::get('/users/homeuser', [HomeUserController::class, 'homeuser'])->name('homeuser')->middleware('auth', 'checkRole:student');

 //ประวัติการส่งข้อความ
 Route::get('/users/viewmassege', [HomeUserController::class, 'viewmassege'])->name('viewmassege')->middleware('auth', 'checkRole:student');
 //---เนื้อหาข่าว
Route::get('/users/homeuser/view/{id}', [HomeUserController::class,'view'])->name('view')->middleware('auth', 'checkRole:student');
//----------ประวัติส่วนตัว---------
Route::get('/User/accountuser', [UsersetController::class,'accountuser'])->name('accountuser')->middleware('auth', 'checkRole:student');
Route::post('/User/accountuser/saveaccount/addaccount', [UsersetController::class, 'store'])->name('addaccount')->middleware('auth', 'checkRole:student');
Route::post('/User/accountuser/saveEducation/addEducation', [EducationInfomController::class, 'store'])->name('addEducation')->middleware('auth', 'checkRole:student');
Route::match(['get','post'],'/update/Education/{id}',[EducationInfomController::class, 'update'])->middleware('auth', 'checkRole:student');
Route::get('/User/accountuser/Education/delete/{id}',[EducationInfomController::class,'delete'])->middleware('auth', 'checkRole:student');
Route::post('/User/Workhistory/saveWorkhistory/addWorkhistory', [WorkhistoryInfoController::class, 'store'])->name('addWorkhistory')->middleware('auth', 'checkRole:student');
Route::match(['get','post'],'/update/Workhistory/{id}',[WorkhistoryInfoController::class, 'update'])->middleware('auth', 'checkRole:student');
Route::get('/User/accountuser/Workhistory/delete/{id}',[WorkhistoryInfoController::class,'delete'])->middleware('auth', 'checkRole:student');
Route::post('/User/accountuser/saveskill/addskill', [SkillInfoController::class, 'storeSkill'])->name('addskill')->middleware('auth', 'checkRole:student');
Route::match(['get','post'],'/update/skill/{id}',[SkillInfoController::class, 'update'])->middleware('auth', 'checkRole:student');
Route::post('/User/accountuser/saveLanguage/addLanguage', [LanguageSkillController::class, 'storeLanguage'])->name('addLanguage')->middleware('auth', 'checkRole:student');
Route::match(['get','post'],'/update/language/{id}',[LanguageSkillController::class, 'update'])->middleware('auth', 'checkRole:student');
Route::get('/User/accountuser/skill/delete/{id}',[SkillInfoController::class,'delete'])->middleware('auth', 'checkRole:student');
Route::get('/User/accountuser/language/delete/{id}',[LanguageSkillController::class,'delete'])->middleware('auth', 'checkRole:student');
Route::post('/User/accountuser/saveTranning/addTranning', [TranningInfoController::class,'store'])->name('addTranning')->middleware('auth', 'checkRole:student');
Route::match(['get','post'],'/update/tranning/{id}',[TranningInfoController::class, 'update'])->middleware('auth', 'checkRole:student');
Route::get('/User/accountuser/tranning/delete/{id}',[TranningInfoController::class,'delete'])->middleware('auth', 'checkRole:student');
//---------------จัดการรางวัล student---------------
Route::get('/user/reward/all',[RewardUserController::class,'reward'])->name('rewarduser')->middleware('auth', 'checkRole:student');
//----------------ทำเนียบบัณฑิต-
Route::get('/user/graduate/view',[graduateController::class,'graduateuser'])->name('graduateuser')->middleware('auth', 'checkRole:student');
//----------------ส่งข้อความ---------------------
Route::post('/user/post/massage', [MassageController::class, 'store'])->middleware('auth', 'checkRole:student');




//-------------------ดูโปรไฟล์----------------------
Route::get('/User/studentslist/view/{id}',[UserController::class,'viewProfile'])->middleware('auth', 'checkRole:student,teacher');
//------------------------อาจารย์-------------------------------
Route::get('/users/hometeacher', [TeacherController::class, 'hometeacher'])->name('hometeacher')->middleware('auth', 'checkRole:teacher');
//---------------------ดูนักศึกษา---------------
Route::get('/User/studentslist/teacher', [TeacherController::class,'studentslist'])->name('studentslist_teacher')->middleware('auth', 'checkRole:teacher');
//----------------ทำเนียบบัณฑิต-
Route::get('/user/teacher/graduate/view',[TeacherController::class,'graduate_teacher'])->name('graduateuser_teacher')->middleware('auth', 'checkRole:teacher');
//--------------จัดการโค้ด------------------------
Route::get('/Token/teacher/all',[TokenTeacherController::class,'viewtoken'])->name('teacherviewtoken')->middleware('auth', 'checkRole:teacher');
Route::post('/teacher/Token/save',  [TokenTeacherController::class,'store'])->name('teacher.code.save')->middleware('auth', 'checkRole:teacher');
Route::get('/teacher/delete/{id}',[TokenTeacherController::class,'delete'])->middleware('auth', 'checkRole:teacher');
//----------------ประวัตืส่วนตัวอาจารย์------------------
Route::get('/users/accTeacher', [TeachersetController::class, 'accTeacher'])->name('accTeacher')->middleware('auth', 'checkRole:teacher');
Route::post('/Teacher/accountuser/saveaccount/addaccount', [TeachersetController::class, 'store'])->name('addaccountteacher')->middleware('auth', 'checkRole:teacher');
//----------------ดูข่าวและกิจกรรม-------------------
Route::get('/users/homeTeacher/view/{id}', [TeacherController::class,'view'])->middleware('auth', 'checkRole:teacher');