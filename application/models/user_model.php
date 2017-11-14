<?php

class user_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function emailAvailability($email) {
        $this->db->where('user_email', $email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            Return true;
        } else {
            Return false;
        }
    }

    public function usernameAvailability($username) {
        $this->db->where('user_username', $username);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            Return true;
        } else {
            Return false;
        }
    }

    public function fetchFieldDistinct($table, $field = NULL, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($field)) {
            $this->db->select($field);
        }
        $this->db->distinct();
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function fetchField($table, $field, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->select($field);
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function fetchjoin($table, $join = NULL, $on = NULL, $where = NULL) {
        //$on must be array('pet.user_id = user.user_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function fetchjointhree($table, $join = NULL, $on = NULL, $join2 = NULL, $on2 = NULL, $where = NULL) {
        //$on must be array('pet.user_id = user.user_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        if (!(empty($join2) || empty($on2))) {
            $this->db->join($join2, $on2, "left outer");
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

    public function fetchJoinThreeAdoptedDesc($table, $join = NULL, $on = NULL, $join2 = NULL, $on2 = NULL, $where = NULL) {
        //$on must be array('pet.user_id = user.user_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        if (!(empty($join2) || empty($on2))) {
            $this->db->join($join2, $on2, "left outer");
        }
        $this->db->order_by('adoption_adopted_at', 'desc');
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
