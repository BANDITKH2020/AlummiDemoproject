<?php

namespace App\Mail;

use App\Models\newsandactivity;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Activity_Alumni extends Mailable
{
    use Queueable, SerializesModels;
    public $subject; // เพิ่มตัวแปร public สำหรับเก็บหัวเรื่อง

    public function __construct($subject)
    {
        $this->subject = $subject; // กำหนดค่าหัวเรื่องจากคอนสตรักเตอร์
    }

    public function build()
    {
        $activitys = newsandactivity::query()->where('cotent_type','2')->latest()->first();
        return $this->view('emails.Activity_Alumni')->with(['title_name' => $activitys->title_name,'cotent'=>$activitys->cotent,'category'=>$activitys->category,
        'id' => $activitys->id,]);
    }
    
}
