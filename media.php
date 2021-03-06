<?php
require('config.php');

function showPhotos($conn)
{

    $stmt = $conn->prepare("SELECT id, type, path, creation_date, share_status, 
                                    description, title, member_id, file_status 
                            FROM media 
                            WHERE file_status = 'active'");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

?>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>

    <style>
        .row {
            margin: 15px;
        }
    </style>

    <script>
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
        <div class="container pt-4">

    <div class="row pt-4 pb-4">
        <div class="col-md-12 pb-2">
<!--                    <button type="button" class="btn btn-primary float-right">Media toevoegen</button>-->

            <div class="btn-group float-right">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Media toevoegen
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="upload_photo.php">Foto</a>
                    <a class="dropdown-item" href="#">Video</a>
                </div>
            </div>
                    <h2 id="title_nieuws_mob" class="text-primary">Media</h2>
                    <h2 id="title_nieuws_desk" class="text-primary">Foto's en video's</h2>
            <hr>
                </div>

<!--                <div class="col-md-4">-->
<!--                    <div class="card mb-4 shadow-sm">-->
<!--                        <a href="./img/uploads/42403064_2244768775597683_6412431063926177792_n.jpg" data-toggle="lightbox" data-gallery="gallery">-->
<!--                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="./img/uploads/42403064_2244768775597683_6412431063926177792_n.jpg" data-holder-rendered="true">-->
<!--                        </a>-->
<!--                        <div class="card-body">-->
<!--                            <h6 class="card-subtitle mb-2 text-secondary">Uploader</h6>-->
<!--                            <small class="text-muted">Datum</small>-->
<!--                            <p class="card-text"></p>-->
<!--                            <div class="d-flex justify-content-between align-items-center">-->
<!--                                <div class="btn-group">-->
<!--                                    <button type="button" class="btn btn-sm btn-primary">(0) Like <i class="fas fa-thumbs-up"></i></button>-->
<!--                                    <button type="button" class="btn btn-sm btn-primary">(0) Reageer <i class="fas fa-comment"></i></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="col-md-4">-->
<!--                    <div class="card mb-4 shadow-sm">-->
<!--                        <a href="./img/uploads/42201402_2239971642744063_4152072806349144064_o.jpg" data-toggle="lightbox" data-gallery="gallery">-->
<!--                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="./img/uploads/42201402_2239971642744063_4152072806349144064_o.jpg" data-holder-rendered="true">-->
<!--                        </a>-->
<!--                            <div class="card-body">-->
<!--                            <h6 class="card-subtitle mb-2 text-secondary">Uploader</h6>-->
<!--                            <small class="text-muted">Datum</small>-->
<!--                            <p class="card-text">Bij Klein Brandt sportpark - A.S.'80.</p>-->
<!--                            <div class="d-flex justify-content-between align-items-center">-->
<!--                                <div class="btn-group">-->
<!--                                    <button type="button" class="btn btn-sm btn-primary">(0) Like <i class="fas fa-thumbs-up"></i></button>-->
<!--                                    <button type="button" class="btn btn-sm btn-primary">(0) Reageer <i class="fas fa-comment"></i></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="col-md-4">-->
<!--                    <div class="card mb-4 shadow-sm">-->
<!--                        <a href="./img/uploads/41832526_2235134446561116_6645142652700327936_n.jpg" data-toggle="lightbox" data-gallery="gallery">-->
<!--                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="./img/uploads/41832526_2235134446561116_6645142652700327936_n.jpg" data-holder-rendered="true">-->
<!--                        </a>-->
<!--                            <div class="card-body">-->
<!--                            <h6 class="card-subtitle mb-2 text-secondary">Uploader</h6>-->
<!--                            <small class="text-muted">Datum</small>-->
<!--                            <p class="card-text">AS'80 Academy O14-1</p>-->
<!--                            <div class="d-flex justify-content-between align-items-center">-->
<!--                                <div class="btn-group">-->
<!--                                    <button type="button" class="btn btn-sm btn-primary">(0) Like <i class="fas fa-thumbs-up"></i></button>-->
<!--                                    <button type="button" class="btn btn-sm btn-primary">(0) Reageer <i class="fas fa-comment"></i></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

        <?php $results = showPhotos($conn)?>
        <?php foreach ($results as $photo) : ?>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="./img/uploads/<?php echo $photo['id'] . "-" . $photo['path'] ?>.jpg" data-toggle="lightbox" data-gallery="gallery">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                 alt="Thumbnail [100%x225]"
                                 style="height: 225px; width: 100%; display: block;"
                                 src="./img/uploads/<?php echo $photo['id'] . "-" . $photo['path'] ?>.jpg" data-holder-rendered="true">
                        </a>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-secondary">Uploader</h6>
                            <small class="text-muted">Datum</small>
                            <p class="card-text"></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary">(0) Like <i class="fas fa-thumbs-up"></i></button>
                                    <button type="button" class="btn btn-sm btn-primary">(0) Reageer <i class="fas fa-comment"></i></button>
                                <a href="./delete_photo.php?id=<?php echo $photo['id']?>">
                                    <button type="button" class="btn btn-sm btn-primary"> Delete <i class="fas fa-trash-alt"></i></button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>

            </div>
        </div>
    <hr>
