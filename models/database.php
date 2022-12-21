<?php
namespace models;
abstract class database{
private $username="root";
private $password="";
private $server="localhost";

  protected function connectdata()
  {
  try {
       $conn = new PDO("mysql:host=$server;dbname=serge", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       echo "Connected successfully";
       return $conn;
      } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }

  }
  protected function SendData($request,array $data)
  {
    try{
    $connection=$this->connectdata();
    $requette = $connection->prepare($request);
    $requette->execute($data);
    }catch (\PDOException $e) {
      return " Une erreur est retrouvée : " . $e->getMessage();
    }
  }
  protected function GetData($request,array $data)
  {
    try 
    {
      $connection=$this->connectdata();
      $requette=$connection->prepare($request);
      $requette->execute($data);
      return $requette->fetch(\PDO::FETCH_ASSOC);
  
    }catch (\PDOException $e) {
      return " Une erreur est retrouvée : " . $e->getMessage();
    }
  }
  protected function GetManyData($request,array $data)
  {
    $connection=$this->connectdata();
    $requette=$connection->prepare($request);
    $requette->execute($data);
    return$requette->fetchAll(\PDO::FETCH_ASSOC);
  
  }catch (\PDOException $e) {
    return " Une erreur est retrouvée : " . $e->getMessage();
  }

  }

?>
