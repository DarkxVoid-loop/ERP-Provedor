<div class="breadcrumb clearfix">
    <ul>
        <li><a href="index.php?app=Dashboard">Dashboard</a></li>
        <li><a href="?app=Fibra">Fibra</a></li>

        <li class="active">Marcados</li>
    </ul>
</div>

<?php if($permissao['e1'] == S) { ?>

    <?php if ($_GET['reg'] == '1') { ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times-circle"></i></button>
            <strong>Aten��o!</strong> Registro cadastrado com sucesso. </div>
    <?php } ?>
    <?php if ($_GET['reg'] == '2') { ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times-circle"></i></button>
            <strong>Aten��o!</strong> Registro alterado com sucesso. </div>
    <?php } ?>
    <?php if ($_GET['reg'] == '3') { ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times-circle"></i></button>
            <strong>Aten��o!</strong> Registro exclu�do com sucesso. </div>
    <?php } ?>

        <div class="page-header">
          <h1>Marcadores</h1>
        </div>

        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid">

            <div class="powerwidget" id="" data-widget-editbutton="false">
              <header>
                <h2>Gerenciar<small>Marcadores</small></h2>
              </header>
              <div class="inner-spacer">

                    <div class="btn-group">
	<button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
	<i class="fa fa-bars"></i> EXPORTAR </button>
	<ul class="dropdown-menu " role="menu">
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'json',escape:'false'});"> <img src='assets/images/json.png' width='24px'> JSON</a></li>
	<li class="divider"></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'xml',escape:'false'});"> <img src='assets/images/xml.png' width='24px'> XML</a></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'sql'});"> <img src='assets/images/sql.png' width='24px'> SQL</a></li>
	<li class="divider"></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'csv',escape:'false'});"> <img src='assets/images/csv.png' width='24px'> CSV</a></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'txt',escape:'false'});"> <img src='assets/images/txt.png' width='24px'> TXT</a></li>
	<li class="divider"></li>

	<li><a href="#" onClick ="$('#table-1').tableExport({type:'excel',escape:'false'});"> <img src='assets/images/xls.png' width='24px'> XLS</a></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'doc',escape:'false'});"> <img src='assets/images/word.png' width='24px'> Word</a></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'powerpoint',escape:'false'});"> <img src='assets/images/ppt.png' width='24px'> PowerPoint</a></li>
	<li class="divider"></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'png',escape:'false'});"> <img src='assets/images/png.png' width='24px'> PNG</a></li>
	<li><a href="#" onClick ="$('#table-1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src='assets/images/pdf.png' width='24px'> PDF</a></li>
		</ul>
		</div>	<br>
	      <br>

                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Endere�o</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Tipo</th>
                      <th>A��o</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

    $consultas = $mysqli->query("SELECT * FROM fib_markers");
    while($campo = mysqli_fetch_array($consultas)){

        ?>
        <tr>
            <td><?php echo $campo['id']; ?></td>
            <td><?php echo $campo['name']; ?></td>
            <td><?php echo $campo['address']; ?></td>
            <td><?php echo $campo['lat']; ?></td>
            <td><?php echo $campo['lng']; ?></td>
            <td><?php echo $campo['type']; ?></td>
            <td>
                <a href="?app=EditarMarcadores&id=<?php echo base64_encode($campo['id']); ?>" class="btn btn-info tooltiped" data-toggle="tooltip" data-placement="top" title="Alterar"><i class="entypo-tools"></i></a>&nbsp;
                <?php if($logado['nivel'] == '1') { ?>
                    <a href="javascript:void(0);" onclick="javascript: if (confirm('Deseja realmente excluir esse registro ?')) { window.location.href='?app=EditarMarcadores&id=<?php echo base64_encode($campo['id']); ?>&Ex=DelMarcadores' } else { void('') };" class="btn btn-danger tooltiped" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="entypo-trash"></i></a>
                <?php } ?>

            </td>
        </tr>



    <?php  } ?>

                  </tbody>
                  <tfoot>
                    <tr>
                     <th>#</th>
                      <th>Nome</th>
                      <th>Endere�o</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Tipo</th>
                      <th>A��o</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>

      <?php } else { ?>

    <div class="page-header">
        <h1>Permiss�o <small>Negada!</small></h1>
    </div>

    <div class="row" id="powerwidgets">
        <div class="col-md-12 bootstrap-grid">

            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="fa fa-times-circle"></i></button>
                <strong>Aten��o!</strong> Voc� n�o possui permiss�o para esse modulo. </div>

        </div></div>
<?php } ?>