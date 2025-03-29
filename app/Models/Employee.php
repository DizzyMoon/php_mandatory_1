<?php

namespace App\Models;

class Employee {
  public $id;
  public $first_name;
  public $last_name;
  public $email_address;
  public $birth_date;
  public $department_id;

  public function __construct($id, $first_name, $last_name, $email_address, $birth_date, $department_id){
    $this->id = $id;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email_address = $email_address;
    $this->birth_date = $birth_date;
    $this->department_id = $department_id;
  }
}