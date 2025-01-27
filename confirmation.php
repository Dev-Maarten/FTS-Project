<?php require "connect.php";
require "fpdf.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $festival_id = $_POST["id"];
    $name = $_POST["name"];
    $vertrekpunt = $_POST["vertrekpunt"];
    $bestemming = $_POST["bestemming"];
    $price = $_POST["price"] ?? '0.00';
    $time = $_POST["time"] ?? date("H:i:s");
    $vertrek = $_POST["vertrek"];
    $personen = $_POST["personen"];

    if (empty($name) || empty($vertrekpunt) || empty($bestemming) || empty($price) || empty($vertrek) || empty($personen)) {
        echo "Missing required fields!";
        exit;
    }


            $pdf = new FPDF();
    for ($i = 1; $i < ($personen); $i++) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(0, 10, "Bus Ticket", 0, 1, 'C');
        $pdf->LN(10);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, "Name: ", 0, 0);
        $pdf->Cell(50, 10, $name, 0, 1);

        $pdf->Cell(50, 10, "Vertrekpunt: ", 0, 0);
        $pdf->Cell(50, 10, $vertrekpunt, 0, 1);

        $pdf->Cell(50, 10, "Bestemming: ", 0, 0);
        $pdf->Cell(50, 10, $bestemming, 0, 1);

        $pdf->Cell(50, 10, "Price: ", 0, 0);
        $pdf->Cell(50, 10, $price, 0, 1);

        $pdf->Cell(50, 10, "Date: ", 0, 0);
        $pdf->Cell(50, 10, $vertrek, 0, 1);

        $pdf->Cell(50, 10, "Time: ", 0, 0);
        $pdf->Cell(50, 10, $time, 0, 1);
    }
            $pdf->Output('D', 'bus_ticket_' . $name . 'pdf');
exit;
        }


    else
    {
    header("Location: home.php");
    exit;


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>final confirmation</title>
</head>
<body>
<form action="http://127.0.0.1:8000" Method="POST">
    <h1>proceed to checkout</h1>
    <button type="submit" value="proceed"></button>
</form>
</body>
</html>
