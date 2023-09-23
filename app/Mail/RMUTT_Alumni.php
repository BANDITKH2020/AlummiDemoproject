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
    public function build()
    {
        $users = User::all(); // ดึงข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล
        $link = Surveylink::query()->latest()->first();
        $emailContent = "ขอความร่วมมือนักศึกษา\n\n";
        foreach ($users as $user) {
            if ($user->graduatesem === $link->graduatedyear) {
                $emailContent .= $user->name . ' (' . $user->firstname . ' ' . $user->lastname .")\n";
            }
        }
        $emailContent .= "\nแบบสอบถาม : " . $link->link; 
        return $this->html($emailContent); // กำหนดเนื้อหาข้อความในอีเมล
    }
}
