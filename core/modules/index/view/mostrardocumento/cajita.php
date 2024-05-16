<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
                    <?php $user = DocumentoData::getById($_GET["id_archivo"]);?>
                    <!-- <div class="table-responsive"> -->
                <div align="center">                     
                 <iframe src="storage/documentos/<?php echo $user->otros; ?>"  width="100%" height="850"></iframe> 
                </div>
                <!-- </div> -->
              </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
