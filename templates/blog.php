<?php
if (isset($data['notification-info'])) {
    showInfo($data['notification-info']);
}

if (isset($data['notification-error'])) {
    showError($data['notification-error']);
}
?>
<div  class="container has-text-centered"><div style="display: none;" id="delete-true" class="notification is-success"><button class="delete"></button><span id="notification-true-text">Blogeintrag wurde gelöscht. Weiterleitung in 5 Sekunden...</span></div></div>
<div  class="container has-text-centered"><div style="display: none;" id="delete-false" class="notification is-danger"><button class="delete"></button><span id="notification-false-text">Fehler, bitte erneut versuchen.</span></div></div>

<?php
foreach ($data['blog'] as $blog) {
    $author = $blog->getAuthor();
    ?>
    <!-- START ARTICLE -->
    <div class="column">
        <div class="card article">
            <div class="card-content">
                <div class="media">
                    <div class="media-center">
                        <img src="<?php echo $author->getImage(); ?>" class="author-image" alt="Placeholder image">
                    </div>
                    <div class="media-content has-text-centered">
                        <a href="/blog&post=<?php echo $blog->getId(); ?>" target="_blank"><p class="title article-title" style="color: #8769c3 !important;"><?php echo $blog->getTitle(); ?></p></a>
                        <p class="is-6 article-subtitle">
                            Erstellt von <strong><?php echo $author->getUsername(); ?></strong> am <?php echo $blog->getDate() ?>
                        </p>
                    </div>
                </div>
                <div class="content article-body">
                    <p><?php echo $blog->getText(); ?></p>
                </div>
                <div class="has-text-centered">
                    <?php
                    if (getUserID($db)) {
                        ?>
                        <div class="columns">
                            <div class="column is-6">
                                <a href="/admin/editblog&id=<?php echo $blog->getId(); ?>"><button class="button is-info"><i class="fas fa-edit"></i> Bearbeiten</button></a>                                        
                            </div>
                            <div class="column is-6">
                                <form id="delete-form" class="delete-form">
                                    <input class="hidden" type="hidden" name="id" value="<?php echo $blog->getId(); ?>" />                           
                                    <a href="#"><button id="delete-button" type="button" class="button is-danger"><i class="fas fa-trash-alt"></i> Löschen</button></a>
                                </form>   
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>   
    <!-- END ARTICLE -->
    <?php
}
