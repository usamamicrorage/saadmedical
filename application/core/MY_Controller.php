<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public array $data = [];

    public string $dashboard_view = 'dashboard/index';

    public function __construct()
    {
        parent::__construct();

        $this->data['page'] = $this->dashboard_view;
        $this->data['segments'] = $this->uri->segment_array();

        $this->data['categories'] = $this->Handler->get_all('product_categories', ['order_column' => 'category_name', 'order_by' => 'asc']);

        $this->data['warehouses'] = $this->Handler->get_all('warehouses', ['order_column' => 'name', 'order_by' => 'asc']);

        $this->data['units'] = $this->Handler->get_all(
            'units u',
            [
                'columns' => ['u.id', 'u.unit_name', 'c.category_name', 'u.qty_per_unit', 'm.unit_name AS measure_unit'],
                'order_column' => 'unit_name',
                'order_by' => 'asc',
                'joins' => [
                    ['product_categories c', 'c.id=u.category_id', 'left'],
                    ['units m', 'm.id=u.qty_unit', 'left']
                ]
            ]
        );



        if (!$this->session->userdata('user')) {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'You must be logged in to access this page.');
            $full_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            redirect(URL . '?to=' . $full_url);
        }
    }



    protected function debug($data): void
    {
        echo '<pre>', print_r($data, true), '</pre>';
        exit;
    }
}
