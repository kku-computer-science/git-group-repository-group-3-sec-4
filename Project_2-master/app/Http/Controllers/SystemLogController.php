<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemLog;
use Illuminate\Support\Facades\Auth;

class SystemLogController extends Controller
{
    // ดึง Log ทั้งหมด และส่งไปยัง Blade Template
    public function index(Request $request)
    {
        $query = SystemLog::with('user'); // ดึง user ที่เกี่ยวข้องมาด้วย

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('date_from') && $request->has('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to]);
        }

        $logs = $query->latest()->paginate(10);

        return view('logs.index', compact('logs')); // ส่งไปยัง Blade Template
    }

    // บันทึก Log ใหม่
    public function store(Request $request)
    {
        $log = SystemLog::create([
            'user_id' => Auth::id() ?? null,
            'event' => $request->event,
            'description' => $request->description,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->back()->with('success', 'Log saved successfully!');
    }
}
