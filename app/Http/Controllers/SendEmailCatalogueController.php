<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\String\s;

class SendEmailCatalogueController extends Controller
{

    public static function sendEmailToUsers ()
    {

        $users = User::take(3)->get();
      foreach ($users as $user)
      {
         (new SendEmailCatalogueController)->sendEmail($user);
      }
    }

    public function sendEmail ($user)
    {
        $qrCodeUrl = \App\Http\Controllers\ThemeController::generateQrCodeUrl(env('APP_CATALOGUE_URL')); // Your static function to generate the QR code URL
        $catalogueUrl = env('APP_CATALOGUE_URL');

        Mail::send('mail.catalogue', ['catalogueUrl' => $catalogueUrl, 'qrCodeUrl' => $qrCodeUrl , 'user'=>$user], function  ($message)use($user) {
            $message->to($user->email)
                ->subject('Mise à Jour du Catalogue de Formation 2024');
        });
    }
}
