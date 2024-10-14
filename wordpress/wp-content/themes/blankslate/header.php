<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/smkn-1-kota-bekasi.png">
    <link rel="icon" type="image/x-icon" href="http://localhost/wordpress/wp-content/uploads/2023/08/smkn-1-kota-bekasi.png">
    <?php wp_head(); ?>
</head>
<style src="<?php echo get_theme_file_uri('style.css'); ?>"></style>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <nav>
        <div class="nav">
            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>

            <div class="logo-container">
                <a href="beranda.html" class="logo">
                    <img src="image/smkn-logo.png" alt="" /> smkn negeri 1<br />kota
                    bekasi
                </a>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: 0.6s">
                            <a href="#">Home</a>
                        </li>
                        <li class="nav-link" style="--i: 0.85s">
                            <a href="#">Menu<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Link 1</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 2</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 3<i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown second">
                                            <ul>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 1</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 2</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 3</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">More<i class="fas fa-caret-down"></i></a>
                                                    <div class="dropdown second">
                                                        <ul>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 1</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 2</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">More<i class="fas fa-caret-down"></i></a>
                                                                <div class="dropdown second">
                                                                    <ul>
                                                                        <li class="dropdown-link">
                                                                            <a href="#">Link 1</a>
                                                                        </li>
                                                                        <li class="dropdown-link">
                                                                            <a href="#">Link 2</a>
                                                                        </li>
                                                                        <li class="dropdown-link">
                                                                            <a href="#">Link 3</a>
                                                                        </li>
                                                                        <div class="arrow"></div>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <div class="arrow"></div>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 4</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Services<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Link 1</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 2</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 3<i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown second">
                                            <ul>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 1</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 2</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 3</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">More<i class="fas fa-caret-down"></i></a>
                                                    <div class="dropdown second">
                                                        <ul>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 1</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 2</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 3</a>
                                                            </li>
                                                            <div class="arrow"></div>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 4</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">About</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">About</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">About</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">About</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">About</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>