<?php

namespace App\Http\Controllers;

use App\Mail\PostWebNotification;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;


class PostController extends Controller
{
    public function create(Request $request)
    {
        $websiteId = $request->input('website_id');
        $title = $request->input('title');
        $description = $request->input('description');

        $post = Post::create([
            'website_id' => $websiteId,
            'title' => $title,
            'description' => $description,
        ]);

        $website = Website::find($websiteId);
        $subscribers = $website->subscribers;
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new PostWebNotification($website, $title, $description));
            $subscriber->update(['email_sent' => true]);
        }
        return response()->json(['message' => 'Post created successfully and notifications sent']);
    }
}
