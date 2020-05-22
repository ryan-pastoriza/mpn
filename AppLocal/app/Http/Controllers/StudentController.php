<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;
use Validator;

class StudentController extends Controller
{
    
    public function load_student(Request $request)
    {
        try{return response()->json((new Query)->loadStudents());}
        catch (Exception $exception) {}
    }
    
    public function PromissoryCount(Request $request)
    {
        try{return response()->json((new Query)->getPromissoryCount());}
        catch (Exception $exception) {}
    }

    public function student_total_bill(Request $request)
    {
        // 1573 Jahdiel Casilao Bulahan
        // return $ssi_id;
        try{return (new Query)->getTotalBill($request->ssi_id,$request->stud_year,$request->stud_semester);}
        catch (Exception $exception) {}
    }
    
    public function student_fee_schedule(Request $request)
    {
        try{return (new Query)->getFeeSchedule($request->month);}
        catch (Exception $exception) {}
    }

    public function fee_schedules()
    {
        try{return (new Query)->getAllFeeSchedule();}
        catch (Exception $exception) {}
    }
    
    public function student_old_accounts(Request $request)
    {
        try{return (new Query)->getOldAccounts($request->ssi_id);}
        catch (Exception $exception) {}
    }
    
    public function student_fullname(Request $request)
    {
        try{return (new Query)->getFullName($request->ssi_id);}
        catch (Exception $exception) {}
    }
    
    public function student_contact_number(Request $request)
    {
        try{return (new Query)->getContactNumber($request->ssi_id);}
        catch (Exception $exception) {}
    }
    
    public function student_email_account(Request $request)
    {
        try{return (new Query)->getEmailAccount($request->ssi_id);}
        catch (Exception $exception) {}
    }
    
    public function add_student_promissory_note(Request $request)
    {
        $data = array(
            'sub_g_fullname'=>$request->sub_g_fullname,
            'sub_g_address'=>$request->sub_g_address,
            'sub_g_relation'=>$request->sub_g_relation,
            'sub_g_idpres'=>$request->sub_g_idpres,
            'sub_g_email'=>$request->sub_g_email,
            'sub_g_contact'=>$request->sub_g_contact,
            'ssi_id'=>$request->ssi_id,
            'sub_g_trans_num' =>$request->sub_g_trans_num,
            'sub_g_amount_digits'=>$request->sub_g_amount_digits,
            'sub_g_date_promised'=>$request->sub_g_date_promised,
            'sub_g_semester'=>$request->sub_g_semester,
            'sub_g_term'=>$request->sub_g_term,
            'sub_g_sy'=>$request->sub_g_sy,
            'sub_g_remarks'=>$request->sub_g_remarks
        );
        $to_eval = array(
            'ssi_id'=>$request->ssi_id,
            'sub_g_semester'=>$request->sub_g_semester,
            'sub_g_term'=>$request->sub_g_term,
            'sub_g_sy'=>$request->sub_g_sy
        );
        if((new Query)->promissoryNoteValidation($to_eval)==0){
            return response()->json(['message' =>(new Query)->addPromissoryNote($data)]);}
        else{return response()->json(['message' =>'Promissory Note Already Exist']);}
    }
    
    public function get_student_promissory_note(Request $request)
    {
        try{return response()->json((new Query)->getPromissoryNotes($request->ssi_id));}
        catch (Exception $exception) {}
    }
}