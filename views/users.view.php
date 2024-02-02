<?php require  'partials/head.php' ?>
<?php require  'partials/header.php' ?>


<div class="main-container">
    <?php require  'partials/sidebar.php' ?>
    <div class="container" id="container">
        <h1 class='users-h1'>User Management</h1>
        <div class="content">

            <table>
                <thead>
                    <tr>

                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Is Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        echo "<tr>";

                        echo "<td>" . htmlspecialchars($user->getEmail()) . "</td>";
                        echo "<td>" . htmlspecialchars($user->getFirstname()) . "</td>";
                        echo "<td>" . htmlspecialchars($user->getLastname()) . "</td>";
                        echo "<td>" . ($user->isAdmin() ? 'Yes' : 'No') . "</td>";

                        // Add additional columns based on your User model properties

                        if ($_SESSION['isAdmin']) {
                            if ($_SESSION['email'] != $user->getEmail() && $user->getEmail() != 'admin') {
                                echo '<td class="actions">
                    
                    <form method="post" action="/delete-user" onsubmit="return confirmDelete()">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="userId" value="' . $user->getId() . '">
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>';

                                // Add the button to make the user an admin
                                echo '<form method="post" action="/make-admin" onsubmit="return confirmMakeAdmin()">
                        <input type="hidden" name="userId" value="' . $user->getId() . '">
                        <button type="submit" class="btn btn-make-admin">Toggle Admin</button>
                    </form>';

                                echo '</td>';
                            } else {
                                echo "<td>" . "</td>";
                            }
                        }

                        echo "</tr>";
                    }
                    ?>


                </tbody>
            </table>



        </div>

    </div>
</div>
<script>
    function confirmMakeAdmin() {
        return confirm("Are you sure you want to change the admin status of this user?");
    }
</script>
<footer></footer>
</body>

</html>