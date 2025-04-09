<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'Categoires';
        $this->data['content'] = 'categories/index';
        $this->data['mode'] = isset($_GET['mode']) ? $_GET['mode'] : 'new';
        if (isset($_GET['mode']) && !empty($_GET['mode']) && $_GET['mode'] == 'edit') {
            $category_id = $_GET['id'];
            $category = $this->Handler->get_row('product_categories', ['where' => ['id' => $category_id]]);
            $this->data['category'] = $category;
        }
        $this->load->view('index', $this->data);
    }


    public function AddCategory()
    {
        $data = $this->input->post();
        $name = $data['category_name'];
        $description = $data['category_description'];


        if (empty($name) || empty($description)) {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Please fill in all fields.');
            redirect(URL . 'dashboard/categories');
        } else {
            $insert_data = [
                'category_name' => $name,
                'description' => $description
            ];
            $this->db->insert('product_categories', $insert_data);
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Category added successfully.');
            redirect(URL . 'dashboard/categories');
        }
    }
    public function UpdateCategory()
    {
        $data = $this->input->post();
        $id = $data['category_id'];
        $name = $data['category_name'];
        $description = $data['category_description'];


        if (empty($name) || empty($description)) {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Please fill in all fields.');
            redirect(URL . 'dashboard/categories');
        } else {
            $update_data = [
                'category_name' => $name,
                'description' => $description
            ];
            $this->db->where('id', $id)->update('product_categories', $update_data);
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Category updated successfully.');
            redirect(URL . 'dashboard/categories');
        }
    }


    public function Delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id)->delete('product_categories');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete warehouse.']);
        }
    }
}
