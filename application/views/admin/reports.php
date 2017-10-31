
<style>
    .odometer{
        font-size: 40px;
    }

</style>
<div class ="side-nav-offset">
    <div class ="container ">
        <div class="row">
            <div class="col s4">
                <div class="card pink darken-3">
                    <div class ="card-content">
                        <span class="white-text card-title">Animals<br>Registered</span>
                        <div class ="row">
                            <div class ="col s8">
                                <div id="odometer" class ="odometer white-text "></div>
                            </div>
                            <div class ="col s4">
                                <i class="fa fa-paw fa-4x white-text"></i>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card blue darken-2">
                    <div class ="card-content">
                        <span class="white-text card-title">Adoptable<br>Animals</span>
                        <div class ="row">
                            <div class ="col s8">
                                <div id="odometer2" class ="odometer white-text "></div>
                            </div>
                            <div class ="col s4">
                                <i class="fa fa-check fa-4x white-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card purple darken-3">
                    <div class ="card-content">
                        <span class="white-text card-title">Animals<br>Adopted</span>
                        <div class ="row">
                            <div class ="col s8">
                                <div id="odometer3" class ="odometer white-text "></div>
                            </div>
                            <div class ="col s4">
                                <i class="fa fa-home fa-4x white-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card grey darken-3">
                    <div class ="card-content">
                        <span class="white-text card-title">Missing<br>Pets</span>
                        <div class ="row">
                            <div class ="col s8">
                                <div id="odometer4" class ="odometer white-text "></div>
                            </div>
                            <div class ="col s4">
                                <i class="fa fa-question fa-4x white-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card green darken-3">
                    <div class ="card-content">
                        <span class="white-text card-title">Interested<br>Adopters</span>
                        <div class ="row">
                            <div class ="col s8">
                                <div id="odometer5" class ="odometer white-text "></div>
                            </div>
                            <div class ="col s4">
                                <i class="fa fa-heart fa-4x white-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card yellow darken-3">
                    <div class ="card-content">
                        <span class="white-text card-title">Registered<br>Users</span>
                        <div class ="row">
                            <div class ="col s8">
                                <div id="odometer6" class ="odometer white-text "></div>
                            </div>
                            <div class ="col s4">
                                <i class="fa fa-users fa-4x white-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    setTimeout(function(){
        odometer.innerHTML = <?= $animalsCount;?>;
        odometer2.innerHTML = <?= $adoptablesCount;?>;
        odometer3.innerHTML = <?= $adoptionCount;?>;
        odometer4.innerHTML = <?= $missingPetCount;?>;
        odometer5.innerHTML = <?= $interestedAdoptersCount;?>;
        odometer6.innerHTML = <?= $usersCount;?>;
    }, 1700);
</script>