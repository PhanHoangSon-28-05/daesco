<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Mail\SendContactEmail;
use App\Mail\SendRecruitEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Footers\FooterRepositoryInterface;

class MailController extends Controller
{
    protected $footerRepos;

    public function __construct(FooterRepositoryInterface $footerRepos) {
        $this->footerRepos = $footerRepos;
    }

    public function sendContactEmail(Request $request) {
        $to_address = $this->footerRepos->getFooter()->first()->email;
        Mail::to($to_address)->send(new SendContactEmail($request->input()));
        return redirect()->back();
    }

    public function sendRecruitEmail(Request $request) {
        $to_address = $request->input('to_address');
        Mail::to($to_address)->send(new SendRecruitEmail($request->input(), $request->file('file-input-x')));
        return redirect()->back();
    }
}
