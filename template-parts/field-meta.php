<?php 
    if(have_rows('meta')):
        $fields = get_field('meta');
        ?>
            <aside> 
                <ul>
                <?php foreach($fields as $key => $value): 
                    $field = $fields[$key];
                    ?>
                    <li><strong><?php echo($key)?></strong>: 
                    <?php if(
                        is_array($field) 
                        && array_key_exists('text', $field) 
                        && array_key_exists('url', $field)): 
                        $text = $fields[$key]['text'];
                        $url = $fields[$key]['url'];
                        $link_text = $text && $text !== '' ? $text : $url;
                        if($url && $url !== ''): ?>
                            <a href="<?php echo $url?>">
                                <?php echo $link_text; ?>
                            </a>
                        <?php else: ?>
                        <?php echo $text; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo $value; ?>
                    <?php endif; ?>
                    </li>
                <?php endforeach; ?>    
                </ul>
            </aside>
<?php 
    endif;