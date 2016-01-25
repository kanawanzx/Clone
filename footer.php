<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Heli
 * @since Heli Theme 1.0
 */
?>
<?php
if (!is_page_template('page-blank.php'))
{
    ?>

    <!-- Custom Footer
    ================================================== -->
    <?php
    if (as_option('as_option_check_footer', '1'))
    {
        ?>
        <?php
        $slug = as_option('as_option_custom_footer', 'default');
        get_template_part('footers/footer', $slug);
        ?>
    <?php } ?>
    <!-- End / Custom Footer -->

    <!-- Search Form
        ======================================================================== -->
    <?php
    get_template_part('template/search', 'form');
    ?>
    <!-- Search Form / End -->

<?php } ?>
	
	<?php if (as_option('as_option_scroll_to_top', '1')){ ?>
	    <!-- Scrool to top
	    ======================================================================== -->
	    <div class="as-scrollup"><span class="dslc-icon-chevron-up"></span></div>
	    <!-- Scrool to top / End -->
	<?php } ?>
<?php wp_footer(); ?>
</body>
</html>