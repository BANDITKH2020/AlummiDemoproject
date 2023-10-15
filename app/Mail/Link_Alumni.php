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

class link_Alumni extends Mailable
{
    use Queueable, SerializesModels;

    public $subject; // เพิ่มตัวแปร public สำหรับเก็บหัวเรื่อง

    public function __construct($subject)
    {
        $this->subject = $subject; // กำหนดค่าหัวเรื่องจากคอนสตรักเตอร์
    }
    public function build()
    {
        $link = Surveylink::query()->latest()->first();
        return $this->view('emails.Link_Alumni')->with(['surveyLink' => $link->link,'graduatedyear'=>$link->graduatedyear]);
    }
}
