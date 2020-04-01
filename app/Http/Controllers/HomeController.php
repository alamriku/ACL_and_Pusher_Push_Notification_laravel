<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Post;
use Pusher\Pusher;
use App\Events\PostLiked;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users= User::all();
        return view('admin.dashboard',['users'=>$users]);
    }

    public function acl(){
        $users= User::all();
        return view('admin.dashboard',['users'=>$users]);
    }

    public function getAuthorPage(){
       return view('author.dashboard');
    }
    public function getAdminPage(){
        dd('getAdminPage');
    }
    public function getVisitorPage(){
        dd('getVisitorPage');
    }
    public function getUserPage(){
        dd('getUserPage');
    }

    public function savePost(Request $request){

        $post = new Post();
        $post->user_id=$request->user_id;
        $post->slug=$request->slug;
        $post->description=$request->description;
        $post->post=$request->post;
        $post->status=1;
        $post->save();
        $post_id = $post->id;
        $data=$this->sendNotification($post_id);
        $request->session()->flash('status', 'Task was successful!');
        return redirect()->back();

    }
    public function sendNotification($data=null){

        $post =  Post::where("id",$data)->first();
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
        $message='';
        $message.= ' <a href="'.route('show-post',$data).'">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>"'.$post->slug.'"</h5> <span class="mail-desc">Just see the my new post!</span> <span class="time">to activate</span> </div>
                                    </a>';


        //Send a message to notify channel with an event name of PostLiked
        $pusher->trigger('post-liked', 'PostLiked', $message);
        //  event(new PostLiked('Someone'));
        return "Event has been sent!";
    }
    public function ShowPost(Request $request){
       $post =  Post::where('id',$request->post_id)->first();
       $user =User::where('id',$post->user_id)->first();
       return view('author.post',['post'=>$post,'user'=>$user]);

    }
}
