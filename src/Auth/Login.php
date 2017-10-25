<?php
  namespace Surat\Auth;

  use Surat\Database;
  
  class Login extends Database
  {
    protected $username;
    protected $password;
    protected $request;
    protected $table='users';
	protected $user;
    public function __construct($request)
    {
        parent::__construct();
        $this->request = $this->setUser($request);
        $this->setUser($request);
    }
    public function setUser($request){
      if ($request['username'] && $request['password']) {
        $this->username = $request['username'];
        $this->password = $request['password'];
        return array(
        'username' => $request['username'],
        'password' => md5($request['password']));
      }
    }
    public function checkUser(){
      $user = $this->db->prepare("SELECT * FROM ".$this->table." WHERE username=:username AND password=:password");
      $user->execute($this->request);
      if ($user->rowCount() > 0) {
		$user = $user->fetch();
		unset($user['password']);
		$this->user = (object) $user;
        $this->makeSession();
      }
      else echo "<script>alert('Login Gagal');</script>";
    }

    public function makeSession(){
      foreach ($this->request as $key => $value) {
          $_SESSION[$key] = $value;
      }
      $_SESSION['auth'] = true;
	  $_SESSION['user'] = $this->user;
	  header('Refresh:0');
    }

  }

