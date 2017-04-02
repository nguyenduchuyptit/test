<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
class MailController extends Controller
{
	
    function postContact(Request $person){
        Mail::send('email.blanks', ['person'=>$person ], function ($message) use($person) {
            $message->from($person->email, $person->name);
            $message->to('dinhdu2704@gmail.com', 'admin')->subject('From Your Website (a new contact): ' . $person->subject);
       	});
       	echo "<script>
				alert('Cám ơn bạn đã góp ý. Chúng tôi sẽ liên hệ tới bạn trong thời gian sớm nhất');
				window.location= '". url('/')."'
       		</script>";
    }
}