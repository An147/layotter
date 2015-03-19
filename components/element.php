<?php


/**
 * All custom element types must extend this class
 */
abstract class Eddditor_Element extends Eddditor_Editable implements JsonSerializable {

    
    protected
        // internal use only
        $type = '',
        // user-defined
        $title,
        $description,
        $icon,
        $field_group,
        // automatically generated
        $options = array();


    /**
     * attributes() is required and should assign $this->title, $this->description, $this->icon and $this->field_group
     */
    abstract protected function attributes();


    /**
     * admin_assets() is optional and should be used to enqueue scripts and styles
     */
    public function admin_assets() {}


    /**
     * Create a new element
     *
     * @param array $structure Element structure
     * @throws Exception If the ACF field group defined for this element doesn't exist
     */
    final public function __construct($structure) {
        $this->attributes();
        $this->hooks();

        $structure = $this->validate_structure($structure);
        $this->type = $structure['type'];
        $values = $structure['values'];
        $option_values = $structure['options'];

        $fields = $this->get_fields();
        $this->apply_values($fields, $values);

        $this->form->set_title($this->title);
        $this->form->set_icon($this->icon);

        $this->options = new Eddditor_Options('element', $option_values);
    }


    /**
     * Get ACF fields for this element
     *
     * @return array ACF fields
     * @throws Exception If $this->field_group wasn't assigned correctly in $this->attributes()
     */
    final protected function get_fields() {
        // field group can be provided as post id (int) or slug ("group_xyz") of post type 'acf-field-group'
        if (!is_int($this->field_group) AND !is_string($this->field_group)) {
            throw new Exception('$this->field_group must be assigned in attributes()');
        }

        $identifier
            = is_int($this->field_group)
            ? 'p' // get post by ID
            : 'name'; // get post by slug

        // get ACF field group
        $field_groups = get_posts(array(
            'post_type' => 'acf-field-group',
            $identifier => $this->field_group
        ));

        // check if the field group exists
        if (!is_array($field_groups) OR empty($field_groups)) {
            throw new Exception('No ACF field group found for ' . $identifier . '=' . $this->field_group . '.');
        }

        // return fields for the provided ACF field group
        return acf_get_fields($field_groups[0]);
    }


    /**
     * Register all necessary actions and filters
     */
    final protected function hooks() {
        if (is_callable(array($this, 'admin_assets'))) {
            add_action('admin_footer', array($this, 'admin_assets'));
        }
    }


    /**
     * Check if this element type is enabled for a specific post
     *
     * @param int $post_id Post ID
     * @return bool Whether this element type is enabled
     */
    final public function is_enabled_for($post_id) {
        $post_id = intval($post_id);
        $post_type = get_post_type($post_id);

        // get ACF field group for this post's type
        $field_groups = acf_get_field_groups(array(
            'post_type' => $post_type,
            'eddditor' => 'element'
        ));

        $identifier
            = is_int($this->field_group)
            ? 'ID' // filter ACF groups by post ID
            : 'key'; // filter ACF groups by post slug

        // if $this->field_group is enabled for the current post's type, return true
        foreach ($field_groups as $field_group) {
            if ($field_group[$identifier] == $this->field_group) {
                return true;
            }
        }

        return false;
    }


    /**
     * Get element data
     *
     * @param string $what What to get - can be 'type', 'title', 'description', 'icon'
     * @return string Requested data
     */
    final public function get($what) {
        switch ($what) {
            case 'type':
                return $this->type;

            case 'title':
                return $this->title;

            case 'description':
                return $this->description;

            case 'icon':
                return $this->icon;

            default:
                return null;
        }
    }


    /**
     * Validate an array containing an element's structure
     *
     * Validates array structure and presence of required key/value pairs
     *
     * @param array $structure Element structure
     * @return array Validated element structure
     */
    private function validate_structure($structure) {
        if (!isset($structure['type']) OR !is_string($structure['type'])) {
            $structure['type'] = '';
        }

        if (!isset($structure['values']) OR !is_array($structure['values'])) {
            $structure['values'] = array();
        }

        if (!isset($structure['options']) OR !is_array($structure['options'])) {
            $structure['options'] = array();
        }

        return $structure;
    }


    /**
     * Return array representation of this element for use in json_encode()
     *
     * @return array Array representation of this element
     */
    final public function jsonSerialize() {
        return array(
            'type' => $this->type,
            'values' => $this->clean_values,
            'options' => $this->options,
            'view' => $this->get_backend_view()
        );
    }
    
    
    /**
     * Output a basic backend view
     * 
     * Should be overwritten by custom element types.
     * 
     * @param array $fields Field values
     */
    protected function backend_view($fields) {
        $this->default_view($fields);
    }
    
    
    /**
     * Output a basic frontend view
     * 
     * Should be overwritten by custom element types.
     * 
     * @param array $fields Field values
     */
    protected function frontend_view($fields) {
        $this->default_view($fields);
    }
    
    
    /**
     * Output a basic default view
     * 
     * Used only if a custom element type doesn't provide its own backend or
     * frontend view.
     * 
     * @param array $fields Field values
     */
    final protected function default_view($fields) {
        echo '<p><strong>' . $this->title . '</strong></p>';

        foreach ($fields as $field_name => $field_value) {
            echo $field_name . ': ';
            print_r($field_value);
            echo '<br>';
        }
    }


    /**
     * Get the backend view
     *
     * @return string Backend view HTML
     */
    final public function get_backend_view() {
        ob_start();
        $this->backend_view($this->formatted_values);
        return ob_get_clean();
    }


    /**
     * Get the frontend view
     *
     * @return string Frontend view HTML
     */
    final public function get_frontend_view() {
        ob_start();
        $this->frontend_view($this->formatted_values);
        $element_html = ob_get_clean();

        if (has_filter('eddditor/element')) {
            return apply_filters('eddditor/element', $element_html, $this->options->get_formatted_values());
        } else {
            $settings = Eddditor_Settings::get_settings('elements');
            return $settings['html_before'] . $element_html . $settings['html_after'];
        }
    }
    
    
}
