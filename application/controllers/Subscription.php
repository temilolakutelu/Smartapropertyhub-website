<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscription extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_model', 'Plan_model']);
        $this->load->library('session');
        $this->load->helper(array('url'));
        $this->load->library('Flutterwave');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {

            $email = $this->session->userdata('registered')['email'];
            $login = $this->session->userdata('logged_in');
            $user_id = $login['user_id'];
            $row = $this->Login_model->get_by_id($user_id);
            $username = $row->username;
            $this->session->set_userdata('email', $row->email);
            $data = array(
                'title' => 'Subscription',
                'username' => $username,
                'id' => $user_id,
            );

        } else {
            $data = array(

                'title' => 'Subscription',

            );

        }
        $this->template->load('default', 'subscription/subscription', $data);
    }
    public function payment($id)
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('message', 'You must  be logged in inorder to subscribe');
            redirect('login');
        } else {
            $login = $this->session->userdata('logged_in');
            $email = $login['email'];

            $check_agent = $this->Login_model->check_agent($email);

            $check_agent = 1;
            if ($check_agent) {

                $plan_d = $this->Plan_model->get_plan_details($id);

                $login = $this->session->userdata('logged_in');
                $username = $login['username'];
                $user_id = $login['user_id'];
                $row = $this->Login_model->get_by_id($user_id);
                $data = array(
                    'title' => 'Payment',
                    'username' => $username,
                    'message' => $this->session->flashdata('message'),
                    'action' => base_url('Subscription/online_payment/' . $id),
                    'id' => $user_id,
                    'plan' => $plan_d->plan,
                    'plan_id' => $id,

                );

                $this->template->load('default', 'subscription/payment', $data);
            } else {
                $this->session->set_flashdata('message', 'You must be a registered Agent/Developer/Landlord/Architect inorder to make subscription');
                redirect('register');
            }
        }

    }

    public function bank_payment($id)
    {

        $plan_d = $this->Plan_model->get_plan_details($id);

        $login = $this->session->userdata('logged_in');
        $username = $login['username'];
        $user_id = $login['user_id'];
        $row = $this->Login_model->get_by_id($user_id);
        $data = array(
            'title' => 'Payment',
            'username' => $username,
            'id' => $user_id,
            'plan' => $plan_d->plan,
            'plan_id' => $id,

        );

        $this->template->load('default', 'subscription/cash_payment', $data);

    }

    public function online_payment($id)
    {
        $login = $this->session->userdata('logged_in');
        $agent_id = $login['agent_id'];

        $email = $this->session->userdata('email');
        // var_dump($email);
        $amount = (int) $this->session->userdata('amount');
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $txref = substr(str_shuffle($chars), 0, 8);
        $PBFPubKey = "FLWPUBK-d74c4e96806d18dde285513857f61092-X";
        $currency = "NGN";
        $redirect_url = base_url() . 'Subscription/verify_payment_online';

        $plan_d = $this->Plan_model->get_plan_details($id);

        $data = array(

            'amount' => $amount,
            'txref' => $txref,
            'PK' => $PBFPubKey,
            'currency' => $currency,
            'plan' => $plan_d->plan,
            'duration' => $this->input->post('payment-type'),
            'agent_id' => $this->agent_id,

        );
        $this->session->set_userdata('payment_details', $data);
        //online Payment
        $this->flutterwave->initialize($email, $amount, $redirect_url, $txref, $PBFPubKey, $currency);

    }

    public function verify_payment_online()
    {

        $payment = $this->session->userdata('payment_details');
        $amount = $payment['amount'];
        $currency = $payment['currency'];
        $secret = "FLWSECK-155fa8add7f200b44166d9a5256701c6-X";
        $ref = $_GET['txref'];

        if ($this->flutterwave->verify($currency, $amount, $secret, $ref) == true) {
            //Payment is Successful then do whatever you wanna do
            $payment_details = $this->session->userdata('payment_details');
            $data = array(
                'price' => $payment_details['amount'],
                'ref' => $payment_details['txref'],
                'plan' => $payment_details['plan'],
                'duration' => $payment_details['duration'],
                'agent_id' => $payment_details['agent_id'],
                'payment_method' => 'online',

            );
            $this->Plan_model->log_payment($data);

        } else {
            $this->session->set_flashdata('error', 'subscription plan payment unsuccessful');
        }
        redirect('login');
    }
    public function get_amount()
    {
        $option = $this->input->post('option');
        $plan_id = $this->input->post('plan_id');
        $get_plan = $this->Plan_model->get_timeframe_amount($plan_id, $option);
        $data = array(
            'amount' => $get_plan->amount,
            'timeframe_id' => $get_plan->id,
            'timeframe' => $get_plan->timeframe,
        );
        $this->session->set_userdata('timeframe_details', $data);

        echo '<input id="amount_dis" type="text" class="form-control" name="amount_dis" placeholder="Amount"
            disabled="" value="' . $get_plan->amount . '" required>';

    }
}
