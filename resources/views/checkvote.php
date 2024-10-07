<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Voting Eligibility</title>
</head>
<body>
    <h1>Check Your Voting Eligibility</h1>
    <form action="/vote" method="get">
        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" min="1" required>
        <button type="submit">Check Eligibility</button>
    </form>
</body>
</html>