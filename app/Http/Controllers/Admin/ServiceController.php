<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }
    public function add()
    {
        return view('admin.service.add');
    }
    public function insert(Request $request)
    {

        $service = new Service();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/services/',$filename);
            $service->image = $filename;
        }

        $service->serv_name = $request->input('serv_name');
        $service->serv_slug = $request->input('serv_slug');
        $service->cost = $request->input('cost');
        $service->description = $request->input('description');
        $service->status = $request->input('status') == true ? '1' : '0';
        $service->save();
        return redirect('service')->with('status', "Service Added Successfully");
    }
    public function edit($id)
    {
        $service = Service::find($id);
       return view('admin.service.edit',compact('service'));
    }
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        if ($request->hasFile('image'))
        {
            $path = 'assets/uploads/services/'.$service->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/services/',$filename);
            $service->image = $filename;
        }

        $service->serv_name = $request->input('serv_name');
        $service->serv_slug = $request->input('serv_slug');
        $service->cost = $request->input('cost');
        $service->description = $request->input('description');
        $service->status = $request->input('status') == true ? '1' : '0';
        $service->update();
        return redirect('service')->with('status', "Service Updated Successfully");
    }
}
