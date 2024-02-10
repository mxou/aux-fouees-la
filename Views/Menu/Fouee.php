
<?php
require_once 'Controllers/SupplementController.php';?> 
<div class="fouee_card_container">
    <?php foreach ($foueeData as $row) { ?>
        <div class="fouee_card">
            <div>
                <img src="./assets/img/<?php echo $row['Fouee_image'];?>" alt="Image de fouee">
                <div class="fouee_infos">
                    <div class="croissant">
                        <h3 class="fouee_title"><?php echo $row['Fouee_nom'];?>
                    </h3>
                    <?php if( isset($_SESSION['Utilisateur_id']) && $_SESSION['Utilisateur_id'] == 1): ?>
                        <img src="assets/img/icons/edit.svg" alt="icon edit" class="edit_fouee_card_button">
                    <?php endif ?>
                </div>
                    <p class="fouee_description"><?php echo $row['Fouee_description'];?></p>
                    <p class="fouee_prix">Prix : <?php echo $row['Fouee_prix'];?>€</p>
                </div>
            </div>
            <div class="select_button_container">
                <p>Suppléments</p>
                <form action="./Views/Panier.php" method="post">
                    <div>
                        <?php if ($row['Fouee_type'] == 1): ?>
                            <?php     
                            $SupplementController = new SupplementController();
                            $SupplementController->supplementsalty();  
                            ?>
                        <?php elseif ($row['Fouee_type'] == 0):      
                            $SupplementController = new SupplementController();
                            $SupplementController->supplementsweet();  
                        endif; ?>   
                    </div>
                    <input type="hidden" name="Fouee_nom" value="<?php echo $row['Fouee_nom']; ?>">
                    <input type="hidden" name="Fouee_prix" value="<?php echo $row['Fouee_prix']; ?>">
                    <button class="ajout_panier_button" type="submit" name="ajouter_panier">
                        Ajouter
                    </button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>