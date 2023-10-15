<?php

namespace App\Mail;

use App\Models\Surveylink;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Update_link_Alumni extends Mailable
{
    use Queueable, SerializesModels;

    public $subject; // เพิ่มตัวแปร public สำหรับเก็บหัวเรื่อง

    public function __construct($subject)
    {
        $this->subject = $subject; // กำหนดค่าหัวเรื่องจากคอนสตรักเตอร์
    }
    public function build()
    {
        $link = Surveylink::query()->latest('updated_at')->first();
        return $this->view('emails.Update_link')->with(['surveyLink' => $link->link,'graduatedyear'=>$link->graduatedyear]);
    }
}
