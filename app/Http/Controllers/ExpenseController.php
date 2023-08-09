<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

     function expense(){
          return view('pages.dashboard.expense-page');
      }
    function getExpense(Request $request){

        $userId=$request->header('id');
        return Expense::where('user_id',$userId)->get();
       }
    
       function expenseCreate(Request $request){
    
            $userId=$request->header('id');
    
           return Expense::where('user_id',$userId)->create([
                'amount'=>$request->amount,
                'description'=>$request->description,
                'date'=>$request->date,
                'category'=>$request->category,
                'user_id'=>$userId,
            ]);
    
       }
       function expenseUpdate(Request $request){
    
        $userId=$request->header('id');
        $expenseId=$request->input('id');
    
        return Expense::where('user_id',$userId)->where('id',$expenseId)->update([
             'amount'=>$request->amount,
             'description'=>$request->description,
             'date'=>$request->date,
             'category'=>$request->category,
             'id'=>$expenseId        
         ]);
    
       }

       function ExpenseById(Request $request){

          $userId=$request->header('id');
        $incomeId=$request->input('id');
        return Expense::where('user_id',$userId)->where('id',$incomeId)->first();

       }
       
       function expenseDelete(Request $request){
    
        $userId=$request->header('id');
        $expenseId=$request->input('id');
        return Expense::where('user_id',$userId)->where('id',$expenseId)->delete();
        
       }

       function totalExpense(Request $request){

            $userId=$request->header('id');
            return Expense::where('user_id',$userId)->sum('amount');
       }
}
