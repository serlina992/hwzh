<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\LearningClass;
use App\Models\LearningMaterial;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class LearningController extends Controller
{
    public function LearningClasses($source)
    {
        if(Auth::user()->class_code == 'LEC')
        {
            $results = LearningClass::whereNotNull('module_code')->get();
        }
        else
        {
            $results = LearningClass::where('class_code', Auth::user()->class_code)->get();
        }


        return view('LearningClasses', compact('results'))->with('source', $source);
    }

    public function LearningClassesDetail($source, $class_code)
    {
        if(Auth::user()->class_code == 'LEC')
        {
            $results = LearningClass::whereNotNull('module_code')->get();
        }
        else
        {
            $results = LearningClass::where('class_code', Auth::user()->class_code)->get();
        }


        return view('LearningClasses', compact('results'))->with('source', $source);
    }

    public function LearningMaterials($module_code = null)
    {
        $results = LearningMaterial::where('module_code', $module_code)->get();

        return view('LearningMaterials', compact('results'));
    }

    public function LearningMaterialsDetail($material_id)
    {
        $material = LearningMaterial::find($material_id);

        return view('LearningMaterialsDetail', compact('material'))->with('material_id', $material_id);
    }

    public function DeleteMaterialAction($material_id)
    {
        $material = LearningMaterial::where('id', $material_id);

        if($material != null){
            $material->delete();
            return redirect()->back()->with(['success' => 'Successfully Deleted!!']);
        }
        else{
            return redirect()->back()->with(['fail' => 'Material ID Not Found']);
        }
    }

    public function SaveMaterialAction(Request $request, $material_id)
    {
        $rules = [
            'moduleCode' => 'required',
            'title' => 'required',
            'learningMaterial' => 'required',
            'videoLink' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $material = $request->file('learningMaterial');
        $materialName = $material->getClientOriginalName();


        Storage::putFileAs('public/files/', $material, $materialName);



        if($material_id != null && $material_id != 0)
        {
            $learningMaterial = LearningMaterial::find($material_id);
        }
        else
        {
            $learningMaterial = new LearningMaterial();
        }

        $learningMaterial->module_code = $request->moduleCode;
        $learningMaterial->title = $request->title;
        $learningMaterial->description = $request->description;
        $learningMaterial->material_link = $materialName;
        $learningMaterial->video_link = $request->videoLink;
        $learningMaterial->created_at = Carbon::now();
        $learningMaterial->updated_at = Carbon::now();

        $learningMaterial->save();

        return redirect()->to('/')->with(['success' => 'Material Saved!']);
    }

    public function ManageClasses()
    {
        $results = LearningClass::whereNotNull('module_code')->get();

        return view('ManageClasses', compact('results'));
    }

    public function NewClass()
    {
        $class = null;

        return view('ManageClassDetail', compact('class'));
    }
    public function EditClass($class_code)
    {
        $class = LearningClass::where('class_code', $class_code)->first();

        return view('ManageClassDetail', compact('class'));
    }

    public function SaveNewClassAction(Request $request)
    {
        $rules = [
            'classCode' => 'required|unique:learning_classes,class_code',
            'description' => 'required',
            'moduleCode' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $newClass = new LearningClass();


        $newClass->module_code = $request->moduleCode;
        $newClass->class_code = $request->classCode;
        $newClass->description = $request->description;
        $newClass->created_at = Carbon::now();
        $newClass->updated_at = Carbon::now();

        $newClass->save();

        return redirect()->route('ManageClasses')->with(['success' => 'Class Saved!']);
    }

    public function SaveEditClassAction(Request $request, $class_code)
    {
        $rules = [
            'description' => 'required',
            'moduleCode' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        LearningClass::where('class_code', $class_code)
        ->update(['description' => $request->description, 'module_code' => $request->moduleCode]);

        return redirect()->route('ManageClasses')->with(['success' => 'Class Saved!']);
    }

    public function DeleteClassAction($class_code)
    {
        $result = LearningClass::where('class_code', $class_code)->delete();

        if($result > 0)
            return redirect()->to('/manage-classes')->with(['success' => 'Class Deleted!']);
        else
            return redirect()->to('/manage-classes')->with(['fail' => 'Delete Class Failed!']);
    }
}
