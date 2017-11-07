<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Passion_LMS
 */
	global $connect_user_id;
?>

	</div><!-- #content -->

	<footer>
	  <div id="footer_top">
	    <div class="container">
	      <div class="row pad">

	        <div class="col-md-4 text-label col-footer">
	          <h3 class="text-label text-title-lowercase">passion city church</h3>
	          <ul class="list-unstyled">
	            <li>(404) 231-7080</li>
	            <li>515 Garson Drive NE<br>Atlanta, GA 30324</li>
	            <li>gathering times:<br>9:30a / 11:45a / 5p</li>
	          </ul>
	          <!-- <aside id="nav_menu-2" class="widget widget_nav_menu"><h3 class="text-label text-title-lowercase">PCC</h3><div class="menu-test-menu-container"><ul id="menu-test-menu" class="menu"><li id="menu-item-96" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-96"><a href="http://google.com">Dummy Link <em><small class='text-muted text-lowercase'></small></em></a></li>
	</ul></div></aside> -->
	        </div>

	        <div class="col-md-4 text-label col-footer">
	          <aside id="nav_menu-3" class="widget widget_nav_menu"><h3 class="text-label text-title-lowercase">Information</h3><div class="menu-footer-column-2-container"><ul id="menu-footer-column-2" class="menu"><li id="menu-item-227" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-227"><a href="/privacy-policy/">Privacy Policy <em><small class="text-muted text-lowercase"></small></em></a></li>
	</ul></div></aside>        </div>

	        <div class="col-md-4 text-label col-footer">
	          <h3 class="text-label text-title-lowercase">Get in touch</h3>
	          <ul class="list-unstyled">
	            <li>
	              <ul class="list-inline">
	                <li><a target="_blank" href="https://www.facebook.com/passioncitychurch">
	                  <i class="fa fa-facebook-square fa-lg"></i></a>
	                </li>
	                <li><a target="_blank" href="https://twitter.com/passioncity">
	                  <i class="fa fa-twitter-square fa-lg"></i></a>
	                </li>
	                <li><a target="_blank" href="https://instagram.com/passioncity">
	                  <i class="fa fa-instagram fa-lg"></i></a>
	                </li>
	                <li><a target="_blank" href="https://www.youtube.com/passioncity">
	                  <i class="fa fa-youtube fa-lg"></i></a>
	                </li>
	              </ul>
	            </li>
	            <li><a href="/contact/">Contact</a></li>
	          </ul>
	          <!-- <aside id="nav_menu-4" class="widget widget_nav_menu"><h3 class="text-label text-title-lowercase">Events</h3><div class="menu-test-menu-container"><ul id="menu-test-menu-1" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-96"><a href="http://google.com">Dummy Link <em><small class='text-muted text-lowercase'></small></em></a></li>
	</ul></div></aside> -->
	        </div>

	        <!-- <div class="col-md-3 text-label">
	          <aside id="nav_menu-5" class="widget widget_nav_menu"><h3 class="text-label text-title-lowercase">Get in Touch</h3><div class="menu-test-menu-container"><ul id="menu-test-menu-2" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-96"><a href="http://google.com">Dummy Link <em><small class='text-muted text-lowercase'></small></em></a></li>
	</ul></div></aside>        </div> -->
	      </div>
	    </div>
	  </div>

	  <div id="footer_bottom">
	    <div class="text-center">
	      <ul class="list-inline text-center">
	        <li>
	          <a href="https://passioncitychurch.com" target="_blank">
	            <img src="https://passioncitychurch.com/wp-content/uploads/2015/09/footer-logos-pcc.png">
	          </a>
	        </li>

	        <li>
	          <a href="http://268generation.com" target="_blank">
	            <img src="https://passioncitychurch.com/wp-content/uploads/2015/09/footer-logos-passion.png">
	          </a>
	        </li>

	        <li>
	          <a href="http://sixstepsrecords.com" target="_blank">
	            <img src="https://passioncitychurch.com/wp-content/uploads/2015/09/footer-logos-sixsteps.png">
	          </a>
	        </li>

	        <li>
	          <a href="http://passionresources.com" target="_blank">
	            <img src="https://passioncitychurch.com/wp-content/uploads/2015/09/footer-logos-resources1.png">
	          </a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</footer>
</div><!-- #page -->

<!-- Video Tracking Call -->
<script>
	$(document).ready(function($) {
		$('.trackable-video').videoLog({
			connectId: <?php echo $connect_user_id; ?>, // replace with global variable from auth process
			baseUrl: '<?php echo get_field('video_tracking_url_base', 'option'); ?>',
		});
	});
</script>

<?php wp_footer(); ?>

</body>
</html>
