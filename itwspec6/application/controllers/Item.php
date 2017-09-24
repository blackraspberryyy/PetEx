<?php

class Item extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
    }

    public function index() {
        $allItems = $this->item_model->fetch("item_tbl");
        $data = array(
            'title' => "ITEM MANAGEMENT",
            'items' => $allItems,
        );
        $this->load->view('item/includes/header', $data);
        $this->load->view('item/index');
        $this->load->view('item/includes/footer');
    }

    public function fetchalldata() {
        $allItems = $this->item_model->fetch("item_tbl");
        if (!$allItems) {
            echo "No data in the db";
        } else {
            foreach ($allItems as $item) {
                echo $item->item_id . "<br/>";
                echo $item->item_name . "<br/>";
                echo $item->item_desc . "<br/>";
                echo $item->item_price . "<br/>";
            }
        }
    }

    public function populate() {
        $data = array(
            array(
                'item_name' => "Apple",
                'item_desc' => "Red",
                'item_price' => 10,
                'added_at' => time(),
                'updated_at' => time()
            ),
            array(
                'item_name' => "Orange",
                'item_desc' => "Sour",
                'item_price' => 15,
                'added_at' => time(),
                'updated_at' => time(),
            ),
            array(
                'item_name' => "Banana",
                'item_desc' => "Yellow",
                'item_price' => 20,
                'added_at' => time(),
                'updated_at' => time()
            )
        );

        if ($this->item_model->insert("item_tbl", $data)) {
            redirect('item/fetchalldata');
        } else {
            echo "Insert Error";
        }
    }

    public function add() {

        $data = array(
            'title' => "ADD ITEM",
        );
        $this->load->view('item/includes/header', $data);
        $this->load->view('item/add');
        $this->load->view('item/includes/footer');
    }

    public function adddata() {
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_desc' => $this->input->post('item_desc'),
            'item_price' => $this->input->post('item_price'),
            'added_at' => time(),
            'updated_at' => time()
        );

        if ($this->db->insert("item_tbl", $data)) {
            redirect('item/');
        } else {
            echo "Insert Error";
        }
    }

    public function update() {

        $data = array(
            'title' => "EDIT ITEM",
            'items' => $this->item_model->fetch('item_tbl', array('item_id' => $this->uri->segment(3))),
        );
        $this->load->view('item/includes/header', $data);
        $this->load->view('item/edit');
        $this->load->view('item/includes/footer');
    }

    public function updatedata() {
        $item_id = $this->uri->segment(3);

        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_desc' => $this->input->post('item_desc'),
            'item_price' => $this->input->post('item_price'),
            'updated_at' => time()
        );

        $this->item_model->update('item_tbl', $data, array('item_id' => $item_id));
        redirect('item/');
    }

    public function delete() {

        $data = array(
            'title' => "DELETE ITEM",
            'items' => $this->item_model->fetch('item_tbl', array('item_id' => $this->uri->segment(3))),
        );
        $this->load->view('item/includes/header', $data);
        $this->load->view('item/delete');
        $this->load->view('item/includes/footer');
    }

    public function deletedata() {
        $item_id = $this->uri->segment(3);

        $this->item_model->delete('item_tbl', array('item_id' => $item_id));

        redirect('item/');
    }

}
