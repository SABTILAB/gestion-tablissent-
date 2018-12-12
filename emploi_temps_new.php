<?php
require 'the_side_bar.php';
require 'ancien/connexion.php';
//rechercher des villes
$sth = $pdo->prepare("select * from ville");
$sth->execute();

//recherche des campus
$sth2 = $pdo->prepare("select * from campus2");
$sth2->execute();

//recherche des filieres
$sth3 = $pdo->prepare("select * from programmes2");
$sth3->execute();

//recherches des etudiants
$sth4 = $pdo->prepare("select * from etudiants");
$sth4->execute();

//recherche heures
$sth5 = $pdo->prepare("select * from emploitemp");
$sth5->execute();
//recherche jour semaine

//recherche salle de cours


/* Récupération de toutes les lignes d'un jeu de résultats */
$ville = $sth->fetchAll();
$campus = $sth2->fetchAll();
$filiere = $sth3->fetchAll();
$etudiants = $sth4->fetchAll();
$heures = $sth5->fetchAll();
?>
<div class="page-container">
<?php

require  'the_header.php';
?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong>Creer un nouvel emploi du temps</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="emploi_temps_moteur.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Utilisateur</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">e.yannick@gmail.com</p>
                                            <input type="hidden" value="e.yannick@gmail.com" name="email">
                                            <small class="help-block form-text">Utilisateur actuellement connecté</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ville</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="ville" id="select" class="form-control" required>
                                                <option value="0">Selectionner la ville du campus</option>
                                                <?php foreach ($ville as $v)  {?>
                                                <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="help-block form-text">Selectionner le campus concerné</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Campus</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="campus" id="select" class="form-control" required>
                                                <option value="0">Selectionner le campus</option>
                                                <?php foreach ($campus as $c)  {?>
                                                    <option value="<?php echo $c['code']; ?>"><?php echo $c['nom']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="help-block form-text">Selectionner le campus concerné</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Filiere</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="filiere" id="select" class="form-control" required>
                                                <option value="0">Selectionner une filiere</option>
                                                <?php foreach ($filiere as $f)  {?>
                                                    <option value="<?php echo $f['code_programmes']; ?>"><?php echo $f['nom_programmes']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                   <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">tranches horaire</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="heures" id="select" class="form-control" required>
                                                <option>selectionner une tranche horaire</option>
                                                <option value="0">08-11h</option>
                                                <option value="0">12h-15h</option>
                                                <option value="0">15h-18h</option>
                                                <option value="0">18-21h</option>
                                                <?php foreach ($heures as $h)  {?>
                                                    <option value="<?php echo $f['emploitemp']; ?>"><?php echo $h['heures']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Etudiants</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="etudiants" id="select" class="form-control" required>
                                                <option value="0">Selectionner un etudiant</option>
                                                <?php foreach ($etudiants as $et)  {?>
                                                    <option value="<?php echo $f['etudiants']; ?>"><?php echo $f['nom_etudiants']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Date début</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="email-input" name="debut" placeholder="Date début" class="form-control" required>
                                            <small class="help-block form-text">Sélectionner la date de début</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Date fin</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="email-input" name="fin" placeholder="Date début" class="form-control" required>
                                            <small class="help-block form-text">Selectionner la date de fin</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Jour de la semaine</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="jour" id="select" class="form-control" required>
                                                <option value="0">Selectionner un jour de la semaine</option>
                                                <option value="1">Lundi</option>
                                                <option value="2">Mardi</option>
                                                <option value="3">Mercredi</option>
                                                <option value="4">Jeudi</option>
                                                <option value="5">Vendredi</option>
                                                <option value="6">Samedi</option>
                                            </select>
                                            <small class="help-block form-text">Selectionner le jour ou le cours sera dispenssé</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Salle de cours</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="salle" id="select" class="form-control" required>
                                                <option value="0">Selectionner la salle de cours</option>
                                                <option value="1">Laboratoire</option>
                                                <option value="2">Salle 101</option>
                                                <option value="3">Salle 202</option>
                                                <option value="3">Salle 204</option>
                                            </select>
                                            <small class="help-block form-text">Selectionner la salle ou le cours sera dispensé</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Cours</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="cours" id="select" class="form-control" required>
                                                <option value="0">Selectionner le cours à programmer</option>
                                                <option value="Francais">Francais</option>
                                                <option value="Anglais">Anglais</option>
                                                <option value="BD">Base de données</option>
                                                <option value="Algo">Algorithmie et programmation</option>
                                            </select>
                                            <small class="help-block form-text">Le cours qui sera dispensé</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Enseignant</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="enseignant" id="select" class="form-control" required>
                                                <option value="0">Selectionner l'enseignant</option>
                                                <option value="05I022">MVONDO Yannick</option>
                                                <option value="06I235">OYONO Serge P.</option>
                                                <option value="14U52A">Eyinga yannick</option>
                                            </select>
                                            <small class="help-block form-text">L'enseignant qui dispensera le cours selectionné</small>
                                        </div>
                                    </div>
                                    <!--div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control">
                                            <small class="help-block form-text">Please enter a complex password</small>
                                        </div>
                                    </div -->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="disabled-input" class=" form-control-label">Code emploi du temps</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="disabled-input" value="<?php echo rand(10, 99999000); ?>" name="code"  disabled="" class="form-control" required>
                                            <input type="hidden" name="c" value="<?php echo rand(10, 999999000); ?>">
                                            <small class="help-block form-text">Le code emploi du temps permet de rendre un emploi du temps unique</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Commentaire</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="comment" id="textarea-input" rows="9" placeholder="Commentaire supplementaire..." class="form-control"></textarea>
                                            <small class="help-block form-text">S'il ya des commentaires supplementaires a ajouter</small>
                                        </div>
                                    </div>
                                    <!-- div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="select" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="selectLg" class=" form-control-label">Select Large</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectLg" id="selectLg" class="form-control-lg form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="selectSm" class=" form-control-label">Select Small</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                                <option value="4">Option #4</option>
                                                <option value="5">Option #5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="disabledSelect" class=" form-control-label">Disabled Select</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="multiple-select" class=" form-control-label">Multiple select</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                                <option value="4">Option #4</option>
                                                <option value="5">Option #5</option>
                                                <option value="6">Option #6</option>
                                                <option value="7">Option #7</option>
                                                <option value="8">Option #8</option>
                                                <option value="9">Option #9</option>
                                                <option value="10">Option #10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Radios</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Option 1
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Option 2
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio3" class="form-check-label ">
                                                        <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Option 3
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Inline Radios</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">One
                                                </label>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input">Two
                                                </label>
                                                <label for="inline-radio3" class="form-check-label ">
                                                    <input type="radio" id="inline-radio3" name="inline-radios" value="option3" class="form-check-input">Three
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Checkboxes</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label for="checkbox2" class="form-check-label ">
                                                        <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Option 2
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label for="checkbox3" class="form-check-label ">
                                                        <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Option 3
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Inline Checkboxes</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input">One
                                                </label>
                                                <label for="inline-checkbox2" class="form-check-label ">
                                                    <input type="checkbox" id="inline-checkbox2" name="inline-checkbox2" value="option2" class="form-check-input">Two
                                                </label>
                                                <label for="inline-checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3" value="option3" class="form-check-input">Three
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">File input</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="file-input" class="form-control-file">
                                        </div>
                                    </div -->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-multiple-input" class=" form-control-label">Joindre des fichiers</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file">
                                            <small class="help-block form-text">Vous pouvez joindre un ou plusieurs fichiers</small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" value="Creer emploi du temps" class="btn btn-primary btn-sm">
                                        <input value="Réinitialiser" type="reset" class="btn btn-danger btn-sm">
                                        <a href="emploi_temps.php" class="btn btn-danger btn-sm">Annuler</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- div class="card">
                            <div class="card-header">
                                <strong>Inline</strong> Form
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-inline">
                                    <div class="form-group">
                                        <label for="exampleInputName2" class="pr-1  form-control-label">Name</label>
                                        <input type="text" id="exampleInputName2" placeholder="Jane Doe" required="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2" class="px-1  form-control-label">Email</label>
                                        <input type="email" id="exampleInputEmail2" placeholder="jane.doe@example.com" required="" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require 'the_footer.php';
?>