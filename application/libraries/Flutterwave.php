

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Flutterwave
{

  
    public function index()
    { 
         
    }

    public function initialize($email,$amount,$redirect_url,$txref,$PBFPubKey,$currency){



         $curl = curl_init();     
              curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_SSL_VERIFYPEER=>false,
              CURLOPT_POSTFIELDS => json_encode([
                'amount'=>$amount,
                'customer_email'=>$email,
                'currency'=>$currency,
                'txref'=>$txref,
                'PBFPubKey'=>$PBFPubKey,
                'redirect_url'=>$redirect_url,
               
              ]),
              CURLOPT_HTTPHEADER => [
                "content-type: application/json",
                "cache-control: no-cache"
              ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            if($err){
              // there was an error contacting the rave API
              die('Curl returned error: ' . $err);
            }

            $transaction = json_decode($response);

            if(!$transaction->data && !$transaction->data->link){
              // there was an error from the API
              print_r('API returned error: ' . $transaction->message);
            }

            // uncomment out this line if you want to redirect the user to the payment page
            print_r($transaction->data->message);


            // redirect to page so User can pay
            // uncomment this line to allow the user redirect to the payment page
              header('Location: ' . $transaction->data->link);

	}

  public function verify($currency,$amount,$secret,$ref){
        
            

           //;
            //Correct Amount from Server
            //Correct Currency from Server

            $query = array(
                "SECKEY" => $secret,
                "txref" => $ref
            );

            $data_string = json_encode($query);
                    
            $ch = curl_init('https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify');                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $response = curl_exec($ch);

            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);

            curl_close($ch);

            $resp = json_decode($response, true);

            $paymentStatus = $resp['data']['status'];
            $chargeResponsecode = $resp['data']['chargecode'];
            $chargeAmount = $resp['data']['amount'];
            $chargeCurrency = $resp['data']['currency'];

            if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
              // transaction was successful...
                 // please check other things like whether you already gave value for this ref
              // if the email matches the customer who owns the product etc
              //Give Value and return to Success page
              return true;
              
            } else {
                //Dont Give Value and return to Failure page
              return false;
            }
           


  }
}