<?php

namespace App\Mail;

use App\Models\Surveylink;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RMUTT_Alumni extends Mailable
{
    use Queueable, SerializesModels;
    public $subject; // เพิ่มตัวแปร public สำหรับเก็บหัวเรื่อง

    public function __construct($subject)
    {
        $this->subject = $subject; // กำหนดค่าหัวเรื่องจากคอนสตรักเตอร์
    }

    public function build()
    {
        $role_acc = User::where('role_acc', 'like', '%teacher%')->latest()->first();
        return $this->view('emails.Teacher_Alumni')->with(['firstname' => $role_acc->firstname,'lastname'=>$role_acc->lastname,'email'=>$role_acc->email]);
    }
    
}
