<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;

class IncomeController extends Controller
{

    function income(){
        return view('pages.dashboard.income-page');
    }
   function getIncome(Request $request){

    $userId=$request->header('id');
    return Income::where('user_id',$userId)->get();
   }

   function incomeCreate(Request $request){

        $userId=$request->header('id');

       return Income::where('user_id',$userId)->create([
            'amount'=>$request->amount,
            'description'=>$request->description,
            'date'=>$request->date,
            'category'=>$request->category,
            'user_id'=>$userId,
        ]);

   }
   function incomeUpdate(Request $request){

    $userId=$request->header('id');
    $incomeId=$request->input('id');

    return Income::where('user_id',$userId)->where('id',$incomeId)->update([
         'amount'=>$request->amount,
         'description'=>$request->description,
         'date'=>$request->date,
         'category'=>$request->category,
         'id'=>$incomeId        
     ]);

   }

   function IncomeById(Request $request){
        $userId=$request->header('id');
        $incomeId=$request->input('id');
        return Income::where('user_id',$userId)->where('id',$incomeId)->first();
   }
   function incomeDelete(Request $request){

    $userId=$request->header('id');
    $incomeId=$request->input('id');
    return Income::where('user_id',$userId)->where('id',$incomeId)->delete();
    
   }

   function totalIncome(Request $request){

    $userId=$request->header('id');

    return Income::where('user_id',$userId)->sum('amount');

     //view('pages.dashboard.dashboard-page',compact('totalIncome'));

   }

   function netIncome(Request $request){

    $userId=$request->header('id');
   
    $totalIncome= Income::where('user_id',$userId)->sum('amount');
    $totalExpense= Expense::where('user_id',$userId)->sum('amount');

    $netIncome=$totalIncome-$totalExpense;
    return $netIncome;

   }
}
