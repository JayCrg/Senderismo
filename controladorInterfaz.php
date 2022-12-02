<?php
require_once 'classConexion.php';
class ControladorInterfaz
{
   private $conexion;
   public function __construct()
   {
      $this->conexion = new Conexion();
   }

   /*PARA BUSCAR LAS RUTAS*/
   private function htmlTabla($ruta)
   {
      $html = "<TR>
                  <TD>
               <FONT size='-1'><B>".$ruta['titulo']."</B></FONT>
               </TD>
               <TD>
               <FONT size='-1'><B>".$ruta['descripcion']."</B></FONT>
               </TD>
               <TD>
               <FONT size='-1'><B>".$ruta['desnivel']."</B></FONT>
               </TD>
               <TD>
               <FONT size='-1'><B>".$ruta['distancia']."</B></FONT>
               </TD>
               <TD>
               <FONT size='-1'><B>".$ruta['dificultad']."</B></FONT>
               </TD>
               <TD>
               <TABLE border=1 CELLSPACING=0 CELLPADDING=3 bgcolor=black>
               <TR>
               <TD bgcolor='white'>
               <FONT size='-1'><a href='index.php?operacion=introduce&ver=1&id=".$ruta['id']."#ancla'>Comentar</A>
               </FONT>
               </TD>
               </TR>
              </TABLE>
              </TD>
              <TD>
              <TABLE border=1 CELLSPACING=0 CELLPADDING=3 bgcolor=black>
              <TR>
              <TD bgcolor='white'>
              <FONT size='-1'><a href='index.php?operacion=introduce&ver=0&id=".$ruta['id']."&nume=1#ancla'>Editar</A>
              </FONT>
              </TD>
              </TR>
              </TABLE>
              </TD>
              <TD>
              <TABLE border=1 CELLSPACING=0 CELLPADDING=3 bgcolor=black>
              <TR>
              <TD bgcolor='white'>
              <FONT size='-1'><a href='index.php?operacion=borrar&id=".$ruta['id']."'>Borrar</A></FONT>
              </TD>
              </TR>
              </TABLE>
              </TD>
              </TR>";

      return $html;
   }
   public function generarFilasTabla($datos, $todo='')
   {
      if($todo != ''){
         $ar = $this->conexion->buscarTodo();
         $html = '';
         foreach($ar as $ruta){
            $html .= $this->htmlTabla($ruta);
         }
      }
      else{
      if ($datos['campo_busqueda'] == 'titulo') {
         $ar = $this->conexion->buscarPorNombre($datos['lo_q_busco']);
         $html = '';
         foreach ($ar as $ruta) {
            $html .= $this->htmlTabla($ruta);
         }
      } else {
         $ar = $this->conexion->buscarPorDescripcion($datos['lo_q_busco']);
         $html = '';
         foreach ($ar as $ruta) {
            $html .= $this->htmlTabla($ruta);
         }
      }
   }
      return $html;
   }
   public function generarTabla($datos, $todo='')
   {
      $html = "<TABLE BORDER='0' cellspacing='1' cellpadding='1' align='center' width='760'>
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
               </TR>";
         $html .= $this->generarFilasTabla($datos, $todo);
      $html .= "</TABLE>";
      return $html;
   }


   /*PARA COMENTARIOS ****************************/
   /*************************************/

   public function mostrarTODOcomentar($id){
      $html = $this->mostrarDatosRutaComentario($id);
      $html .= $this->mostrarFormularioComentario($id);
      return $html;
   }

   public function mostrarDatosRutaComentario($id)
   {
      $rutaAr = $this->conexion->buscarPorId($id);
      $ruta = $rutaAr[0];
      $html = "<a name='ancla'></a>
			<font color='green'>
				<h2><u>COMENTAR RUTA</u></h2>
			</font>
			<table width='600' cellspacing='10' cellpadding='0' border='0' align='center'>
				<tbody>
					<tr>
						<td width='140' bgcolor='green' align='center'>
							<font color='white'>Título</font>
						</td>
						<td>
							<font><b>
									<p 'style=color:red'>".$ruta['titulo']."</p>
								</b></font>
						</td>
					</tr>
					<tr>
						<td width='140' bgcolor='green' align='center'>
							<font color='white'>Descripción</font>
						</td>
						<td>
							<font><b>".$ruta['descripcion']."</b></font>
						</td>
					</tr>
					<tr>
						<td width='140' bgcolor='green' align='center'>
							<font color='white'>Desnivel (m)</font>
						</td>
						<td>
							<font><b>".$ruta['desnivel']."</b></font>
						</td>
					</tr>
					<tr>
						<td width='140' bgcolor='green' align='center'>
							<font color='white'>Distancia (Km)</font>
						</td>
						<td>
							<font><b>".$ruta['distancia']."</b></font>
						</td>
					</tr>
					<tr>
						<td width='140' bgcolor='green' align='center'>
							<font color='white'>Dificultad</font>
						</td>
						<td>
							<font><b>".$ruta['dificultad']."</b></font>
						</td>
					</tr>
					<tr>
						<td width='140' bgcolor='green' align='center'>
							<font color='white'>Notas</font>
						</td>
						<td>
							<font><b>".$ruta['notas']."</b></font>
						</td>
					</tr>
				</tbody>
			</table>";
      return $html;
   }

   public function mostrarFormularioComentario($id)
   {
      $datos = $this->conexion->buscarTodosComentarios($id);
      $date = date('Y-m-d');
      $html = "<table width='800' cellspacing='1' cellpadding='1' border='0' align='center'>
      <tbody>
         <tr>
            <th bgcolor='green'>
               <font color='white'>Nombre</font>
            </th>
            <th bgcolor='green'>
               <font color='white'>Fecha</font>
            </th>
            <th bgcolor='green'>
               <font color='white'>Comentario</font>
            </th>
         </tr>
         <form name='form9' method='post' action='index.php?operacion=add_comentario'>
         <tr>
            <td><input type='text' name='nombre' size='20' maxlength='50'></td>
            <td>
               <font size='-1'><b>$date</b></font>
            </td>
            <td align='right'><input type='text' name='texto' size='75' maxlength='254'>
               <input type='hidden' name='idRuta' value='$id'>
               <input type='SUBMIT' name='pulsa' value='Añadir'>
               </form>
            </td>
         </tr>";
      foreach ($datos as $comentario) {
        $html .= $this->generarFilasComentarios($comentario);
      }
      $html .= "</tbody>
      </table>";
      return $html;
   }
   public function generarFilasComentarios($comentario)
   {
      $html = "<tr>
      <td>
         <font size='-1'><b>" . $comentario['nombre'] . "</b></font>
      </td>
      <td>
         <font size='-1'><b>" . $comentario['fecha'] . "</b></font>
      </td>
      <td>
         <font size='-1'><b>" . $comentario['texto'] . "</b></font>
      </td>
   </tr>";
      return $html;
   }

   public function recogerComentario($data){
      $id = $data['idRuta'];
      $nombre = $data['nombre'];
      $comentario = $data['texto'];
      $this->conexion->insertarComentario($id, $comentario, $nombre);
      header("Location: index.php?operacion=introduce&id=$id&ver=1");
   }


   /*EDITAR RUTA*/
   public function mostrarModificaciones($nume, $id=''){
      if($id!=-1){
         $rutaAr = $this->conexion->buscarPorId($id);
         $ruta = $rutaAr[0];
      }
      $operacion = $nume!=0 ? "exec_alta" : "exec_insertar";
      $dificultad=$nume!=0?$ruta['dificultad']:'';
      $html = "<hr><a name='ancla'></a>
      <font color='green'>
         <h2><u>MODIFICAR RUTA</u></h2>
      </font>
      <form name='form9' method='post' action='index.php?operacion=$operacion'>
         <table width='600' cellspacing='10' cellpadding='0' border='0' align='center'>
            <tbody>
               <tr>
                  <td width='140' bgcolor='green' align='center'>
                     <font color='white'>Título</font>
                  </td>
                  <td><input type='text' name='titulo' size='55' value='".($nume!=0?$ruta['titulo']:'')."' maxlength='55'></td>
               </tr>
               <tr>
                  <td width='140' bgcolor='green' align='center'>
                     <font color='white'>Descripción</font>
                  </td>
                  <td><input type='text' name='descripcion' size='120' value='".($nume!=0?$ruta['descripcion']:'')."' maxlength='254'></td>
               </tr>
               <tr>
                  <td width='140' bgcolor='green' align='center'>
                     <font color='white'>Desnivel (m)</font>
                  </td>
                  <td><input type='text' name='desnivel' size='7' value='".($nume!=0?$ruta['desnivel']:'')."' maxlength='8'></td>
               </tr>
               <tr>
                  <td width='140' bgcolor='green' align='center'>
                     <font color='white'>Distancia (Km)</font>
                  </td>
                  <td><input type='text' name='distancia' size='7' value='".($nume!=0?$ruta['distancia']:'')."' maxlength='8'></td>
               </tr>
               <tr>
                  <td width='140' bgcolor='green' align='center'>
                     <font color='white'>Dificultad</font>
                  </td>
                  <td>";
      $html .= $this->hacerSelect($dificultad);
         $html.= "</td>
               </tr>
               <tr>
                  <td width='140' bgcolor='green' align='center'>
                     <font color='white'>Notas</font>
                  </td>
                  <td><textarea rows='10' cols='50' name='notas'>".($nume!=0?$ruta['notas']:'')."</textarea></td>
               </tr>
            </tbody>
         </table>
         <center><input type='hidden' name='id' value='$id'><input type='SUBMIT' name='pulsa'
               value='Modificar ruta'></center>
      </form>";
      return $html;
   }
   private function hacerSelect($dificultad){//esto se puede hacer mejor, pero por cuestiones de tiempo lo dejo así
      if($dificultad == 1){
         $html = "<select name='dificultad'>
         <option value='0'></option>
         <option value='1' selected='selected'>Baja</option>
         <option value='2'>Media</option>
         <option value='3'>Alta</option>
         </select>";
      }
      else if($dificultad == 2){
         $html = "<select name='dificultad'>
         <option value='0'></option>
         <option value='1'>Baja</option>
         <option value='2' selected='selected'>Media</option>
         <option value='3'>Alta</option>
         </select>";
      }
      else if($dificultad == 3){
         $html = "<select name='dificultad'>
         <option value='0'></option>
         <option value='1'>Baja</option>
         <option value='2'>Media</option>
         <option value='3' selected='selected'>Alta</option>
         </select>";
      }
      else{
         $html = "<select name='dificultad'>
         <option value='0'></option>
         <option value='1'>Baja</option>
         <option value='2'>Media</option>
         <option value='3'>Alta</option>
         </select>";
      }
      return $html;
   }
   public function updateTableParaRuta($data){
      $id = $data['id'];
      $titulo = $data['titulo'];
      $descripcion = $data['descripcion'];
      $desnivel = $data['desnivel'];
      $distancia = $data['distancia'];
      $dificultad = $data['dificultad'];
      $notas = $data['notas'];
      $this->conexion->actualizar($id, $titulo, $descripcion, $desnivel, $distancia, $notas, $dificultad);
      header("Location: index.php?operacion=listado");
      // header("Location: index.php?operacion=introduce&id=$id&ver=0"); no va bien, mejor volvemos al menu principal...


   /*INSERTAR RUTA*/
   }
   public function insertEntradaRuta($data){
      $titulo = $data['titulo'];
      $descripcion = $data['descripcion'];
      $desnivel = $data['desnivel'];
      $distancia = $data['distancia'];
      $dificultad = $data['dificultad'];
      $notas = $data['notas'];
      $this->conexion->insertarRuta($titulo, $descripcion, $desnivel, $distancia, $notas, $dificultad);
      header("Location: index.php?operacion=listado");
   }
   /*BORRAR */
   public function borrarRuta($id){
      $this->conexion->borrar($id);
      header("Location: index.php?operacion=listado");
   }
}
