<?php

$path = substr($_SERVER['SCRIPT_FILENAME'],0,-9);
define('ROOT', $path);

//Root = C:\xamp\htdocs\class\MVC\
include_once ROOT.'Views/Public/header.php';
include_once ROOT.'Models/Model.php';
include_once ROOT.'Controllers/Controller.php';
$url =explode('/', $_GET['url']);



if($url[0] != ''){
    $controleur = $url[0];
    if(file_exists(ROOT."Controllers/".$controleur.".php"))
    {   

        include_once ROOT.'Controllers/'.$controleur.'.php';
        $id = 0 ;
        $action = "index";
        $inst_controller = new $controleur();
        if(isset($url[1])){
        $action = $url[1];}
        

            if(method_exists($controleur, $action))
            {
                if(isset($url[2])){
                $id=$url[2];}
                
                $request=null;               
                if(!empty($_POST)){
                    $request = new stdClass();
                    foreach($_POST as $key => $value)
                        $request->$key = $value;
                }
                
                if($request != null){
                    
                    if($id != 0)
                    
                        $inst_controller->$action($id,$request);
                        
                        
                    else   
                    
                
                        $inst_controller->$action($request);
                        
                        
                }
                else{
                    if($id != 0)
                    $inst_controller->$action($id);
                       
                    else
                    $inst_controller->$action();
                }
                        
            
                
            }   
            else
            echo"walo";
    
    }
    

    else
    echo "ERROR 404";
 }

    else{
?>
<div class="choix" >
<h1> <button><a href="UcProf">>>Gestion de profs<<</a></button></h1>
<h1> <button><a href="UcEtudiant">>>Gestion des etudiants<<</a></button></h1>
</div>
<?php }
include_once ROOT.'Views/Public/footer.php'; 
?>
