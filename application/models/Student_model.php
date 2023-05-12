<?php


class Student_model extends CI_Model {

    public function __construct() {

        $this->load->database();
    }


    // get data
    public function get_all($limit, $start,$search) {

        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->from('mahasiswa');
        
        if($search){
            $this->db->like('name', $search);
            $this->db->or_like('nim', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('gender', $search);
        }
        $query = $this->db->get();
        return $query->result();
    }


    public function search($search)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->like('name', $search);
        $this->db->or_like('nim', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('gender', $search);
        $query = $this->db->get();
        return $query->result();
    }
    

    // count total number of students
    public function get_count_all() {
        return $this->db->count_all('mahasiswa');
    }


    // store data
    public function store() {

        $data = [
            'nim' => $this->input->post('nim'),
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'birthdate' => $this->input->post('birthdate'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        ];

        $result = $this->db->insert('mahasiswa', $data);
        return $result;
    }


    // get specific data
    public function get($id) {

        $student = $this->db->get_where('mahasiswa', ['id' => $id])->row();
        return $student;
    }


    // update data
    public function update($id) {

        $data = [
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'birthdate' => $this->input->post('birthdate'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        ];

        $result = $this->db->where('id', $id)->update('mahasiswa', $data);
        return $result;
    }

    
    // delete data
    public function delete($id) {

        $result = $this->db->delete('mahasiswa', array('id' => $id));
        return $result;
    }
}

?>