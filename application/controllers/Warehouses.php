<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Warehouses extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'Warehouses';
        $this->data['content'] = 'warehouses/index';
        $this->data['mode'] = isset($_GET['mode']) ? $_GET['mode'] : 'new';
        if (isset($_GET['mode']) && !empty($_GET['mode']) && $_GET['mode'] == 'edit') {
            $warehouse_id = $_GET['id'];
            $warehouse = $this->Handler->get_row('warehouses', ['where' => ['id' => $warehouse_id]]);
            $this->data['warehouse'] = $warehouse;
        }
        $this->load->view('index', $this->data);
    }


    public function AddWarehouse()
    {
        $data = $this->input->post();
        $name = $data['warehouse_name'];
        $location = $data['warehouse_location'];


        if (empty($name) || empty($location)) {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Please fill in all fields.');
            redirect(URL . 'dashboard/warehouses');
        } else {
            $insert_data = [
                'name' => $name,
                'location' => $location
            ];
            $this->db->insert('warehouses', $insert_data);
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Warehouse added successfully.');
            redirect(URL . 'dashboard/warehouses');
        }
    }
    public function UpdateWarehouse()
    {
        $data = $this->input->post();
        $id = $data['warehouse_id'];
        $name = $data['warehouse_name'];
        $location = $data['warehouse_location'];
        if (empty($name) || empty($location)) {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Please fill in all fields.');
            redirect(URL . 'dashboard/warehouses');
        } else {
            $update_data = [
                'name' => $name,
                'location' => $location
            ];
            $this->db->where('id', $id)->update('warehouses', $update_data);
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Warehouse updated successfully.');
            redirect(URL . 'dashboard/warehouses');
        }
    }


    public function Delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id)->delete('warehouses');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Warehouse deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete warehouse.']);
        }
    }
}
