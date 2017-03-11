<?php
    require_once('private/controller/arrays.php');
?>

<nav class="menu">
    <img id="menuIcon" src="public/images/pictomenu.svg" />
    <ul class="sous-menu">
        
        <?php
            foreach ($menuItems as $page) { ?>
                <li><a class="scrollTo" href="<?php echo $page['href']; ?>"><?php echo $page['slug']; ?></a></li>
        <?php
            }
        ?>
    
    </ul>
</nav>
