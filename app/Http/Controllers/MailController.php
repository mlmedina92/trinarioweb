<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function SendMail(){
    	echo "Aqui enviamos el correo";
    }
}
