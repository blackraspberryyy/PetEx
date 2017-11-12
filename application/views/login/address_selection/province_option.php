<div class="input-field col s12">
    <?php 
        $provinceResults = $this->user_model->fetch("refprovince");
    ?>
    <select id = "provinceOption" name = "provinceOption">
        <option disabled selected = "" value = "0">Choose a province</option>
        <?php foreach($provinceResults as $prov):?>
            <option value = "<?= $prov->provDesc?>"><?= $prov->provDesc?></option>
        <?php endforeach;?>
    </select>
    <label>Province</label>
</div>