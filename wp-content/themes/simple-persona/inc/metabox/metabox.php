<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Select Sidebar, Header Featured Image Options, Single Page/Post Image
 * This is only for the design purpose and not used to save any content
 *
 * @package Simple Persona
 */



/**
 * Class to Renders and save metabox options
 *
 * @since Simple Persona 0.1
 */
class Simple_Persona_Metabox {
	private $meta_box;

	private $fields;

	/**
	* Constructor
	*
	* @since Simple Persona 0.1
	*
	* @access public
	*
	*/
	public function __construct( $meta_box_id, $meta_box_title, $post_type ) {

		$this->meta_box = array (
							'id'        => $meta_box_id,
							'title'     => $meta_box_title,
							'post_type' => $post_type,
							);

		$this->fields = array(
			'simple-persona-header-image',
			'simple-persona-featured-image',
		);


		// Add metaboxes
		add_action( 'add_meta_boxes', array( $this, 'add' ) );

		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	* Add Meta Box for multiple post types.
	*
	* @since Simple Persona 0.1
	*
	* @access public
	*/
	public function add( $post_type ) {
		add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $post_type, 'side', 'high' );
	}

	/**
	* Renders metabox
	*
	* @since Simple Persona 0.1
	*
	* @access public
	*/
	public function show() {
		global $post;

		$header_image_options = array(
			'default' => esc_html__( 'Default', 'simple-persona' ),
			'enable'  => esc_html__( 'Enable', 'simple-persona' ),
			'disable' => esc_html__( 'Disable', 'simple-persona' ),
		);

		$featured_image_options = array(
			'default'        => esc_html__( 'Default', 'simple-persona' ),
			'disabled'       => esc_html__( 'Disabled', 'simple-persona' ),
			'post-thumbnail' => esc_html__( 'Post Thumbnail (470x470)', 'simple-persona' ),
			'simple-persona-slider' => esc_html__( 'Slider Image (1920x954)', 'simple-persona' ),
			'full'           => esc_html__( 'Original Image Size', 'simple-persona' ),
		);


		// Use nonce for verification
		wp_nonce_field( basename( __FILE__ ), 'simple_persona_custom_meta_box_nonce' );

		// Begin the field table and loop  ?>
		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="simple-persona-header-image"><?php esc_html_e( 'Header Featured Image Options', 'simple-persona' ); ?></label></p>
		<select class="widefat" name="simple-persona-header-image" id="simple-persona-header-image">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'simple-persona-header-image', true );
				
				if ( empty( $meta_value ) ){
					$meta_value='default';
				}
				
				foreach ( $header_image_options as $field =>$label ) {	
				?>
					<option value="<?php echo esc_attr( $field ); ?>" <?php selected( $meta_value, $field ); ?>><?php echo esc_html( $label ); ?></option>
				<?php
				} // end foreach
			?>
		</select>
		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="simple-persona-featured-image"><?php esc_html_e( 'Single Page/Post Image', 'simple-persona' ); ?></label></p>
		<select class="widefat" name="simple-persona-featured-image" id="simple-persona-featured-image">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'simple-persona-featured-image', true );
				
				if ( empty( $meta_value ) ){
					$meta_value='default';
				}
				
				foreach ( $featured_image_options as $field =>$label ) {	
				?>
					<option value="<?php echo esc_attr( $field ); ?>" <?php selected( $meta_value, $field ); ?>><?php echo esc_html( $label ); ?></option>
				<?php
				} // end foreach
			?>
		</select>


			
	<?php
	}

	/**
	 * Save custom metabox data
	 *
	 * @action save_post
	 *
	 * @since Simple Persona 0.1
	 *
	 * @access public
	 */
	public function save( $post_id ) {
		global $post_type;

		$post_type_object = get_post_type_object( $post_type );

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      // Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
		|| ( ! in_array( $post_type, $this->meta_box['post_type'] ) )                  // Check if current post type is supported.
		|| ( ! check_admin_referer( basename( __FILE__ ), 'simple_persona_custom_meta_box_nonce') )    // Check nonce - Security
		|| ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )  // Check permission
		{
		  return $post_id;
		}

		foreach ( $this->fields as $field ) {
			$new = $_POST[ $field ];

			delete_post_meta( $post_id, $field );

			if ( '' == $new || array() == $new ) {
				return;
			} else {
				if ( ! update_post_meta ( $post_id, $field, sanitize_key( $new ) ) ) {
					add_post_meta( $post_id, $field, sanitize_key( $new ), true );
				}
			}
		} // end foreach
	}
}

$simple_persona_metabox = new Simple_Persona_Metabox(
	'simple-persona-options',                  //metabox id
	esc_html__( 'Simple Persona Options', 'simple-persona' ), //metabox title
	array( 'page', 'post' )             //metabox post types
);
