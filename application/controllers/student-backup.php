<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('Student_model', 'model');
    }

    
    // show main page
    public function index() {
        
        $data['title'] = "Students Data";

        $config['base_url'] = 'http://localhost:8080/ci-test/index.php/student/index';

        $config["total_rows"] = $this->model->get_count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $config['page_query_string'] = TRUE;

        // bootstrap
        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';        
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';

        $page = (isset($_GET['per_page'])) ? $_GET['per_page'] : 0;

        $this->pagination->initialize($config);


        // $data['students']['created_at'] = date('d F Y', strtotime($data['students']['created_at']));
        $data['students'] = $this->model->get_all($config["per_page"], $page);
        foreach ($data['students'] as $student) {
            $student->birthdate = date('d F Y', strtotime($student->birthdate));
        }

        // echo "<pre>"; 
        // var_dump($this->pagination->create_links()); 
        // die();

        $this->pagination->initialize($config);
        
        $this->load->view('layout/main');
        
        $this->load->view('student/index', $data);

    }


    public function search()
    {
        $search = $this->input->post('search');
        $data['students'] = $this->model->search($search);
    
       $this->load->view('student/search',$data);
    }    


    // show specific data
    public function show($id) {

        $data['student'] = $this->model->get($id);
        $data['title'] = "Student Details";

        // format
        $data['student']->created_at = date('d F Y', strtotime($data['student']->created_at));
        $data['student']->birthdate = date('d F Y', strtotime($data['student']->birthdate));
        $data['student']->phone = $data['student']->phone ? format_phone($data['student']->phone) : '';

        $this->load->view('layout/main');
        $this->load->view('student/show', $data);
        
    }


    // show create data
    public function create() {

        $data['title'] = "Add Student Data";

        $this->load->view('layout/main');
        $this->load->view('student/create', $data);

    }


    // store data to db
    public function store() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if (!$this->form_validation->run()) {

            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('student/create'));
            
        } else {

            $this->model->store();
            $this->session->set_flashdata('success', "Data saved successfully");
            redirect(base_url('student'));
        }

    }


    // show edit data
    public function edit($id) {

        $data['student'] = $this->model->get($id);
        $data['title'] = "Edit Student Data";

        $this->load->view('layout/main');
        $this->load->view('student/edit', $data);
        
    }


    // update data
    public function update($id) {

        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if (!$this->form_validation->run()) {

            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('student/edit/' . $id));
            
        } else {

            $this->model->update($id);
            $this->session->set_flashdata('success', "Data updated successfully");
            redirect(base_url('student'));
        }

    }


    // delete data
    public function delete($id) {

        $item = $this->model->delete($id);

        $this->session->set_flashdata('success', "Data Deleted Successfully");
        redirect(base_url('student'));

    }

}

?>