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

class News_Alumni extends Mailable
{
    use Queueable, SerializesModels;
    public $subject; // เพิ่มตัวแปร public สำหรับเก็บหัวเรื่อง

    public function __construct($subject)
    {
        $this->subject = $subject; // กำหนดค่าหัวเรื่องจากคอนสตรักเตอร์
    }

    public function build()
    {   $new = newsandactivity::query()->where('cotent_type','1')->latest()->first();
        return $this->view('emails.News_Alumni')->with(['title_name' => $new->title_name,'cotent'=>$new->cotent,'id'=>$new->id]);
    }
    
}
