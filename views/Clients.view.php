<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>

<div class="main-container">
    <?php require 'partials/sidebar.php' ?>
    <div class="container" id="container">
        <?php require 'partials/controlButtons.php' ?>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>

                <form id="clientForm" action="/insert-client" method="post">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required><br>

                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="phoneNumber">Phone Number:</label>
                    <input type="text" id="phoneNumber" name="phoneNumber"><br>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address"><br>

                    <input type="submit" value="Add Client">
                </form>
            </div>
        </div>

        <!-- Existing update modal -->

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Creator</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming $clients is an array containing Client objects fetched from the database
                    foreach ($clients as $client) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($client->getFirstName()) . "</td>";
                        echo "<td>" . htmlspecialchars($client->getLastName()) . "</td>";
                        echo "<td>" . htmlspecialchars($client->getEmail()) . "</td>";
                        echo "<td>" . htmlspecialchars($client->getPhoneNumber()) . "</td>";
                        echo "<td>" . htmlspecialchars($client->getAddress()) . "</td>";
                        echo "<td>" . htmlspecialchars($client->getUser()) . "</td>";
                        echo '<td class="actions">
                                <button onclick="openUpdateModal(' . $client->getId() . ')" class="btn btn-update">Update</button>
                                <form method="post" action="/delete-client" onsubmit="return confirmDelete()">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="clientId" value="' . $client->getId() . '">
                                    <button type="submit" class="btn btn-delete">Delete</button>
                                </form>
                            </td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/Assets/js/insertmenu.js"></script>
<script src="/Assets/js/viewmenu.js"></script>
<footer></footer>
</body>

</html>
