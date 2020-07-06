<?php

namespace App\Http\Controllers\backend\admin\gallery;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Category;
use App\Model\Gallery;
use App\Model\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function index(Request $request){
        $admin = Admin::find(1);
        $heading = 'Images | Gallery Manager';
        $title = $heading.' | '.$admin->name;
        $categories = Category::orderBy('name')->get();
        if ($request->order){
            $order = $request->order;
        }else{
            $order = 'DESC';
        }
        if ($request->order){
            $pagiinate = $request->per_page;
        }else{
            $pagiinate = 8;
        }
        $gallery = Gallery::orderBy('id','DESC');
        if ($request->category_id){
            $galleryIds = GalleryCategory::where('category_id',$request->category_id)->select('gallery_id');
            $gallery->whereIn('id',$galleryIds);
        }
        $galleries = $gallery->paginate($pagiinate);
        return view('backend.admin.gallery.image.index',compact('admin','heading','title','categories','galleries'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'image'=>'required|max:200',
            'category_id'=>'required',
        ]);

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $categories = $request->category_id;
                foreach($files as $file){
                    $gallery = new Gallery();
                    $extension = $file->getClientOriginalExtension();
                    $FileGallery = Str::random(5)."-".date('his')."-".\Illuminate\Support\Str::random(3);
                    $fileName= md5($FileGallery).".".$extension;
                    $destinationPath = 'public/gallery'.'/';
                    $file->move($destinationPath, $fileName);
                    $gallery->title = $request->title;
                    $gallery->image = $fileName;
                    $gallery->status = 'public';
                    $gallery->save();
                    foreach ($categories as $category){
                        $galleryCategory = new GalleryCategory();
                        $galleryCategory->gallery_id = $gallery->id;
                        $galleryCategory->category_id = $category;
                        $galleryCategory->save();
                    }
                }
            return back()->with('success','Image added successfully !');
        }
    }
    public function update(Request $request,$id){
        $this->validate($request,[
           'title' => 'required',
           'category_id' => 'required',
        ]);
        $gallery = Gallery::findOrFail($id);
        $gallery->title = $request->title;
        $gallery->status = $request->status;
        if ($gallery->save()){
            $gallery->category()->sync($request->category_id);
        }
        return back()->with('success','Image detail updated successfully !');
    }
    public function delete($id){
        $gallery = Gallery::findOrFail($id);
        $galleryCategories = GalleryCategory::where('gallery_id',$gallery->id)->get();
        if (is_file(public_path('gallery'.'/'.$gallery->image)) && file_exists(public_path('gallery'.'/'.$gallery->image))){
            unlink(public_path('gallery'.'/'.$gallery->image));
        }
        foreach ($galleryCategories as $galleryCategory){
            $galleryCategory->delete();
        }
        $gallery->delete();
        return back()->with('success','Image deleted successfully !');
    }
}
