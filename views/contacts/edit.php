<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form method="post" action="index.php?action=edit&id=<?= $contact['id'] ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($contact['name']) ?>"><br><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>"><br><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?= htmlspecialchars($contact['address']) ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to Contact List</a>
</body>
</html>
