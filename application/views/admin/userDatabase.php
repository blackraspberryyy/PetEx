<?php
    function get_age($birth_date) {
        return floor((time() - strtotime($birth_date)) / 31556926);
    }
?>
<style>
    .switch label input[type=checkbox]:checked+.lever {
        background-color: #81c784;
    }

    .switch label input[type=checkbox]:checked+.lever:after {
        background-color: #2e7d32;
    }
    .collapsible {
        background-color: #fff;
        box-shadow: none !important;
    }
    .collapsible .collapsible-header {
        padding-left: 72px;
        line-height: 1rem;
    }
    .collapsible .collapsible-header img {
        position: absolute;
        width: 42px;
        height: 42px;
        margin-left: -58px;
    }
    .collapsible .collapsible-body{
        position:relative !important;
    }
    .collapsible .collapsible-body .secondary-content{
        position:absolute !important;
        top:16px;
        right:16px;
    }
</style>

<div class ="side-nav-offset">
    <div class ="container ">
        <div class="card row" style="margin-top:20px;">
            <nav class = "green darken-3">
                <div class="nav-wrapper">
                    <!--<form action = "" method = "POST">
                        <div class="input-field">
                            <input id="search" type="search" name = "search" placeholder = "Search user here.." >
                            <i class="material-icons">close</i>
                        </div>
                    </form>-->
                    <div class="col s12">
                        <a href="<?= $wholeUrl?>" class="breadcrumb">User Database</a>
                    </div>
                </div>
            </nav>
            <ul class="collapsible" data-collapsible="accordion">
            <?php if (empty($users)): ?>
                <!--Nothing Happens Here-->
            <?php else: ?>
                <?php foreach ($users as $user): ?>
                <script>
                    $(document).ready(function(){
                        $('#modal<?= $user->user_id?>, #modal<?= $user->user_id?>activate').modal({
                            dismissible: false
                        });
                    });
                </script>
                    <li>
                        <div class="collapsible-header z-depth-1">
                            <img src="<?= $this->config->base_url().$user->user_picture?>" alt="" class="circle z-depth-2 tooltipped materialboxed" data-position="bottom" data-delay="50" data-tooltip="<?= $user->user_firstname." ".$user->user_lastname?>">
                            <p><span class="title "  style = "font-weight:bold;"><?= $user->user_lastname.", ".$user->user_firstname?></span><br>
                                <?= $user->user_access == "admin"? "Administrator" : "Pet Adopter"?><br>
                            </p>
                        </div>
                        <div class="collapsible-body grey lighten-3">
                            <div class="switch secondary-content">
                                <label>
                                    Deactivate
                                    <input type="checkbox" <?= $user->user_status ? "checked = \"\"" : ""?> class="cb<?= $user->user_id?>">
                                    <span class="lever"></span>
                                    Activate
                                </label>
                            </div>
                        </div>
                    </li>
                    <!-- Modal Before Blocking User -->
                    <div id="modal<?= $user->user_id?>" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h4><i class = "fa fa-warning"></i> Warning</h4>
                            <p>You are about to deactivate this user:</p>
                            <div class ="row">
                                <div class ="col s4">
                                    <img src = "<?= $this->config->base_url().$user->user_picture?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px;">
                                </div>
                                <div class ="col s8">
                                    <table class = "striped responsive-table">
                                        <tbody>
                                            <tr>
                                                <th>Name: </th>
                                                <td><?= $user->user_lastname.", ".$user->user_firstname;?></td>
                                            </tr>
                                            <tr>
                                                <th>Age:</th>
                                                <td><?= get_age($user->user_bday);?></td>
                                            </tr>
                                            <tr>
                                                <th>Username: </th>
                                                <td><?= $user->user_username;?></td>
                                            </tr>
                                            <tr>
                                                <th>Email: </th>
                                                <td><?= $user->user_email;?></td>
                                            </tr>
                                            <tr>
                                                <th>Access:</th>
                                                <td><?= $user->user_access == "admin"? "Administrator" : "Pet Adopter"?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact No.:</th>
                                                <td><?= $user->user_contact_no?></td>
                                            </tr>
                                            <tr>
                                                <th>Added at:</th>
                                                <td><?= date("F m, Y - h:i A", $user->user_added_at)?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat cancelDeactivate<?= $user->user_id?>">Cancel</a>
                            <a href="<?= $this->config->base_url()?>admin/deactivateUser/<?= $user->user_id?>" class="modal-action modal-close waves-effect waves-green btn-flat">Deactivate</a>
                        </div>
                    </div>
                    
                    <!-- Modal Before Activating User -->
                    <div id="modal<?= $user->user_id?>activate" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h4><i class = "fa fa-warning"></i> Notice</h4>
                            <p>You are about to activate this user:</p>
                            <div class ="row">
                                <div class ="col s4">
                                    <img src = "<?= $this->config->base_url().$user->user_picture?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px;">
                                </div>
                                <div class ="col s8">
                                    <table class = "striped responsive-table">
                                        <tbody>
                                            <tr>
                                                <th>Name: </th>
                                                <td><?= $user->user_lastname.", ".$user->user_firstname;?></td>
                                            </tr>
                                            <tr>
                                                <th>Age:</th>
                                                <td><?= get_age($user->user_bday);?></td>
                                            </tr>
                                            <tr>
                                                <th>Username: </th>
                                                <td><?= $user->user_username;?></td>
                                            </tr>
                                            <tr>
                                                <th>Email: </th>
                                                <td><?= $user->user_email;?></td>
                                            </tr>
                                            <tr>
                                                <th>Access:</th>
                                                <td><?= $user->user_access == "admin"? "Administrator" : "Pet Adopter"?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact No.:</th>
                                                <td><?= $user->user_contact_no?></td>
                                            </tr>
                                            <tr>
                                                <th>Added at:</th>
                                                <td><?= date("F m, Y - h:i A", $user->user_added_at)?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat cancelActivate<?= $user->user_id?>">Cancel</a>
                            <a href="<?= $this->config->base_url()?>admin/activateUser/<?= $user->user_id?>" class="modal-action modal-close waves-effect waves-green btn-flat">Activate</a>
                        </div>
                    </div>
                    <script>
                        $(".cb<?= $user->user_id?>").change(function() {
                            if(!this.checked) {
                                $('#modal<?= $user->user_id?>').modal('open');
                            }else{
                                $('#modal<?= $user->user_id?>activate').modal('open');
                            }
                        });
                        $(".cancelActivate<?= $user->user_id?>").click(function(){
                            $(".cb<?= $user->user_id?>").prop('checked', false);
                        });
                        $(".cancelDeactivate<?= $user->user_id?>").click(function(){
                            $(".cb<?= $user->user_id?>").prop('checked', true);
                        });
                    </script>
                <?php endforeach; ?>
                
            <?php endif; ?>
            </ul>
            <style>
                .pagination .active{
                    background:#2e7d32 !important;
                }
            </style>
            <ul class="pagination center">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>
    </div>
</div>
