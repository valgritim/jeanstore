<?php
session_start();
require "fpdf.php";
require "../control/Connect.php";
$db = Database::connect();

class myPDF extends FPDF{

	function header(){
		$db = Database::connect();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$statement = $db->prepare('SELECT receipt.totalPrice,user.id,user.lastname,user.firstname,user.address FROM receipt INNER JOIN user ON receipt.user_id = user.id where cmd_id = ?');
			$statement->execute(array($id));

			$result = $statement->fetch();
		
		$this->Image('../images/JeansStore_logo_small.png',10,6);
		$this->setFont('Arial', 'B',22);
		$this->Cell(276,5, 'JeansStore',0,0,'C');
		$this->Ln();
		$this->setFont('Times','',18);
		$this->Cell(276,10,'Facture de vos achats',0,0,'C');
		$this->Ln(20);
		$this->Ln(20);
		$this->Cell(276,10,utf8_decode($result['lastname']). " " . utf8_decode($result['firstname']),0,0,'C');
		$this->Ln();
		$this->Cell(276,10,utf8_decode($result['address']),0,0,'C');
		$this->Ln();
		$this->setFont('Times', '',12);
		$this->Ln(20);
		$this->Cell(50,10,' Total de votre achat ',1,0,'C');
		$this->Cell(50,10,number_format($result['totalPrice'],2,',',' ') . " Euros",1,0,'C');


		}

	}

	function footer(){
		$this->SetY(-15);
		$this->setFont('Arial','',8);
		$this->Cell(0,10,'Page' . $this->PageNo(). '/{nb}',0,0,'C');

	}

	function headerTable(){
		$this->Ln(40);
		$this->setFont('Times', 'B',12);
		$this->Cell(40,10,utf8_decode('Référence du produit '),1,0,'C');
		$this->Cell(70,10,'Marque',1,0,'C');
		$this->Cell(70,10,'Nom du produit',1,0,'C');		
		$this->Cell(20,10,'Taille',1,0,'C');
		$this->Cell(20,10,utf8_decode('Quantité'),1,0,'C');
		$this->Cell(40,10,'Prix',1,0,'C');
		$this->Ln();
		
	}

	function viewTable($db){

		$this->setFont('Times', '',12);
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$statement = $db->prepare('SELECT order_date,product_id,product_name, product_brand,size,product_quantity,product.price,lastname,address FROM receipt CROSS JOIN user ON receipt.user_id = user.id CROSS JOIN product ON receipt.product_id = product.id where cmd_id = ?');
			$statement->execute(array($id));


			while($data = $statement->fetch()){
				$this->Cell(40,10,$data['product_id'],1,0,'C');
				$this->Cell(70,10,$data['product_brand'],1,0,'C');
				$this->Cell(70,10,$data['product_name'],1,0,'C');		
				$this->Cell(20,10,$data['size'],1,0,'C');
				$this->Cell(20,10,$data['product_quantity'],1,0,'C');
				$this->Cell(40,10,number_format($data['price'],2,',',' ')  . " Euros",1,0,'C');
				$this->Ln();
				
			}
			

		}
		
		

	}
}

$pdf = new myPDF();

$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();