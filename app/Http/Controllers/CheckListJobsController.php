<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use App\Models\ListsJob;
use Illuminate\Http\Request;

class CheckListJobsController extends Controller
{
    public function addJob($id)
    {
        $checkList = CheckList::findOrFail($id);
        return view('lists.jobs.create', compact('checkList'));
    }
    public function storeJob(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'check_list_id' => 'required|integer',
        ]);

        ListsJob::create([
            'name' => $request->name,
            'check_list_id' => $request->check_list_id
        ]);

        return redirect()->route('home')->with('status', 'Задача добавлена');
    }

    public function statusJob(Request $request,$id)
    {
        $job = ListsJob::findOrFail($id);
        $job->active = $request->status;
        $job->save();
        return redirect()->route('home')->with('status', 'Статус задачи изменен');
    }
    public function destroyJob($id)
    {
        ListsJob::destroy($id);
        return redirect()->route('home')->with('status', 'Задача удалена');
    }
}
