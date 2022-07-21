<?php
if(!empty($_GET)){
    require ('accesBDD.php');
    $id=$_GET['id_vehicule'];
    $employes = deleteVehicule($id);
    header("location:index.php");   
}?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>taxi</title>
</head>
<body>
    <?php require "accesBDD.php" ?>
    <?php include "fonction.php"?>
    <?php include "header.php" ?>
    <?php
    $allVehicule = getAllVehicules();
    ?>

    <main>
        <section class="tableauSection">
            <div class="tableauSide">
                <div class="tableau">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">marque</th>
                        <th scope="col">modele</th>
                        <th scope="col">couleur</th>
                        <th scope="col">immatriculation</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allVehicule as $key => $value) {?>
                            <tr class="table-primary">
                                <td><?php echo $value['id_vehicule']?></td>
                                <td><?php echo $value['marque']?></td>
                                <td><?php echo $value['modele']?></td>
                                <td><?php echo $value['couleur']?></td>
                                <td><?php echo $value['immatriculation']?></td>
                                <td><a href="./modifier.php?id_vehicule=<?= $value['id_vehicule'] ?>&table=vehicule">Modifier</a></td>
                                <td><a href="index.php?id_vehicule=<?= $value['id_vehicule'] ?>&table=vehicule">Delete</a>
                            </tr>    
                            <?php
                        }
                        ?>
                    </tbody>
                    </table>
                </div>
                <?php doubleBr()?>
                <div>
                    <a href="./insertion.php?table=vehicule"><button class="btn btn-primary">Nouvelle insertion</button></a>
                </div>
                
            </div>
        </section>
    </main>
    <?php include "footer.php" ?>
</body>
</html>