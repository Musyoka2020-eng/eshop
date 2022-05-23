<?php

namespace App\Http\Controllers\Admin;

use App\Models\Repair;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class RepairController extends Controller
{
    public function index()
    {
        $repairs = Repair::all();
        return view('admin.repair.index', compact('repairs'));

    }
    public function add()
    {
        $services = Service::all();
        return view('admin.repair.add', compact('services'));
    }
    public function insert(Request $request)
    {
        $repairs = new Repair();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/repairs/',$filename);
            $repairs->image = $filename;
        }
        $repairs->type = $request->input('type');
        $repairs->prod_name = $request->input('prod_name');
        $repairs->user_name = $request->input('user_name');
        $repairs->contact = $request->input('contact');
        $repairs->email = $request->input('email');
        $repairs->condition = $request->input('condition');
        $repairs->description = $request->input('description');
        $repairs->total_price = $request->input('total_price');
        $repairs->status = $request->input('status') == true ? '1' : '0';
        $repairs->tracking_code = 'steverep' . date('My-d');
        $repairs->save();
        return redirect('repair')->with('status', $repairs->prod_name." ". "Repair Added Successfully");
    }
    public function edit($id)
    {
        $repairs = Repair::find($id);
       return view('admin.repair.edit',compact('repairs'));
    }
    public function update(Request $request, $id)
    {
        $repairs = Repair::find($id);
        if ($request->hasFile('image'))
        {
            $path = 'assets/uploads/repairs/'.$repairs->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/repairs/',$filename);
            $repairs->image = $filename;
        }
        $repairs->prod_name = $request->input('prod_name');
        $repairs->user_name = $request->input('user_name');
        $repairs->contact = $request->input('contact');
        $repairs->email = $request->input('email');
        $repairs->condition = $request->input('condition');
        $repairs->description = $request->input('description');
        $repairs->total_price = $request->input('total_price');
        $repairs->status = $request->input('status') == true ? '1' : '0';
        $repairs->update();
        return redirect('repair')->with('status', $repairs->prod_name." ". "Repair Updated Successfully");
    }
    public function delete($id)
    {
        $repair = Repair::find($id);
        if ($repair->image)
        {
            $path = 'assets/uploads/repairs/'.$repair->image;
            if (File::exists($path))
            {
               File::delete($path);
            }
        }
        $repair->delete();
        return redirect('repair')->with('status',$repair->prod_name." "."Repair Deleted Successfully");
    }
    public function getTotalCost(Request $request)
{
    $service = Service::where('serv_name', 'like', $request->input("serv_name"))->first();
    if ($service == null) {
        return null;
    }
    return response()->json($service->cost);
}
}
