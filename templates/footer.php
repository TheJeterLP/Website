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
                <li><a href="http://github.com/thejeterlp" target="_blank"><span class="icon"><i
                                class="fab fa-github"></i></span></a></li>
                <li><a href="http://www.instagram.com/joey.peter1998" target="_blank"><span class="icon"><i
                                class="fab fa-instagram"></i></span></a></li>
            </ul>
        </div>
    </div>
    <?php
}
?>

</section>
<script src="https://kit.fontawesome.com/1f62e8f251.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="/lib/to-top/material-scrolltop.js"></script>
<script src="/js/particles.min.js" type="text/javascript"></script>
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

