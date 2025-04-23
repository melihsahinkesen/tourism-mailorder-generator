<?php
include("../variables/general.php");

ob_start();
require('writehtml.php');
error_reporting(E_ALL ^ E_NOTICE);
$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

// Font ekleme
$pdf->AddFont('OpenSans-Regular','','OpenSans-Regular.php');
$pdf->AddFont('OpenSans-Bold','B','OpenSans-Bold.php');

$pdf->AddPage();

// Turkce karakterler
$gKarakter=iconv("UTF-8", "ISO-8859-9", "ğ");
$gKarakterBuyuk=iconv("UTF-8", "ISO-8859-9", "Ğ");
$uKarakter=iconv("UTF-8", "ISO-8859-9", "ü");
$uKarakterBuyuk=iconv("UTF-8", "ISO-8859-9", "Ü");
$sKarakter=iconv("UTF-8", "ISO-8859-9", "ş");
$sKarakterBuyuk=iconv("UTF-8", "ISO-8859-9", "Ş");
$iKarakter=iconv("UTF-8", "ISO-8859-9", "ı");
$iKarakterBuyuk=iconv("UTF-8", "ISO-8859-9", "İ");
$oKarakter=iconv("UTF-8", "ISO-8859-9", "ö");
$oKarakterBuyuk=iconv("UTF-8", "ISO-8859-9", "Ö");
$cKarakter=iconv("UTF-8", "ISO-8859-9", "ç");
$cKarakterBuyuk=iconv("UTF-8", "ISO-8859-9", "Ç");

$cardsLogos='assets/img/cards.png';
$cardsNumBox='assets/img/card_num.png';
$cardDateBox='assets/img/card_date.png';
$cardCcvBox='assets/img/card_ccv.png';

// Dişarıdan getireceğin metni ekleyeceğin yer.
// $gelenMetin=$_POST['first_name'];
$tarihGiris=$_POST['tarih_giris'];
$tarihCikis=$_POST['tarih_cikis'];
$otel=$_POST['otel'];
$temsilci=$_POST['temsilci'];
$rentacarText=$_POST['rentacar'];
$transferTextUcak=$_POST['transfer_ucak'];
$transferTextOtel=$_POST['transfer_otel'];
$sigortaTextOtel=$_POST['iptal_sigorta'];
$ucret=$_POST['ucret'];
$ucretYazi=$_POST['ucret_yazi'];

if ($otel == " ") {
  $anaMetinFiveEk=('');
  if ($rentacarText == "ve rentacar") {
	  $rentacarText="rentacar";
  }
} else {
	$anaMetinFiveEk=('de/da konaklama ');
}

$today = date("d/m/Y"); // example output: 01/01/1970 @ 9:00 

// Metin alanları
$anaMetinOne=('Aşağıda adı ve soyadı yazılı olan kişi ve/veya kişilerin ');
$anaMetinTwo=($tarihGiris.' - ');
$anaMetinThree=($tarihCikis.' ');
$anaMetinFour=('tarihleri arasında ');
$anaMetinFive=($otel.' ');
$anaMetinSix=($rentacarText.' ');
$anaMetinSeven=($transferTextUcak.' ');
$anaMetinEight=($transferTextOtel.' ');
$anaMetinThirteen=($sigortaTextOtel.' ');
$anaMetinNine=('hizmet bedeli olan ');
$anaMetinTen=($ucret);
$anaMetinEleven=('nin aşağıdaki kredi kartından '.$mainCompanyName.' adına tahsil edilmesini rica ederim/ederiz.');

$textUcretYazi=($ucretYazi.' Türk Lirası');
$temsilciMetin=('Size özel müşteri temsilciniz: '.$temsilci);
$adresMetin=$address;

// Dışarıdan gelenin Font karakterini UTF-8'e değiştir.
$gelenMetin_degisenOne=iconv("UTF-8", "ISO-8859-9", $anaMetinOne);
$gelenMetin_degisenTwo=iconv("UTF-8", "ISO-8859-9", $anaMetinTwo);
$gelenMetin_degisenThree=iconv("UTF-8", "ISO-8859-9", $anaMetinThree);
$gelenMetin_degisenFour=iconv("UTF-8", "ISO-8859-9", $anaMetinFour);
$gelenMetin_degisenFive=iconv("UTF-8", "ISO-8859-9", $anaMetinFive);
$gelenMetin_degisenFiveEk=iconv("UTF-8", "ISO-8859-9", $anaMetinFiveEk);
$gelenMetin_degisenSix=iconv("UTF-8", "ISO-8859-9", $anaMetinSix);
$gelenMetin_degisenSeven=iconv("UTF-8", "ISO-8859-9", $anaMetinSeven);
$gelenMetin_degisenEight=iconv("UTF-8", "ISO-8859-9", $anaMetinEight);
$gelenMetin_degisenThirteen=iconv("UTF-8", "ISO-8859-9", $anaMetinThirteen);
$gelenMetin_degisenNine=iconv("UTF-8", "ISO-8859-9", $anaMetinNine);
$gelenMetin_degisenTen=iconv("UTF-8", "ISO-8859-9", $anaMetinTen);
$gelenMetin_degisenEleven=iconv("UTF-8", "ISO-8859-9", $anaMetinEleven);
$gelenMetin_degisenTwelve=iconv("UTF-8", "ISO-8859-9", $textUcretYazi);
$gelenMetin_degisenTemsilciMetin=iconv("UTF-8", "ISO-8859-9", $temsilciMetin);
$gelenMetin_degisenAdresMetin=iconv("UTF-8", "ISO-8859-9", $adresMetin);


// Full metinde kullanımı
// $cee=('Hello World!' .$gelenMetin_degisen);
$pdf->SetFont('OpenSans-Bold','B',11);
$pdf->SetTextColor(64,64,65);
//$pdf->Cell(185,0, $today,0,0,'R'); 
$pdf->WriteHTML('<br>');

$pdf->Image('assets/img/logos/logo.png',70, $pdf->GetY(), 70);

$pdf->SetFont('OpenSans-Regular','',11);
$pdf->SetTextColor(64,64,65);

// Yazı karalterini ve rengini değiştirme.

$pdf->WriteHTML('<br><br><br><br><br><br>' .$gelenMetin_degisenOne );
$pdf->SetFont('OpenSans-Bold','B',11);
$pdf->SetTextColor(31,35,32);
$pdf->WriteHTML( $gelenMetin_degisenTwo );
$pdf->WriteHTML( $gelenMetin_degisenThree );
$pdf->SetFont('OpenSans-Regular','',11);
$pdf->SetTextColor(64,64,65);
$pdf->WriteHTML( $gelenMetin_degisenFour );
$pdf->SetFont('OpenSans-Bold','B',11);
$pdf->SetTextColor(31,35,32);
$pdf->WriteHTML( $gelenMetin_degisenFive );
$pdf->SetFont('OpenSans-Regular','',11);
$pdf->SetTextColor(64,64,65);
$pdf->WriteHTML( $gelenMetin_degisenFiveEk );
$pdf->SetFont('OpenSans-Bold','B',11);
$pdf->SetTextColor(31,35,32);
$pdf->WriteHTML( $gelenMetin_degisenSix );
$pdf->WriteHTML( $gelenMetin_degisenSeven );
$pdf->WriteHTML( $gelenMetin_degisenEight );
$pdf->WriteHTML( $gelenMetin_degisenThirteen );
$pdf->SetFont('OpenSans-Regular','',11);
$pdf->SetTextColor(64,64,65);
$pdf->WriteHTML( $gelenMetin_degisenNine );
$pdf->SetFont('OpenSans-Bold','B',11);
$pdf->SetTextColor(31,35,32);
$pdf->WriteHTML( $gelenMetin_degisenTen.'.00TL ' );
$pdf->SetFont('OpenSans-Regular','',11);
$pdf->SetTextColor(64,64,65);
$pdf->WriteHTML( $gelenMetin_degisenEleven );



$pdf->SetFont('OpenSans-Regular','',11);
$pdf->SetTextColor(64,64,65);
$pdf->WriteHTML('<br><br><br>');

$pdf->Cell(60,0,'KRED'.$iKarakterBuyuk.' KARTI SAH'.$iKarakterBuyuk.'B'.$iKarakterBuyuk.':',0,0,'R',0);
$pdf->Cell(120,0,'    ...........................................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,5,'TELEFON GSM:',0,0,'R',0);
$pdf->Cell(120,5,'    ...........................................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,10,'TELEFON '.$iKarakterBuyuk .$sKarakterBuyuk.':',0,0,'R',0);
$pdf->Cell(120,10,'    ...........................................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,15,'TUTAR (RAKAM '.$iKarakterBuyuk.'LE):',0,0,'R',0);
$pdf->SetFont('OpenSans-Bold','B',11);
$pdf->SetTextColor(31,35,32);
$pdf->Cell(120,15,'    #'.$gelenMetin_degisenTen.'.00#TL ',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->SetFont('OpenSans-Regular','',11);
$pdf->SetTextColor(64,64,65); 
$pdf->Cell(60,20,'TUTAR (YAZI '.$iKarakterBuyuk.'LE):',0,0,'R',0);
$pdf->SetFont('OpenSans-Bold','B',11);
$pdf->SetTextColor(31,35,32);
$pdf->Cell(120,20,'    '.$gelenMetin_degisenTwelve,0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->SetFont('OpenSans-Regular','',11); 
$pdf->SetTextColor(64,64,65);
$pdf->Cell(60,25,'KRED'.$iKarakterBuyuk.' KARTININ ',0,0,'R',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,25,'A'.$iKarakterBuyuk.'T OLDU'.$gKarakterBuyuk.'U BANKA:',0,0,'R',0);
$pdf->Cell(120,25,'    ...........................................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,30,'KRED'.$iKarakterBuyuk.' KARTI T'.$uKarakterBuyuk.'R'.$uKarakterBuyuk.':',0,0,'R',0);
$pdf->Cell(120, 30, $pdf->Image($cardsLogos, 75, $pdf->GetY()+11, 60), 0, 0, 'L' );
$pdf->WriteHTML('<br>');
$pdf->Cell(60,39,'KRED'.$iKarakterBuyuk.' KARTI NUMARASI:',0,0,'R',0);
$pdf->Cell(120, 39, $pdf->Image($cardsNumBox, 75, $pdf->GetY()+16.5, 100), 0, 0, 'L' );
$pdf->WriteHTML('<br>');
$pdf->Cell(60,46,'SON KULLANMA TAR'.$iKarakterBuyuk.'H'.$iKarakterBuyuk.':',0,0,'R',0);
$pdf->Cell(120, 46, $pdf->Image($cardDateBox, 75, $pdf->GetY()+20, 26.5), 0, 0, 'L' );
$pdf->WriteHTML('<br>');
$pdf->Cell(60,53,'G'.$uKarakterBuyuk.'VENL'.$iKarakterBuyuk.'K NO (CCV):',0,0,'R',0);
$pdf->Cell(120, 53, $pdf->Image($cardCcvBox, 75, $pdf->GetY()+23.5, 16.57), 0, 0, 'L' );
$pdf->WriteHTML('<br>');
$pdf->SetFont('OpenSans-Regular','',8);
$pdf->SetTextColor(64,64,65);
$pdf->Cell(60,51,'Kredi kart'.$iKarakter.'n'.$iKarakter.'z'.$iKarakter.'n arka',0,0,'R',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,47,''.$sKarakter.'eridindeki son '.$uKarakter.''.$cKarakter.' rakam',0,0,'R',0);
$pdf->SetFont('OpenSans-Bold','BU',11);
$pdf->SetTextColor(31,35,32);
$pdf->WriteHTML('<br><br><br><br><br><br><br>ADINA REZERVASYON YAPTIRILAN K'.$iKarakterBuyuk.''.$sKarakterBuyuk.''.$iKarakterBuyuk.' VE / VEYA K'.$iKarakterBuyuk.''.$sKarakterBuyuk.''.$iKarakterBuyuk.'LER<br>');
$pdf->SetFont('OpenSans-Regular','',10);
$pdf->SetTextColor(64,64,65); 

$pdf->Cell(100,13,'Sn. ........................  ..............................   TC.No: ....................................   TelefonNo: ....................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(100,19,'Sn. ........................  ..............................   TC.No: ....................................   TelefonNo: ....................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(100,25,'Sn. ........................  ..............................   TC.No: ....................................   TelefonNo: ....................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(100,30,'Sn. ........................  ..............................   TC.No: ....................................   TelefonNo: ....................................',0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(100,36,'Sn. ........................  ..............................   TC.No: ....................................   TelefonNo: ....................................',0,0,'L',0);
$pdf->WriteHTML('<br><br><br>');

$pdf->SetFont('OpenSans-Bold','BU',11);
$pdf->SetTextColor(31,35,32);

$pdf->Cell(60,26,'AD - SOYAD - KA'.$sKarakterBuyuk.'E',0,0,'L',0);
$pdf->Cell(80,26,''.$iKarakterBuyuk.'MZA',0,0,'L',0);
$pdf->WriteHTML('<br><br><br><br><br><br>');
$pdf->SetFont('OpenSans-Regular','',9); 
$pdf->SetTextColor(64,64,65);
$pdf->Cell(40,13,$gelenMetin_degisenTemsilciMetin,0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->SetFont('OpenSans-Bold','B',9);
$pdf->SetTextColor(31,35,32);
$pdf->WriteHTML('<br>');
$pdf->SetFont('OpenSans-Regular','',9); 
$pdf->SetTextColor(64,64,65);
$pdf->Cell(60,13,'Telefon: '.$displayNumber,0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,13,'E-Mail: '.$email,0,0,'L',0);
$pdf->WriteHTML('<br>');
$pdf->Cell(60,13,'Adres: '.$gelenMetin_degisenAdresMetin,0,0,'L',0);




$pdf->WriteHTML3("$htmlTable2");
$pdf->Output('Logoipsum-Mailorderformu.pdf','D'); 
ob_end_flush();
?>