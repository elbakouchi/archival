
                    <?php $user = DocumentoData::getById($_GET["id_archivo"]);?>
                    <!-- <div class="table-responsive"> -->
                    
                 <iframe src="storage/documentos/<?php echo $user->otros; ?>"  width="100%" height="100%"></iframe> 
