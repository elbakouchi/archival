<?php
// print_r($_POST);
$user =  new DocumentoData();
foreach ($_POST as $k => $v) {
	$user->$k = $v;
	# code...
}

$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";

		$handle = new Upload($_FILES['otros']);
        	if ($handle->uploaded) {
        		$url="storage/documentos/";
            	$handle->Process($url);

                $user->otros = $handle->file_dst_name;
    		}
    		$user->usuario_id = $_SESSION["admin_id"];
$b = $user->registro_nuevo_documento();

$at = new CarpetaArchivoData();
	$at->archivo_id = $b[1];
	$at->carpeta_id = $_POST["carpeta_id"];

			
	$at->si();

print "<script>window.location='index.php?view=documento&id_carpeta=$_POST[tid]';</script>";

?>
