<?php

class Draw extends CI_Controller{
    public function honeycomb(){
      $row['row'] = $this->uri->segment("3");
      $col['col'] = $this->uri->segment("4");
      $this->load->view("draw/includes/header",$row);
      $this->load->view("draw/honeycomb",$col);
      $this->load->view("draw/includes/footer");
    }
    public function hourglass(){
      $number['number'] = $this->uri->segment("3");
      $this->load->view("draw/includes/header");
      $this->load->view("draw/hourglass",$number);
      $this->load->view("draw/includes/footer");
    }
}
?>