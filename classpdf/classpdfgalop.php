<?php
require('../fpdf186/fpdf.php');
include_once '../class/class.galop.php';

class PDF extends FPDF {
    // En-tête
    function Header() {
        // Ajout du logo
        $this->Image('../photos/equip.png', 10, 10, 30);
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(60, 36, 21);
        $this->Cell(0, 20, utf8_decode('Liste des Galops'), 0, 1, 'C');
        $this->Ln(10);

        // Ligne de séparation
        $this->SetDrawColor(212, 164, 94);
        $this->SetLineWidth(0.5);
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        $this->Ln(10);
    }

    // Pied de page
    function Footer() {
        $this->SetY(-30);

        // Ligne de séparation
        $this->SetDrawColor(212, 164, 94);
        $this->SetLineWidth(0.5);
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        $this->Ln(5);

        // Affiche la date et le numéro de page
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 10, utf8_decode('Vu le : ') . date('d/m/Y H:i:s') . utf8_decode(' | Page ') . $this->PageNo(), 0, 0, 'C');
    }

    // En-tête du tableau
    function TableHeader() {
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(60, 36, 21);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(60, 36, 21);

        $tableWidth = 140;
        $pageWidth = 210;
        $startX = ($pageWidth - $tableWidth) / 2;

        $this->SetX($startX);

        $this->Cell(70, 10, utf8_decode('ID Galop'), 1, 0, 'C', true);
        $this->Cell(70, 10, utf8_decode('Libellé'), 1, 0, 'C', true);
        $this->Ln();
    }

    // Contenu du tableau
    function TableRow($idgalop, $libgalop, $alternate) {
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor($alternate ? 240 : 255, $alternate ? 240 : 255, $alternate ? 240 : 255);
        $this->SetTextColor(60, 36, 21);

        $tableWidth = 140;
        $pageWidth = 210;
        $startX = ($pageWidth - $tableWidth) / 2;

        $this->SetX($startX);

        $this->Cell(70, 10, utf8_decode($idgalop), 1, 0, 'C', true);
        $this->Cell(70, 10, utf8_decode($libgalop), 1, 0, 'C', true);
        $this->Ln();
    }
}

// Instanciation de la classe Galop
$galop = new Galop();
$listeGalops = $galop->GalopAll();

// Création de l'instance de PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// En-tête du tableau
$pdf->TableHeader();

// Contenu du tableau
$alternate = false;
foreach ($listeGalops as $g) {
    if ($g['supprime'] != '1') {
        $pdf->TableRow($g['idgalop'], $g['libgalop'], $alternate);
        $alternate = !$alternate;
    }
}

// Sortie du PDF
$pdf->Output();
?>
