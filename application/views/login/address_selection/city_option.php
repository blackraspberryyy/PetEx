<div class="input-field col s12">
    <?php 
        $cityResults = $this->user_model->fetch("refcitymun");
    ?>
    <select id = "cityOption" name = "cityOption">
        <option disabled selected = "" value = "0" data-group="SHOW">Choose a City</option>
        <?php foreach($cityResults as $city):?>
            <option data-group = "<?= $city->provCode;?>" value = "<?= $city->citymunCode?>"><?= $city->citymunDesc?></option>
        <?php endforeach;?>
    </select>
    <label>City</label>
</div>