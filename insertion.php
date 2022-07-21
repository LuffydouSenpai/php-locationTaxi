<?php
$table=$_GET['table'];
if($table == "vehicule"){
   require ('accesBDD.php');

    $errorMarque =null;
    $errorModele =null;
    $errorCouleur =null;
    $errorImmatriculation =null;

    if(isset($_POST['send'])){
    
        $nbrError =0;
        $marque = strip_tags($_POST['marque']);
        $modele = strip_tags($_POST['modele']);
        $couleur = strip_tags($_POST['couleur']);
        $immatriculation = strip_tags($_POST['immatriculation']);
        

        if(empty($marque)){
            $errorMarque.="<p>Le champ marque ne doit pas etre vide</p>";
            $nbrError++;
        }elseif((strlen($marque) <2) || (strlen($marque) > 15)){
            $errorMarque.="<p>la marque doit etre compris entre 2 et 15</p>";
            $nbrError++;
        }

        if(empty($modele)){
            $errorModele.="<p>Le champ modele ne doit pas etre vide</p>";
            $nbrError++;
        }elseif((strlen($modele) <2) || (strlen($modele) > 15)){
            $errorModele.="<p>la marque doit etre compris entre 2 et 15</p>";
            $nbrError++;
        }

        if(empty($couleur)){
            $errorCouleur.="<p>Le champ couleur ne doit pas etre vide</p>";
            $nbrError++;
        }elseif((strlen($couleur) <2) || (strlen($couleur) > 15)){
            $errorCouleur.="<p>la couleur doit etre compris entre 2 et 15</p>";
            $nbrError++;
        }

        if(empty($immatriculation)){
            $errorImmatriculation.="<p>Le champ immatriculation ne doit pas etre vide</p>";
            $nbrError++;
        }elseif(!preg_match(' #^[A-Z]{2}\-[0-9]{3}\-[A-Z]{2}$# ',$immatriculation)){
            $errorImmatriculation.="<p>Le champ immatriculation n'est pas valide</p>";
            $nbrError++;
            }

        if($nbrError===0){
            setVehicule($_POST['marque'],$_POST['modele'],$_POST['couleur'],$_POST['immatriculation']); 
        }    
    }
    function erreur($error){
        if(!empty($error)){
        ?>
            <div class="alert alert-dismissible alert-warning mt-3">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <h4 class="alert-heading">Warning!</h4>
                <?php echo $error ?>
            </div>
        <?php
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>
    <?php include "fonction.php"?>
    <?php include "header.php"?>
<main>
    <section class="formulaireSection">
        <div class="formulaireSide">

            <form action="" method="POST" class="formu">
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="marque" name="marque" required="required">
                    <label for="floatingInput">Marque</label>
                    <?php erreur($errorMarque) ?>
                </div>
                <?php simpleBr() ?>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="modele" name="modele" required="required">
                    <label for="floatingInput">Modele</label>
                    <?php erreur($errorModele) ?>
                </div>
                <?php simpleBr() ?>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="couleur" name="couleur" required="required">
                    <label for="floatingInput">Couleur</label>
                    <?php erreur($errorCouleur) ?>
                </div>
                <?php simpleBr() ?>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="immatriculation" name="immatriculation" required="required">
                    <label for="floatingInput">Immatriculation</label>
                    <?php erreur($errorImmatriculation) ?>
                </div>
                <?php simpleBr()?>
                <div>
                    <button type="submit" class="btn btn-primary" name='send'>Submit</button>
                    <button type="reset" class="btn btn-primary" name='reset'>Reset</button>
                </div>
            </form>
            <?php doubleBr()?>
            <div class="lienVersIndex">
                <a href="./index.php"><button class="btn btn-primary">Retour</button></a>
            </div>            
        </div>
    </section>
</main>
<?php include "footer.php"?>    
</body>
</html> 

<style>
    .lienVersIndex{
        width: 100%;
        display: flex;
        justify-content: center;

    }

    .formulaireSection{
        background-color: rgb(155, 76, 230);
        padding-top: 2rem;
        padding-bottom: 5rem;
    }

    .formu{
        width: 80%;
        margin: 0 auto;
    }

    .bouton{
        display: flex;
        justify-content: space-between;
    }

</style>
<?php
}elseif($table == ""){
/*     require ('accesBDD.php');

    if(isset($_POST['send'])){
        setAbonne($_POST['prenom'],$_POST['nom'],$_POST['email']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
        <link rel="stylesheet" href="/style.css">
        <title>Document</title>
    </head>
    <body>
        <?php include "fonction.php"?>
        <?php include "header.php"?>
        <?php
        doubleBr();
    
        ?>
    
    <main>
    <!-- formulaire d'insertion nom prenom service .... -->
        <form action="" method="post">
    
            <div class="form-floating">
            <input type="text" class="form-control" placeholder="prenom" name="prenom" required="required">
            <label for="floatingInput">Prenom</label>
            </div>
    
            <div class="form-floating">
            <input type="text" class="form-control" placeholder="nom" name="nom" required="required">
            <label for="floatingInput">Nom</label>
            </div>
        
            <div class="form-floating">
            <input type="text" class="form-control" placeholder="email" name="email" required="required">
            <label for="floatingInput">Email</label>
            </div>
            </div>
            <button type="submit" class="btn btn-primary" name='send'>Submit</button>
            <button type="reset" class="btn btn-primary" name='reset'>Reset</button>
        </form>
        <?php doubleBr()?>
        <a href="./index.php">aller a index.php</a>
    </main>
    
    <?php
        doubleBr();
    
    ?>
    
    <?php include "footer.php"?>    
    </body>
    </html>
<?php */  
}
?>

