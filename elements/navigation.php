<?php
    class NavItem {
        public string $name;
        public string $url;

        function __construct(string $name, string $url) {
            $this->name = $name;
            $this->url = $url;
        }
    }

    $navigation = [
        new NavItem('Home', 'index.php'),
        new NavItem('Contact', 'contact.php'),
        new NavItem('Comments', 'comments.php'),
    ];
?>

<nav id="nav" class="pane">
    <ul class="main-nav">
        <li class="main-nav-item">
            <a href="index.php">Logo</a>
        </li>

        <?php foreach ($navigation as $nav): ?>
            <li class="main-nav-item">
                <a href="<?=$nav->url?>"><?=$nav->name?></a>
            </li>
        <?php endforeach ?>

    </ul>
</nav>