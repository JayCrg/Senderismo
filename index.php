<HTML>

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
                      <FORM name='form1' METHOD='POST' ACTION=""> <!--index.php?operacion=buscar-->
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
                     <FORM name='form2' METHOD='POST' ACTION='index.php?operacion=introduce&ver=0&nume=0#ancla'>
                        <INPUT TYPE='SUBMIT' NAME='alta' VALUE="Nueva ruta">
                     </FORM>
                     <FORM name='form3' METHOD='POST' ACTION='index.php?operacion=listado'>
                        <INPUT TYPE='SUBMIT' NAME='alta' VALUE='Listado completo'>
                     </FORM>
                  </TD>
               </TR>
            </TABLE>
            <TABLE BORDER='0' cellspacing='1' cellpadding='1' align='center' width='760'>
               <TR>
                  <TH bgcolor='green'>
                     <FONT color='white'>T&iacute;tulo</FONT>
                  </TH>
                  <TH bgcolor='green'>
                     <FONT color='white'>Descripci&oacute;n</FONT>
                  </TH>
                  <TH bgcolor='green'>
                     <FONT color='white'>Desnivel (m)</FONT>
                  </TH>
                  <TH bgcolor='green'>
                     <FONT color='white'>Distancia (Km)</FONT>
                  </TH>
                  <TH bgcolor='green'>
                     <FONT color='white'>Dificultad</FONT>
                  </TH>
                  <TH bgcolor='green' colspan='3'>
                     <FONT color='white'>Operaciones</FONT>
                  </TH>
               </TR>



               <?php
               include_once 'classRuta.php';
               include_once 'classConexion.php';
               // $ruta = new Ruta();
               $conexion = new Conexion();

               echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
              if (isset($_POST['lo_q_busco'])) {
                  if($_POST['campo_busqueda'] == 'titulo') {
                     // $ar = $conexion->buscarPorNombre($_POST['lo_q_busco']);
                     // print_r($ar);
                  } else {
                     $ar = $conexion->buscarPorDescripcion($_POST['lo_q_busco']);
                     print_r($ar);
                  }





              } else {
                 $operacion = "listado";}

               ?>












               <TR>
                  <TD>
                     <FONT size='-1'><B>Willirex mi padre</B></FONT>
                  </TD>
                  <TD>
                     <FONT size='-1'><B>Yo no</B></FONT>
                  </TD>
                  <TD>
                     <FONT size='-1'><B>1</B></FONT>
                  </TD>
                  <TD>
                     <FONT size='-1'><B>9999999</B></FONT>
                  </TD>
                  <TD>
                     <FONT size='-1'><B>Alta</B></FONT>
                  </TD>
                  <TD>
                     <TABLE border=1 CELLSPACING=0 CELLPADDING=3 bgcolor=black>
                        <TR>
                           <TD bgcolor='white'>
                              <FONT size='-1'><a href='index.php?operacion=introduce&ver=1&id=111#ancla'>Comentar</A>
                              </FONT>
                           </TD>
                        </TR>
                     </TABLE>
                  </TD>
                  <TD>
                     <TABLE border=1 CELLSPACING=0 CELLPADDING=3 bgcolor=black>
                        <TR>
                           <TD bgcolor='white'>
                              <FONT size='-1'><a href='index.php?operacion=introduce&ver=0&id=111#ancla'>Editar</A>
                              </FONT>
                           </TD>
                        </TR>
                     </TABLE>
                  </TD>
                  <TD>
                     <TABLE border=1 CELLSPACING=0 CELLPADDING=3 bgcolor=black>
                        <TR>
                           <TD bgcolor='white'>
                              <FONT size='-1'><a href='index.php?operacion=borrar&id=111'>Borrar</A></FONT>
                           </TD>
                        </TR>
                     </TABLE>
                  </TD>
               </TR>
               <TABLE>
                  <TR>
                     <TD>
                        <FONT color=green size='-1'>El n&deg; total de rutas es: <b>5</b></FONT>
                        <P>
                     </TD>
                  </TR>
                  <TR>
                     <TD>
                        <FONT color=green size='-1'>La ruta más larga tiene: <b>9999999 Km</b></FONT>
                        <P>
                     </TD>
                  </TR>
               </TABLE>
</BODY>

</HTML>