<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Contacts extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'Contacts';
        $this->data['content'] = 'contacts/index';
        $this->data['mode'] = isset($_GET['mode']) ? $_GET['mode'] : 'new';
        $this->data['contacts'] = $this->Handler->get_all('customers', ['order_column' => 'first_name', 'order_by' => 'asc']);
        if (isset($_GET['mode']) && !empty($_GET['mode'])) {
            $id = $_GET['id'];
            $this->data['contact'] = $this->Handler->get_single('customers', ['id' => $id]);
        }

        $this->load->view('index', $this->data);
    }


    public function addContact()
    {
        $data = $this->input->post();

        $arr = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip_code' => $data['zip_code'],
            'country' => $data['country'],
            'loyalty_points' => 0
        ];

        $insert = $this->db->insert('customers', $arr);
        if ($insert) {
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Contact added successfully.');
            redirect(URL . 'dashboard/contacts');
        } else {
            $this->session->flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Failed to add customer!');
            redirect(URL . 'dashboard/contacts');
        }
    }

    public function UpdateContact()
    {
        $data = $this->input->post();
        $arr = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip_code' => $data['zip_code'],
            'country' => $data['country'],
        ];
        $update = $this->db->where('id', $data['id'])->update('customers', $arr);
        if ($update) {
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Contact updated successfully.');
            redirect(URL . 'dashboard/contacts');
        } else {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Failed to update customer!');
            redirect(URL . 'dashboard/contacts');
        }
    }


    public function FetchContact($id)
    {
        $customer = $this->Handler->get_row('customers', ['where' => ['id' => $id]]);
        if ($customer) {
            echo json_encode(['status' => 'success', 'message' => 'Customer Fetched successfully.', 'data' => $customer]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to Fetche customer!']);
        }
    }

    public function Delete()
    {
        $id = $this->input->post('id');
        $delete = $this->db->delete('customers', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => 'success', 'message' => 'Customer deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete customer!']);
        }
    }
}
