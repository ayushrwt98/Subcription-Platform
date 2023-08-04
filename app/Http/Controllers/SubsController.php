<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostWebNotification;
use App\Models\Subscriber;
use App\Models\Website;
use App\Models\Post;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $email = $request->input('email');
        $website_id = $request->input('website_id');
        $subscriber = Subscriber::create(['email' => $email,'website_id'=>$website_id]);
        return response()->json(['message' => 'Subscribed successfully']);
    }

    public function sendEmailToSubscribers()
{
    $subscribers = Subscriber::all();

    foreach ($subscribers as $subscriber) {
        if (!$subscriber->email_sent) {

            $post = Post::find($subscriber->website_id);

            Mail::to($subscriber->email)->send(new PostWebNotification($post->website_id, $post->title, $post->description));
            $subscriber->update(['email_sent' => true]);
        }
    }

    return response()->json(['message' => 'Email sent to subscribers']);
}

}
