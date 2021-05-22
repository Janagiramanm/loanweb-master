<?php

namespace App\Http\Helpers;
use GuzzleHttp\Exception\GuzzleException;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class AppHelper
{

    

    public static function sendInterestSms($input, $agent, $telecallerMobile){
         
        if ($input['cust_phone']) {
     
                //$msg = "Hi, this is a test message from spring edge";
                $date = date('Y-m-d', strtotime($input['appointment_date']));
                $city = $input['cust_city'];
                // $msg = "Our Executive : $agent->name (Mobile: $agent->phone has been assigned to collect Documents on ". $date ." at ".$city." Kindly have all the required documents ready during the visit. For further details, please contact us on ".$telecallerMobile.".";
                $msg = "Our Executive : $agent->name (Mobile: $agent->phone) has been assigned to collect Documents on $date at $city. Kindly have all the required documents ready during the visit. For further details, please contact us on $telecallerMobile. - LOAN";
                //$msg = "Test";
              
                $message = urlencode($msg);
                //exit;
                //$sender = 'SEDEMO'; 
                $sender = 'LDFSHL'; 
                $apikey = '10054grh5qlu83137o375o701097r5wsrn6';
                $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

                $url = $baseurl.'&sender='.$sender.'&to='.$input['cust_phone'].'&message='.$message;    
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Use file get contents when CURL is not installed on server.
                if(!$response){
                    $response = file_get_contents($url);
                }
        }
    }

    public static function sendToBankSms($input, $projects, $bank, $branch){
         
         $date = '';
        if ($input['cust_phone']) {
           
                $customer = $input['cust_name'];
             
                $flat_no = $input['buying_door_no'];

                $project_name = $projects->project_type_name;
             
                $bank = $bank."-".$branch;

                $msg = "Customer $customer of Project $project_name - $flat_no has been sent to Bank: $bank, and the loan is under process.\n- LDFSL";
 // $msg = "Customer $customer of Project $project_name - $flat_no has been sent to Bank: $bank, and the loan is under process.- LDFSL";
              // exit;
                $message = urlencode($msg);
                $sender = 'LDFSHL'; 
                $apikey = '10054grh5qlu83137o375o701097r5wsrn6';
                $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

                $url = $baseurl.'&sender='.$sender.'&to='.$input['cust_phone'].'&message='.$message;    
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Use file get contents when CURL is not installed on server.
                if(!$response){
                    $response = file_get_contents($url);
                }
        }
    }

    public static function sendChequeFixingSms($input, $customer, $telecallerMobile){
       
       
        if ($customer['cust_phone']!='') {
           
           
            $customer_name = $customer['cust_name'];
           // echo $customer['cust_phone'];exit;
            $cheque_date =  date('Y-m-d', strtotime($input['cheque_date']));
            $cheque_amount = $input['cheque_amount'];
           
             $msg = "Hello $customer_name, your cheque is fixed on $cheque_date for amount $cheque_amount with HDFC Ltd. For scheduling your appointment, please contact us on $telecallerMobile";
           // exit;
            
            $message = urlencode($msg);
            $sender = 'LDFSHL'; 
            $apikey = '10054grh5qlu83137o375o701097r5wsrn6';
            $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

            $url = $baseurl.'&sender='.$sender.'&to='.$customer['cust_phone'].'&message='.$message;    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // Use file get contents when CURL is not installed on server.
            if(!$response){
                $response = file_get_contents($url);
                  
            }
    }
    }

    public static function sanctionedSMS($input, $projects, $bank, $branch, $cust){
       
       
        if ($cust['cust_phone']!='') {
           
           
            $customer_name = $cust['cust_name'];
           // echo $customer['cust_phone'];exit;
          
            $sanctioned_amount = $input['sanctioned_amount'];
            $bank = $bank."-".$branch;
            $project_name = $projects->project_type_name;
           
             $msg = "An amount of $sanctioned_amount has been Sanctioned through Bank $bank for Customer $customer_name of Project $project_name - {#var#}. - LDFSL";
           // exit;
            
            $message = urlencode($msg);
            $sender = 'LDFSHL'; 
            $apikey = '10054grh5qlu83137o375o701097r5wsrn6';
            $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

            $url = $baseurl.'&sender='.$sender.'&to='.$customer['cust_phone'].'&message='.$message;    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // Use file get contents when CURL is not installed on server.
            if(!$response){
                $response = file_get_contents($url);
              
            }
        }
    }
   
}