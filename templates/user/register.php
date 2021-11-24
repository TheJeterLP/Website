<?php
if (isset($data['notification-success'])) {
    showInfo($data['notification-success']);
}

if (isset(($data['notification-error']))) {
    showError($data['notification-error']);
}
?>

<div  class="container has-text-centered"><div style="display: none;" id="register-true" class="notification is-success"><button class="delete"></button><span id="notification-true-text">Registrierung erfolgreich! Weiterleitung in 5 Sekunden...</span></div></div>
<div  class="container has-text-centered"><div style="display: none;" id="register-false" class="notification is-danger"><button class="delete"></button><span id="notification-false-text">Registierung nicht erfolgreich. Bitte Seite neu laden und erneut versuchen.</span></div></div>


<div class="columns is-multiline">
    <div class="column is-8 is-offset-2 register">
        <div class="columns">
            <div class="column left">
                <h1 class="title is-1">JP Motortechnik</h1>               
            </div>
            <div class="column right has-text-centered">
                <h1 class="title is-4">Registrierung</h1>
                <form id="register-form" class="register-form">
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" name="username" type="text" placeholder="Username">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" name="email" type="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" name="passwordfirst" type="password" placeholder="Passwort">
                        </div>
                    </div>
                    
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" name="passwordsecond" type="password" placeholder="Passwort wiederholen">
                        </div>
                    </div>
                                        
                    <button id="register-button" type="button" class="button is-block is-primary is-fullwidth is-medium">Registrieren</button>
                    <br />
                </form>
            </div>
        </div>
    </div>
    <div class="column is-8 is-offset-2">
        <br>
        <p class="has-text-grey links">
            <a class="middle" href="/user/login">Login</a> &nbsp;·&nbsp;
        </p>
    </div>

</div>


