<?php

namespace App\Http\Controllers;

use App\Models\SystemLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemLogController extends Controller
{
    // แสดงรายการ Log ทั้งหมด
    public function index(Request $request)
    {
        $query = SystemLog::with('user');

        // ค้นหาตามประเภทของ Log
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // ค้นหาตามช่วงวันที่
        if ($request->has('date_from') && $request->has('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to]);
        }

        // ค้นหาตาม User ID
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        return view('logs.index', ['logs' => $query->latest()->paginate(10)]);
    }

    // ฟังก์ชันสำหรับบันทึก Log ใหม่
    public function store(Request $request)
    {
        $log = SystemLog::create([
            'user_id' => Auth::id() ?? null,
            'event' => $request->event,
            'type' => $request->type ?? 'INFO', // ตั้งค่า default เป็น INFO
            'description' => $request->description,
            'ip_address' => $request->ip(),
        ]);

        return response()->json($log, 201);
    }
}