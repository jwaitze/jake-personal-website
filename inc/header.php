<?php
    
    if(!isset($page_title)) { // redirect to home if visited directly
        header("Location: ../home");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $page_title; ?></title>
		<meta charset="utf-8">
        <?php echo $page_description; ?>
        <meta name="author" content="Jake Waitze">
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/main.css">
	</head>
	<body>
		<div class="nonFooterContent">
			<div id="mainHeader">
				<div id="mobileMenu">
                    <a id="closeMobileMenu" href="#">x</a>
                    <ul id="mobileMenuList">
                        <li><a href="../home" class="menuTop"><?php echo $home_label; ?></a></li>
                        <li>
                            <div class="dropdown">
                                <span class="menuDropdownTab">Contact</span>
                                <div class="dropdown-content">
                                    <a class="hiddenPhoneLink" href="tel:"><p class="hiddenPhone"><i class="fa fa-phone" aria-hidden="true"></i> </p></a>
                                    <hr class="fadingStyle">
                                    <a class="hiddenEmailLink" href="mailto:"><p class="hiddenEmail"><i class="fa fa-envelope" aria-hidden="true"></i> </p></a>
                                    <hr class="fadingStyle">
                                    <a href="../resume" target="_blank">
                                        <span><i class="fa fa-file-text" aria-hidden="true"></i> Résumé</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <span class="menuDropdownTab">Projects</span>
                                <div class="dropdown-content">
                                    <a href="http://traject.io/" target="_blank">
                                        <span>
                                            <i class="fa fa-circle" aria-hidden="true"></i> Traject.io
                                        </span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="http://southburyfoodbank.org" target="_blank"><span><i class="fa fa-cart-plus" aria-hidden="true"></i> SBY Food Bank</span></a>
                                    <hr class="fadingStyle">
                                    <a href="https://scratch.mit.edu/users/jakewaitze/" target="_blank"><span><i class="fa fa-child" aria-hidden="true"></i> Scratch</span></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <span class="menuDropdownTab">Social</span>
                                <div class="dropdown-content">
                                    <a href="https://www.linkedin.com/in/jake-waitze-2a2416119" target="_blank">
                                        <span><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="https://www.github.com/jwaitze" target="_blank"><span>
                                        <i class="fa fa-github" aria-hidden="true"></i> GitHub</span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="https://twitter.com/jwaitze" target="_blank">
                                        <span><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="https://online-go.com/user/view/341057" target="_blank">
                                        <span><i class="fa fa-adjust goIcon" aria-hidden="true"></i> Go</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li><a href="../blog" class="menuTop"><?php echo $blog_label; ?></a></li>
                        <li><a href="../chat" class="menuTop"><?php echo $irc_label; ?></a></li>
                    </ul>
                </div>
                <div id="mainMenu">
                    <div id="shortMenu">
                        <a href="../"><h1><?php echo $page_title; ?></h1></a>
                        <a id="openMobileMenu" href="#">Menu</a>
                    </div>
                    <ul id="wideMenu">
                        <li><a href="../home"><h1><?php echo $page_title; ?></h1></a></li>
                        <li><a href="../home" class="menuTop"><?php echo $home_label; ?></a></li>
                        <li>
                            <div class="dropdown">
                                <span class="menuDropdownTab">Contact</span>
                                <div class="dropdown-content">
                                    <a class="hiddenPhoneLink" href="tel:"><p class="hiddenPhone"><i class="fa fa-phone" aria-hidden="true"></i> </p></a>
                                    <a class="hiddenEmailLink" href="mailto:"><p class="hiddenEmail"><i class="fa fa-envelope" aria-hidden="true"></i> </p></a>
                                    <hr class="fadingStyle">
                                    <a href="../resume" target="_blank">
                                        <span><i class="fa fa-file-text" aria-hidden="true"></i> Résumé</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <span class="menuDropdownTab">Projects</span>
                                <div class="dropdown-content">
                                    <a href="http://traject.io/" target="_blank">
                                        <span>
                                            <i class="fa fa-circle" aria-hidden="true"></i> Traject.io
                                        </span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="http://southburyfoodbank.org" target="_blank"><span><i class="fa fa-cart-plus" aria-hidden="true"></i> SBY Food Bank</span></a>
                                    <hr class="fadingStyle">
                                    <a href="https://scratch.mit.edu/users/jakewaitze/" target="_blank"><span><i class="fa fa-child" aria-hidden="true"></i> Scratch</span></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <span class="menuDropdownTab">Social</span>
                                <div class="dropdown-content">
                                    <a href="https://www.linkedin.com/in/jake-waitze-2a2416119" target="_blank">
                                        <span><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="https://www.github.com/jwaitze" target="_blank"><span>
                                        <i class="fa fa-github" aria-hidden="true"></i> GitHub</span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="https://twitter.com/jwaitze" target="_blank">
                                        <span><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</span>
                                    </a>
                                    <hr class="fadingStyle">
                                    <a href="https://online-go.com/user/view/341057" target="_blank">
                                        <span><i class="fa fa-adjust goIcon" aria-hidden="true"></i> Go</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li><a href="../blog" class="menuTop"><?php echo $blog_label; ?></a></li>
                        <li><a href="../chat" class="menuTop"><?php echo $irc_label; ?></a></li>
                    </ul>
                </div>
				<div class="clearfix"></div>
			</div>
            <div id="openBody"><a href="#">o</a></div>
            <div id="mainBody">
                <div id="closeBody"><a href="#">x</a></div>
