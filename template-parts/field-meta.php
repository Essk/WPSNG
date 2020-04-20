<?php 
    if(have_rows('meta')):
        $fields = get_field('meta');
        ?>
            <aside> 
                <ul>
                <?php foreach($fields as $key => $value): ?>
                    <li><strong><?php echo($key)?></strong>: <?php echo($value)?> </li>
                <?php endforeach; ?>    
                </ul>
            </aside>
<?php 
    endif;