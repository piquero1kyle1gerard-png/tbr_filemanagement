<?php

namespace App\Http\Controllers;
use \App\Models\grade;
use \App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function grade7()
    {
        $grades = grade::all();
        $estudents = Student::all();
        return view('ACTIVITYY.grade7',compact('grades','estudents'));
    }

    public function grade8()
    {
        $grades = grade::all();
        $estudents = Student::all();
        return view('ACTIVITYY.grade8',compact('grades','estudents'));
    }

    public function grade9()
    {
        $grades = grade::all();
        $estudents = Student::all();
        return view('ACTIVITYY.grade9',compact('grades','estudents'));
    }

    public function grade10()
    {
        $grades = grade::all();
        $estudents = Student::all();
        return view('ACTIVITYY.grade10',compact('grades','estudents'));
    }

    public function grade11()
    {
        $grades = grade::all();
        $estudents = Student::all();
        return view('ACTIVITYY.grade11',compact('grades','estudents'));
    }

    public function grade12()
    {
        $grades = grade::all();
        $estudents = Student::all();
        return view('ACTIVITYY.grade12',compact('grades','estudents'));
    }

   public function add_Student(Request $request)
   {
         $request->validate
        ([
            'grade_id' =>'required|exists:grades,id',
            'student_familyname' =>'required|string|max:255',
            'student_firstname' =>'required|string|max:255',
        ]);
        $Student = new Student();
        $Student->grade_id = $request->grade_id;
        $Student->student_familyname = $request->student_familyname;
        $Student->student_firstname = $request->student_firstname;
        $Student->save();

        return redirect()->back()->with('success','Student added successfully!');

   }



   public function update_Student(Request $request,$id)
    {
        try{
            $Student = Student::findOrFail($id);


            $request->validate([
                'student_familyname' => 'required|string|max:255',
                'student_firstname' => 'required|string|max:255'
            ]);

            $Student->student_familyname = $request->input('student_familyname');
            $Student->student_firstname = $request->input('student_firstname');
            $Student->save();

            return back()->with('success', 'Successfully updated');







        }catch(\Exception $e){
            return redirect()->route('admin.grade7')
            ->with('info','Player Already Existing!! ');
        }
    }

    public function delete_Student(Request $request,$id)
    {
        $Student = Student::findOrFail($id);

        $Student->delete();

        return back()->with('success', 'Student Deleted');




    }
}
