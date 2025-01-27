<?php
require "fpdf.php";

if ($_server['REQUEST_METHOD'] === "POST") {
    $name = $_POST["name"];
    $vertrekpunt = $_POST["vertrekpunt"];
    $bestemming = $_POST["bestemming"];
    $price  = $_POST["price"];
    $date = $_POST["date"];
    $time = $_POST["time"];


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    $PDF->Cell (0, 10, "bus ticket", 0, 1, 'C');
    $PDF->LN(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell (50, 10, "Name: ", 0, 0);
    $pdf->Cell (50, 10, $name, 0, 1);

    $pdf->Cell (50, 10, "vertrekpunt: ", 0, 0);
    $pdf->Cell (50, 10, $vertrekpunt, 0, 1);

    $pdf->Cell (50, 10, "bestemming: ", 0, 0);
    $pdf->Cell (50, 10, $bestemming, 0, 1);

    $pdf->Cell (50, 10, "price: ", 0, 0);
    $pdf->Cell (50, 10, $price, 0, 1);

    $pdf->Cell (50, 10, "date: ", 0, 0);
    $pdf->Cell (50, 10, $date, 0, 1);

    $pdf->Cell (50, 10, "time: ", 0, 0);
    $pdf->Cell (50, 10, $time, 0, 1);

    $pdf->Output('D', 'bus ticket.pdf');
    exit;
}

?>

