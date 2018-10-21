<?php
/** -------------------------------------------------- START OF PHP --------------------------------------------------*/


function run(){
// --------------------------------------- CONNECT TO DATBASE ----------------------------------------------------------
// Setup connection variables
$servername = "127.0.0.1";
$username = "root";
$password = "123";

// Make connection
try {
    // Creates PDO connection with given variables
    $conn = new PDO("mysql:host=$servername;dbname=s1135727_voetbal_app", $username, $password);

    // Set error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connectie mislukt: " . $e->getMessage();
}


// --------------------------------------- SHOW MEMBERS ----------------------------------------------------------------
// Prepare and excecute query
$stmt = $conn->prepare("SELECT id, firstname, lastname, email, gender, type, year_driving_licence FROM member");
$stmt->execute();

// Echo first part
echo '<div class="col-9 float-right"><h5 class="text-muted">Lijst van leden</h5> <hr><ul class="list-group">';

// Echo rows
foreach ($stmt as $row) {
    echo '<li class="list-group-item d-flex justify-content-between align-items-center">' . $row[0] . " / " . $row[1] . ' ' . $row[2] ." / " . $row[3] ." / " . $row[4] ." / " . $row[5] ." / " . $row[6] . ' <form class="m-0" action="voorbeeld.php" method="post"><input type="hidden" name="deleteid" value="' . $row[0] . '"><input type="submit" name="delete" value="Verwijderen" class="p-1 m-1 btn btn-primary"></form></li>';
}

// Echo last part
echo '</li></ul></div>';


// --------------------------------------- ADD MEMBER ------------------------------------------------------------------
// Check if postvariables are set
if( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['drivinglicense']))
{
    try {
        // Prepare statement
        $stmt = $conn->prepare("INSERT INTO member (firstname, lastname, email, gender, type, year_driving_licence) 
    VALUES (:firstname, :lastname, :email, :gender, :type, :year_driving_licence)");

        // Create variables for parameters
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':year_driving_licence', $year_driving_licence);

        // Set variables and excecute query
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $type = $_POST['type'];
        $year_driving_licence = $_POST['drivinglicense'];
        $stmt->execute();

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }


    // Prevent from submitting twice
    header('location: voorbeeld.php');
}


// --------------------------------------- DELETE MEMBER ---------------------------------------------------------------
// Check if postvariables are set
if( isset($_POST['delete']) && isset($_POST['deleteid']))
{
    try {
        // Create and excecute query
        $sql = "DELETE FROM member WHERE id=" . $_POST['deleteid'];
        $conn->exec($sql);

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    // Prevent from submitting twice
    header('location: voorbeeld.php');
}
}
?>

<!--------------------------------------------------- START OF HTML --------------------------------------------------->

<html>
<head>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/jumbotron/jumbotron.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h3 class="text-center ">Voeg een nieuw lid toe</h3><hr>

    <!-- Excecute PHP Code -->
    <?php run(); ?>

<div class="col-3">
<form action="voorbeeld.php" method="post">
    <h5 class="text-muted">Voer de gegevens in</h5><hr>

    <div class="form-group row ml-0">
        <label class="col-2 col-form-label pl-0">Voornaam</label>

        <input class="form-control" name="firstname" type="text" value="">

    </div>

    <div class="form-group row ml-0">
        <label class="col-2 col-form-label pl-0">Achternaam</label>

        <input class="form-control" name="lastname" type="text" value="">

    </div>

    <div class="form-group row ml-0">
        <label class="col-2 col-form-label pl-0">Emailadres</label>

        <input class="form-control" name="email" type="text" value="">

    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Geslacht</label>

        <div class="col-12">
    <div class="form-check float-left pr-2">
        <input class="form-check-input" type="radio" name="gender" id="gender1" value="man" checked>
        <label class="form-check-label">
            Man
        </label>
    </div>
    <div class="form-check float-left pr-2">
        <input class="form-check-input" type="radio" name="gender" id="gender2" value="vrouw">
        <label class="form-check-label">
            Vrouw
        </label>
    </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Type</label>

        <div class="col-12">
            <div class="form-check float-left pr-2">
                <input class="form-check-input" type="radio" name="type" id="type1" value="gebruiker" checked>
                <label class="form-check-label">
                    Gebruiker
                </label>
            </div>
            <div class="form-check float-left pr-2">
                <input class="form-check-input" type="radio" name="type" id="type2" value="trainer">
                <label class="form-check-label">
                    Trainer
                </label>
            </div>
        </div>

    </div>

    <div class="form-group row ml-0">
        <label class="col-form-label">Rijbewijs behaald in (jaar)</label>

        <input class="form-control" name="drivinglicense" type="number" value="">

    </div>

    <button type="submit" class="btn btn-primary">Toevoegen</button>
</form>
</div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
