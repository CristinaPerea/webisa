<style type="text/css">
table { 
  width: 100%; 
  border-collapse: collapse;
  display: block;
  margin-bottom: 10px;
}

/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: black;
  color: white; 
  font-weight: bold;
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}

/*tr>th {
	 padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}*/

tr.bibtex pre { width: 100%; overflow: auto; white-space: pre-wrap;}
p.infolinks { margin: 0.3em 0em 0em 0em; padding: 0px; }
tr.abstract td, tr.review td, tr.bibtex td { background-color: #EFEFEF; text-align: justify; border-bottom: 2px #2E2E2E solid; }

@media print {
	p.infolinks, #qs_settings, #quicksearch, t.bibtex { display: none !important; }
	tr { page-break-inside: avoid; }
}

tr.noshow { display: none;}
@media 
only screen and (max-width: 760px) {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 

	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	tbody.miTabla{
		display: block;
		overflow-y: scroll;
		height: 200px;
		width: 100%;
	}
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "Authors"; }
	td:nth-of-type(2):before { content: "Title"; }
	td:nth-of-type(3):before { content: "Description"; }
	td:nth-of-type(4):before { content: "PDF"; }
}
</style>
	<?php 
		include_once("lectorCSV.php");
		$miarray = loadDataFromCSV("publications/publications.csv");

		$mensaje = '<table id="qs_tableTotal" border="1" class=""><thead id="cabecera-publicaciones"><tr><th width="30%">Authors</th><th width="30%">Title</th><th width="35%">Description</th><th style="height:10px;" width="5%">PDF</th></tr></thead><tbody class="">';
		for($i=1; $i<sizeof($miarray); $i++){
			$autor=$miarray[$i][0];
			$titulo=$miarray[$i][1];
			$descripcion = $miarray[$i][2];
			$url=$miarray[$i][3];
			$mensaje .= '<tr ';
			$mensaje .= ' class="entry"><td>'.$autor.'</td>';
			$mensaje .= '<td>'.$titulo.'</td>';
			$mensaje .= '<td>'.$descripcion.'</td>';
			if($url != "")
				$mensaje .= '<td><a href="'.$url.'"><center><img src="publications/icon-pdf.png"></img></center></a></td>';
			else 
				$mensaje .= '<td><a href="#">Not available</a></td>';
			$mensaje .= '</tr>';
		}
		$mensaje .= '</tbody></table>';
		echo $mensaje;
	?>
