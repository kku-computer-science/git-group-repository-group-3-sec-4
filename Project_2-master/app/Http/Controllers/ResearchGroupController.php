<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ResearchGroupController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:groups-list|groups-create|groups-edit|groups-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:groups-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:groups-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:groups-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $researchGroups = ResearchGroup::with('User')->get();
        return view('research_groups.index', compact('researchGroups'));
    }

    public function create()
    {
        $users = User::role(['teacher', 'student'])->get();
        $funds = Fund::get();
        return view('research_groups.create', compact('users', 'funds'));
    }

    public function store(Request $request)
    {
        // ใช้ฟังก์ชัน trans() เพื่อแปลข้อความ validation
        $request->validate([
            'group_name_th' => 'required',
            'group_name_en' => 'required',
            'head' => 'required',
        ], [
            'group_name_th.required' => trans('researchGroups.group_name_th_required'),
            'group_name_en.required' => trans('researchGroups.group_name_en_required'),
            'head.required'          => trans('researchGroups.head_required'),
        ]);

        $input = $request->all();
        if ($request->group_image) {
            $input['group_image'] = time() . '.' . $request->group_image->extension();
            $request->group_image->move(public_path('img'), $input['group_image']);
        }
        $researchGroup = ResearchGroup::create($input);
        $head = $request->head;
        $researchGroup->user()->attach($head, ['role' => 1]);
        if ($request->moreFields) {
            foreach ($request->moreFields as $key => $value) {
                if ($value['userid'] != null) {
                    $researchGroup->user()->attach($value, ['role' => 2]);
                }
            }
        }
        return redirect()->route('researchGroups.index')
                         ->with('success', trans('researchGroups.created_successfully'));
    }

    public function show(ResearchGroup $researchGroup)
    {
        return view('research_groups.show', compact('researchGroup'));
    }

    public function edit(ResearchGroup $researchGroup)
    {
        $researchGroup = ResearchGroup::find($researchGroup->id);
        $this->authorize('update', $researchGroup);
        $researchGroup = ResearchGroup::with(['user'])->where('id', $researchGroup->id)->first();
        $users = User::get();
        return view('research_groups.edit', compact('researchGroup', 'users'));
    }

    public function update(Request $request, ResearchGroup $researchGroup)
    {
        $request->validate([
            'group_name_th' => 'required',
            'group_name_en' => 'required',
        ], [
            'group_name_th.required' => trans('researchGroups.group_name_th_required'),
            'group_name_en.required' => trans('researchGroups.group_name_en_required'),
        ]);

        $input = $request->all();
        if ($request->group_image) {
            $input['group_image'] = time() . '.' . $request->group_image->extension();
            $request->group_image->move(public_path('img'), $input['group_image']);
        }
        $researchGroup->update($input);
        $head = $request->head;
        $researchGroup->user()->detach();
        $researchGroup->user()->attach([$head => ['role' => 1]]);
        if ($request->moreFields) {
            foreach ($request->moreFields as $key => $value) {
                if ($value['userid'] != null) {
                    $researchGroup->user()->attach($value, ['role' => 2]);
                }
            }
        }
        return redirect()->route('researchGroups.index')
                         ->with('success', trans('researchGroups.updated_successfully'));
    }

    public function destroy(ResearchGroup $researchGroup)
    {
        $this->authorize('delete', $researchGroup);
        $researchGroup->delete();
        return redirect()->route('researchGroups.index')
                         ->with('success', trans('researchGroups.deleted_successfully'));
    }
}
