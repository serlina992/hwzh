<?php

namespace App\Http\Controllers;

use App\Models\ClassAssignment;
use App\Models\ClassAssignmentsAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ScoreExport;

class ClassAssignmentController extends Controller
{
    public function ClassAssignments($class_code)
    {
        $results = ClassAssignment::where('class_code', $class_code)->where('type', 'ASSIGNMENT')->get();

        return view('ClassAssignments', compact('results'))->with('class_code', $class_code)->with('type', '');
    }

    public function ClassExercises($class_code)
    {
        $results = ClassAssignment::where('class_code', $class_code)->where('type', 'EXERCISE')->get();

        return view('ClassAssignments', compact('results'))->with('class_code', $class_code)->with('type', '');
    }

    public function ClassAssignmentsResult($class_code, $type)
    {
        $results = ClassAssignment::where('class_code', $class_code)->where('type', 'ASSIGNMENT')->get();

        return view('ClassAssignments', compact('results'))->with('class_code', $class_code)->with('type', $type);
    }

    public function ClassExercisesResult($class_code, $type)
    {
        $results = ClassAssignment::where('class_code', $class_code)->where('type', 'EXERCISE')->get();

        return view('ClassAssignments', compact('results'))->with('class_code', $class_code)->with('type', $type);
    }

    public function ClassAssignmentsDetail($class_code, $assignment_id)
    {
        $assignment = ClassAssignment::find($assignment_id);

        return view('ClassAssignmentsDetail', compact('assignment'))->with(['class_code' => $class_code, 'assignment_id' => $assignment_id]);
    }

    public function ClassAssignmentsResultDetail($class_code, $assignment_id)
    {
        $results = ClassAssignmentsAnswer::where('assignment_id', $assignment_id)->get();

        return view('ClassAssignmentsResult', compact('results'))->with(['class_code' => $class_code, 'assignment_id' => $assignment_id]);
    }

    public function SaveClassAssignmentAction(Request $request, $class_code, $assignment_id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'assignmentType' => $assignment_id == 0 ? 'required' : ''
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $attachment = $request->file('assignmentAttachment');
        $attachmentName = '';
        if($attachment != null)
        {
            $attachmentName = $attachment->getClientOriginalName();
            Storage::putFileAs('public/files/assignments/questions/', $attachment, $attachmentName);
        }

        if($assignment_id != null && $assignment_id != 0)
        {
            $assignment = ClassAssignment::find($assignment_id);

            ClassAssignment::where('id', $assignment_id)
            ->update(['title' => $request->title, 'description' => $request->description, 'attachment' => ($attachmentName == '') ? $assignment->attachment : $attachmentName]);
        }
        else
        {
            $assignment = new ClassAssignment();

            $assignment->class_code = $class_code;
            $assignment->title = $request->title;
            $assignment->description = $request->description;
            $assignment->attachment = $attachmentName;
            $assignment->type = $request->assignmentType;

            $assignment->created_at = Carbon::now();
            $assignment->updated_at = Carbon::now();

            $assignment->save();
        }

        if($request->assignmentType == 'ASSIGNMENT')
            return redirect()->to('class-assignments/'.$class_code)->with(['success' => 'Assignment Saved!']);
        else
            return redirect()->to('class-exercises/'.$class_code)->with(['success' => 'Exercise Saved!']);
    }

    public function DeleteClassAssignmentAction($class_code, $assignment_id)
    {
        $assigment = ClassAssignment::find($assignment_id);

        $assigment->delete();

        return redirect()->to('class-assignments/'.$class_code)->with(['success' => 'Assignment Deleted!']);
    }

    public function UploadClassAssignments($class_code, $assignment_id)
    {
        $assignment = ClassAssignment::find($assignment_id);

        return view('UploadClassAssignment', compact('assignment'))->with(['class_code' => $class_code, 'assignment_id' => $assignment_id]);
    }

    public function UploadClassAssignmentsAction(Request $request, $class_code, $assignment_id)
    {
        $rules = [
            'answer' => 'required|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $attachment = $request->file('answer');
        $attachmentName = '';
        if($attachment != null)
        {
            $attachmentName = $attachment->getClientOriginalName();
            Storage::putFileAs('public/files/assignments/answers/', $attachment, $attachmentName);
        }

        $prevAnswer = ClassAssignmentsAnswer::where('assignment_id', $assignment_id)->where('user_id', Auth::user()->user_id)->first();

        if($prevAnswer != null){
            ClassAssignmentsAnswer::where('assignment_id', $assignment_id)->where('user_id', Auth::user()->user_id)
            ->update(['answer' => $attachmentName]);

        }
        else{
            $answer = new ClassAssignmentsAnswer();


            $answer->assignment_id = $assignment_id;
            $answer->user_id = Auth::user()->user_id;
            $answer->answer = $attachmentName;

            $answer->created_at = Carbon::now();
            $answer->updated_at = Carbon::now();

            $answer->save();
        }


        $assigment = ClassAssignment::find($assignment_id);

        if($assigment->type == 'ASSIGNMENT')
            return redirect()->to('class-assignments/'.$class_code)->with(['success' => 'Answer Saved!']);
        else
            return redirect()->to('class-exercises/'.$class_code)->with(['success' => 'Answer Saved!']);
    }

    public function SaveClassAssignmentResultAction(Request $request, $class_code, $assignment_id, $answer_id)
    {
        $rules = [
            'score' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        ClassAssignmentsAnswer::where('id', $answer_id)
            ->update(['score' => $request->score]);


        return redirect()->to('class-assignments-result/'.$class_code.'/'.$assignment_id)->with(['success' => 'Result Saved!']);
    }

    public function ExportResultAction($assignment_id)
    {
        return Excel::download(new ScoreExport($assignment_id), 'Assignment Scores.xlsx');
    }
}
