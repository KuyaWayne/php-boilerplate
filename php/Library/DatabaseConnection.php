<?php
namespace Library;

use Exception;
use PDO;

class DatabaseConnection {
  private $connection;

  public function __construct($host, $user, $password, $database) {
    try {
      $this->connection = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
    } catch (Exception $exception) {
      echo "Database Connection Error: " . $exception->getMessage();
    }
  }

  public function __destruct() {
    $this->connection = null;
  }

  public function query($sql, $parameters = []) {
    $statement = $this->connection->prepare($sql);

    return $statement->execute($parameters);
  }

  public function getOne($sql, $parameters = []) {
    $statement = $this->connection->prepare($sql);
    $statement->execute($parameters);

    return $statement->fetch();
  }

  public function getAll($sql, $parameters = []) {
    $statement = $this->connection->prepare($sql);
    $statement->execute($parameters);

    return $statement->fetchAll();
  }

  public function getRowCount($sql, $parameters = []) {
    $statement = $this->connection->prepare($sql);
    $statement->execute($parameters);

    return $statement->rowCount();
  }
}
