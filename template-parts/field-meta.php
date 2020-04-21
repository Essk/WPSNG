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
                        $text = $field['text'];
                        $url = $field['url'];
                        $link_text = $text && $text !== '' ? $text : $url;
                        if($url && $url !== ''): ?>
                            <a href="<?php echo $url?>">
                                <?php echo $link_text; ?>
                            </a>
                        <?php else: ?>
                        <?php echo $text; ?>
                        <?php endif; ?>
                    <?php elseif (
                        is_array($field) 
                        && array_key_exists('title', $field) 
                        && array_key_exists('url', $field)):
                        $title = $field['title'];
                        $url = $field['url'];
                        $link_text = $title && $title !== '' ? $title : $url;
                        ?>
                        <a href="<?php echo $link_text?>" $target="<?php echo $field['target']?>">
                        <?php echo $link_text ?>
                        </a>
                    <?php else: ?>
                        <?php echo $value; 
                        ?>
                    <?php endif; ?>
                    </li>
                <?php endforeach; ?>    
                </ul>
            </aside>
<?php 
    endif;