<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyCalculatorController extends Controller
{
    public function showCalculator(){
        return view('activity.mycalculator',['result'=> null
    ]);
    }

    public function calculateSum(Request $request){
        $validateData = $request-> validate([
            'inputNum1'=>'required|numeric',
            'inputNum2'=>'required|numeric'
        ]);

        //dd($validateData);//die && dump

        $num1 = $validateData['inputNum1'];
        $num2 = $validateData['inputNum2'];
        $result = $num1 + $num2;

        return view('activity.mycalculator',['result'=>$result]);
    }
}
