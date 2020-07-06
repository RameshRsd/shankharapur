<?php

namespace App\Http\Controllers\backend\admin\gallery;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Category;
use App\Model\Gallery;
use App\Model\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index(Request $request){
        $admin = Admin::find(1);
        $heading = 'Sliders Images | Gallery Manager';
        $title = $heading.' | '.$admin->name;
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
        $galleryIds = GalleryCategory::where('category_id',1)->select('gallery_id');
        $gallery->whereIn('id',$galleryIds);
        $galleries = $gallery->paginate($pagiinate);
        return view('backend.admin.gallery.slider.index',compact('admin','heading','title','galleries'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'image'=>'required|max:200',
        ]);

        if ($request->hasFile('image')) {
            $files = $request->file('image');
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
                if ($gallery->save()){
                    $gallery->category()->sync([1]);
                }

            }
            return back()->with('success','Slider image added successfully !');
        }
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'title' => 'required',
        ]);
        $gallery = Gallery::findOrFail($id);
        $gallery->title = $request->title;
        $gallery->status = $request->status;
        $gallery->save();
        return back()->with('success','Slider Image detail updated successfully !');
    }
    public function delete($id){
        $gallery = Gallery::findOrFail($id);
        $galleryCategories = GalleryCategory::where('gallery_id',$gallery->id)->where('category_id',1)->get();
        if (count($galleryCategories)>0){
            foreach ($galleryCategories as $galleryCategory){
                $galleryCategory->delete();
            }
            if (count($galleryCategories)==1){
                if (is_file(public_path('gallery'.'/'.$gallery->image)) && file_exists(public_path('gallery'.'/'.$gallery->image))){
                    unlink(public_path('gallery'.'/'.$gallery->image));
                }
                $gallery->delete();
            }
            return back()->with('success','Image deleted successfully !');
        }else{
            return back()->with('error','Image not found !');
        }
    }


}
