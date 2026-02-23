<?php

namespace App\Http\Controllers;
use \App\Models\Grade;
use \App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class gradeController extends Controller
{
    public function index()
    {
        $grades = grade::all();
        $estudents = Student::all();
        return view('ACTIVITYY.Dashboarding',compact('grades','estudents'));
    }

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
    // public function add_grade(Request $request)
    // {
    //     try{
    //         $request->validate([
    //             'grade_name' => 'required|string|max:255',
    //             'grade_adviser' => 'required|string|max:255'
    //         ]);

    //         grade::create([
    //             'grade_name' => $request->grade_name,
    //             'grade_adviser' => $request->grade_adviser,

    //         ]);

    //         return redirect()->route('admin.Dashboarding')
    //                          ->with('success','grade Successfully Added');
    //     }catch(\Exception $e){
    //         return redirect()->route('admin.Dashboarding')
    //                          ->with('info','grade Existed');
    //     }





    // }


    public function update_grade(Request $request,$id)
    {
        try{
            $grades = grade::findOrFail($id);


            $request->validate([
                // 'grade_name' => 'required|string|max:255',
                'grade_adviser' => 'required|string|max:255'
            ]);

            // $grades->grade_name = $request->input('grade_name');
            $grades->grade_adviser = $request->input('grade_adviser');
            $grades->save();

            return redirect()->route('admin.Dashboarding')
                             ->with('success','Adviser Successfully updated');


        }catch(\Exception $e){
            return redirect()->route('admin.Dashboarding')
            ->with('info','Adviser Already Existing!! ');
        }






        // dd($grades);
    }

    public function update_grade2(Request $request,$id)
    {
        try{
            $grades = grade::findOrFail($id);


            $request->validate([
                // 'grade_name' => 'required|string|max:255',
                'grade_adviser' => 'required|string|max:255'
            ]);

            // $grades->grade_name = $request->input('grade_name');
            $grades->grade_adviser = $request->input('grade_adviser');
            $grades->save();

            return redirect()->route('teacher.Dashboarding')
                             ->with('success','Adviser Successfully updated');


        }catch(\Exception $e){
            return redirect()->route('teacher.Dashboarding')
            ->with('info','Adviser Already Existing!! ');
        }






        // dd($grades);
    }

    // public function delete_grade(Request $request,$id)
    // {
    //     $grade = grade::findOrFail($id);

    //     $grade->delete();

    //     return redirect()->route('admin.Dashboarding')
    //                      ->with('success','Deleted Successfully ');
    // }


}
