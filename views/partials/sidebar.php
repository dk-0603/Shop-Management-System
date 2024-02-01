

<div class="sidebar">
            <ul class="navlist">
                <li><a href="/">Gallery</a></li>
                <li><a href="/products">Products</a></li>
                <!-- <li><a href="../Pages/Clients.html">Clients</a></li>
                <li><a href="../Pages/Suppliers.html">Suppliers</a></li>
                <li><a href="../Pages/Sales.html">Sales</a></li>
                <li><a href="../Pages/Shipments.html">Shipments</a></li>
                <li><a href="../Pages/Inventory.html">Inventory</a></li> -->
                <?php if($_SESSION['isAdmin']) : ?>   <li><a href="/users">Users</a></li> <?php endif; ?>
            </ul>
         
        </div>