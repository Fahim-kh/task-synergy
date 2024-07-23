<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Department::create($request->all());
        return redirect()->route('department.index')
                         ->with('success', 'Department created successfully.');
    }


    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $department = Department::find($id);
        $department->update($request->all());
        return redirect()->route('department.index')
                         ->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('department.index')
                         ->with('success', 'Department deleted successfully.');
    }
}
