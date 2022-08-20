<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Event, EventCategory, EventTemplate};

class TemplateController extends Controller
{
    public function index(){
        $categories = EventCategory::get();
        
        return view('admin.template')->with(compact('categories'));
    }
    public function addType(Request $request){
        $request->validate([
            'name' => 'max:20',
            'description' => 'max:50',
        ]);

        EventCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('admin/template')->withToastSuccess('Tipe template berhasil ditambahkan');
    }
    public function editType(Request $request, $id_template){
        $category = EventCategory::where('id', $id_template)->first();
        
        if($category == null){
            return redirect('admin/template')->withToastError('Tidak ada data yang bisa diubah');
        }
        
        EventCategory::where('id', $id_template)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('admin/template')->withToastSuccess('Tipe template berhasil diubah');
    }
    public function deleteType($id_template){
        $category = EventCategory::where('id', $id_template)->first();
        
        if($category == null){
            return redirect('admin/template')->withToastError('Tidak ada data yang bisa dihapus');
        }

        EventCategory::where('id', $id_template)->delete();
        EventTemplate::where('Event_template_id', $id_template)->delete();

        return redirect('/admin/template')->withToastSuccess('Tipe template berhasil dihapus');
    }
    public function addTemplate(Request $request){

    }
    public function editTemplate(Request $request){

    }
    public function adeleteTemplate(Request $request){

    }
    public function varTemplate(Request $request){
        $tipe = $request['tipe'];
        $template = EventTemplate::where('id', $tipe)->get();
        $totalTemplate = $template->count();

        $keyResult = ['template' => $template, 'total' => $totalTemplate];
        
        return $keyResult;
    }
}
