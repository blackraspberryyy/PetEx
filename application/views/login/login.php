<div class="row">
    <div class="col m7">
        <h1>What is PetEx?</h1>
        <div class="container">
            <p>dolor sit amet, mutat gubergren gloriatur ea mei. Malis scribentur interpretaris vis no, mea nostrum pericula an. Sed in alia definitionem. Ut has minim mollis vivendum, in feugait detraxit instructior quo. In vim augue democritum, ea nam autem timeam.

                Pro id sanctus repudiandae. In dicit denique vim, putent possim tritani qui ne. Novum epicurei platonem eu duo, vix corpora epicuri dissentiet te. Solum sonet explicari in per, periculis iracundia quo at, soluta reformidans mei cu. Vis ex ipsum aperiri, omnium aperiam conclusionemque eu vel, et amet euismod definiebas est.

                His ridens delenit detraxit cu, ea nam simul delenit conclusionemque. Docendi fuisset vis et. Soluta mediocritatem mei in, no paulo doming qualisque duo. Ne civibus expetendis sed, iriure iracundia voluptatum ei est. Eum no persius diceret accusata, quo cu liber deserunt voluptatibus.

                ndamus constituam, officiis convenire sit ne.</p>

        </div>
    </div>
    <div class="col m5">
        <div class="row">
            <div class="col m12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col m12">
                                <ul class="tabs">
                                    <li class="tab col m6" ><a  class="active" href="#login">Login</a></li>
                                    <li class="tab col m6" ><a  href="#signup">Signup</a></li>
                                </ul>
                            </div>
                            <div id="login" class="col m12">
                                <br>
                                <form method="POST" action="">`
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input type="text" class="validate" name = "username">
                                            <label>Username</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock</i>
                                            <input type="password" class="validate" name = "username">
                                            <label>Password</label>
                                        </div><br><br><br><br><br><br><br><br><br>
                                        <div class="row">
                                            <div class="col m7">
                                                <a class="waves-effect waves-light btn pull-left orange"><i class="material-icons right">refresh</i>Reset Password</a>
                                            </div>
                                            <div class="col m5">
                                                <a class="waves-effect waves-light btn pull-right"><i class="material-icons right">send</i>Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="signup" class="col m12">
                                <form method="POST" action="">
                                    <div class="row">
                                        <ul class="collapsible popout" data-collapsible="accordion">
                                            <li>
                                                <div class="collapsible-header active"><i class="material-icons">info</i>Login Information</div>
                                                <div class="collapsible-body"> 
                                                    <div class="input-field">
                                                        <input type="text" class="validate">
                                                        <label>Username</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <input type="password" class="validate">
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <input type="password" class="validate">
                                                        <label>Confirm Password</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons">account_circle</i>Personal Information</div>
                                                <div class="collapsible-body">
                                                    <div class="input-field">
                                                        <input type="text" class="validate">
                                                        <label>Lastname</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <input type="text" class="validate">
                                                        <label>Firstname</label>
                                                    </div>
                                                    <label>Birthday</label>
                                                    <input type="text" class="datepicker">
                                                    <div class="input-field">
                                                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                                                        <label>Complete Address</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <select id="prov_select" name = "province">
                                                            <option value="" disabled selected>Province</option>
                                                            <?php foreach ($provinces as $province): ?> 
                                                                <option value="<?= $province->provDesc ?>"><?= $province->provDesc ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-field">

                                                        <select>
                                                            <option value="" disabled selected>City</option>

                                                            <?php foreach ($cities1 as $city1): ?> 
                                                                <option value="<?= $city1->citymunDesc ?>"><?= $city1->citymunDesc ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-field">
                                                        <select>
                                                            <option value="" disabled selected>Barangay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons">contacts</i>Contact Information</div>
                                                <div class="collapsible-body">
                                                    <div class="input-field">
                                                        <input type="text" class="validate">
                                                        <label>Phone Number</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <input type="email" class="validate">
                                                        <label>Email Address</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul><br>
                                        <div class="row">
                                            <div class="col m6">
                                                <p>
                                                    <input type="checkbox" id="test5" name="agree" value="1"/>
                                                    <label for="test5" style="color:black">I agree to the Terms and Conditions</label>
                                                </p>
                                            </div>
                                            <div class="col m6">
                                                <a class="waves-effect waves-light btn pull-right"><i class="material-icons right">send</i>Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>