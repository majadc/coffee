<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package majadc_coffee
 */
?>

			</div><!-- page-container -->

			<footer id="colophon" class="footer" role="contentinfo">
				<div class="page-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'majadc_coffee' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'majadc_coffee' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<span class="copyright-info"><small>Copyright <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="majadc.com">majadc.com</a></small></span>
				</div>
			</footer>
			<div id="privacy-policy" class="hidden privacy-policy-block">
				<div>
					<button id="button-agree" class="button-1">I accept</button>
					<p>We do not collect any personal data. The website does not require registrations. We may use cookies in order to save yours preferences for future visits. If you decide to disable cookies in theirs browser it will not affect your experience. We use third party services like Google Analytics and WP Statistic for functionality and to better understand user interaction with the website.Google Analytics, which places a cookie on your device, to obtain information on how you engage with this website. WP Statistic stores information like: user agent and platform, user IP, user country, search engines, referring websites.</p>					
				</div>
			</div>
		</div><!-- page -->

	<?php wp_footer(); ?>

	</body>
</html>
