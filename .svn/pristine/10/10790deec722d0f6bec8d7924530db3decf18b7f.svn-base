<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class year_budget_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_year_budget');
    }
    function index()
    {
         $data['getall'] = $this->m_year_budget->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_year_budget',$data,true);
    }
    function insert_year_budget()
    {
         $year_budget_number = $this->input->post('year_budget_number');
         $year_budget_name   = $this->input->post('year_budget_name');
         //check unit number duplicate
         $data['getall'] = $this->m_year_budget->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['year_budget_number'] == $year_budget_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'year_budget_number' => $year_budget_number,
           'year_budget_name'   => $year_budget_name
        );
         $this->m_year_budget->insert_year_budget( $data );
         $data['getall'] = $this->m_year_budget->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_year_budget',$data,true);
    }
    function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('year_budget',array('year_budget_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
    function edit_year_budget()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_year_budget->get_edit($id);
        echo json_encode($get_edit);
    }
    function update_year_budget()
    {
        $year_budget_number1      = $this->input->post('year_budget_number1');
        $year_budget_name1        = $this->input->post('year_budget_name1');
        $year_budget_id1          = $this->input->post('year_budget_id1');
        $ch = $this->m_year_budget->check_dupli($year_budget_number1,$year_budget_id1);
        if($ch == 0)
        {
             $data = array(
               'year_budget_number' => $year_budget_number1,
               'year_budget_name'   => $year_budget_name1
             );
             $this->m_year_budget->update_year_budget($data,$year_budget_id1);
             echo "200";
        }
        else
        {
            echo "300";
        }
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */