<?php
if (isset($data['notification-success'])) {
    showInfo($data['notification-success']);
}

if (isset($data['notification-error'])) {
    showError($data['notification-error']);
}
?>

<div  class="container has-text-centered"><div style="display: none;" id="edit-true" class="notification is-success"><button class="delete"></button><span id="notification-true-text">Ihr Profil wurde geändert. Weiterleitung in 5 Sekunden...</span></div></div>
<div  class="container has-text-centered"><div style="display: none;" id="edit-false" class="notification is-danger"><button class="delete"></button><span id="notification-false-text">Fehler, bitte erneut versuchen.</span></div></div>
<div  class="container has-text-centered"><div style="display: none;" id="avatar-true" class="notification is-success"><button class="delete"></button><span id="notification-true-text">Ihr Profil wurde geändert. Weiterleitung in 5 Sekunden...</span></div></div>
<div  class="container has-text-centered"><div style="display: none;" id="avatar-false" class="notification is-danger"><button class="delete"></button><span id="notification-false-text">Fehler, bitte erneut versuchen.</span></div></div>

<?php
$show = $data['show'];
if ($show) {
    $user = getUser($db);
    ?>

    <form id="edit-form" class="edit-form">
        <div class="field">
            <label class="label">Username</label>
            <div class="control">
                <input class="input is-medium" name="username" type="text" value="<?php echo $user->getUsername(); ?>">
            </div>
        </div>

        <div class="field">
            <label class="label">Passwort</label>
            <div class="control">
                <input class="input is-medium" name="password" type="password" placeholder="Password">
            </div>
        </div>

        <button id="edit-button" type="button" class="button is-block is-primary is-fullwidth is-medium">Absenden</button>
    </form>

    <hr>

    <form id="avatar-form" class="avatar-form" enctype="multipart/form-data">        
        <div class="file">
            <label class="file-label">
                <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
                <input class="file-input" type="file" name="inputfile" id="inputfile">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        File (has to be a PNG with a max size of 4mb)
                    </span>
                </span>
            </label>
        </div>

        <button id="avatar-button" type="button" class="button is-block is-primary is-fullwidth is-medium">Absenden</button>
    </form>    
    <?php
}