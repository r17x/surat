<?php
	namespace Surat;

	use Surat\Database;
	use PDO;

class Surat extends Database{

	protected $table='surat';
	protected $findParam='id';
	protected $findParamD='id = :id';
	protected $fill = array('nomor','asal','tanggal','perihal','keterangan','jenis');
	public $request;
	public function __construct($request=null){
		parent::__construct();
		$this->setRequest($request);
	}
	public function add(){
		$titik1 = function ($v) { return ":".$v; };
		$values = implode(", ", array_map($titik1, $this->fill));
		$fill = implode(", ", $this->fill);
		$add = $this->db->prepare("INSERT INTO ".$this->table."($fill) VALUES($values)");
		foreach ($this->fill as $key => $value) {
			$add->bindParam(":".$value, $this->request[$value],PDO::PARAM_STR);
		}
		$add->execute();
	}
	public function setRequest($request){
		$this->request=$request;
	}

	public function update(){
		$setval = function($v) { return $v."=:".$v;};
		$values = implode(", ", array_map($setval, $this->fill));
		$edit = $this->db->prepare("UPDATE ".$this->table." set $values WHERE id=:oldid");
		foreach ($this->fill as $key => $value) {
			$edit->bindParam(":".$value, $this->request[$value],PDO::PARAM_STR);
		}
		$edit->bindParam(":oldid", $this->request['oldid'],PDO::PARAM_INT);
		$edit->execute();
	}
	
	public function where($q){
			$data = $this->db->prepare("SELECT * FROM ".$this->table." WHERE jenis = :jenis");
			$data->execute(array(':jenis' => $q));
			return $data->fetchAll(PDO::FETCH_OBJ);
       }
}

