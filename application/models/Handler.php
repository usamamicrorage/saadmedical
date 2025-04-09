<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Handler extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function build_query(string $table, array $params)
    {
        $defaults = [
            'columns'      => '*',
            'joins'        => [],
            'where'        => [],
            'or_where'     => [],
            'or_like'      => [],
            'limit'        => null,
            'offset'       => null,
            'order_column' => 'id',
            'order_by'     => 'DESC'
        ];
        $params = array_merge($defaults, $params);

        $this->db->select($params['columns'])->from($table);
        $this->apply_joins($params['joins']);
        $this->apply_conditions($params['where'], 'where');
        $this->apply_conditions($params['or_where'], 'or_where');
        $this->apply_like($params['or_like']);

        if (!empty($params['limit'])) {
            $this->db->limit($params['limit'], $params['offset'] ?? 0);
        }
        if (!empty($params['order_column'])) {
            $this->db->order_by($params['order_column'], $params['order_by']);
        }
    }

    public function get_all(string $table, array $params = [])
    {
        $this->build_query($table, $params);
        $query = $this->db->get();


        if (isset($params['only_count']) && $params['only_count'] == true) {
            return $query->num_rows();
        } else if (isset($params['result_type']) && $params['result_type'] == 'array') {
            return $query->result_array();
        } else {
            return $query->result();
        }
    }

    public function get_row(string $table, array $params = [])
    {
        $this->build_query($table, $params);
        $query = $this->db->get();



        if (isset($params['result_type']) && $params['result_type'] == 'array') {
            return $query->row_array();
        } else {
            return $query->row();
        }
    }

    private function apply_joins(array $joins)
    {
        foreach ($joins as $join) {
            if (count($join) === 3) {
                $this->db->join($join[0], $join[1], $join[2]);
            }
        }
    }

    private function apply_conditions(array $conditions, string $type)
    {
        foreach ($conditions as $column => $value) {
            is_array($value) ? $this->db->{$type . '_in'}($column, $value) : $this->db->{$type}($column, $value);
        }
    }

    private function apply_like(array $or_like)
    {
        foreach ($or_like as $column => $value) {
            $this->db->or_like($column, $value);
        }
    }
}
