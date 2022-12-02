<HTML>
<?php	
require_once 'controladorInterfaz.php';
$controlador = new ControladorInterfaz;
?>
<HEAD>
   <TITLE>Actividad 1 - Unidad 7 - Curso Iniciación de PHP 5 - Rutas Senderismo</TITLE>
   <STYLE TYPE="text/css">
      input {
         font-family: Arial, Helvetica;
         font-size: 14;
         color: #000033;
         font-weight: normal;
         border-color: #999999;
         border-width: 1;
         background-color: #FFFFFF;
      }
   </STYLE>
</HEAD>
<BODY bgcolor="#C0C0C0" link="black" vlink="black" alink="black">
   <CENTER>
      <TABLE border="0" align="center" cellspacing="3" cellpadding="3" width="760" bgcolor="green">
         <TR>
            <TD><img src=senderismo.gif width=240 height=70></TD>
            <TH colspan="2" width="75%">&nbsp;
               <FONT size="6" color="black" face="arial, helvetica"><u>Rutas senderismo</u></FONT>&nbsp
            </TH>
         </TR>
      </TABLE>
      <P>
         <CENTER>
            <P>
            <TABLE border='0' width='600'>
               <TR>
                  <TD valign=top align=CENTER colspan=2>
                      <FORM name='form1' METHOD='post' ACTION="index.php?operacion=buscar">
                        <FONT size='-1'>Buscar por el campo <SELECT NAME='campo_busqueda'>
                              <OPTION Value=titulo> T&iacute;tulo </OPTION>
                              <OPTION Value=descripcion> Descripci&oacute;n </OPTION>
                           </SELECT>
                           <P><INPUT TYPE='TEXT' NAME='lo_q_busco' size='20'> <INPUT TYPE='SUBMIT'
                                 NAME='boton_buscar' VALUE='&iexcl;Buscar!'>
                        </FONT>
                     </FORM>
                  </TD>
                  <TD align=center>
                     <FORM name='form2' METHOD='POST' ACTION="index.php?operacion=introduce&ver=0&nume=0&id=-1#ancla"> <!--  -->
                     <INPUT TYPE='SUBMIT' NAME='alta' VALUE="Nueva ruta">
                     </FORM>
                     <FORM name='form3' METHOD='POST' ACTION='index.php?operacion=listado'>
                        <INPUT TYPE='SUBMIT' NAME='alta' VALUE='Listado completo'>
                     </FORM>
                  </TD>
               </TR>
            </TABLE>
            <?php
            if(isset($_GET['operacion'])){
               if ($_GET['operacion'] == 'buscar' && isset($_POST['lo_q_busco']))
               echo $controlador->generarTabla($_POST);
               if($_GET['operacion'] == 'listado')
               echo $controlador->generarTabla($_POST,'si');
               if($_GET['operacion'] == 'introduce' && $_GET['ver'] == 1)
               echo $controlador->mostrarTODOcomentar($_GET['id']);
               if($_GET['operacion'] == 'add_comentario')
                  echo $controlador->recogerComentario($_POST);
               if($_GET['operacion'] == 'introduce' && $_GET['ver'] == 0)
                  echo $controlador->mostrarModificaciones($_GET['nume'], $_GET['id']);
               if($_GET['operacion'] == 'exec_alta')
                  echo $controlador->updateTableParaRuta($_POST);
               if($_GET['operacion'] == 'exec_insertar')
                  echo $controlador->insertEntradaRuta($_POST);
               if($_GET['operacion'] == 'borrar')
                  echo $controlador->borrarRuta($_GET['id']);
               // if($_GET['operacion'] == 'introduce' && $_GET['ver'] == 0 && $_GET['nume'] == 0)
               //    echo $controlador->mostrarModificaciones($_POST);
                  
            }
                  
                  ?>
            
</BODY>
</HTML>