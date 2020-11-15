<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Target;
use Illuminate\Support\Facades\DB;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $targets = DB::table('targets')->select('id', 'target', 'created_at')->orderBy('created_at', 'desc')->get();
        return view('target.home', compact('targets'));
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
    public function store(Request $request)
    {
        $target_table = new Target;

        $target_table->target = $request->input('target');
        $target_table->reason = $request->input('reason');
        $target_table->deadline = $request->input('deadline');
        $target_table->small_target1 = $request->input('small_target1');
        $target_table->small_target2 = $request->input('small_target2');
        $target_table->small_target3 = $request->input('small_target3');
        $target_table->target_category = $request->input('target_category');

        $target_table->save();
        return redirect('target/home');
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

        if ($each_target->target_category === 1) {
            $target_category = '勉強';
        }
        if ($each_target->target_category === 2) {
            $target_category = '仕事';
        }
        if ($each_target->target_category === 3) {
            $target_category = 'スポーツ';
        }
        if ($each_target->target_category === 4) {
            $target_category = '健康';
        }
        if ($each_target->target_category === 5) {
            $target_category = '趣味';
        }
        if ($each_target->target_category === 6) {
            $target_category = 'その他';     
        }
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
