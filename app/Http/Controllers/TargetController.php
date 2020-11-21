<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Target;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Services\CheckTargetData; 
use App\Services\SerchTargetData; 
use App\Http\Requests\StoreTargetForm;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        // 検索フォーム
        $serch = $request->input('serch');
        $targets = SerchTargetData::serchTarget($serch);
        // $user = User::find(3)->name;

        return view('target.index', compact('targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('target.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTargetForm $request)
    {
        $target_table = new Target;

        $target_table->target = $request->input('target');
        $target_table->reason = $request->input('reason');
        $target_table->deadline = $request->input('deadline');
        $target_table->small_target1 = $request->input('small_target1');
        $target_table->small_target2 = $request->input('small_target2');
        $target_table->small_target3 = $request->input('small_target3');
        $target_table->target_category = $request->input('target_category');
        $target_table->user_id = $request->user()->id;

        $target_table->save();
        return redirect('target/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $each_target = Target::find($id);
        $target_category = CheckTargetData::checkTargetCategory($each_target);
        
        return view('target.show', compact('each_target', 'target_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $each_target = Target::find($id);
        return view('target.edit', compact('each_target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $each_target = Target::find($id);

        $each_target->target = $request->input('target');
        $each_target->reason = $request->input('reason');
        $each_target->deadline = $request->input('deadline');
        $each_target->small_target1 = $request->input('small_target1');
        $each_target->small_target2 = $request->input('small_target2');
        $each_target->small_target3 = $request->input('small_target3');
        $each_target->target_category = $request->input('target_category');

        $each_target->save();
        return redirect('target/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $each_target = Target::find($id);
        $each_target->delete();

        return redirect('target/index');
    }
}
