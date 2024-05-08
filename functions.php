<?php
add_action( 'wp_enqueue_scripts', 'ChesterCountyPhotographist_enqueue_child_theme_styles', PHP_INT_MAX);

function ChesterCountyPhotographist_enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css', array('parent-style') );
}


add_filter( 'rwmb_meta_boxes', 'create_my_metabox');
function create_my_metabox( $meta_boxes ) {
    $meta_boxes[] = [
        'title'           => 'Hero Area',
        'id'              => 'hero-area',
        'description'     => 'A custom hero content block. Enter settings to side. ',
        // Block settings.
        'type'            => 'block',
        'icon'            => 'awards',
        'category'        => 'layout',
        'context'         => 'side',
        // 'render_template' => get_stylesheet_directory() . '/blocks/hero/template.php',
        'render_callback' => 'my_hero_callback',
        'enqueue_style'   => get_template_directory_uri() . '/blocks/hero/style.css',
        'mode' => 'edit',
        'supports' => [
            'align' => ['wide', 'full'],
        ],

        // Block fields.
        'fields'          => [
            [
                'type' => 'single_image',
                'id'   => 'front',
                'name' => 'Front',
            ],
            [
                'type' => 'single_image',
                'id'   => 'rear',
                'name' => 'Rear',
            ],
            [
                'type' => 'text',
                'id'   => 'citation',
                'name' => 'Citation',
            ],
            [
                'type' => 'color',
                'id'   => 'background_color',
                'name' => 'Background Color',
            ]
        ],
    ];
    return $meta_boxes;
};


function my_hero_callback( $attributes ) {
    // Fields's data.
    if ( empty( $attributes['data'] ) ) {
        return;
    }

    // Custom CSS class name.
    $class = 'hero ' . ( $attributes['className'] ?? '' );
    if ( ! empty( $attributes['align'] ) ) {
        $class .= " align{$attributes['align']}";
    }

    ?>
    <div class="<?= $class ?>" style="background-color: <?= $attributes['background_color'] ?>">

<!-- wp:kadence/rowlayout {"uniqueID":"1667_40768b-ff","columns":3,"tabletLayout":"first-row","columnGutter":"skinny","customGutter":[16,"",""],"colLayout":"left-half","minHeight":572,"maxWidth":1475,"bgColor":"palette9","align":"wide","firstColumnWidth":30,"secondColumnWidth":35,"columnsInnerHeight":true,"inheritMaxWidth":true,"bgColorClass":"theme-palette9","padding":["xl","","xl",""],"kbVersion":2,"metadata":{"name":"Row - Caption \u0026 Both Sides - Quaker Woman"}} -->
<!-- wp:kadence/column {"background":"palette8","borderWidth":["","","",""],"borderRadius":[24,24,24,24],"uniqueID":"1667_e1f198-3a","textAlign":["center","",""],"direction":["vertical","",""],"verticalAlignment":"middle","padding":["lg","xl","lg","xl"],"mobilePadding":["sm","sm","sm","sm"],"mobileMargin":["","",25,""],"kbVersion":2} -->
<div class="wp-block-kadence-column kadence-column1667_e1f198-3a kb-section-dir-vertical"><div class="kt-inside-inner-col"><!-- wp:kadence/advancedheading {"uniqueID":"1667_db1eb9-99","align":"left","color":"palette3","margin":["0","","0",""],"markBorder":"","markBorderStyles":[{"top":[null,"",1],"right":[null,"",1],"bottom":[null,"",1],"left":[null,"",1],"unit":"px"}],"tabletMarkBorderStyles":[{"top":[null,"",1],"right":[null,"",1],"bottom":[null,"",1],"left":[null,"",1],"unit":"px"}],"mobileMarkBorderStyles":[{"top":[null,"",1],"right":[null,"",1],"bottom":[null,"",1],"left":[null,"",1],"unit":"px"}],"colorClass":"theme-palette3","htmlTag":"p","link":"","background":"","backgroundColorClass":"","linkStyle":"none","linkColor":"palette2","fontSize":[17,"xl","lg"],"fontHeight":[1.2,1.3,1.3]} -->
<p class="kt-adv-heading1667_db1eb9-99 wp-block-kadence-advancedheading has-theme-palette-3-color has-text-color hls-none" data-kb-block="kb-adv-heading1667_db1eb9-99"><?= $attributes[ 'citation' ] ?></p>
<!-- /wp:kadence/advancedheading --></div></div>
<!-- /wp:kadence/column -->

<!-- wp:kadence/column {"id":2,"borderWidth":["","","",""],"uniqueID":"1667_0ec72a-60","textAlign":[null,"center","center"],"direction":["vertical","",""],"kbVersion":2} -->
<div class="wp-block-kadence-column kadence-column1667_0ec72a-60 kb-section-dir-vertical"><div class="kt-inside-inner-col"><!-- wp:kadence/image {"id":1683,"imgMaxWidth":400,"sizeSlug":"full","ratio":"port34","linkDestination":"none","uniqueID":"1667_2b1708-97","borderRadius":[24,24,24,24],"showCaption":false,"captionStyles":[{"size":["md","",""],"sizeType":"px","lineHeight":["","",""],"lineType":"px","letterSpacing":"","textTransform":"","family":"","google":false,"style":"","weight":"","variant":"","subset":"","loadGoogle":true,"color":"palette3","background":""}]} -->
<figure class="wp-block-kadence-image kb-image1667_2b1708-97 size-full"><img src="<?= $attributes['front']['sizes']['carte_de_viste']['url'] ?>" alt="<?= $attributes['rear']['alt'] ?>" class="kb-img"/></figure>
<!-- /wp:kadence/image --></div></div>
<!-- /wp:kadence/column -->

<!-- wp:kadence/column {"id":3,"borderWidth":["","","",""],"uniqueID":"1667_28a280-b4","textAlign":[null,"center","center"],"kbVersion":2,"className":"inner-column-3"} -->
<div class="wp-block-kadence-column kadence-column1667_28a280-b4 inner-column-3"><div class="kt-inside-inner-col"><!-- wp:kadence/image {"id":1685,"imgMaxWidth":400,"sizeSlug":"full","ratio":"port34","linkDestination":"none","uniqueID":"1667_350550-92","borderRadius":[24,24,24,24],"showCaption":false,"captionStyles":[{"size":["md","",""],"sizeType":"px","lineHeight":["","",""],"lineType":"px","letterSpacing":"","textTransform":"","family":"","google":false,"style":"","weight":"","variant":"","subset":"","loadGoogle":true,"color":"palette3","background":""}]} -->
<figure class="wp-block-kadence-image kb-image1667_350550-92 size-full"><img src="<?= $attributes['rear']['sizes']['carte_de_viste']['url'] ?>" alt="<?= $attributes['rear']['alt'] ?>" class="kb-img"/></figure>
<!-- /wp:kadence/image --></div></div>
<!-- /wp:kadence/column -->
<!-- /wp:kadence/rowlayout -->
<?php
}