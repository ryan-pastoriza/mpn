<?php

namespace App\Http\Controllers\Api;

use App\Models\OAParticularAmount;
use App\Models\FeeSchedule;
use App\Models\StudSchInfo;
use App\Models\Assessment;
use App\Models\PhoneNumber;
use App\Models\PromissoryNote;
use App\Models\Representative;
use App\Models\StudPerInfo;
use App\Models\Users;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class Query extends Controller
{

    // Student Transaction Modules
    public static function loadStudents()
    {
        return StudPerInfo::join('stud_sch_info','stud_sch_info.spi_id','=','stud_per_info.spi_id')
        ->select('stud_sch_info.ssi_id','stud_per_info.fname','stud_per_info.mname',
        'stud_per_info.lname','stud_per_info.suffix')->get();
    }

    public static function getPromissoryCount()
    {
        try{
            return PromissoryNote::select(DB::raw('COUNT(promissory_note.pn_id) as promissory_count'))->get();
        }catch (Exception $e) {}
    }

    public static function getStudent($ssi_id)
    {
        $StudentInfo = StudPerInfo::join('stud_sch_info',
        'stud_sch_info.spi_id','=','stud_per_info.spi_id')
        ->select('stud_sch_info.ssi_id','stud_per_info.fname',
        'stud_per_info.mname','stud_per_info.lname',
        'stud_per_info.suffix','stud_per_info.birthdate',
        'stud_per_info.gender','stud_per_info.civ_status',
        'stud_per_info.weight','stud_per_info.height',
        'stud_per_info.blood_type','stud_per_info.religion')
        ->where('stud_sch_info.ssi_id', 'LIKE', $ssi_id)->get();

        $PromissoryNote = PromissoryNote::join('pnms_system.representative',
        'pnms_system.promissory_note.pn_rep_id','=','pnms_system.representative.rep_id')
        ->select('pnms_system.promissory_note.pn_id','pnms_system.promissory_note.pn_tracking_num',    
        'pnms_system.promissory_note.pn_rep_id','pnms_system.promissory_note.pn_ssi_id',  
        'pnms_system.promissory_note.pn_semester','pnms_system.promissory_note.pn_term',    
        'pnms_system.promissory_note.pn_school_yr','pnms_system.promissory_note.pn_amount_promised', 
        'pnms_system.promissory_note.pn_date_promised','pnms_system.promissory_note.pn_remarks', 
        'pnms_system.promissory_note.user_id','pnms_system.promissory_note.created_at', 
        'pnms_system.promissory_note.updated_at','pnms_system.representative.rep_fullname',    
        'pnms_system.representative.rep_address','pnms_system.representative.rep_relation',    
        'pnms_system.representative.rep_id_presented','pnms_system.representative.rep_email_address',
        'pnms_system.representative.rep_contact_num')
        ->where([['pnms_system.promissory_note.pn_ssi_id', 'LIKE', $ssi_id]])->get();

        return array('StudentInfo'=>$StudentInfo,'PromissoryNote'=>$PromissoryNote);
    }
    
    // Get Personal Information
    // public static function getFullName()
    public static function getFullName($ssi_id)
    {
        try {
            // $ssi_id = 5664;
            return StudSchInfo::join('stud_per_info','stud_sch_info.spi_id','=','stud_per_info.spi_id')
            ->select('stud_per_info.fname','stud_per_info.mname',
            'stud_per_info.lname','stud_per_info.suffix')
            ->where('stud_sch_info.ssi_id', '=', $ssi_id)
            ->get();
        } catch (Exception $e) {}
    }

    // public static function getContactNumber()
    public static function getContactNumber($ssi_id)
    {
        try {
            $contact = StudSchInfo::join('stud_per_info','stud_sch_info.spi_id','=','stud_per_info.spi_id')
            ->join('student_phone','student_phone.spi_id','=','stud_per_info.spi_id')
            ->join('phone_numbers','student_phone.phone_id','=','phone_numbers.phone_id')
            ->select('phone_numbers.phone_number')
            ->where('stud_sch_info.ssi_id', '=', $ssi_id)
            ->get();

            if ($contact) {return $contact;}
            else{return "";}
        } catch (Exception $e) {}
    }

    // public static function getEmailAccount()
    public static function getEmailAccount($ssi_id)
    {
        try {
            // $ssi_id = 5664;
            $email = StudSchInfo::join('stud_per_info','stud_sch_info.spi_id','=','stud_per_info.spi_id')
            ->join('email_student','email_student.spi_id','=','stud_per_info.spi_id')
            ->join('emails','email_student.email_id','=','emails.email_id')
            ->select('emails.email')
            ->where('stud_sch_info.ssi_id', '=', $ssi_id)
            ->get();
            if ($email) {return $email;}
            else{return "";}
        } catch (Exception $e) {}
    }
    //Assessment Modules 
    // public static function getOldAccounts()
    public static function getOldAccounts($ssi_id)
    {
        try{
            return OAParticularAmount::join('oa_student','oa_particular_amount.oaStudentId','=','oa_student.oaStudentId')
            ->select('oa_particular_amount.oaSem AS semester', 'oa_particular_amount.oaSy AS school_year',
            DB::raw('Sum(oa_particular_amount.oaAmount) AS totalOld'))
            ->where('oa_student.ssi_id', '=', $ssi_id)
            ->groupBy('oa_particular_amount.oaSem','oa_particular_amount.oaSy')
            ->orderBy('oa_particular_amount.oaSy', 'DESC','oa_particular_amount.oaSem', 'ASC')
            ->get();
        }catch(Exception $e) {}
    }

    public static function getTotalBill($ssi_id, $sy, $sem)
    {
        try{
            $Amount =Assessment::join('sy','assessment.syId','=','sy.syId')
            ->select(DB::raw("SUM(assessment.amt2) as totalBill"))
            ->where([['assessment.semId', '=', $sem],['sy.sy','=', $sy],['assessment.ssi_id', '=', $ssi_id]])
            ->get()[0]->totalBill;
            return response()->json(array('totalBill'=>$Amount));
        }catch(Exception $e){}
    }

    public static function promissoryNoteValidation($eval)
    {
        try {
            return PromissoryNote::select(DB::raw('COUNT(promissory_note.pn_ssi_id) as exist'))
            ->where([['promissory_note.pn_ssi_id','=',$eval['ssi_id']],['promissory_note.pn_school_yr','=',$eval['sub_g_sy']],
            ['promissory_note.pn_semester','=',$eval['sub_g_semester']],['promissory_note.pn_term','=',$eval['sub_g_term']]])
            ->get()[0]->exist;
        } catch (Exception $e) {
        var_dump($e);
        }
    }
    
    public static function addPromissoryNote($data)
    {   
        // Insert Query
        $file_data='';$fileName='';$filepath='';$fileName = '';
        $photo = $data['sub_g_idpres'];
        try {
            $user = Auth::user();
            $userID = $user->id;
            $representative = new Representative;
            $representative->rep_fullname=$data['sub_g_fullname'];
            $representative->rep_address=$data['sub_g_address'];
            $representative->rep_relation=$data['sub_g_relation'];
            // $representative->rep_id_presented= $filepath;
            $representative->rep_email_address=$data['sub_g_email'];
            $representative->rep_contact_num=$data['sub_g_contact'];
            $representative->save();
            $last_repID = $representative->id;
            $promissory_note = new PromissoryNote;
            $promissory_note->pn_ssi_id=$data['ssi_id'];
            $promissory_note->pn_rep_id=$last_repID;
            $promissory_note->user_id=$userID;
            $promissory_note->pn_tracking_num=$data['sub_g_trans_num'];
            $promissory_note->pn_amount_promised=$data['sub_g_amount_digits'];
            $promissory_note->pn_date_promised=$data['sub_g_date_promised'];
            $promissory_note->pn_semester=$data['sub_g_semester'];
            $promissory_note->pn_term=$data['sub_g_term'];
            $promissory_note->pn_school_yr=$data['sub_g_sy'];
            $promissory_note->pn_remarks=$data['sub_g_remarks'];
            $promissory_note->save();

            if(strlen($photo) > 128) {
                list($ext, $data)   = explode(';', $photo);
                list(, $data)       = explode(',', $data);
                $data = base64_decode($data);
                $filepath = 'images/id/'.$last_repID;
                $fileName = mt_rand().time().'.jpg';
                mkdir($filepath);
                $filepath =$filepath.'/'.$fileName;
                file_put_contents($filepath, $data);
                $filepath ='images/id/'.$last_repID.'/'.$fileName;
            }
            Representative::where('rep_id',$last_repID)->update(array('rep_id_presented'=>$filepath,));

            return ('Submitted Successfully');
        } catch (Exception $e) { return ("Check Error: "+$e);}
    }

    public static function getPromissoryNotes($ssi_id){
        $PromissoryNote = PromissoryNote::join('pnms_system.representative',
        'pnms_system.promissory_note.pn_rep_id','=', 
        'pnms_system.representative.rep_id')
        ->select('promissory_note.pn_tracking_num','promissory_note.pn_ssi_id',
        'promissory_note.pn_semester','promissory_note.pn_term',
        'promissory_note.pn_school_yr','promissory_note.pn_amount_promised',
        'promissory_note.pn_date_promised','promissory_note.pn_remarks',
        'promissory_note.user_id','promissory_note.created_at',
        'promissory_note.updated_at','representative.rep_fullname',
        'representative.rep_address','representative.rep_relation',
        'representative.rep_id_presented','representative.rep_email_address',
        'representative.rep_contact_num','representative.created_at',
        'representative.updated_at')
        ->where([['pnms_system.promissory_note.pn_ssi_id','LIKE',$ssi_id]])->get();
        return array(
        'PromissoryNote'=>$PromissoryNote
        );
    }
    
    public static function getPromissoryNoteStatistics(){
        $PNStatistics = PromissoryNote::select(
        'promissory_note.pn_term',
        'promissory_note.pn_semester',
        'promissory_note.pn_school_yr')
        ->orderBy('promissory_note.pn_school_yr','asc')
        ->get();



        $stats = array();
        // $stats = 0;
        // for ($i=0; $i < count($PNStatistics); $i++) {
        //     array_push($stats, array(
        //         'school_year' =>$PNStatistics[$i]['pn_school_yr'],
        //         'semester' =>$PNStatistics[$i]['pn_semester'],
        //         'term' =>$PNStatistics[$i]['pn_term']));
        // }

        for ($i=0; $i < count($PNStatistics); $i++) {
            for ($j=0; $j < count($PNStatistics); $j++) { // loop check for same school year
                if ($PNStatistics[$j]['pn_school_yr'] == $PNStatistics[$i]['pn_school_yr']) {
                    for ($k=0; $k < count($PNStatistics); $k++) {
                     # code...
                    }
                    if ($PNStatistics[$j]['pn_semester'] == $PNStatistics[$i]['pn_semester']) {
                         
                    
                        // if ($PNStatistics[$n]['pn_school_yr']) {
                        //     # code...
                        // }

                        //  array_push($stats, array(
                        // 'school_year' =>$PNStatistics[$i]['pn_school_yr'],
                        // 'semester' =>$PNStatistics[$i]['pn_semester'],
                        // 'term' =>$PNStatistics[$i]['pn_term']));
                    }



                    // array_push($stats, array(
                    //     'school_year' =>$PNStatistics[$i]['pn_school_yr'],
                    //     'semester' =>$PNStatistics[$i]['pn_semester'],
                    //     'term' =>$PNStatistics[$i]['pn_term']));
                }
            }
        }
        return $stats;
    }
}