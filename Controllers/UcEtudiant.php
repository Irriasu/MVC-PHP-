<?php
include_once(ROOT."Controllers/Controller.php");
class UcEtudiant extends Controller{

public function __construct() { 
    parent::__construct('Etudiant');
}
public function index() { 
    $this->view("Etudiant","index", Etudiant::All()); }
    
public function create(){
        $this->view("Etudiant","form");
    }

    public function show($id){
        
        $this->view("Etudiant","show",Etudiant::find($id));
    }
    
    public function store($request){
        $etudiant=new Etudiant();
        $etudiant->nom=$request->nom;
        $etudiant->prenom=$request->prenom;
        $etudiant->specialite=$request->specialite;
        $etudiant->save();
        $this->redirect("../UcEtudiant");
    }
    
    public function edit($id){
            $this->view("Etudiant","form",Etudiant::find($id));
        
    }
    
    public function update($id,$request){
        $etudiant=Etudiant::find($id);
        var_dump($request);
        $etudiant->nom=$request->nom;
        $etudiant->prenom=$request->prenom;
        $etudiant->specialite=$request->specialite;
        $etudiant->save();
        $this->redirect("../../UcEtudiant");
    }
    
    public function destroy($id){
        $etudiant=Etudiant::find($id);
        $etudiant->delete();
        $this->redirect("../../UcEtudiant");
    }


}