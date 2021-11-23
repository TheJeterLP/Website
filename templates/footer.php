<!-- Footer starts here -->
<ul class="scroll-top" id="totop" style="display:none;">
    <li><a href="#" title="Scroll to top"><i class="fas fa-arrow-up"></i></a></li>
</ul>
</div>
</div>

<?php
if ($headerfooter) {
    ?>
    <div class="hero-foot">
        <div class="tabs is-centered">
            <ul>
                <li><a href="/impressum">Impressum</a></li>
                <li><a href="/datenschutz">Datenschutz</a></li>
            </ul>            
        </div>

        <div class="tabs is-centered">
            <ul>
                <li><a href="https://www.facebook.com/jp.motortechnik" target="_blank"><span class="icon"><i
                                class="fab fa-facebook"></i></span></a></li>
                <li><a href="https://www.instagram.com/jp.motortechnik" target="_blank"><span class="icon"><i
                                class="fab fa-instagram"></i></span></a></li>
            </ul>
        </div>

        <div class="is-centered">
            <p>JP Motortechnik</p>
            <p>Website entwickelt von <a href="https://jp-motortechnik.de/">Joey Peter.</a></p>
        </div>
    </div>
    <?php
}
?>

</section>
<script src="https://kit.fontawesome.com/1f62e8f251.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script src="/lib/to-top/material-scrolltop.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<?php
if ($customjs !== 'null') {
    ?>
    <script type="text/javascript" src="/js/<?php echo $customjs ?>"></script>
    <?php
}
?>

<button class="material-scrolltop" type="button"></button>

<script>
    $('body').materialScrollTop();
</script>
</body>
</html>

