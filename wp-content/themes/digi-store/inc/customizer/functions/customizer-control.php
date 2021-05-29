<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


/**
 * Multiple select customize control class.
 */
class digi_store_Customize_Control_Multiple_Select extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     */
    public $type = 'multiple-select';

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content() {

    if ( empty( $this->choices ) )
        return;
    ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                <?php
                    foreach ( $this->choices as $value => $label ) {
                        $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                        echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
                    }
                ?>
            </select>
        </label>
    <?php }
}

class digi_store_Support_Control extends WP_Customize_Control {

    /**
     * Render the content on the theme customizer page
     */
    public $type = "digi-store-support";

    public function enqueue() {
        wp_enqueue_style( 'digi-store-customizer-style', trailingslashit( get_template_directory_uri() ) . '/inc/customizer/css/customizer-control.css' );
        /* js */
    }

    public function render_content() {
        //Add Theme instruction, Support Forum, Demo Link, Rating Link

        ?><p>
        <a class="digi-store-support" target="_blank" href="<?php echo esc_url('https://codethemes.co/wp-content/uploads/2018/02/Digi-Store-Lite-Documentaiton.pdf'); ?>"><span class="dashicons dashicons-book-alt"></span><?php echo  esc_html__('Documentation', 'digi-store') ?></a>

        <a class="digi-store-support" target="_blank" href="<?php echo  esc_url('https://Codethemes.co/my-tickets/') ?>"><span class="dashicons dashicons-edit"></span><?php echo esc_html__('Create a Ticket', 'digi-store') ?></a>

        <a class="digi-store-support" target="_blank" href="<?php echo esc_url('https://codethemes.co/product/digi-store/?add-to-cart=5097'); ?>"><span class="dashicons dashicons-star-filled"></span><?php echo esc_html__('Buy Premium', 'digi-store') ?></a>

        <a class="support-image digi-store-support" target="_blank" href="<?php echo  esc_url('https://Codethemes.co/support/#customization_support') ?>"><img src = "<?php echo esc_url(get_template_directory_uri() . '/assets/img/wparmy.png') ?>" /> <?php echo esc_html__('Request Customization', 'digi-store'); ?></a>
        </p>
        <?php
    }
}