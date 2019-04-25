<?php
defined('BASEPATH') or exit('No direct script access allowed');

class To_Let extends CI_Controller
{

    public $perpage=10;
    public $forsale=2; 

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Tolet_model', 'Login_model','Filter_model']);
        $this->load->library(array('session', 'pagination','form_validation'));
        $this->load->helper(array('url', 'string'));
    }

     public function index()
    {
        $total_counts = $this->Tolet_model->record_count();
       
        

        $result = $this->Tolet_model->fetch_data($this->perpage, $this->page(),$this->forsale);

        $this->pagination($total_counts,$this->perpage);
        $data=$this->others($result,$total_counts);

        $this->template->load('default', 'to_let', $data);

    }
   
    public function get_subtype()
    {
        $type_id=$this->input->post('type_id');
        $get_sub=$this->Tolet_model->get_subtype($type_id);
        $subtype="";
        foreach($get_sub as $sub){
            $subtype.='
                <option id="subtype">'.$sub->subtype_name.'</option>
            ';

        }
        echo $subtype;
    }


    public function filter(){
        $state=$this->input->post('location');
        if(trim($state)==null){
               $state=0;
        }
        $subtype=$this->input->post('subtype');
        if(trim($subtype)==null){
               $subtype=0;
        }
        $bedroom=$this->input->post('bedroom');
        if(trim($bedroom)==null){
               $bedroom=0;
        }
        $price=$this->input->post('max-price');
        if(trim($price)==null){
               $price=0;
        }
        $data=array(
            'state'=>$state,
            'subtype'=>$subtype,
            'bedroom'=>$bedroom,
            'price'=>$price
        );
       
        if(!$this->only_one_is_active($state,$subtype,$bedroom,$price)==false){

           
            $get=$this->only_one_is_active($state,$subtype,$bedroom,$price);

            $result=$get['result'];
            $total_counts=$get['total_counts'];
            $this->pagination($total_counts,$this->perpage);
            $data=$this->others($result,$total_counts);
            $this->template->load('default', 'to_let', $data);
            //var_dump($total_counts);
           // echo 'yes';
           
        }

          
       

        elseif(!$this->only_two_are_active($state,$subtype,$bedroom,$price)==false){


            $get=$this->only_two_are_active($state,$subtype,$bedroom,$price);

            $result=$get['result'];
            $total_counts=$get['total_counts'];
            $this->pagination($total_counts,$this->perpage);
            $data=$this->others($result,$total_counts);

            $this->template->load('default', 'to_let', $data);

            


        }


        elseif(!$this->only_three_are_active($state,$subtype,$bedroom,$price)==false){


            $get=$this->only_three_are_active($state,$subtype,$bedroom,$price);

            $result=$get['result'];
            $total_counts=$get['total_counts'];

            $this->pagination($total_counts,$this->perpage);
            $data=$this->others($result,$total_counts);

            $this->template->load('default', 'to_let', $data);



        }

        elseif(!$this->the_four_are_active($state,$subtype,$bedroom,$price)==false){

            $get=$this->the_four_are_active($state,$subtype,$bedroom,$price);

            $result=$get['result'];
            $total_counts=$get['total_counts'];
            $this->pagination($total_counts,$this->perpage);
            $data=$this->others($result,$total_counts);

            $this->template->load('default', 'to_let', $data);


        }
       
        

    }

    public function only_one_is_active($state,$subtype,$bedroom,$price){

        //only state is active
        if(!$state=='0' && $subtype=='0' && $bedroom=='0' && $price=='0'){

            $total_counts = $this->Filter_model->count_just_state($state,$this->forsale);
            $result=$this->Filter_model->filter_state($this->perpage,$this->page(),$state,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;
            
        }
        //only subtype is active
        elseif(!$subtype=='0' && $state=='0' &&  $bedroom=='0' && $price=='0'){

            $total_counts = $this->Filter_model->count_just_subtype($subtype,$this->forsale);
            $result=$this->Filter_model->filter_subtype($this->perpage,$this->page(),$subtype,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

        }
        //only bedroom is active
        elseif( !$bedroom=='0' && $subtype=='0' && $state=='0'  &&  $price=='0'){

            $total_counts = $this->Filter_model->count_just_bedroom($bedroom,$this->forsale);
            $result=$this->Filter_model->filter_bedroom($this->perpage,$this->page(),$bedroom,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

        }
        //only price is active
        elseif($state=='0' && $subtype=='0' && $bedroom=='0' && !$price=='0'){

            $total_counts = $this->Filter_model->count_just_price($price,$this->forsale);
            $result=$this->Filter_model->filter_price($this->perpage,$this->page(),$price,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

        }

        else{
            return false;
        }


       // $only_one=$this->Tolet_model->active_one($state,$subtype,$bedroom,$price);

        

    }

    public function only_two_are_active($st,$su,$be,$pr){
        //State and Subtypte are active
        if(!$st=='0' && !$su=='0' && $be=='0' && $pr=='0'){
            $total_counts = $this->Filter_model->count_just_state_subtype($st,$su,$this->forsale);
            $result=$this->Filter_model->filter_state_subtype($this->perpage,$this->page(),$st,$su,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

            
        }

        //State and Bedroom are active
        elseif(!$st=='0' && $su=='0' && !$be=='0' && $pr=='0'){

            $total_counts = $this->Filter_model->count_just_state_bedroom($st,$be,$this->forsale);
            $result=$this->Filter_model->filter_state_bedroom($this->perpage,$this->page(),$st,$be,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

            
        }
        //State and Price are active
        elseif(!$st=='0' && $su=='0' && $be=='0' && !$pr=='0'){

            $total_counts = $this->Filter_model->count_just_state_price($st,$pr,$this->forsale);
            $result=$this->Filter_model->filter_state_price($this->perpage,$this->page(),$st,$pr,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

            
        }

        //Subtype and Bedroom are active
        elseif($st=='0' && !$su=='0' && !$be=='0' && $pr=='0'){

            $total_counts = $this->Filter_model->count_just_subtype_bedroom($su,$be,$this->forsale);
            $result=$this->Filter_model->filter_subtype_bedroom($this->perpage,$this->page(),$su,$be,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

            
        }

        //Subtype and Price are acitve
        elseif($st=='0' && !$su=='0' && $be=='0' && !$pr=='0'){

            $total_counts = $this->Filter_model->count_just_subtype_price($su,$pr,$this->forsale);
            $result=$this->Filter_model->filter_subtype_price($this->perpage,$this->page(),$su,$pr,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

            
        }

        //Bedroom and Price are Active

        elseif($st=='0' && $su=='0' && !$be=='0' && !$pr=='0'){

            $total_counts = $this->Filter_model->count_just_bedroom_price($be,$pr,$this->forsale);
            $result=$this->Filter_model->filter_bedroom_price($this->perpage,$this->page(),$be,$pr,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

            
        }
        else{
            return false;
        }

    }

    public function only_three_are_active($st,$su,$be,$pr){

        //State Subtype and Bedroom are active
        if(!$st=='0' && !$su=='0' && !$be=='0' && $pr=='0'){

            $total_counts = $this->Filter_model->count_just_state_subtype_bedroom($st,$su,$be,$this->forsale);
            $result=$this->Filter_model->filter_state_subtype_bedroom($this->perpage,$this->page(),$st,$su,$be,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;


        }

        //State Subtype and Price are Active
        elseif(!$st=='0' && !$su=='0' && !$pr=='0' && $be=='0' ){

            $total_counts = $this->Filter_model->count_just_state_subtype_price($st,$su,$pr,$this->forsale);
            $result=$this->Filter_model->filter_state_subtype_price($this->perpage,$this->page(),$st,$su,$pr,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

        }

        //Subtype Bedroom and Price are active
        elseif(!$st=='0' && !$su=='0' && !$pr=='0' && $be=='0' ){

            $total_counts = $this->Filter_model->count_just_subtype_bedroom_price($su,$be,$pr,$this->forsale);
            $result=$this->Filter_model->filter_subtype_bedroom_price($this->perpage,$this->page(),$su,$be,$pr,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

        }
        // bedroom Price and State are Active
        elseif(!$st=='0' && !$su=='0' && !$pr=='0' && $be=='0'){

            $total_counts = $this->Filter_model->count_just_bedroom_price_state($be,$pr,$st,$this->forsale);
            $result=$this->Filter_model->filter_bedroom_price_state($this->perpage,$this->page(),$be,$pr,$st,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;

        }
        else{
            return false;
        }


    }

    public function the_four_are_active($st,$su,$be,$pr){
        //All the four are active
        if(!$st=='0' && !$su=='0' && !$be=='0' && !$pr=='0'){
            $total_counts = $this->Filter_model->count_just_state_subtype_bedroom_price($st,$su,$be,$pr,$this->forsale);
            $result=$this->Filter_model->filter_state_subtype_bedroom_price($this->perpage,$this->page(),$st,$su,$be,$pr,$this->forsale);

            $data=array(

                 'total_counts'=>$total_counts,
                 'result'=>$result,
            );
            return $data;
          
        }
        else{
            return false;
        }

    }

    public function pagination($total_counts,$perpage){

        $config['total_rows'] = $total_counts;
        $config['per_page'] = $perpage;
        $config['num_links'] = 4;      
        $config['page_query_string'] = TRUE;
        $config['uri_segment'] = 2;

    // If use bootstrap or else remove.
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);
        

    }
    public function page(){
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
        }
        else{
            $page = 1;
        }

        return $page;
    }

    public function others($result,$count){

        //$count=$this->Tolet_model->record_count();
        $forsale_state=$this->Tolet_model->get_tolet_state();
        $type=$this->Tolet_model->get_type();
        $states=$this->Tolet_model->get_state();
        // $recent=$this->Tolet_model->get_recent();
        $links= $this->pagination->create_links();

        $data = array(

            'title' => 'To Let',
            'state_data'=> $states,
            'state'=> $forsale_state,
            'type_data'=>$type,
            'count'=>$count,
            // 'recent_data'=>$recent,
            'links'=>$links,
            'results'=>$result,
        );
         return $data;

    }
}