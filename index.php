<?php
include "includes/head.php";
include "includes/navbar.php";

if (isset($_GET['page'])) {

    $page = $_GET['page'];

    switch ($page) {
        case 'Contact':
            include "includes/contact.php";
            break;
        case 'About':
            include "includes/aboutus-title.php";
            include "includes/aboutus.php";
            break;
        case 'Products':
            include "includes/prdct-page-grid.php";
            include "includes/prdct-page-blog.php";
            break;
        case 'Blogs':
            include "includes/bd-title.php";
            include "includes/bd-package.php";
            include "includes/bd-moreblogs-1.php";
            break;
        case 'Blogs1':

            include "includes/bd-package.php";
            include "includes/bd-moreblogs-1.php";
            break;
        case 'Blogs2':
            include "includes/bd-delivery.php";
            include "includes/bd-moreblogs-2.php";
            break;

        case 'Blogs3':
            include "includes/bd-immigration.php";
            include "includes/bd-moreblogs-3.php";
            break;

        case 'Blogs4':
            include "includes/bd-process.php";
            include "includes/bd-moreblogs-4.php";
            break;
        case 'Blogs5':
            include "includes/bd-success.php";
            include "includes/bd-moreblogs-5.php";
            break;
        case 'Product':
            include "includes/prdct-page-grid.php";
            include "includes/prdct-page-blog.php";
    }
} else {
    include "includes/lp-mainoverview.php";
    include "includes/lp-abtus.php";
    include "includes/lp-gallery.php";
    include "includes/lp-blog.php";
    include "includes/lp-contact.php";
    include "includes/lp-faq.php";
}

include "includes/footer.php";
