<section class="list">
    <h1 class="form_title" >La liste des <span>Profs</span></h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Specialite</th>
            <th colspan="2"><a href="UcProf/create">>> Ajouter</a></th>
        </tr>
        <?php

            foreach($data as $prof){
        ?>
        <tr>
            <td><?=$prof['id']?></td>
            <td><?=$prof['nom']?></td>
            <td><?=$prof['prenom']?></td>
            <td><?=$prof['specialite']?></td>
            <td><a href="UcProf/destroy/<?=$prof['id']?>">Delete</a></td>
            <td><a href="UcProf/edit/<?=$prof['id']?>">Edit</a></td>
            <td><a href="UcProf/show/<?=$prof['id']?>">Show</a></td>
        </tr>
        <?php } ?>
    </table>
</section>