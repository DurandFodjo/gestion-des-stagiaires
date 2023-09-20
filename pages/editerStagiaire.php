<?php
    require_once("identifier.php");
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requeteS="select * from stagiaire where idStagiaire=$idS";
    $resultatS=$pdo->query($requeteS);
    $stagiaire=$resultatS->fetch();
    $nom=$stagiaire['nom'];
    $prenom=$stagiaire['prenom'];
    $idFiliere=$stagiaire['idFiliere'];
    $genre=$stagiaire['genre'];
    $nomPhoto=$stagiaire['photo'];

    $requeteF="select * from filiere";
    $resultatF=$pdo->query($requeteF);
?>

<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="UTF-8"> 
        <title>Edition d'un Stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>

            <div class="container">    
        

                <div class="panel panel-primary margetop60">
                    <div class="panel-heading">Edition du Stagiaire</div>
                <div class="panel-body">
                <form method="POST" action="updateStagiaires.php" class="form" enctype="multipart/form-data">
                    
                <div class="form-group">
                        <label for="idS">Id du Stagiaire: <?php echo $idS ?></label>
                        <input type="hidden" name="idS" class="form-control"
                                    value="<?php echo $idS ?>"></input>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom du Stagiaire :</label>
                        <input type="text" name="nom" placeholder="Entrer le nom du stagiaire" class="form-control"
                                    value="<?php echo $nom ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom du Stagiaire :</label>
                        <input type="text" name="prenom" placeholder="Entrer le prenom du stagiaire" class="form-control"
                                    value="<?php echo $prenom ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre :</label>
                        <div class="radio">
                            <label><input type="radio" name="genre" value="F"
                                <?php if($genre==="F") echo "checked" ?>/> F </label><br>
                            <label><input type="radio" name="genre" value="M"
                                <?php if($genre==="M") echo "checked" ?>/> M </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idFiliere">Filiere :</label>
                            <select name="idFiliere" class="form-cntrol" id="idFiliere">
                                <?php while($filiere=$resultatF->fetch()) { ?>
                                    <option value="<?php echo $filiere['idFiliere'] ?>"
                                            <?php if($idFiliere===$filiere['idFiliere']) echo "selected" ?>>
                                        <?php echo $filiere['nonFiliere'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo :</label>
                        <input type="file" name="photo"></input>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>
                        Enregister
                    </button>
                </form>
                </div>
                </div>
            </div>
    </body>
</HTML>