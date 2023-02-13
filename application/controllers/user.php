<?php
class user extends CI_controller{
     function index()
    {
        $this->load->model('usermodel');
       $crud1= $this->usermodel->all();
       $data=array();
       $data['crud1']=$crud1;
        $this->load->view('list',$data);
    }
     function create()
    {
      $this->load->model('usermodel');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        
        if($this->form_validation->run()==false)
        {
            $this->load->view("create");
        }
        else
        {
            // save user in database
            $formArray= array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            //$formArray['created_at']=date('Y-m-d ');

             $this->usermodel->create($formArray);
             $this->session->set_flashdata('success','Record added successfully');
             redirect(base_url().'index.php/user/index');

        }
    }
       function edit($userid)
    {
        $this->load->model('usermodel');
        $crud = $this->usermodel->getUser($userid);
        $data= array();
        $data['crud1']=$crud;
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
         
        if($this->form_validation->run()==false)
        {
            $this->load->view('edit',$data);  
        }
          else
         {
            $formArray = array();
            $formArray['name']= $this->input->post('name');
            $formArray['email']= $this->input->post('email');
            $this->usermodel->updateUser($userid, $formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/user/index');
         }
        }  
         function delete($userid)
        {
            $this->load->model('usermodel');
            $crud= $this->usermodel->getUser($userid);
            if(empty($crud))
            {
                $this->session->set_flashdata('failure','Record not found in database');
                redirect(base_url().'index.php/user/index');
            }
               $this->usermodel->deleteUser($userid);
               $this->session->set_flashdata('success','Record deleted successfully');
              redirect(base_url().'index.php/user/index');
         }
}
?>