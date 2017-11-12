<?php

class user_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    function getinfo($table, $where = NULL) {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    function fetchAllLimit($limit, $offset) {
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get("pet"); // Select * from item_tbl;
        return $query->result();
    }

    function countItems() {
        $query = $this->db->get('pet');
        return $query->num_rows();
    }

    public function fetchPetDesc($table, $where = NULL) {

        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('pet_added_at', 'desc');
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function fetchPetAdoptedDesc($table, $where = NULL) {

        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    
    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function update($table, $data, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function delete($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

}
