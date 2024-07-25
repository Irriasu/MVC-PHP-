<?php 


 class Request {

    public static function insert($data,$model){
        $req="insert into ".$model." (";
        $keys=$values="";
        foreach ($data as $key=>$value)
        {
            $keys.=$key.',';
            $values.="?,";
        } 
        $keys= substr($keys,0,-1);
        $values=substr($values,0,-1);
            $req.=$keys.') values ('.$values.')';
        return $req;
        //array_values permet de convertir un tableau associatif en un tableau indexé
    }

    public static function update($data,$model){
        $req="update ".$model." set ";
        $critere=" where id=:id";
        foreach($data as $key=>$value)
        if($key!='id')
        $req.=$key."=:$key,";
        $req= substr($req, 0,-1);
        $req.=$critere;
        return $req;
    }


    public static function delete($model){
        $req="delete from ".$model." where id=?";
        return $req;
    }

    public static function selectAll($model){
        $req="select * from ".$model;
        substr($req,0,-1);
        return $req;
    }

    public static function select($model){
        $req="select * from ".$model." where id=:id";
        return $req;
    }

}

?>