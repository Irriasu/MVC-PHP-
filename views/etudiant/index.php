<section class="list">
        <h1 class="form_title" >La liste des <span>Etudiants</span></h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Specialite</th>
                <th colspan="2"><a href="UcEtudiant/create">>> Ajouter</a></th>
            </tr>
            <?php
                foreach($data as $etudiant){
            ?>
            <tr>
                <td><?=$etudiant['id']?></td>
                <td><?=$etudiant['nom']?></td>
                <td><?=$etudiant['prenom']?></td>
                <td><?=$etudiant['specialite']?></td>
                <td><a href="UcEtudiant/destroy/<?=$etudiant['id']?>">Delete</a></td>
                <td><a href="UcEtudiant/edit/<?=$etudiant['id']?>">Edit</a></td>
                <td><a href="UcEtudiant/show/<?=$etudiant['id']?>">Show</a></td>
            </tr>
            <?php } ?>
        </table>
</section>