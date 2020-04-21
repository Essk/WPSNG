<?php 
    if(have_rows('videos')): ?>
    <div class="sng-videos">
        <ul class="sng-videos__list">
        <?php 
        while(have_rows('videos')):
            the_row();
        ?>
            <li class="sng-videos__item">
                <?php the_sub_field('video'); ?>
            </li>
        <?php endwhile; ?>  
        </ul>
    </div>
<?php 
    endif;