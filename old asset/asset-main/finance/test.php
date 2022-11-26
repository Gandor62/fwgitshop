
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--    <link rel="stylesheet" href="css/style.css">-->
    <title>Summary Form </title>
</head>
<body>

<main>
    <form action="#" method="post">
        <div>
            <label for="it">IT Equipment:</label>
            <input type="text" name="IT"  placeholder="IT Value" />
        </div>

        <div>
            <label for="pam">Plant and Machinery:</label>
            <input type="text" name="pam"  placeholder="Plant" />
        </div>

        <div>
            <label for="ste">Small Tools and Equipment:</label>
            <input type="text" name="ste" required="required" placeholder="Plant" />
        </div>

        <div>
            <label for="fleet">Fleet Vehicles:</label>
            <input type="text" name="fleet"  placeholder="fleet" />
        </div>

        <div>
            <label for="faf">Furniture and Fixtures:</label>
            <input type="text" name="faft" required="required" placeholder="Fixtures" />
        </div>

        <div>
            <label for="bal">Buildings and Land:</label>
            <input type="text" name="bal" required="required" placeholder="Buildings" />
        </div>

        <div>
            <label for="tav">Total Asset Value at Cost:</label>
            <input type="text" name="tav" required="required" placeholder="Total Asset Value" />
        </div>

        <div>
            <label for="name">Total Asset Value after Depreciation:</label>
            <input type="text" name="plantAndEquipment" required="required" placeholder="Plant" />
        </div>

        <button type="submit">Print Summary</button>
    </form>
</main>
</body>
</html>