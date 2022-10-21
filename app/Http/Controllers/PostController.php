<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\CreatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\traits\TestTrait;

class PostController extends Controller
{
    use TestTrait;
    public function index()
    {
    //    $users=$this->getData(User::class);
    //    return $users;
    // $posts=$this->getData(Post::class);
    //    return $posts;
    $name=User::where('name',UserName())->get();
    return $name;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $author = auth()->user()->name;
        Notification::send($users, new CreatePost($post->id, $author,$post->title));
        return redirect()->route('dashboard');
    }

    public function show($id)            
    {
        $post=Post::findOrfail($id);
        $getID= DB::table('notifications')->where('data->post_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$getID)->update([
            'read_at'=>now()
        ]);
        return $post;
    }
    public function MarkAll()
    {
        $user=User::find(auth()->user()->id);
        foreach($user->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}