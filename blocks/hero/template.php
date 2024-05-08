<?php
/**
 * The template file to display the block. 
 * 
 * Available Parameters
 * 
 * @param array $attributes The block attributes
 * @param bool $is_preview Whether in the preview mode. 
 */

$my_wrapper = get_block_wrapper_attributes();
error_log( print_r( (object)
    [
        'file' => __FILE__,
        'method' => __METHOD__,
        'line' => __LINE__,
        'dump' => [
            $my_wrapper,
        ],
    ], true ) );
    
// Fields' data.
if ( empty( $attributes['data'] ) ) {
    // return;
}
error_log( print_r( (object)
    [
        'file' => __FILE__,
        'method' => __METHOD__,
        'line' => __LINE__,
        'dump' => [
            $attributes,
        ],
    ], true ) );

    // Unique HTML ID if available.
$id = 'hero-' . ( $attributes['id'] ?? '' );
if ( ! empty( $attributes['anchor'] ) ) {
    $id = $attributes['anchor'];
}

error_log( print_r( (object)
    [
        'file' => __FILE__,
        'method' => __METHOD__,
        'line' => __LINE__,
        'dump' => [
            $id,
        ],
    ], true ) );
// Custom CSS class name.
$class = 'hero ' . ( $attributes['className'] ?? '' );
if ( ! empty( $attributes['align'] ) ) {
    $class .= " align{$attributes['align']}";
}

error_log( print_r( (object)
    [
        'file' => __FILE__,
        'method' => __METHOD__,
        'line' => __LINE__,
        'dump' => [
            $class,
        ],
    ], true ) );

$cdvfront = mb_get_block_field( 'front' );
$cdvrear  = mb_get_block_field( 'rear' );
$bg = mb_get_block_field( 'background_color' );
$cit = mb_get_block_field( 'citation' );

error_log( print_r( (object)
    [
        'file' => __FILE__,
        'method' => __METHOD__,
        'line' => __LINE__,
        'dump' => [
            $cdvfront, $cdvrear, $bg, $cit,
        ],
    ], true ) );
?>
<div id="<?= $id ?>" class="<?= $class ?>" style="background-color: <?= mb_get_block_field( 'background_color' ) ?>">
    <?php $cdvfront = mb_get_block_field( 'front' ); ?>
    <?php $cdvrear  = mb_get_block_field( 'rear' ); ?>
    <div class="hero__body">
        <img class="hero__front" src="<?= $cdvfront['full_url'] ?> ">
        <img class="hero__rear"  src="<?= $cdvrear['full_url'] ?> ">
        <?php if ( mb_get_block_field( 'citation' ) ) : ?>
            <p><?php mb_the_block_field( 'citation' ) ?></p>
        <?php endif ?>
    </div>
</div>