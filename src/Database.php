<?php
	namespace Surat;
	use PDO;
	class Database {
		private $db_name = "mysql:host=localhost;dbname=surat;";
		private $username = "root";
		private $password = "";
		public $db;
		public function __construct(){

			try {
				$this->db= new PDO(
								$this->db_name,
								$this->username,
								$this->password
			);
			} catch (Exception $e) {
				echo "Database Connection Error";
				die();	
			}				
		}
		public function getAll(){
			$data = $this->db->prepare("SELECT * FROM ".$this->table);
			$data->execute();
			$data->setFetchMode(PDO::FETCH_OBJ);
			return $data->fetchAll();
		}
		public function find($q){
			$data = $this->db->prepare("SELECT * FROM ".$this->table." WHERE ".$this->findParam." LIKE ?");
			$data->execute(array($q.'%'));
			return $data->fetchAll(PDO::FETCH_OBJ);
		}
		public function first($q){
			$data = $this->db->prepare("SELECT * FROM ".$this->table." WHERE ".$this->findParam." = ?");
			$data->execute(array($q));
			return $data->fetch(PDO::FETCH_OBJ);
		}
		public function delete($q){
			$data = $this->db->prepare("DELETE FROM ".$this->table." WHERE ".$this->findParamD);
			if($data->execute($q)){
				return true;
			}
		}
	}
