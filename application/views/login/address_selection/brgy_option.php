<div class="input-field col s12">
    <?php 
        $brgyResults = $this->user_model->fetch("refbrgy");
    ?>
    <select id = "brgyOption" disabled = "">
        <option disabled selected = "" value = "0">Choose a Brgy</option>
        <?php foreach($brgyResults as $brgy):?>
            <!--OPTION TAGS!-->
        <?php endforeach;?>
    </select>
    <label>Brgy</label>
</div>