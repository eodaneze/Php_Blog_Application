<!--=======Sidebar=======-->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="./adminPanel.php">
                <i class="bi bi-grid" style="color: #293A6C;"></i>
                <span style="color: #293A6C;">Admmin Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"
                style="color: #293A6C;">
                <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="./viewProducts.php">
                        <i class="bi bi-circle"></i><span>View Product</span>
                    </a>
                </li>
                <li>
                    <a href="./addProduct.php">
                        <i class="bi bi-circle"></i><span>Add Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->






        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Sellers</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="./viewSeller.php">
                        <i class="bi bi-circle"></i><span>View Seller</span>
                    </a>
                </li>
            </ul>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-navs" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-navs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="./viewCustomer.php">
                        <i class="bi bi-circle"></i><span>View customer </span>
                    </a>
                </li>
            </ul>
        </li>



    </ul>

</aside><!-- End Sidebar-->