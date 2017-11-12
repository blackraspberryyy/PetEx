<main>
    <div class ="side-nav-offset" >
        <div class ="container ">
            <h2>My Pets</h2>
            <hr class="style-seven">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="nav-wrapper">
                        <form action = "" method = "POST">
                            <div class="input-field">
                                <input id="search" type="search" name = "search" placeholder = "Search for pet here.." >
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
                <div class="card-content row">
                    <div class="col s4">
                        <div class="card sticky-action hoverable medium">
                            <div class="card-image">
                                <img class="materialboxed" data-caption = "" width="650" src="<?= $this->config->base_url() ?>images/img/icons/dummy.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">(Name)<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                                <p>Here is some more information about this pet that is only revealed once clicked on.</p>
                            </div>
                            <div class="card-action">
                                <a href = "<?= $this->config->base_url() ?>user/myPetsEdit" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit Pet Details"><i class = "fa fa-pencil-square-o fa-lg"></i></a>
                                <a href = "#modal1" class="modal-trigger tooltipped"    data-position="bottom" data-delay="50" data-tooltip="Play Video"><i class = "fa fa-video-camera fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
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
</main>

<!-- Video Modal -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Video</h4>
        <hr>
        <video class="responsive-video" controls>
            <source src="<?= $this->config->base_url() ?>/videos/sampleVideo.mp4" type="video/mp4">
        </video>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text">Close</a>
    </div>
</div>

