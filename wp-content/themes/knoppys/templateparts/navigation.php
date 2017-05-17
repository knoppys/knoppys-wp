<?php
$items = wp_get_nav_menu_items( 'primary' );
echo '<span class="menu-toggle">Menu</span><div class="menu-cont"><nav class="container" role="navigation">';
foreach ($items as $item){ echo '<a href="'.$item->url.'">'.$item->title.'</a>';}
echo '</nav></div>';