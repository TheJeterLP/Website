<?php
if (isset($data['notification-success'])) {
    showInfo($data['notification-success']);
}

if (isset(($data['notification-error']))) {
    showError($data['notification-error']);
}
?>

<div  class="container has-text-centered"><div style="display: none;" id="login-true" class="notification is-success"><button class="delete"></button><span id="notification-true-text">Login erfolgreich, Weiterleitung in 5 Sekunden...</span></div></div>
<div  class="container has-text-centered"><div style="display: none;" id="login-false" class="notification is-danger"><button class="delete"></button><span id="notification-false-text">Login nicht erfolgreich. Bitte Seite neu laden und erneut versuchen.</span></div></div>

<div class="columns is-multiline">
    <div class="column is-8 is-offset-2 register">
        <div class="columns">
            <div class="column left">
                <h1 class="title is-1">JP Motortechnik</h1>
                <h2 class="subtitle colored is-4">Login nur für Administratoren.</h2>
            </div>
            <div class="column right has-text-centered">
                <h1 class="title is-4">Login</h1>
                <p class="description">Login Daten eintragen und den Button drücken.</p>
                <form id= "login-form" class="login-form">
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" name="email" type="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" name ="password" type="password" placeholder="Password">
                        </div>
                    </div>
                    <a href="#"><button id="login-button" type="button" class="button is-block is-primary is-fullwidth is-medium">LogIn</button></a>
                    <br />
                </form>
            </div>
        </div>
    </div>
    <?php
    if ($registration) {
        ?>
        <div class="column is-8 is-offset-2">
            <br>
            <p class="has-text-grey links">
                <a class="middle" href="/user/register">Registrieren</a> &nbsp;·&nbsp;
            </p>
        </div>
        <?php
    }
    ?>
</div>


