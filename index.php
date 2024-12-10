<?php
    include "includes/head.php";
    include "includes/navbar.php";

    if (isset($_GET['page'])){
		
		$page = $_GET['page'];
		
		switch ($page){
            case 'Contact':
                include "includes/contact.php";
                break;
			case 'Products':
                include "includes/prdct-page-grid.php";
                include "includes/prdct-page-blog.php";
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