<?php
namespace Library;

use Library\DatabaseConnection;

class Utilities {
  private $connection;

  public function __construct() {
    $this->connection = new DatabaseConnection("localhost", "root", "", "database");
  }
}