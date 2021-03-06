<?php

namespace App\Http\Controllers\Api;

use App\Models\OAParticularAmount;
use App\Models\FeeSchedule;
use App\Models\Payments;
use App\Models\Discount;
use App\Models\StudSchInfo;
use App\Models\Assessment;
use App\Models\PhoneNumber;
use App\Models\PromissoryNote;
use App\Models\Representative;
use App\Models\StudPerInfo;
use App\Models\Users;
use App\Models\Email;
use App\Models\EmailHistory;
use App\Models\RepEmailHistory;
use App\Models\Notification;
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
            ->where([['assessment.semId', '=', $sem],
                    ['sy.sy','=', strval($sy)],
                    ['assessment.ssi_id', '=', $ssi_id]])
            ->get()[0]->totalBill;

            $Payments =Payments::join('paymentdetails','paymentdetails.paymentId','=','payments.paymentId')
            ->join('assessment','assessment.assessmentId','=','paymentdetails.assessmentId')
            ->join('sy',[['payments.syId','=','sy.syId'],['assessment.syId','=','sy.syId']])
            ->join('sem',[['payments.semId','=','sem.semId'],['assessment.semId','=','sem.semId']])
            ->select(DB::raw("payments.amt2 as amt2"))->distinct()
            ->where([['payments.semId', '=', $sem],
                    ['sy.sy','=', strval($sy)],
                    ['payments.ssi_id', '=', $ssi_id]])
            ->get();

            $Discount = Discount::join('sem','discount.semId','=','sem.semId')
            ->join('sy','discount.syId','=','sy.syId')
            ->select(DB::raw("discount.amt2 as amount"))->distinct()
            ->where([['discount.semId', '=', $sem],
                    ['sy.sy','=', strval($sy)],
                    ['discount.ssi_id', '=', $ssi_id]])
            ->get();
            $Amount = is_null($Amount)? 0.00:$Amount;
            $Discount = sizeof($Discount)>0? $Discount[0]->amount:0.00;
            $Payments = sizeof($Payments)>0? $Payments[0]->amt2:0.00;
            // $Discount = is_null($Discount) ? 0:$Discount[0]->amount;
            return response()->json(array('totalBill'=>$Amount,'Payments'=>$Payments,'Discount'=>$Discount));
        }catch(Exception $e){}
    }

    // Adding of Promissory
    public static function promissoryNoteValidation($eval)
    {
        return PromissoryNote::select(DB::raw('COUNT(promissory_note.pn_ssi_id) as exist'))
        ->where([['promissory_note.pn_ssi_id','=',$eval['ssi_id']],['promissory_note.pn_school_yr','=',$eval['sub_g_sy']],
        ['promissory_note.pn_semester','=',$eval['sub_g_semester']],['promissory_note.pn_term','=',$eval['sub_g_term']]])
        ->get()[0]->exist;
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

            $em_his = new EmailHistory;
            $em_his->status='active';
            $em_his->save();
            $em_his_id = $em_his->id;

            $rep_em_his = new RepEmailHistory;
            $rep_em_his->rep_id=$last_repID;
            $rep_em_his->history_id=$em_his_id;
            $rep_em_his->save();

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

        $sy = PromissoryNote::select('promissory_note.pn_school_yr')
        ->distinct()
        ->orderBy('promissory_note.pn_school_yr','asc')
        ->get();
        $stats = array();
        $prelim =$midterm= $prefinal =$final = 0;
        $sem='';
        for ($i=0; $i < count($sy); $i++) {//All school year with PN
            for ($x=1; $x < 2; $x++) { //1st Sem and 2nd Sem
                // First Semester
                $sem =" 1st semester";
                for ($j=0; $j < count($PNStatistics); $j++) { //All PN
                    if ($sy[$i]['pn_school_yr']==$PNStatistics[$j]['pn_school_yr']) {
                        if ($PNStatistics[$j]['pn_semester']=='1') {
                            if ($PNStatistics[$j]['pn_term']==1) {
                                $prelim +=1;
                            }else
                            if ($PNStatistics[$j]['pn_term']==2) {
                                $midterm +=1;
                            }else
                            if ($PNStatistics[$j]['pn_term']==3) {
                                $prefinal +=1;
                            }else
                            if ($PNStatistics[$j]['pn_term']==4) {
                                $final +=1;
                            }
                        }
                    }
                }
                array_push($stats, array(
                    'x' => $sy[$i]['pn_school_yr'].$sem,
                    'prelim' => $prelim,
                    'midterm' => $midterm,
                    'prefinal' => $prefinal,
                    'final' => $final
                ));
                $prelim =$midterm= $prefinal =$final = 0;
                
                // Second Semester
                $sem =" 2nd semester";
                for ($j=0; $j < count($PNStatistics); $j++) { //All PN
                    if ($sy[$i]['pn_school_yr']==$PNStatistics[$j]['pn_school_yr']) {
                        if ($PNStatistics[$j]['pn_semester']=='2') {
                            if ($PNStatistics[$j]['pn_term']==1) {
                                $prelim +=1;
                            }else
                            if ($PNStatistics[$j]['pn_term']==2) {
                                $midterm +=1;
                            }else
                            if ($PNStatistics[$j]['pn_term']==3) {
                                $prefinal +=1;
                            }else
                            if ($PNStatistics[$j]['pn_term']==4) {
                                $final +=1;
                            }
                        }
                    }
                }
                array_push($stats, array(
                    'x' => $sy[$i]['pn_school_yr'].$sem,
                    'prelim' => $prelim,
                    'midterm' => $midterm,
                    'prefinal' => $prefinal,
                    'final' => $final
                ));
                $prelim =$midterm= $prefinal =$final = 0;
            }
        }
        return $stats;
    }

    // Reports
    public static function getParentGuardianRecord($ssi_id)
    {
        $Representative = Representative::join('promissory_note',
        'pnms_system.promissory_note.pn_rep_id','=', 
        'pnms_system.representative.rep_id')
        ->select('representative.rep_fullname',
        'representative.rep_address',
        'representative.rep_relation',
        'representative.rep_id_presented',
        'representative.rep_email_address',
        'representative.rep_contact_num',
        'representative.created_at')
        ->where([['pnms_system.promissory_note.pn_ssi_id','=',$ssi_id]])->get();
        return array(
        'Representative'=>$Representative
        );
    }

    public static function getPromissoryRecord($ssi_id,$sy)
    {
        $PromissoryNote = PromissoryNote::select('promissory_note.pn_tracking_num',
        'promissory_note.pn_ssi_id',
        'promissory_note.pn_amount_promised',
        'promissory_note.pn_date_promised',
        'promissory_note.pn_remarks',
        'promissory_note.pn_semester',
        'promissory_note.pn_term',
        'promissory_note.pn_school_yr',
        'promissory_note.created_at')
        ->where([['promissory_note.pn_ssi_id','LIKE','%'.$ssi_id.'%'],
                 ['promissory_note.pn_school_yr','LIKE','%'.$sy.'%']])->get();
        return array(
        'PromissoryNote'=>$PromissoryNote
        );
    }

    public static function getNofitications()
    {

        return Notification::join('email_notif','email_notif.notif_id','=','notification.notif_id')
        ->join('representative','email_notif.rep_id','=','representative.rep_id')
        ->select(
        'representative.rep_fullname',
        'notification.notif_name',
        'notification.notif_content',
        'notification.notif_status',
        'notification.notif_id')
        ->where('notif_status','active')->get();
    }
    public static function getToEmailAccounts()
    {
        return EmailHistory::join('rep_email_history','rep_email_history.history_id','=','email_history.history_id')
        ->join('representative','rep_email_history.rep_id','=','representative.rep_id')
        ->select(
        'representative.rep_fullname',
        'representative.rep_email_address',
        'email_history.status',
        'email_history.message',
        'email_history.history_id')
        ->where('email_history.status','active')
        ->get();
    }

    public static function add_email_history($history_id,$message)
    {
        try{
            EmailHistory::where('history_id',$history_id)
            ->update(['message' => $message, 'status' => 'done']);
            return response()->json('success');
        }catch(Exception $e){
            return response()->json('error');
        }
    }

    public static function getEmailHistory()
    {
        return EmailHistory::join('rep_email_history','rep_email_history.history_id','=','email_history.history_id')
        ->join('representative','rep_email_history.rep_id','=','representative.rep_id')
        ->select(
        'representative.rep_fullname',
        'representative.rep_email_address',
        'email_history.status',
        'email_history.message',
        'email_history.history_id')
        ->where('email_history.status','done')
        ->get();
    }
}