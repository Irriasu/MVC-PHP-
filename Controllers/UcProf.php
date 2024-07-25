<?php
include_once(ROOT."Controllers/Controller.php");
class UcProf extends Controller{

public function __construct() { 
    parent::__construct('Prof');
}
public function index() { 
    $this->view("prof","index", Prof::All()); }
    
public function create(){
        $this->view("prof","form");
    }

    public function show($id){
        
        $this->view("Prof","show",Prof::find($id));
    }
    
    public function store($request){
        $prof=new Prof();
        $prof->nom=$request->nom;
        $prof->prenom=$request->prenom;
        $prof->specialite=$request->specialite;
        $prof->save();
        $this->redirect("../UcProf");
    }
    
    public function edit($id){
            $this->view("Prof","form",Prof::find($id));
        
    }
    
    public function update($id,$request){
        $prof=Prof::find($id);
        var_dump($request);
        $prof->nom=$request->nom;
        $prof->prenom=$request->prenom;
        $prof->specialite=$request->specialite;
        $prof->save();
        $this->redirect("../../UcProf");
    }
    
    public function destroy($id){
        $prof=Prof::find($id);
        $prof->delete();
        $this->redirect("../../UcProf");
    }


}