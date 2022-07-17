<?php
require_once dirname(__FILE__) . '/admin/dist/pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$content = '<html>
<body>
	<div>
		<img width="150" heigth="90" src="https://preregidiomas.uteq.edu.mx/Images/Logo_uteq.png">
		<div style="width: 120mm; text-align: center;"><h1>Factura</h1></div>
		<br><br><br>
		
		<h4>Emisor: La tiendita S.A.</h4>
		
		<p>RFC:XAXX010101000<br>
		Calle Siempre viva 742, Queretaro, QRO. CP 76000<br>
		</p>
		<hr>
		<h4>Receptor: Cliente Ejemplo</h4>
		<p>RFC:XEXX010101000<br>
		Corregidora No. 1, Queretaro, QRO, CP 76000<br>
		
		<br></p>
		<hr>
		<h5>Factura: A123 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sucursal: Querétaro. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Venta No. 7. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha: 08-07-2022 12:32 p.m.</h5>
		<hr>
	</div>
	<div>
		<table >
			<tr>
				<th style="width:100">
					Clave 
				</th>
				<th style="width:500">
					Nombre 
				</th>
				<th style="width:80">
					Precio 
				</th>
			</tr>
			<tr>
				<td >
					23
				</td>
				<td  >
					Iphone 12 Pro Max
				</td>
				<td style="text-align: right;">
					$29,000.00
				</td>
				
			</tr>
			<tr>
				<td >
					43
				</td>
				<td >
					Case Iphone 12
				</td>
				<td style="text-align: right;">
					$800.00
				</td>
				
			</tr>
			<tr>
				<td>
					62
				</td>
				<td >
					Mica  Iphone 12 PM
				</td>
				<td style="text-align: right;">
					$225.00
				</td>
				
			</tr>
			<tr  >
				<td >
					83
				</td>
				<td >
					Turbo Cargador Lightning
				</td>
				<td style="text-align: right;">
					$900.00
				</td>
				
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td></td>
			<td></td>
			</tr>
			
			<strong>
			<tr style="border-top: 1px solid black;">
				<td></td>
				<td style="text-align: right; ">
					Subtotal:
				</td>
				<td style="text-align: right;">
					$32,050.00
				</td>
			</tr>

			<tr>
				<td></td>
				<td style="text-align: right; ">
					IVA: 
				</td>
				<td style="text-align: right;">
					$5,128.00
				</td>
			</tr>

			
			<tr>
			<td></td>
				<td style="text-align: right; ">
					Total: 
				</td>
				<td style="text-align: right;">
					$37,178.00
				</td>
			</tr>
			</strong>
		</table>
		<br><br><br>
		<div style="text-align: right;">
		<qrcode value="Factura válida" ec="H" style="width: 60mm;"></qrcode>
		</div>
	</div>
</body>

</html>';


try {
	ob_start();


	$html2pdf = new Html2Pdf('P', 'A4', 'es');
	$html2pdf->writeHTML($content);
	$html2pdf->output('example06.pdf');
} catch (Html2PdfException $e) {
	$html2pdf->clean();

	$formatter = new ExceptionFormatter($e);
	echo $formatter->getHtmlMessage();
}
