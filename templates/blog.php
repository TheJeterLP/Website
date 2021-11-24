<h1 class="title is-size-1-desktop is-size-2-touch glitch" data-text="JP Motortechnik">
    Blog
</h1>

<?php
foreach ($data['blog'] as $blog) {
    $author = $blog->getAuthor();
    ?>
    <!-- START ARTICLE -->
    <div class="column is-8 is-offset-2">
        <div class="card article">
            <div class="card-content">
                <div class="media">
                    <div class="media-center">
                        <img src="<?php echo $author->getImage(); ?>" class="author-image" alt="Placeholder image">
                    </div>
                    <div class="media-content has-text-centered">
                        <p class="title article-title"><?php echo $blog->getTitle(); ?></p>
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
                        <a href="/index.php?page=admin/editblog&id=<?php echo $blog->getId(); ?>"><button class="button is-info"><i class="fas fa-edit"></i> Edit</button></a>                                        
                        <?php
                        ?>
                        <a href="/index.php?page=admin/deleteblog&id=<?php echo $blog->getId(); ?>"><button class="button is-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>   
    <!-- END ARTICLE -->
    <?php
}
