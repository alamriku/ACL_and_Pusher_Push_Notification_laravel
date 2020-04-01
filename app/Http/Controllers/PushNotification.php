<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Events\PostLiked;
class PushNotification extends Controller
{
    public function sendNotification(){
      //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            '82474607f46df8e685c0',
            '814c3156fdde4bce8d01',
            '971528', $options
        );

        $message= "Hello Cloudways";

        //Send a message to notify channel with an event name of PostLiked
        $pusher->trigger('post-liked', 'PostLiked', $message);
      //  event(new PostLiked('Someone'));
        return "Event has been sent!";
    }
}
