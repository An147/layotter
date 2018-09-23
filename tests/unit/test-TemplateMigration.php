<?php

use Layotter\Components\Post;

/**
 * @group unit
 */
class TemplateMigrationTest extends WP_UnitTestCase {

    function test_CanMigrateTemplate() {
        update_option('layotter_element_templates', [
            [
                'template_id' => 0,
                'type' => 'layotter_example_element',
                'values' => [
                    'content' => 'blah blah blah',
                ],
                'options' => [],
                'deleted' => false,
            ]
        ]);

        $post_id = self::factory()->post->create([
            'meta_input' => [
                'layotter_json' => Layotter_Test_Data::POST_150_TEMPLATE_JSON
            ],
            'post_type' => 'page'
        ]);

        $post = new Post($post_id);
        $actual = $post->get_frontend_view();

        $this->assertEquals(Layotter_Test_Data::EXPECTED_VIEW, $actual);
    }
}