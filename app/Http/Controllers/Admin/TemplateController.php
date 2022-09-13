<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator};
use App\Models\{Event, EventCategory, EventTemplate};

class TemplateController extends Controller
{
    public function index(){
        $categories = EventCategory::get();
        
        return view('admin.template')->with(compact('categories'));
    }
    public function addType(Request $request){
        //validasi input
        $messages=[
            'name.min'=>'Nama tidak boleh kurang dari 3 karakter',
            'name.max'=>'Nama tidak boleh lebih dari 20 karakter',
            'description.min'=> 'Deskripsi tidak boleh kurang dari 3 karakter',
            'description.max'=> 'Deskripsi tidak boleh lebih dari 50 karakter',
            'layout.mimes'=> 'File tata letak hanya berupa file .css',
            'layout.max'=> 'File tata letak tidak bisa lebih dari 2MB',
            'image.mimes'=> 'File untuk header hanya berupa foto',
            'image.max' => 'File untuk header tidak boleh lebih dari 5MB'
        ];
        $request->validate([
            'name' => 'bail|required|min:3|max:20',
            'description' => 'bail|required|min:3|max:50',
            'layout' => 'bail|required|mimes:css,txt|max:2048',
            'image' => 'bail|required|mimes:jpg,jpeg,png|max:5120'
        ],$messages);

        //simpan file layout
        $layout = $request->file('layout');
        $layoutName = time().".".$layout->getClientOriginalextension();
        $layoutLoc = 'assets/media/template/layout';
        $layoutNames = $layoutLoc.'/'.$layoutName;
        $layout->move(public_path($layoutLoc),$layoutName);

        //simpan file image
        $image = $request->file('image');
        $imageName = time().".".$image->extension();
        $imageLoc = 'assets/media/template/image';
        $imageNames = $imageLoc.'/'.$imageName;
        $image->move(public_path($imageLoc),$imageName);

        //store
        EventCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'layout' => $layoutNames,
            'image' => $imageNames
        ]);

        return redirect('admin/template')->withToastSuccess('Kategori event berhasil ditambahkan');
    }
    public function editType(Request $request, $id_template){
        $template = EventCategory::where('id',$id_template);

        //validasi input
        $messages=[
            'name.min'=>'Nama tidak boleh kurang dari 3 karakter',
            'name.max'=>'Nama tidak boleh lebih dari 20 karakter',
            'description.min'=> 'Deskripsi tidak boleh kurang dari 3 karakter',
            'description.max'=> 'Deskripsi tidak boleh lebih dari 50 karakter',
            'layout.mimes'=> 'File tata letak hanya berupa file .css',
            'layout.max'=> 'File tata letak tidak bisa lebih dari 2MB',
            'image.mimes'=> 'File untuk header hanya berupa foto',
            'image.max' => 'File untuk header tidak boleh lebih dari 5MB'
        ];
        $request->validate([
            'name' => 'bail|required|min:3|max:20',
            'description' => 'bail|required|min:3|max:50',
            'layout' => 'bail|nullable|mimes:css,txt|max:2048',
            'image' => 'bail|nullable|mimes:jpg,jpeg,png|max:5120'
        ],$messages);

        if($request->layout){
            //simpan file layout
            $layout = $request->file('layout');
            $layoutName = time().".".$layout->getClientOriginalextension();
            $layoutLoc = 'assets/media/template/layout';
            $layoutNames = $layoutLoc.'/'.$layoutName;
            $layout->move(public_path($layoutLoc),$layoutName);

            $template->update(['layout' => $layoutNames]);
        }
        if($request->images){
            //simpan file image
            $image = $request->file('image');
            $imageName = time().".".$image->extension();
            $imageLoc = 'assets/media/template/image';
            $imageNames = $imageLoc.'/'.$imageName;
            $image->move(public_path($imageLoc),$imageName);

            $template->update(['image' => $imageNames]);
        }

        //store
        $template->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('admin/template')->withToastSuccess('Kategori event berhasil diubah');
    }
    public function deleteType($id_template){
        $category = EventCategory::where('id', $id_template)->first();
        
        if($category == null){
            return redirect('admin/template')->withToastError('Tidak ada data yang bisa dihapus');
        }

        EventCategory::where('id', $id_template)->delete();
        EventTemplate::where('event_category_id', $id_template)->delete();

        return redirect('/admin/template')->withToastSuccess('Kategori event berhasil dihapus');
    }
    public function addTemplate(Request $request, $id_category){
         //validasi input
         $messages=[
            'preview.mimes'=> 'File preview hanya berupa foto',
            'preview.max'=> 'File preview tidak bisa lebih dari 2MB',
            'template.mimes'=> 'File template hanya berupa foto',
            'template.max' => 'File template tidak boleh lebih dari 2MB'
        ];
        $request->validate([
            'preview' => 'bail|required|mimes:jpg,jpeg,png|max:2048',
            'template' => 'bail|required|mimes:jpg,jpeg,png|max:2048'
        ],$messages);

        //simpan file preview
        $preview = $request->file('preview');
        $previewName = time().".".$preview->extension();
        $previewLoc = 'assets/media/template/preview';
        $previewNames = $previewLoc.'/'.$previewName;
        $preview->move(public_path($previewLoc),$previewName);

        //simpan file template
        $template = $request->file('template');
        $templateName = time().".".$template->extension();
        $templateLoc = 'assets/media/template/template';
        $templateNames = $templateLoc.'/'.$templateName;
        $template->move(public_path($templateLoc),$templateName);

        //store
        EventTemplate::create([
            'event_category_id' => $id_category,
            'preview' => $previewNames,
            'template' => $templateNames
        ]);

        return redirect('admin/template')->withToastSuccess('Template berhasil ditambahkan');
    }
    public function editTemplate(Request $request, $id_template){
        //validasi input
        $messages=[
            'preview.mimes'=> 'File preview hanya berupa foto',
            'preview.max'=> 'File preview tidak bisa lebih dari 2MB',
            'template.mimes'=> 'File template hanya berupa foto',
            'template.max' => 'File template tidak boleh lebih dari 2MB'
        ];
        $request->validate([
            'preview' => 'bail|nullable|mimes:jpg,jpeg,png|max:2048',
            'template' => 'bail|nullable|mimes:jpg,jpeg,png|max:2048*'
        ],$messages);

        //simpan file preview
        if($request->preview){
            $preview = $request->file('preview');
            $previewName = time().".".$preview->extension();
            $previewLoc = 'assets/media/template/preview';
            $previewNames = $previewLoc.'/'.$previewName;
            $preview->move(public_path($previewLoc),$previewName);

            EventTemplate::where('id',$id_template)->update(['preview' => $previewNames]);
        }

        //simpan file template
        if($request->template){
            $template = $request->file('template');
            $templateName = time().".".$template->extension();
            $templateLoc = 'assets/media/template/template';
            $templateNames = $templateLoc.'/'.$templateName;
            $template->move(public_path($templateLoc),$templateName);

            EventTemplate::where('id',$id_template)->update(['template' => $templateNames]);
        }
        if(!$request->template && !$request->preview){
            return redirect('admin/template')->withToastWarning('Tidak data ada yang diubah');
        }
        return redirect('admin/template')->withToastSuccess('Template berhasil diubah');
    }
    public function deleteTemplate(Request $request, $id_template){
        $template = EventTemplate::where('id', $id_template)->first();
        
        if($template == null){
            return redirect('admin/template')->withToastError('Tidak ada data yang bisa dihapus');
        }

        EventTemplate::where('id', $id_template)->delete();

        return redirect('admin/template')->withToastSuccess('Template berhasil dihapus');
    }
    public function varTemplate(Request $request){
        $tipe = $request['tipe'];
        $template = EventTemplate::where('event_category_id', $tipe)->get();
        $totalTemplate = $template->count();

        $keyResult = ['template' => $template, 'total' => $totalTemplate];
        
        return $keyResult;
    }
}
