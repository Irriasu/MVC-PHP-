<?php


abstract class Controller {
    public function __construct(string $model) {
        include_once(ROOT."Models/".$model.'.php');
        
    }

    public function view($dir,$fichier,$data=null) {

        include_once ROOT.'Views/'.$dir."/$fichier.php";
        
    }

    public function Redirect($path) {
        header("Location:".$path);
    }

    abstract public function index();
    
    abstract public function show($id);
    abstract public function create();
    abstract public function store ($request);
    abstract public function edit($id);
    abstract public function update($id, $request);
    abstract public function destroy($id);




    }

?>