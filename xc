[33mcommit 0cf187bbac847d20fa3faac5c17500855f003e86[m[33m ([m[1;36mHEAD -> [m[1;32mmaster[m[33m, [m[1;31morigin/master[m[33m, [m[1;31morigin/HEAD[m[33m)[m
Author: @rickycanonigo51 <rickycanonigo51@gmail.com>
Date:   Thu May 7 11:21:34 2020 +0800

    all content

[1mdiff --git a/AppLocal/app/Http/Controllers/Api/Query.php b/AppLocal/app/Http/Controllers/Api/Query.php[m
[1mindex 7ebbfce..4be0b73 100644[m
[1m--- a/AppLocal/app/Http/Controllers/Api/Query.php[m
[1m+++ b/AppLocal/app/Http/Controllers/Api/Query.php[m
[36m@@ -131,7 +131,7 @@[m [mclass Query extends Controller[m
             ->select(DB::raw("SUM(assessment.amt2) as totalBill"))[m
             ->where([['assessment.semId', '=', $sem],['sy.sy','=', $sy],['assessment.ssi_id', '=', $ssi_id]])[m
             ->get()[0]->totalBill;[m
[31m-            return response()->json(array('totalBill'=>$Amount));[m
[32m+[m[32m            return response()->json(array('totalBill'=>$sy[2].$sy[3]));[m
         }catch(Exception $e){}[m
     }[m
 [m
[36m@@ -142,7 +142,9 @@[m [mclass Query extends Controller[m
             ->where([['promissory_note.pn_ssi_id','=',$eval['ssi_id']],['promissory_note.pn_school_yr','=',$eval['sub_g_sy']],[m
             ['promissory_note.pn_semester','=',$eval['sub_g_semester']],['promissory_note.pn_term','=',$eval['sub_g_term']]])[m
             ->get()[0]->exist;[m
[31m-        } catch (Exception $e) {}[m
[32m+[m[32m        } catch (Exception $e) {[m
[32m+[m[32m        var_dump($e);[m
[32m+[m[32m        }[m
     }[m
     [m
     public static function addPromissoryNote($data)[m
[36m@@ -179,7 +181,7 @@[m [mclass Query extends Controller[m
                 list($ext, $data)   = explode(';', $photo);[m
                 list(, $data)       = explode(',', $data);[m
                 $data = base64_decode($data);[m
[31m-                $filepath = public_path('images/id/'.$last_repID);[m
[32m+[m[32m                $filepath = 'images/id/'.$last_repID;[m
                 $fileName = mt_rand().time().'.jpg';[m
                 mkdir($filepath);[m
                 $filepath =$filepath.'/'.$fileName;[m
[36m@@ -189,7 +191,7 @@[m [mclass Query extends Controller[m
             Representative::where('rep_id',$last_repID)->update(array('rep_id_presented'=>$filepath,));[m
 [m
             return ('Submitted Successfully');[m
[31m-        } catch (\Exception $e) { return ("Check Error: "+$e);}[m
[32m+[m[32m        } catch (Exception $e) { return ("Check Error: "+$e);}[m
     }[m
 [m
     public static function getPromissoryNotes($ssi_id){[m
[36m@@ -211,14 +213,54 @@[m [mclass Query extends Controller[m
         'PromissoryNote'=>$PromissoryNote[m
         );[m
     }[m
[31m-[m
[32m+[m[41m    [m
     public static function getPromissoryNoteStatistics(){[m
         $PNStatistics = PromissoryNote::select([m
         'promissory_note.pn_term',[m
         'promissory_note.pn_semester',[m
[31m-        'promissory_note.pn_school_yr')->get();[m
[31m-        return array([m
[31m-        'PNStatistics'=>$PNStatistics[m
[31m-        );[m
[32m+[m[32m        'promissory_note.pn_school_yr')[m
[32m+[m[32m        ->orderBy('promissory_note.pn_school_yr','asc')[m
[32m+[m[32m        ->get();[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m[32m        $stats = array();[m
[32m+[m[32m        // $stats = 0;[m
[32m+[m[32m        // for ($i=0; $i < count($PNStatistics); $i++) {[m
[32m+[m[32m        //     array_push($stats, array([m
[32m+[m[32m        //         'school_year' =>$PNStatistics[$i]['pn_school_yr'],[m
[32m+[m[32m        //         'semester' =>$PNStatistics[$i]['pn_semester'],[m
[32m+[m[32m        //         'term' =>$PNStatistics[$i]['pn_term']));[m
[32m+[m[32m        // }[m
[32m+[m
[32m+[m[32m        for ($i=0; $i < count($PNStatistics); $i++) {[m
[32m+[m[32m            for ($j=0; $j < count($PNStatistics); $j++) { // loop check for same school year[m
[32m+[m[32m                if ($PNStatistics[$j]['pn_school_yr'] == $PNStatistics[$i]['pn_school_yr']) {[m
[32m+[m[32m                    for ($k=0; $k < count($PNStatistics); $k++) {[m
[32m+[m[32m                     # code...[m
[32m+[m[32m                    }[m
[32m+[m[32m                    if ($PNStatistics[$j]['pn_semester'] == $PNStatistics[$i]['pn_semester']) {[m
[32m+[m[41m                         [m
[32m+[m[41m                    [m
[32m+[m[32m                        // if ($PNStatistics[$n]['pn_school_yr']) {[m
[32m+[m[32m                        //     # code...[m
[32m+[m[32m                        // }[m
[32m+[m
[32m+[m[32m                        //  array_push($stats, array([m
[32m+[m[32m                        // 'school_year' =>$PNStatistics[$i]['pn_school_yr'],[m
[32m+[m[32m                        // 'semester' =>$PNStatistics[$i]['pn_semester'],[m
[32m+[m[32m                        // 'term' =>$PNStatistics[$i]['pn_term']));[m
[32m+[m[32m                    }[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m[32m                    // array_push($stats, array([m
[32m+[m[32m                    //     'school_year' =>$PNStatistics[$i]['pn_school_yr'],[m
[32m+[m[32m                    //     'semester' =>$PNStatistics[$i]['pn_semester'],[m
[32m+[m[32m                    //     'term' =>$PNStatistics[$i]['pn_term']));[m
[32m+[m[32m                }[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[32m        return $stats;[m
     }[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/AppLocal/database/acs.sql b/AppLocal/database/acs.sql[m
[1mnew file mode 100644[m
[1mindex 0000000..8472ce4[m
[1m--- /dev/null[m
[1m+++ b/AppLocal/database/acs.sql[m
[36m@@ -0,0 +1,5025 @@[m
[32m+[m[32m/*[m
[32m+[m[32mNavicat MySQL Data Transfer[m
[32m+[m
[32m+[m[32mSource Server         : 127.0.0.1[m
[32m+[m[32mSource Server Version : 50723[m
[32m+[m[32mSource Host           : 127.0.0.1:3306[m
[32m+[m[32mSource Database       : acs[m
[32m+[m
[32m+[m[32mTarget Server Type    : MYSQL[m
[32m+[m[32mTarget Server Version : 50723[m
[32m+[m[32mFile Encoding         : 65001[m
[32m+[m
[32m+[m[32mDate: 2020-04-06 15:39:39[m
[32m+[m[32m*/[m
[32m+[m
[32m+[m[32mSET FOREIGN_KEY_CHECKS=0;[m
[32m+[m
[32m+[m[32m-- ----------------------------[m
[32m+[m[32m-- Table structure for assessment[m
[32m+[m[32m-- ----------------------------[m
[32m+[m[32mDROP TABLE IF EXISTS `assessment`;[m
[32m+[m[32mCREATE TABLE `assessment` ([m
[32m+[m[32m  `assessmentId` int(11) NOT NULL AUTO_INCREMENT,[m
[32m+[m[32m  `ssi_id` int(11) DEFAULT NULL,[m
[32m+[m[32m  `particular` varchar(100) DEFAULT NULL,[m
[32m+[m[32m  `amt1` double DEFAULT NULL,[m
[32m+[m[32m  `amt2` double DEFAULT NULL,[m
[32m+[m[32m  `feeType` varchar(100) DEFAULT NULL,[m
[32m+[m[32m  `semId` int(11) NOT NULL,[m
[32m+[m[32m  `syId` int(11) NOT NULL,[m
[32m+[m[32m  `collectionReportGroup` varchar(100) DEFAULT NULL,[m
[32m+[m[32m  PRIMARY KEY (`assessmentId`),[m
[32m+[m[32m  KEY `sem_assessment` (`semId`),[m
[32m+[m[32m  KEY `sy_assessment` (`syId`),[m
[32m+[m[32m  CONSTRAINT `sem_assessment` FOREIGN KEY (`semId`) REFERENCES `sem` (`semId`),[m
[32m+[m[32m  CONSTRAINT `sy_assessment` FOREIGN KEY (`syId`) REFERENCES `sy` (`syId`)[m
[32m+[m[32m) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;[m
[32m+[m
[32m+[m[32m-- ----------------------------[m
[32m+[m[32m-- Records of assessment[m
[32m+[m[32m-- ----------------------------[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('1', '7581', 'Athletic Fee', '200', '200', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('2', '7581', 'Library Fee', '300', '300', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('3', '7581', 'Medical / Dental', '400', '400', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('4', '7581', 'Student Services', '1250', '1250', 'Miscellaneous', '2', '20', 'studentServices');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('5', '7581', 'Guidance', '100', '100', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('6', '7581', 'E-learning', '550', '550', 'Miscellaneous', '2', '20', 'elearning');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('7', '7581', 'Oracle', '550', '550', 'Miscellaneous', '2', '20', 'oracle');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('8', '7581', 'MS Fee', '250', '250', 'Miscellaneous', '2', '20', 'msfee');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('9', '7581', 'NCC-UK', '750', '750', 'Miscellaneous', '2', '20', 'nccuk');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('10', '7581', 'Printing Cost', '350', '350', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('11', '7581', 'Insurance', '50', '50', 'Miscellaneous', '2', '20', 'insurance');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('12', '7581', 'Internet Fee', '1280', '1280', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('13', '7581', 'Office 365', '250', '250', 'Miscellaneous', '2', '20', 'office365');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('14', '7581', 'SC/DL', '200', '200', 'Miscellaneous', '2', '20', 'scnl');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('15', '7581', 'ID Validation', '35', '10', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('16', '7581', 'Library Card', '10', '10', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('17', '7581', 'Registration fee', '450', '450', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('18', '7581', 'Tuition', '2763', '4050', 'Tuition', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('19', '23500', 'Tuition', '2250', '4050', 'Tuition', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('20', '23500', 'Athletic Fee', '200', '300', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('21', '23500', 'Library Fee', '300', '500', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('22', '23500', 'Medical / Dental', '400', '500', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('23', '23500', 'Student Services', '1200', '1750', 'Miscellaneous', '1', '20', 'studentServices');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('24', '23500', 'Guidance', '100', '300', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('25', '23500', 'E-learning', '550', '550', 'Miscellaneous', '1', '20', 'elearning');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('26', '23500', 'Oracle', '550', '550', 'Miscellaneous', '1', '20', 'oracle');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('27', '23500', 'MS Fee', '250', '250', 'Miscellaneous', '1', '20', 'msfee');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('28', '23500', 'NCC-UK', '750', '750', 'Miscellaneous', '1', '20', 'nccuk');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('29', '23500', 'Printing Cost', '350', '350', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('30', '23500', 'Insurance', '50', '50', 'Miscellaneous', '1', '20', 'insurance');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('31', '23500', 'Internet Fee', '1350', '1380', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('32', '23500', 'Office 365', '250', '250', 'Miscellaneous', '1', '20', 'office365');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('33', '23500', 'SC/DL', '230', '200', 'Miscellaneous', '1', '20', 'scnl');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('34', '23500', 'ID', '185', '300', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('35', '23500', 'Student Handbook', '210', '50', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('36', '23500', 'Library Card', '10', '10', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('37', '23500', 'Registration fee', '500', '450', 'Miscellaneous', '1', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('38', '23500', 'Surcharge', '540.6', '679.5', 'Miscellaneous', '1', '20', 'others');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('40', '7580', 'Tuition', '0', '0', 'Tuition', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('41', '7580', 'Athletic Fee', '200', '200', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('42', '7580', 'Library Fee', '300', '300', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('43', '7580', 'Medical / Dental', '400', '400', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('44', '7580', 'Student Services', '1250', '1250', 'Miscellaneous', '2', '20', 'studentServices');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('45', '7580', 'Guidance', '100', '100', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('46', '7580', 'E-learning', '550', '550', 'Miscellaneous', '2', '20', 'elearning');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('47', '7580', 'Oracle', '550', '550', 'Miscellaneous', '2', '20', 'oracle');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('48', '7580', 'MS Fee', '250', '250', 'Miscellaneous', '2', '20', 'msfee');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('49', '7580', 'NCC-UK', '750', '750', 'Miscellaneous', '2', '20', 'nccuk');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('50', '7580', 'Printing Cost', '350', '350', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('51', '7580', 'Insurance', '50', '50', 'Miscellaneous', '2', '20', 'insurance');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('52', '7580', 'Internet Fee', '1280', '1280', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('53', '7580', 'Office 365', '250', '250', 'Miscellaneous', '2', '20', 'office365');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('54', '7580', 'SC/DL', '200', '200', 'Miscellaneous', '2', '20', 'scnl');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('55', '7580', 'ID Validation', '35', '10', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('56', '7580', 'Library Card', '10', '10', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('57', '7580', 'Registration fee', '450', '450', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('58', '7580', 'Tuition', '0', '0', 'Tuition', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('59', '7580', 'Athletic Fee', '200', '200', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('60', '7580', 'Library Fee', '300', '300', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('61', '7580', 'Medical / Dental', '400', '400', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('62', '7580', 'Student Services', '1250', '1250', 'Miscellaneous', '2', '19', 'studentServices');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('63', '7580', 'Guidance', '100', '100', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('64', '7580', 'E-learning', '550', '550', 'Miscellaneous', '2', '19', 'elearning');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('65', '7580', 'Oracle', '550', '550', 'Miscellaneous', '2', '19', 'oracle');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('66', '7580', 'MS Fee', '250', '250', 'Miscellaneous', '2', '19', 'msfee');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('67', '7580', 'NCC-UK', '750', '750', 'Miscellaneous', '2', '19', 'nccuk');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('68', '7580', 'Printing Cost', '350', '350', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('69', '7580', 'Insurance', '50', '50', 'Miscellaneous', '2', '19', 'insurance');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('70', '7580', 'Internet Fee', '1280', '1280', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('71', '7580', 'Office 365', '250', '250', 'Miscellaneous', '2', '19', 'office365');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('72', '7580', 'SC/DL', '200', '200', 'Miscellaneous', '2', '19', 'scnl');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('73', '7580', 'ID Validation', '35', '10', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('74', '7580', 'Library Card', '10', '10', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('75', '7580', 'Registration fee', '450', '450', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('76', '23505', 'Tuition', '0', '0', 'Tuition', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('77', '23505', 'Athletic Fee', '200', '300', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('78', '23505', 'Library Fee', '300', '500', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('79', '23505', 'Medical / Dental', '400', '500', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('80', '23505', 'Student Services', '1200', '1750', 'Miscellaneous', '2', '19', 'studentServices');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('81', '23505', 'Guidance', '100', '300', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('82', '23505', 'E-learning', '550', '550', 'Miscellaneous', '2', '19', 'elearning');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('83', '23505', 'Oracle', '550', '550', 'Miscellaneous', '2', '19', 'oracle');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('84', '23505', 'MS Fee', '250', '250', 'Miscellaneous', '2', '19', 'msfee');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('85', '23505', 'NCC-UK', '750', '750', 'Miscellaneous', '2', '19', 'nccuk');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('86', '23505', 'Printing Cost', '350', '350', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('87', '23505', 'Insurance', '50', '50', 'Miscellaneous', '2', '19', 'insurance');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('88', '23505', 'Internet Fee', '1350', '1380', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('89', '23505', 'Office 365', '250', '250', 'Miscellaneous', '2', '19', 'office365');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('90', '23505', 'SC/DL', '230', '200', 'Miscellaneous', '2', '19', 'scnl');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('91', '23505', 'ID', '185', '300', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('92', '23505', 'Student Handbook', '210', '50', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('93', '23505', 'Library Card', '10', '10', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('94', '23505', 'Registration fee', '500', '450', 'Miscellaneous', '2', '19', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('95', '23751', 'Library Fee', '300', '300', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('96', '23751', 'Medical / Dental', '800', '800', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('97', '23751', 'Insurance', '50', '50', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('98', '23751', 'ID', '150', '150', 'Miscellaneous', '2', '20', 'netR');[m
[32m+[m[32mINSERT INTO `assessment` VALUES ('99', '23751', 'Registration fee', '30