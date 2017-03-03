<?php

namespace Layotter\Acf;

/**
 * This abstraction layer makes it easier to adapt to new ACF versions
 */
class Adapter {

    const REQUIRED_VERSION = '4.4.10';
    const REQUIRED_PRO_VERSION = '5.4.7';

    private static $error_message = '';

    /**
     * Check if ACF is installed
     *
     * @return bool
     */
    public static function is_installed() {
        return class_exists('acf');
    }

    /**
     * Check if ACF Pro is installed
     *
     * @return bool
     */
    public static function is_pro_installed() {
        return class_exists('acf_pro');
    }

    /**
     * Check if the installed version of ACF is compatible with this version of Layotter
     *
     * @return bool
     */
    public static function is_version_compatible() {
        if (self::is_pro_installed()) {
            return (version_compare(acf_get_setting('version'), self::REQUIRED_PRO_VERSION) >= 0);
        } else {
            return (version_compare(acf()->get_info('version'), self::REQUIRED_VERSION) >= 0);
        }
    }

    /**
     * Write an error message if no compatible version of ACF is installed
     *
     * @return bool
     */
    public static function is_available() {
        if (!self::is_installed()) {
            self::$error_message = sprintf(__('Layotter requires the <a href="%s" target="_blank">Advanced Custom Fields</a> plugin, please install it before using Layotter.', 'layotter'), 'http://www.advancedcustomfields.com');
        } else if (!self::is_version_compatible()) {
            $required_version = self::is_pro_installed() ? self::REQUIRED_PRO_VERSION : self::REQUIRED_VERSION;
            self::$error_message = sprintf(__('Your version of Advanced Custom Fields is outdated. Please install version %s or higher to be able to use Layotter.', 'layotter'), $required_version);
        }

        if (!empty(self::$error_message)) {
            add_action('admin_notices', array(__CLASS__, 'print_error'));
            return false;
        }

        return true;
    }

    /**
     * Output error message
     */
    public static function print_error() {
        ?>
        <div class="error">
            <p>
                <?php echo self::$error_message; ?>
            </p>
        </div>
        <?php
    }

    /**
     * Get the post type for ACF field groups
     *
     * @return string Post type for ACF field groups
     */
    public static function get_field_group_post_type() {
        if (self::is_pro_installed()) {
            return 'acf-field-group';
        } else {
            return 'acf';
        }
    }

    /**
     * Get all ACF field groups
     *
     * @return array All ACF field groups (array format varies between the free and Pro version)
     */
    public static function get_all_field_groups() {
        if (self::is_pro_installed()) {
            return acf_get_field_groups();
        } else {
            return apply_filters('acf/get_field_groups', array());
        }
    }

    /**
     * Returns field group name for the example element that comes with Layotter
     *
     * @return string Field group name
     */
    public static function get_example_field_group_name() {
        return self::is_pro_installed() ? 'group_5605a65191086' : 'acf_title';
    }

    /**
     * Get ACF field groups that match a given set of location rules
     *
     * @param array $filters ACF location rules
     * @return array Filtered ACF field groups (array format varies between the free and Pro versions of ACF)
     */
    public static function get_filtered_field_groups($filters) {
        if (self::is_pro_installed()) {
            $field_groups = self::get_all_field_groups();
            $filtered_field_groups = array();

            foreach ($field_groups as $field_group) {
                foreach ($field_group['location'] as $location_group) {
                    if (!empty($location_group)) {
                        foreach ($location_group as $rule) {
                            if ($rule['param'] == 'layotter') {
                                // force rule match for 'layotter' rules
                                $match = apply_filters('acf/location/rule_match/layotter', false, $rule, $filters);
                                if ($match) {
                                    $filtered_field_groups[] = $field_group;
                                }
                            }
                        }
                    }
                }
            }

            return $filtered_field_groups;
        } else {
            return apply_filters('acf/location/match_field_groups', array(), $filters);
        }
    }

    /**
     * Check if a given field group matches a given set of location rules
     *
     * @param array $field_group ACF field group (array format varies between the free and Pro versions of ACF)
     * @param array $filters ACF location rules
     * @return bool
     */
    public static function is_field_group_visible($field_group, $filters) {
        if (self::is_pro_installed()) {
            return acf_get_field_group_visibility($field_group, $filters);
        } else {
            $filtered_field_group_ids = apply_filters('acf/location/match_field_groups', array(), $filters);
            return in_array($field_group['id'], $filtered_field_group_ids);
        }
    }

    /**
     * Get fields for a given field group
     *
     * @param array $field_group ACF field group (array format varies between the free and Pro versions of ACF)
     * @return array|bool ACF fields, or false or empty array (depending on the ACF version) if the group doesn't exist
     */
    public static function get_fields($field_group) {
        if (self::is_pro_installed()) {
            return acf_get_fields($field_group);
        } else {
            return apply_filters('acf/field_group/get_fields', array(), $field_group['id']);
        }
    }

    /**
     * Get form HTML for a set of fields
     *
     * @param array $fields ACF fields
     * @param int $id Element's post ID
     * @return string Form HTML
     */
    public static function get_form_html($fields, $id = 0) {
        ob_start();

        if (self::is_pro_installed()) {
            acf_render_fields($id, $fields);
        } else {
            do_action('acf/create_fields', $fields, $id);
        }

        return ob_get_clean();
    }

    /**
     * Get a field group by its ID
     *
     * @param int $id ACF field group ID (post ID)
     * @return array|bool ACF field group, or false or empty array (depending on the ACF version) if the ID doesn't exist
     */
    public static function get_field_group_by_id($id) {
        if (self::is_pro_installed()) {
            return _acf_get_field_group_by_id($id);
        } else {
            $field_groups = self::get_all_field_groups();
            foreach ($field_groups as $field_group) {
                if ($field_group['id'] == $id) {
                    return $field_group;
                }
            }
            return false;
        }
    }

    /**
     * Get a field group by its key
     *
     * @param string $key ACF field group key (slug)
     * @return array|bool ACF field group, or false or empty array (depending on the ACF version) if the key doesn't exist
     */
    public static function get_field_group_by_key($key) {
        if (self::is_pro_installed()) {
            return _acf_get_field_group_by_key($key);
        } else {
            // keys are not supported with ACF 4, fall back to ID
            return self::get_field_group_by_id($key);
        }
    }

    /**
     * Output form wrapper HTML depending on the installed version of ACF
     */
    public static function output_form_wrapper() {
        if (self::is_pro_installed()) {
            ?>
            <div class="acf-postbox">
                <div id="acf-form-data" class="acf-hidden">
                    <input type="hidden" name="_acfnonce" value="{{ form.nonce }}">
                    <input id="layotter-changed" type="hidden" name="_acfchanged" value="0">
                </div>
                <div class="acf-fields" ng-bind-html="form.fields | rawHtml"></div>
            </div>
            <?php
        } else {
            ?>
            <div class="acf_postbox">
                <div class="inside" ng-bind-html="form.fields | rawHtml"></div>
            </div>
            <?php
        }
    }

}
