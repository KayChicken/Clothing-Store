<?php
    include('./components/header.php');

?>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="section_admin">
        <div class="container">
            <h1>Items Panel</h1>
            <nav>
                <ul>
                    <li style="display:flex; flex-direction:column; row-gap:10px;">
                        <a href="admin-items-create.php">Create Item</a>
                        <a href="admin-items-change.php">Change Item</a>
                        <a href="admin-items-delete.php">Delete Item</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</body>