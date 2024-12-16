<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class IssueController extends Controller
{
    public function index()
    {
        $issues = DB::table('issues')
            ->leftJoin('computers', 'issues.computer_id', '=', 'computers.id') // Gộp bảng computers
            ->select(
                'issues.*', 
                'computers.computer_name', 
                'computers.model', 
            )
            ->paginate(40);
    
        return view('issues.index', compact('issues'));
    }
    public function create()
    {
        $computers = Computer::all(); 
        return view('issues.create',compact('computers'));
    }

    // Lưu issue mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|string',
            'status' => 'required|string',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Issue created successfully.');
    }

    // Hiển thị form chỉnh sửa issue
    public function edit($id)
    {
        $computers = Computer::all();
        $issue = Issue::findOrFail($id);
        $issue->reported_date = Carbon::parse($issue->reported_date);
        return view('issues.edit', compact('issue','computers'));
    }

    // Cập nhật issue
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|string',
            'status' => 'required|string',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Issue updated successfully.');
    }

    // Xóa issue
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Issue deleted successfully.');
    }

}