<!DOCTYPE html>
<html>
<head>
    <title>Add New Contact</title>
</head>
<body>
    <h1>Add New Contact</h1>
    <form method="post" action="index.php?action=create">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to Contact List</a>
</body>
</html>
