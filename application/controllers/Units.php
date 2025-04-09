<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Units extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'Units';
        $this->data['content'] = 'units/index';
        $this->data['mode'] = isset($_GET['mode']) ? $_GET['mode'] : 'new';

        if (isset($_GET['mode']) && !empty($_GET['mode']) && $_GET['mode'] == 'edit') {
            $unit_id = $_GET['id'];
            $unit = $this->Handler->get_row('units', ['where' => ['id' => $unit_id]]);
            $this->data['unit'] = $unit;
        }

        $this->load->view('index', $this->data);
    }


    public function AddUnit()
    {
        $data = $this->input->post();

        $arr = [
            'unit_name' => $data['unit_name'],
            'category_id' => $data['category'],
            'is_base' => $data['is_base'] ?? 0,
            'qty_per_unit' => $data['qty_per_unit'],
            'qty_unit' => $data['master_unit'] ?? null,
        ];

        $insert = $this->db->insert('units', $arr);
        if ($insert) {
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Unit added successfully.');
            redirect(URL . 'dashboard/units');
        } else {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Failed to add unit. Please try again.');
            redirect(URL . 'dashboard/units');
        }
    }


    public function UpdateUnit()
    {
        $data = $this->input->post();
        $arr = [
            'unit_name' => $data['unit_name'],
            'category_id' => $data['category'],
            'is_base' => $data['is_base'] ?? 0,
            'qty_per_unit' => $data['qty_per_unit'],
            'qty_unit' => $data['master_unit'] ?? null,
        ];

        $update = $this->db->where('id', $data['unit_id'])->update('units', $arr);
        if ($update) {
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Unit updated successfully.');
            redirect(URL . 'dashboard/units');
        } else {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Failed to update unit. Please try again.');
            redirect(URL . 'dashboard/units');
        }
    }


    public function Delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id)->delete('units');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete warehouse.']);
        }
    }
}
