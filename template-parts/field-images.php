<?php 
    if(have_rows('images')):
        $images = get_field('images');
        ?>
        <div class="sng-images">
        <ul class="sng-images__list row">
        <?php foreach( $images as $image ): ?>
            <li class="sng-images__item">
                <a href="<?php echo esc_url($image['url']); ?>" class="sng-images__link">
                     <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  class="sng-images__image"/>
                </a>
                <p class="sng-images__caption"><?php echo esc_html($image['caption']); ?></p>
            </li>
        <?php endforeach; ?>  
        </ul>
        </div>

<?php 
    endif;