<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
        <title>Modification</title>
        <link rel="stylesheet" href="./assets/style.css">
        <style>
            .box
            {
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                color: #444;
                width: 650px;
            }
            .back-link
            {
                text-decoration: none;
                color: #000;
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                transition: all .3s ease-out;
            }
            .delete:hover
            {
                text-decoration: underline;
            }
            .title
            {
                border-bottom: 2px solid #444;
                padding: 15px 10px;
                width: 90%;
            }
            .dialog
            {
                padding: 10px 20px 10px 30px;
                box-shadow: 2px 2px 10px #827f7f;
            }
            #dialog
            {
                position: absolute;
                display: none;
                justify-content: center;
                align-items: center;
                width: 100%;
                left: 0;
                top: 0;
                background-color: rgba(0, 0, 20, 0.29);
                height: 100%;
            }
            .main
            {
                padding: 25px 0 0 0;
                display: flex;
                flex-direction: column-reverse;
                justify-content: space-between;
                height: 70%;
            }
            .main button
            {
                border: none;
                padding: 0 35px;
                height: 38px;
                color: #fff;
                border-radius: 50px;
                font-weight: 700;
                font-size: 11px;
            }
            .main .btnBack
            {
                border: 1px solid #000;
                color: #000;
            }
        </style>
    </head>
    <?php
        require_once('./main.php');

        $name = $_GET['name'];
        $code = $_GET['id'];
        $pname = $_GET['pname'];
        $num = $_GET['num'];

        $req = mysqli_query($cnx, "select * from type_client");
    ?>
    <body>
        <?php include_once('./public/header.php'); ?>
        <main>
            <div class="box">
                <form action="sub.php" method="post">
                    <div class="data-table-top">
                        <div>
                            <a href='javascript:history.back(1);' class="back-link" style="color: #000">Clients </a>> Editer
                        </div>
                        <div>
                            <button style="padding: 10px 20px; background-color: transparent; color: #444;" class="delete">Supprimer</button>
                            <button type="submit" name="btnUpdate" style="padding: 10px 20px;">Enregistrer</button>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="field">
                            <div class="text-field">Code</div> <input type="text" name="mat" id="" required placeholder="Client N°" value="<?php echo $code ?>">
                        </div>
                        <div class="field">
                            <div class="text-field">Nom</div> <input type="text" name="name" id="" required placeholder="Nom" value="<?php echo $name ?>">
                        </div>
                        <div class="field">
                            <div class="text-field">Prénom(s)</div> <input type="text" name="pnom" id="" placeholder="Prénom.s" value="<?php echo $pname ?>">
                        </div>
                        <div class="field">
                            <div class="text-field">Contact</div> <input type="tel" name="tel" id="" placeholder="Numéro de téléphone" value="<?php echo $num ?>">
                        </div>
                        <div class="field">
                            <div class="text-field">Type de client </div>
                            <select name="typcli" id="" required>
                                <option value="" disabled selected><span class="hint">Choisis une option</span></option>
                                <?php 
                                    while($res = mysqli_fetch_array($req)) {
                                        echo '<option value="' . $res[0] . '">' . $res[1] . '</option>"';
                                    } 
                                ?>
                            </select>
                            <span class="arrow">></span>
                        </div>
                    </div>
                    <div id="dialog">
                        <div class="dialog box" style="height: 250px; width: 500px; margin: 10px 0 0 0">
                            <span class="btnBack" style="float: right; font-family: 'Catamaran', 'Rationalist', Arial, Helvetica, sans-serif; font-weight: 700; font-size: 17px; cursor: pointer">X</span>
                            <div class="title">
                                <h3 style="color: #000">
                                    Effacer l'enregistrement
                                </h3>
                            </div>
                            <div class="main">
                                <div style="width: 58%; height: 50px; margin-left: 160px; display: flex; justify-content: space-between">
                                    <button class="btnBack" style="background-color: transparent">Fermer</button>
                                    <button type="submit" name="btnDelete" style="background-color: rgb(40, 100, 192)">Confirmer</button>
                                </div>
                                <span>Voulez-vous vraiment supprimer cet enregistrement ?</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </body>
    <script src="./assets/index.js">
    </script>
</html>