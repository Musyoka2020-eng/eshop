<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {

        $category = new Category();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->popular = $request->input('popular') == true ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->save();
        return redirect('categories')->with('status', $category->name." "."Category Added Successfully");
    }

    public function edit($id)
    {
        $category = Category::find($id);
       return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->popular = $request->input('popular') == true ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->update();
        return redirect('categories')->with('status', $category->name." "."Category Updated Successfully");

    }
    public function destroy($id)
    {
       $category = Category::find($id);
       if ($category->image)
       {
           $path = 'assets/uploads/category/'.$category->image;
           if (File::exists($path))
           {
              File::delete($path);
           }
       }
       $category->delete();
       return redirect('categories')->with('status',$category->name." ". "Category Deleted Successfully");
    }
}

//  $this->validate($request, [
//             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//           ]);

//         if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $name = str_slug($request->name).'.'.$image->getClientOriginalExtension();
//             $destinationPath = public_path('/assets/uploads/category');
//             $imagePath = $destinationPath. "/".  $name;
//             $image->move($destinationPath, $name);
//             $category->image = $name;
//           }
