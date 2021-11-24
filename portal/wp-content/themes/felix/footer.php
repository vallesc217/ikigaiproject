<!-- Footer -->
<footer id="footer" class="footer text-center text-left-md bgc-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="social">
					<?php if ( strlen( get_theme_mod( 'sotial_networks_control_social_shortcode' ) ) > 8 ):
						echo do_shortcode( get_theme_mod( 'sotial_networks_control_social_shortcode' ) );
					endif; ?> 
					<?php if ( strlen( get_theme_mod( 'sotial_networks_control_facebook' ) ) > 8 ): ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_facebook' ) ); ?>"
                           class=" fa fa-facebook">

                        </a>
					<?php endif; ?>

					<?php if ( strlen( get_theme_mod( 'sotial_networks_control_twitter' ) ) > 8 ): ?>
                        <a class="fa fa-twitter"
                           href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_twitter' ) ); ?>">

                        </a>
					<?php endif; ?>

					<?php if ( strlen( get_theme_mod( 'sotial_networks_control_pinterest' ) ) > 8 ): ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_pinterest' ) ); ?>"
                           class=" fa fa-pinterest">

                        </a>
					<?php endif; ?>

					<?php if ( strlen( get_theme_mod( 'sotial_networks_control_youtube' ) ) > 8 ): ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_youtube' ) ); ?>"
                           class=" fa fa-youtube-play">

                        </a>
					<?php endif; ?>
                </div>
            </div>
            <div class="col-md-7 text-right-md">
                <div class="copy">
					<?php
					echo wp_kses_post( do_shortcode( ( get_theme_mod( 'footer_copyright', sprintf( esc_html__( ' %s  felix. All rights reserved by  %s', 'felix' ), '&copy; ' . date( 'Y' ), '<a href="http://themeforest.net/user/murren20" target="_blank">' . esc_html__( 'Murren20', 'felix' ) . '</a>' ) ) ) ) );
					?>
                </div>
            </div>
        </div>
    </div>
</footer>


</div>
</div>

<!-- Modals -->

<div id="request" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close">&times;</span>
                <h2 class="modal-title">
					<?php echo wp_kses_post( get_theme_mod( 'felix_c_form_s_modal_title', esc_html__( 'Get start', 'felix' ) ) );

					?>  </h2>
            </div>
            <div class="modal-body text-center ">
				<?php
				if ( function_exists( 'felix_contact_form_func' ) ) {

					echo str_replace( 'col-md-10 col-md-offset-1', '', do_shortcode( get_theme_mod( 'felix_c_form_s_val', '[felix_contact_form]' ) ) );

				} else {

					$atts = array(
						'items' => '',
						'name' => esc_html__( 'Name *', 'felix' ),
						'Email' => esc_html__( 'Email *', 'felix' ),
						'sm' => esc_html__( 'Send request', 'felix' ),
						'message' => esc_html__( 'Message', 'felix' ),
						'smh' => esc_html__( 'Submit', 'felix' ),

					);
					extract( $atts );
					?>
                    <form class="form-request js-ajax-form">
                        <div class="row-fields row">
                            <div class="form-group col-field">
                                <input type="text" class="form- " name="name" required
                                       placeholder="<?php echo esc_attr( $name ); ?>">
                            </div>
                            <div class="form-group col-field">
                                <input type="email" class="form-control" name="email" required
                                       placeholder="<?php echo esc_attr( $Email ); ?>">
                            </div>
                            <div class="form-group col-field">
                            <textarea class="form-control" rows="3" name="message"
                                      placeholder="<?php echo esc_attr( $message ); ?>"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn" data-text-hover="<?php echo esc_attr( $smh ); ?>">
                                    <span class="btn-text"><?php echo esc_html( $sm ); ?></span>
                                    <span class="line-top">
                            <span class="line-square-l-t line-square"></span>
                            <span class="line-square-r-t line-square"></span>
                          </span>
                                    <span class="line-bottom">
                            <span class="line-square-l-b line-square"></span>
                            <span class="line-square-r-b line-square"></span>
                          </span>
                                </button>
                            </div>
                        </div>
                    </form>


					<?php
				}
				?>
            </div>
        </div>
    </div>
</div>

<!-- Modals success -->

<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></span>
                <h2 class="modal-title text-primary"> <?php
					echo esc_html( get_theme_mod( 'felix_c_form_s_susses_title', esc_html__( 'Thank you', 'felix' ) ) ); ?>
                </h2>
                <p class="modal-subtitle">
					<?php echo esc_html( get_theme_mod( 'felix_c_form_s_susses_sub_title', esc_html__( 'Your message is successfully sent...', 'felix' ) ) ); ?>
                </p>

            </div>
        </div>
    </div>
</div>

<!-- Modals error -->

<div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></span>
                <h2 class="modal-title text-primary">
					<?php echo esc_html( get_theme_mod( 'felix_c_form_s_error_title', esc_html__( 'Sorry', 'felix' ) ) ); ?>
                </h2>
                <p class="modal-subtitle">
					<?php echo esc_html( get_theme_mod( 'felix_c_form_s_error_sub_title', esc_html__( 'Something went wrong', 'felix' ) ) ); ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<?php wp_footer(); ?>
</body>
</html>