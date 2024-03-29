<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use App\Models\ListsJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckListController extends Controller
{

    public function index()
    {
        $lists = CheckList::all();
        $lists->load('showListJobs');

        //dd($lists[0]->showListJobs[0]->name);

        //foreach ($lists as $list) {

            //$list['jobs'] = $list->showListJobs;
            //$list['jobs'] = ListsJob::where('check_list_id', '=', $list->id)->get();
        //}
        return view('lists.index', ['lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('lists.create', compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer',
        ]);

        $user = User::findOrFail($validated['user_id']);
        $checkLists = CheckList::where('user_id', '=', $validated['user_id'])->get();

        if ($checkLists->count() >= $user->check_list_count) {
            return redirect()->route('home')->with('status', 'Превышено допустимое количество чек листов');
        }

        CheckList::create($validated);

        return redirect()->route('home')->with('status', 'Список задач создан');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit(CheckList $checkList)
    {
        //$checkList = CheckList::findOrFail($id);
        //$checkList['jobs'] = $checkList->showListJobs;

        $checkList->load('showListJobs');
        //dd($checkList);

        return view('lists.edit', compact('checkList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CheckList::destroy($id);
        return redirect()->route('home')->with('status', 'Список задач удален!');
    }
}
