<?php
include_once "Request.php";
abstract class Model{
public $id;
private static $pdo=null;

public function __construct(){
    $env = file(ROOT.".env");
    $server= trim(explode("=", $env[1])[1]);
    $dbname=trim(explode("=", $env[3])[1]);
    $user=trim(explode("=", $env[4])[1]);
    $password=trim(explode("=", $env[5])[1]);
    self::$pdo=new PDO('mysql:host='.$server.';dbname='.$dbname, $user, $password);
    }

public function save(){
    $data=(array) $this;
    var_dump($data); 
    if($this->id==0)
    {
        $stm=self::$pdo->prepare(Request::insert($data,get_class($this)));
        $stm->execute(array_values($data));

    }
    else
    {
        $stm=self::$pdo->prepare(Request::update($data,get_class($this)));
        $stm->execute($data);

    }
    
}

public function delete(){
    $stm=self::$pdo->prepare(Request::delete(get_class($this)));
    $stm->execute([$this->id]);
}

public static function find($id){
    $class=get_called_class();
    $object=new $class();
    $stm=self::$pdo->prepare(Request::select($class));
    $stm->bindValue(':id',$id);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $res=$stm->execute();
    $data=$stm->fetch();
    
    foreach ($data as $key=>$value){
        $object->$key=$value;
        
    }
    return $object;
    
}

public static function all(){
    $class=get_called_class();
    new $class ();
    $stm=self::$pdo->prepare(Request::selectAll($class));
    $stm->setFetchMode(PDO::FETCH_ASSOC); 
    $stm->execute();
    return $stm->fetchAll();
}








}


?>