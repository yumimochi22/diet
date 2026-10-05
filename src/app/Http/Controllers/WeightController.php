<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\WeightLogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // 目標体重 
        $weightTarget = WeightTarget::where('user_id', $userId)
                       ->value('target_weight');

        $weightLogs = WeightLog::where('user_id', $userId)
                      ->orderBy('date', 'desc')
                      ->paginate(8);
    
        // 最新体重
        $latestWeight = WeightLog::where('user_id', $userId)
                       ->orderBy('date', 'desc')
                       ->value('weight');

        // 目標まで 
        $weightDifference = null;

        if ($latestWeight !== null && $weightTarget !== null) {
            $weightDifference = $latestWeight - $weightTarget;
        }

        return view('weight_logs.index', compact(
            'weightTarget',
            'latestWeight',
            'weightDifference',
            'weightLogs'
        ));
    }

    public function create()
    {
        return view('weight_logs.create');
    }

    public function store(WeightLogRequest $request)
    {
        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->route('weight_logs.index');
    }

    public function search(Request $request)
    {
        $query = WeightLog::where('user_id', Auth::id());

        // 開始日
        if ($request->filled('start_date')) {
            $query->whereDate('date', '>=', $request->start_date);
        }

        // 終了日
        if ($request->filled('end_date')) {
            $query->whereDate('date', '<=', $request->end_date);
        }

        $weightLogs = $query
            ->orderBy('date', 'desc')
            ->paginate(8)
            ->withQueryString();

        return view('weight_logs.search', compact('weightLogs'));
    }

    public function show($weightLogId)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())
            ->findOrFail($weightLogId);

        return view('weight_logs.show', compact('weightLog'));
    }

    public function edit($weightLogId)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())
            ->findOrFail($weightLogId);
        return view('weight_logs.edit', compact('weightLog'));
    }

    public function update(WeightLogRequest $request, $weightLogId)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())
            ->findOrFail($weightLogId);

        $weightLog->update([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->route('weight_logs.index');
    }
  
    
    public function goalSetting()
    {
        $targetWeight = WeightTarget::where('user_id', Auth::id())
            ->value('target_weight');

        return view('weight_logs.goal_setting', compact('targetWeight'));
    }

    public function updateGoal(Request $request)
{
    WeightTarget::where('user_id', Auth::id())
        ->update([
            'target_weight' => $request->target_weight,
        ]);

    return redirect()->route('weight_logs.index');
}

}
