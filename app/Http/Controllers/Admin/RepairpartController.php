<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repairpart;
use Illuminate\Http\Request;

class RepairpartController extends Controller
{
   public function index()
   {
       $parts = Repairpart::all();
       return view('admin.parts.index', compact('parts'));
   }
   public function add()
   {
      return view('admin.parts.add');
   }
   public function insert(Request $request)
   {
    $parts = new Repairpart();
    $parts->part_name = $request->input('part_name');
    $parts->cost = $request->input('cost');
    $parts->qty = $request->input('qty');
    $parts->decription = $request->input('decription');
    $parts->status = $request->input('status') == true ? '1' : '0';
    $parts->save();
    return redirect('part')->with('status', $parts->part_name." "."Part Added Successfully");
   }
   public function edit($id)
   {
    $parts = Repairpart::find($id);
    return view('admin.parts.edit',compact('parts'));
   }
   public function update(Request $request, $id)
   {
    $parts = Repairpart::find($id);
    $parts->part_name = $request->input('part_name');
    $parts->cost = $request->input('cost');
    $parts->qty = $request->input('qty');
    $parts->decription = $request->input('decription');
    $parts->status = $request->input('status') == true ? '1' : '0';
    $parts->update();
    return redirect('part')->with('status', $parts->part_name." ". "Updated Successfully");
   }
}
