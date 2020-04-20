<?php 
    if(have_rows('videos')): ?>
        <ul>
        <?php 
        while(have_rows('videos')):
            the_row();
        ?>
            <li>
                <?php the_sub_field('video'); ?>
            </li>
        <?php endwhile; ?>  
        </ul>
<?php 
    endif;