<?php

namespace App\Http\Controllers;


use JavaScript;
use Laracasts\Utilities\JavaScript\JavaScriptServiceProvider;

use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

//        Last 5 posts
        $lastUser = User::query()->max('id');
        $lastUserPosts = User::query()->find($lastUser)->posts()->orderByDesc('id')->limit(5)->pluck('title','content')->toArray();

//        Chart data
        $collection = collect([]);
        for ($i = 0; $i < 7; $i++) {
            $dt = Carbon::now();
            $myDate = $dt->subDays($i)->toDateString();
            $posts = DB::table('posts')->whereDate('created_at', '=', $myDate)->count();
            $collection->put(\verta($myDate)->format('Y-n-j'), $posts);
        }

        $week = $collection->keys()->all();
        $postNo = $collection->values()->all();

        return view('admin', compact('lastUserPosts'))->with('week', json_encode($week))
            ->with('postNo', json_encode($postNo));

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
