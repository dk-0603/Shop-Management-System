<?php    require  'partials/head.php'?>
<?php    require  'partials/header.php'?>


    <div class="main-container">
<?php    require  'partials/sidebar.php'?>   
        <div class="container">
            <div class="control-buttons">
                <button id="addBtn">ADD</button>
                <form class="searchbar">
                    <input type="search" id="search" name="search" placeholder="Search product">
                    <button type="submit">Search</button>
                  </form>
            </div>
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>(555) 123-4567</td>
                            <td>123 Main St, Cityville</td>
                            <td class="actions">
                                <!-- <button class="btn btn-read">Read</button> -->
                                <button class="btn btn-update">Update</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>(555) 987-6543</td>
                            <td>456 Oak Ave, Townburg</td>
                            <td class="actions">
                                <!-- <button class="btn btn-read">Read</button> -->
                                <button class="btn btn-update">Update</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                
            </div>

        </div>
    </div>
    <footer></footer>
</body>
</html>

