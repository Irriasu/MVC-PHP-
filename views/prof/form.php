<section class="form">
    <h1 class="form_title" ><?=$data==null?"Insert":"Update"?> Form</h1>
    <form action="<?=$data==null?"store":"../update/".$data->id?>" method="post">
     <table>
        <tr>   
            <td>Nom:</td>
            <td><input type="text" name="nom" value="<?=$data!=null?$data->nom:""?>"></td>
        </tr>
        <tr>
            <td>Prenom:</td>
            <td><input type="text" name="prenom" value="<?=$data!=null?$data->prenom:""?>"></td>
        </tr>
        <tr>
            <td>specialite:</td>
            <td><input type="text" name="specialite" value="<?=$data!=null?$data->specialite:""?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Envoyer"></td>
            <td><input type="reset" value="Annuler"></td>
        </tr>
     </table> 
    
    </form>
</section>
