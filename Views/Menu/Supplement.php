 <?php foreach ($supplementData as $row) { ?>
        <label>
            <input type="checkbox" name="choix_supplement[]" value="<?php echo $row['Supplement_nom'] . ' ' . $row['Supplement_prix']; ?>">
            <?php echo $row['Supplement_nom'] . ' ' . $row['Supplement_prix'] . ' €<br>'; ?>
        </label>
        <?php } ?>
