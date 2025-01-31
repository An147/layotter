<?php


/**
 * A single post
 */
class Layotter_Post {

    private
        $options,
        $rows = array(),
        $is_term = false;


    /**
     * Create an object for a post
     *
     * @param int|string $id_or_json Post ID or JSON object holding post structure
     */
    public function __construct($id_or_json) {

        // var_error_log($id_or_json);

        if (is_numeric($id_or_json)) {
            $this->is_term = $this->is_term_being_edited_or_viewed($id_or_json);
        }

        // error_log('is term?:'.var_export($this->is_term, true));

        $structure = $this->get_structure($id_or_json);

        // var_error_log($structure);

        $structure = $this->validate_structure($structure);

        // var_error_log($structure);

        $this->options = new Layotter_Options('post', $structure['options']);

        foreach ($structure['rows'] as $row) {
            $this->rows[] = new Layotter_Row($row);
        }
    }


    /**
     * Create a post structure array using a post ID or JSON data
     *
     * @param int|string $id_or_json Post ID, JSON or post content
     * @return string JSON string containing post structure or null for new posts
     */
    private function get_structure($id_or_json) {
        if (is_numeric($id_or_json)) {
            $json = $this->get_json_by_post_id($id_or_json);
        } else {
            $json = $id_or_json;
        }

        // var_error_log($this->is_json($json));

        if ($this->is_json($json)) {
            return json_decode($json, true);
        } else {
            return json_decode(null, true); // TODO: what am I doing here?
        }
    }


    /**
     * Validate an array containing the post structure
     *
     * Validates array structure and presence of required key/value pairs
     *
     * @param array $structure Post structure
     * @return array Validated post structure
     */
    private function validate_structure($structure) {

        // error_log('validate_structure');

        // var_error_log(!is_array($structure));

        if (!is_array($structure)) {
            $structure = array();
        }

        if (!isset($structure['options']) OR !is_array($structure['options'])) {
            $structure['options'] = array();
        }

        if (!isset($structure['rows']) OR !is_array($structure['rows'])) {
            $structure['rows'] = array();
        }

        return $structure;
    }


    /**
     * Return array representation of this post for use in json_encode()
     *
     * PHP's JsonSerializable interface would be cleaner, but it's only available >= 5.4.0
     *
     * @return array Array representation of this post
     */
    public function to_array() {
        $rows = array();

        foreach ($this->rows as $row) {
            $rows[] = $row->to_array();
        }

        return array(
            'options' => $this->options->to_array(),
            'rows' => $rows
        );
    }


    /**
     * Return frontend HTML for this post
     *
     * @return string Frontend HTML
     */
    public function get_frontend_view() {
        $rows_html = '';
        foreach ($this->rows as $row) {
            $rows_html .= $row->get_frontend_view($this->options->get_formatted_values());
        }

        // if a custom filter for frontend was hooked, run through that filter and return HTML
        if (has_filter('layotter/view/post')) {
            return apply_filters('layotter/view/post', $rows_html, $this->options->get_formatted_values());
        } else {
            // otherwise, get HTML wrapper from settings, apply and return HTML
            $html_wrapper = Layotter_Settings::get_html_wrapper('wrapper');
            return $html_wrapper['before'] . $rows_html . $html_wrapper['after'];
        }
    }


    /**
     * Check if a string contains the JSON representation of an array
     *
     * @param mixed $maybe_json Something that might be a string containing JSON data
     * @return bool Whether the parameter contained a JSON array
     */
    private function is_json($maybe_json) {
        // var_error_log($maybe_json);
        $maybe_array = json_decode($maybe_json, true);
        // var_error_log($maybe_array);
        return is_array($maybe_array);
    }

    //get term meta field
      public function get_tax_meta($term_id,$key,$multi = false){
        $t_id = (is_object($term_id))? $term_id->term_id: $term_id;
        $m = get_option( 'tax_meta_'.$t_id);  
        // error_log('loading json of term_'.$term_id);
        // var_error_log($m[$key]);
        if (isset($m[$key])){
          return stripslashes($m[$key]);
        }else{
          return '';
        }
      }
      
      //delete meta
      // public function delete_tax_meta($term_id,$key){
      //   $m = get_option( 'tax_meta_'.$term_id);
      //   if (isset($m[$key])){
      //     unset($m[$key]);
      //   }
      //   update_option('tax_meta_'.$term_id,$m);
      // }
      
      // update meta
      public function update_tax_meta($term_id,$key,$value){
        $m = get_option( 'tax_meta_'.$term_id);
        $m[$key] = $value;
        update_option('tax_meta_'.$term_id,$m);
      }



    private function fetch_layotter_data($post_id){

        // error_log('fetch_layotter_data');

        // var_error_log($this->is_term);
        if($this->is_term){
            return $this->get_tax_meta($post_id, 'layotter_json');
        }
        else{
            return get_post_meta($post_id, 'layotter_json', true);
        }
    }
    /**
     * Check if post 1.5.0 data structure is present for this post
     *
     * i.e. if JSON is in a custom field instead of the post content
     *
     * @param int $post_id Post ID
     * @return bool
     */
    private function has_new_data_structure($post_id) {
        $json = $this->fetch_layotter_data($post_id);

        if (!empty($json)) {
            return true;
        }

        return false;
    }

    private function is_term_being_edited_or_viewed($term_id) {

        $isTermBeingEdited = Layotter::is_term_being_edited();
        $isTermBeingViewed = Layotter::is_term_being_viewed($term_id);




        // var_error_log($isTermBeingEdited);
        // var_error_log($isTermBeingViewed);

        return $isTermBeingEdited || $isTermBeingViewed;
    }


    /**
     * Get post JSON by post ID
     *
     * @param int $post_id Post ID
     * @return string|null JSON string containing post structure or null for new posts
     */
    private function get_json_by_post_id($post_id) {
            
        // error_log('get_json_by_post_id');
        
        if ($this->has_new_data_structure($post_id) !== false) {
            // if post 1.5.0 data structure is present, get JSON from custom field
            return  $this->fetch_layotter_data($post_id);
        } else {
            // otherwise, try to extract data from the post content
            return $this->get_json_from_legacy_post_content($post_id);
        }
    }


    /**
     * Extract post JSON from post content for a post ID
     *
     * JSON used to be stored in the main content wrapped like this: [layotter]json[/layotter]
     * This method extracts JSON from posts that haven't been updated to the new style yet.
     *
     * @param int $post_id Post ID with pre 1.5.0 style post content
     * @return string|null JSON string containing post structure or null for new posts
     */
    private function get_json_from_legacy_post_content($post_id) {
        $content_raw = get_post_field('post_content', $post_id);

        // verify that the content is correctly formatted, unwrap from shortcode
        $matches = array();
        if (preg_match('/\[layotter\](.*)\[\/layotter\]/ms', $content_raw, $matches)) {
            $content_json = $matches[1];
            return $content_json;
        } else {
            return null;
        }
    }

}