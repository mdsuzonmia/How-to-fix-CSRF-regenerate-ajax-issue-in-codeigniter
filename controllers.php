<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Controllers extends BaseController
{
    /**
    ** This is default constructor of the class
    **/
    public function __construct(){
        parent::__construct();
        $this->load->model('students_model');
        $this->load->library('session'); 
    }
    

    /**
    ** Get search suggestions result
    **/
    function suggestions(){
        $reponse = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
            );

        $val = $this->input->post('val');

        $html = '';
        $suggestions_object = $this->model->suggestions($val);

        if(!empty($suggestions_object)) {
            foreach ($suggestions_object as $key => $item) { 
                
                if(empty($item->photo)){
                    $img_path = site_url('/uploads').'/default.png';
                }else{
                    $img_path = site_url('/uploads').'/'.$item->photo;
                }

                $html .='<div class="suggestions_list  " >
                    <img src="'.$img_path.'" alt="'.$item->name.'" class="avatar">
                    <span>'.$item->name.'</span>
                </div>';
            }
        }else{
           $html .='<p>Search results do not match try latter</p>';
        }
       
        $reponse['html'] = $html;

        echo json_encode($reponse);
    }

    
}

?>