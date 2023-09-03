<?php

namespace App\Exports;

use App\Models\ClassAssignmentsAnswer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ScoreExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $assignment_id;

    function __construct($id) {
            $this->assignment_id = $id;
    }

    public function collection()
    {
        return ClassAssignmentsAnswer::select('class_assignments.title', 'class_assignments_answers.user_id', 'class_assignments_answers.score')
        ->join('class_assignments', 'class_assignments.id', '=', 'class_assignments_answers.assignment_id')
        ->where('class_assignments_answers.assignment_id', '=', $this->assignment_id)->get();
    }

    public function headings(): array
    {
        return ["Assignment", "Name", "Score"];
    }
}
