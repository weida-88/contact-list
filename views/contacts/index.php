<!DOCTYPE html>
<html>
<head>
    <title>Contact List</title>
</head>
<body>
    <h1>Contact List</h1>
    <a href="index.php?action=create">Add New Contact</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?= htmlspecialchars($contact['name']) ?></td>
            <td><?= htmlspecialchars($contact['phone']) ?></td>
            <td><?= htmlspecialchars($contact['address']) ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $contact['id'] ?>">Edit</a>
                <a href="index.php?action=delete&id=<?= $contact['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>CRUD Operations via URL</h2>
    <p>
        <strong>Create:</strong> <br>
        <code>index.php?action=create&name=YourName&phone=YourPhone&address=YourAddress</code>
    </p>
    <p>
        <strong>Edit:</strong> <br>
        <code>index.php?action=edit&id=ContactID&name=NewName&phone=NewPhone&address=NewAddress</code>
    </p>
    <p>
        <strong>Delete:</strong> <br>
        <code>index.php?action=delete&id=ContactID</code>
    </p>
    <p>
        <strong>Read All:</strong> <br>
        <code>index.php?action=readAll</code>
    </p>
    <p>
        <strong>Read By ID:</strong> <br>
        <code>index.php?action=readById&id=ContactID</code>
    </p>
</body>
</html>
