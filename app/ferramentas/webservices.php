
        <div class="breadcrumb clearfix">
          <ul>
            <li><a href="index.php?app=Dashboard">Dashboard</a></li>
            <li><a href="">Ferramentas</a></li>
            <li class="active">Consumo WebServices</li>
          </ul>
        </div>
        <?php if($permissao['fr6'] == S) { ?>
        
        
        <div class="page-header">
          <h1>Ferramentas <small>WebServices</small></h1>
        </div>
        
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
             <div class="powerwidget orange" id="most-form-elements" data-widget-editbutton="false">
              <header>
                <h2>Consumo<small> WebServices</small></h2>
              </header>
              <div class="inner-spacer">
            
          <h3>Acesso de Consumo API</h3>
	 <b> http://seu.ip/webservices.php?key=&formato=xml&tipo=&limite=&pesquisa=&busca=&ordem=</b> 
	 <br><br>
	 <a href="webservices.php?key=17287872165271920099189289738761&formato=xml&tipo=8" class="btn btn-info" target=_blank> ACESSAR API</a>
	 
	 <br><br>
	 <table class="table">
	  <thead>
	  <tr>
	  <th>CHAVE</th>
	  <th>FUN��O</th>
	  <th>RETORNO</th>
	  </tr>
	   </thead>
	  <tr>
	  <td>KEY</td>
	  <td>Chave de acesso para consumo da API.</td>
	  <td>Leitura da API</td>
	  </tr>
	  
	  <tr>
	  <td>FORMATO</td>
	  <td>Padr�o de exibi��o do webservices. Utilizar como json ou xml</td>
	  <td>XML ou JSON</td>
	  </tr>
	  
	  <tr>
	  <td>LIMITE</td>
	  <td>Limite de registros. Padr�o 10. Utilizar 10,20,100</td>
	  <td>Exibi��o dos Registros</td>
	  </tr>
	  
	  <tr>
	  <td>TIPO</td>
	  <td>1 = FINANCEIRO <br> 2 = CLIENTES <br> 3 = PLANOS <br> 4 = ORDEM DE SERVI�O <br> 5 = NOTA FISCAL <br> 6 = TECNICOS <br> 7 = SICI <br> 8 = EMPRESA <br> PADR�O ASSINATURAS</td>
	  <td>Base de Dados da Consulta</td>
	  </tr>
	  
	  <tr>
	  <td>PESQUISA</td>
	  <td>Pesquisa e filtra pela referencia necess�ria.<br>
	  COMANDOS:<br>
	  <b>id</b> | <span class="label label-info">Idenifica o registro atrav�s do ID. </span><br>
	  <b>codigo</b> | <span class="label label-info">Identifica o registro atrav�s do C�DIGO. </span><br>
	  <b>situacao</b> | <span class="label label-info">Identifica o registro atrav�s da SITUA��O DE OPERA��O. </span><br>
	  <b>nome</b> | <span class="label label-info">Identifica pelo campo nome. </span><br> 	
	  <b>email</b> | <span class="label label-info">Identifica pelo campo email. </span><br> 
	  <b>login</b> | <span class="label label-info">Identifica pelo campo login. </span><br>   
  </td>
	  <td>Exibi��o dos Registros</td>
	  </tr>
	  
	  <tr>
	  <td>BUSCA</td>
	  <td>Variavel da Busca Alfanumericos e por Status, (I,A,S,N,B,C,NI,R,V)</td>
	  <td>Variavel para consuta</td>
	  </tr>
	  
	  <tr>
	  <td>ORDEM</td>
	  <td>Ordenar registros por ASC Padr�o DESC, Utilizar ordem=ASC, ordem=DESC</td>
	  <td>Ordena��o de Registros</td>
	  </tr>
	  
	  </table>
	 
           <hr>
       
     
     
     
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