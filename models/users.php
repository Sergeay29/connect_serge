<?php 
namespace models;
include_once "database.php"
class users extends database
{
    public function Insert(array $data){
        $this->SendData("INSERT INTO `users`(`Nom`, `Prenoms`, `Identifiant`, `Mdp`) VALUES (?,?,?,?)",$data);
    }
}

?>