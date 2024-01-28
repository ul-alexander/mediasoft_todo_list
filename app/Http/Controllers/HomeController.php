<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use App\Models\ListsJob;
use Illuminate\Support\Facades\Auth;

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
        $lists = CheckList::where('user_id', '=', Auth::id())->get();
        foreach ($lists as $list) {
            $list['jobs'] = ListsJob::where('check_list_id', '=', $list->id)->get();
        }
        return view('pages.home', ['lists' => $lists]);
    }
}
