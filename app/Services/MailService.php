<?php
/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 27/11/2015
 * Time: 10:38 PM
 */

namespace App\Services;


use Illuminate\Support\Facades\Mail;

class MailService
{

    /**
     * send email
     * @param $view
     * @param $data
     * @param $user
     * @param $subject
     */
    public function send($view, $data, $user, $subject) {

        Mail::send($view, $data, function($message) use($user, $subject){
            $message->to($user->email)
                    ->subject($subject);
        });
    }
}