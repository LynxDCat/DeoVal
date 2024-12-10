<?php
    include "includes/head.php";
    include "includes/navbar.php";

    if (isset($_GET['page'])){
		
		$page = $_GET['page'];
		
		switch ($page){
			case 'About':

				break;
		}
	} 
	else{
        include "includes/lp-mainoverview.php";
        include "includes/lp-abtus.php";
        include "includes/lp-gallery.php";
        include "includes/lp-blog.php";
        include "includes/lp-contact.php";
        include "includes/lp-faq.php";
	}

    include "includes/footer.php";
?>