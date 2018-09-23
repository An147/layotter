<?php

acf_add_local_field_group([
    'key' => 'group_test',
    'title' => '',
    'fields' => [
        [
            'key' => 'field_test',
            'label' => '',
            'name' => 'content',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ],
    ],
    'location' => [
        [
            [
                'param' => 'layotter',
                'operator' => '==',
                'value' => 'element',
            ],
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
]);

acf_add_local_field_group([
    'key' => 'group_5991e509a7176',
    'title' => 'options',
    'fields' => [
        [
            'key' => 'field_5991e51351f18',
            'label' => 'option',
            'name' => 'option',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'layotter',
                'operator' => '==',
                'value' => 'post_options',
            ],
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ],
        ],
        [
            [
                'param' => 'layotter',
                'operator' => '==',
                'value' => 'row_options',
            ],
        ],
        [
            [
                'param' => 'layotter',
                'operator' => '==',
                'value' => 'col_options',
            ],
        ],
        [
            [
                'param' => 'layotter',
                'operator' => '==',
                'value' => 'element_options',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
]);

acf_add_local_field_group([
    'key' => 'group_59932c0076421',
    'title' => 'everything',
    'fields' => [
        [
            'key' => 'field_59932c63623e3',
            'label' => 'basic',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'placement' => 'top',
            'endpoint' => 0,
        ],
        [
            'key' => 'field_59932c10623db',
            'label' => 'text',
            'name' => 'text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ],
        [
            'key' => 'field_59932c1b623dc',
            'label' => 'textarea',
            'name' => 'textarea',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => '',
        ],
        [
            'key' => 'field_59932c29623dd',
            'label' => 'number',
            'name' => 'number',
            'type' => 'number',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => '',
            'max' => '',
            'step' => '',
        ],
        [
            'key' => 'field_5aee2faa65560',
            'label' => 'range',
            'name' => 'range',
            'type' => 'range',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'min' => '',
            'max' => '',
            'step' => '',
            'prepend' => '',
            'append' => '',
        ],
        [
            'key' => 'field_59932c33623de',
            'label' => 'email',
            'name' => 'email',
            'type' => 'email',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ],
        [
            'key' => 'field_59932c3b623df',
            'label' => 'url',
            'name' => 'url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
        ],
        [
            'key' => 'field_59932c41623e0',
            'label' => 'password',
            'name' => 'password',
            'type' => 'password',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ],
        [
            'key' => 'field_59932c55623e2',
            'label' => 'content',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'placement' => 'top',
            'endpoint' => 0,
        ],
        [
            'key' => 'field_59932c7d623e5',
            'label' => 'image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ],
        [
            'key' => 'field_59932c8f623e6',
            'label' => 'file',
            'name' => 'file',
            'type' => 'file',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'return_format' => 'array',
            'library' => 'all',
            'min_size' => '',
            'max_size' => '',
            'mime_types' => '',
        ],
        [
            'key' => 'field_59932c4b623e1',
            'label' => 'wysiwyg',
            'name' => 'wysiwyg',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 0,
        ],
        [
            'key' => 'field_59932c73623e4',
            'label' => 'oembed',
            'name' => 'oembed',
            'type' => 'oembed',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'width' => '',
            'height' => '',
        ],
        [
            'key' => 'field_59932c96623e7',
            'label' => 'gallery',
            'name' => 'gallery',
            'type' => 'gallery',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'min' => '',
            'max' => '',
            'insert' => 'append',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ],
        [
            'key' => 'field_59932ce1623ef',
            'label' => 'choice',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'placement' => 'top',
            'endpoint' => 0,
        ],
        [
            'key' => 'field_59932cfcc021b',
            'label' => 'select',
            'name' => 'select',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'choices' => [
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
            ],
            'default_value' => [],
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ],
        [
            'key' => 'field_59933204146c2',
            'label' => 'select_stylized',
            'name' => 'select_stylized',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'choices' => [
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
            ],
            'default_value' => [],
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ],
        [
            'key' => 'field_59932d30c021c',
            'label' => 'checkbox',
            'name' => 'checkbox',
            'type' => 'checkbox',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'choices' => [
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
            ],
            'allow_custom' => 0,
            'save_custom' => 0,
            'default_value' => [],
            'layout' => 'vertical',
            'toggle' => 0,
            'return_format' => 'value',
        ],
        [
            'key' => 'field_59932d42c021d',
            'label' => 'radio_button',
            'name' => 'radio_button',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'choices' => [
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
            ],
            'allow_null' => 0,
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => '',
            'layout' => 'vertical',
            'return_format' => 'value',
        ],
        [
            'key' => 'field_5aee2fd965561',
            'label' => 'button_group',
            'name' => 'button_group',
            'type' => 'button_group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'choices' => [
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
            ],
            'allow_null' => 0,
            'default_value' => '',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ],
        [
            'key' => 'field_59932d50c021e',
            'label' => 'true_false',
            'name' => 'true_false',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'message' => 'label',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ],
        [
            'key' => 'field_59932c9d623e8',
            'label' => 'relational',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'placement' => 'top',
            'endpoint' => 0,
        ],
        [
            'key' => 'field_59932ca3623e9',
            'label' => 'link',
            'name' => 'link',
            'type' => 'link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'return_format' => 'array',
        ],
        [
            'key' => 'field_59932cad623ea',
            'label' => 'post_object',
            'name' => 'post_object',
            'type' => 'post_object',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'post_type' => [],
            'taxonomy' => [],
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'object',
            'ui' => 1,
        ],
        [
            'key' => 'field_59932cbc623eb',
            'label' => 'page_link',
            'name' => 'page_link',
            'type' => 'page_link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'post_type' => [],
            'taxonomy' => [],
            'allow_null' => 0,
            'allow_archives' => 1,
            'multiple' => 0,
        ],
        [
            'key' => 'field_59932cc5623ec',
            'label' => 'relationship',
            'name' => 'relationship',
            'type' => 'relationship',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'post_type' => [],
            'taxonomy' => [],
            'filters' => [
                0 => 'search',
                1 => 'post_type',
                2 => 'taxonomy',
            ],
            'elements' => '',
            'min' => '',
            'max' => '',
            'return_format' => 'object',
        ],
        [
            'key' => 'field_59932ccd623ed',
            'label' => 'taxonomy',
            'name' => 'taxonomy',
            'type' => 'taxonomy',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'taxonomy' => 'category',
            'field_type' => 'checkbox',
            'allow_null' => 0,
            'add_term' => 1,
            'save_terms' => 0,
            'load_terms' => 0,
            'return_format' => 'id',
            'multiple' => 0,
        ],
        [
            'key' => 'field_59932cd8623ee',
            'label' => 'user',
            'name' => 'user',
            'type' => 'user',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'role' => '',
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'array',
        ],
        [
            'key' => 'field_59932d5bc021f',
            'label' => 'jquery',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'placement' => 'top',
            'endpoint' => 0,
        ],
        [
            'key' => 'field_59932d6ec0220',
            'label' => 'google_map',
            'name' => 'google_map',
            'type' => 'google_map',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'center_lat' => '',
            'center_lng' => '',
            'zoom' => '',
            'height' => '',
        ],
        [
            'key' => 'field_59932d79c0221',
            'label' => 'date_picker',
            'name' => 'date_picker',
            'type' => 'date_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'display_format' => 'd/m/Y',
            'return_format' => 'd/m/Y',
            'first_day' => 1,
        ],
        [
            'key' => 'field_59932d84c0222',
            'label' => 'date_time_picker',
            'name' => 'date_time_picker',
            'type' => 'date_time_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'display_format' => 'd/m/Y g:i a',
            'return_format' => 'd/m/Y g:i a',
            'first_day' => 1,
        ],
        [
            'key' => 'field_59932d8ec0223',
            'label' => 'time_picker',
            'name' => 'time_picker',
            'type' => 'time_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'display_format' => 'g:i a',
            'return_format' => 'g:i a',
        ],
        [
            'key' => 'field_59932d96c0224',
            'label' => 'color_picker',
            'name' => 'color_picker',
            'type' => 'color_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
        ],
        [
            'key' => 'field_59932d9dc0225',
            'label' => 'layout',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'placement' => 'top',
            'endpoint' => 0,
        ],
        [
            'key' => 'field_59932daac0226',
            'label' => 'message',
            'name' => '',
            'type' => 'message',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'message' => 'this is a message',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ],
        [
            'key' => 'field_59932db7c0227',
            'label' => 'group',
            'name' => 'group',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'layout' => 'block',
            'sub_fields' => [
                [
                    'key' => 'field_59932fdfc0228',
                    'label' => 'text',
                    'name' => 'text',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ],
                [
                    'key' => 'field_59932ffdc0229',
                    'label' => 'relationship',
                    'name' => 'relationship',
                    'type' => 'relationship',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'post_type' => [],
                    'taxonomy' => [],
                    'filters' => [
                        0 => 'search',
                        1 => 'post_type',
                        2 => 'taxonomy',
                    ],
                    'elements' => '',
                    'min' => '',
                    'max' => '',
                    'return_format' => 'object',
                ],
            ],
        ],
        [
            'key' => 'field_5993300fc022a',
            'label' => 'repeater',
            'name' => 'repeater',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => '',
            'sub_fields' => [
                [
                    'key' => 'field_5993301ac022b',
                    'label' => 'text',
                    'name' => 'text',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ],
                [
                    'key' => 'field_59933020c022c',
                    'label' => 'relationship',
                    'name' => 'relationship',
                    'type' => 'relationship',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'post_type' => [],
                    'taxonomy' => [],
                    'filters' => [
                        0 => 'search',
                        1 => 'post_type',
                        2 => 'taxonomy',
                    ],
                    'elements' => '',
                    'min' => '',
                    'max' => '',
                    'return_format' => 'object',
                ],
            ],
        ],
        [
            'key' => 'field_5993302ac022d',
            'label' => 'flexible_content',
            'name' => 'flexible_content',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'layouts' => [
                '59933034b02ac' => [
                    'key' => '59933034b02ac',
                    'name' => 'label_1',
                    'label' => 'label 1',
                    'display' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_5993303ec022e',
                            'label' => 'text',
                            'name' => 'text',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ],
                    ],
                    'min' => '',
                    'max' => '',
                ],
                '599332fe146c3' => [
                    'key' => '599332fe146c3',
                    'name' => 'label_2',
                    'label' => 'label 2',
                    'display' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_5993330b146c4',
                            'label' => 'relationship',
                            'name' => 'relationship',
                            'type' => 'relationship',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'post_type' => [],
                            'taxonomy' => [],
                            'filters' => [
                                0 => 'search',
                                1 => 'post_type',
                                2 => 'taxonomy',
                            ],
                            'elements' => '',
                            'min' => '',
                            'max' => '',
                            'return_format' => 'object',
                        ],
                    ],
                    'min' => '',
                    'max' => '',
                ],
            ],
            'button_label' => 'Add Row',
            'min' => '',
            'max' => '',
        ],
        [
            'key' => 'field_5993304fc0230',
            'label' => 'clone_wysiwyg',
            'name' => 'clone_wysiwyg',
            'type' => 'clone',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'clone' => [
                0 => 'field_59932c4b623e1',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_label' => 0,
            'prefix_name' => 0,
        ],
    ],
    'location' => [
        [
            [
                'param' => 'layotter',
                'operator' => '==',
                'value' => 'element',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
]);