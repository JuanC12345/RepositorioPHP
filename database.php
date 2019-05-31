<?php

class Database{
	private $conn;
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $dbname = "consultorioclinico";

	function __construct(){
		$this->connect_db();

	}

	public function connect_db(){
		$this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);

				if (mysqli_connect_error()) {
					die("Falló la conexión a la base de datos".mysqli_connect_error(). mysqli_connect_errno());
					

				}
				

			}


			public function sanitize($var){
				$return = mysqli_real_escape_string($this->conn, $var);
				return $return;
			}

				public function create($Nombre, $Apellido,$Rol, $Username, $Password){

$query = "Insert into usuario (Nombre, Apellido, Rol, NombreUsuario, Password) VALUES ('$Nombre','$Apellido','$Rol','$Username', '$Password')";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function read(){
					$query = "Select Id_Usuario, Nombre, Apellido, Rol, NombreUsuario, Password from usuario";

					$res = mysqli_query($this->conn, $query);
						return $res;
					}

					public function single_record($id){
					$query = "Select Id_Usuario, Nombre, Rol, NombreUsuario, Password from usuario where Id_Usuario='$id'";
					$res = mysqli_query($this->conn, $query);
					$return = mysqli_fetch_object($res);
					return $return;

				}

				public function update($Nombre, $Rol, $User, $Password,$id){
					$query = "Update usuario set Nombre = '$Nombre', Rol = '$Rol', NombreUsuario = '$User', Password = '$Password' where Id_Usuario =$id";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function delete($id){
					$query = "Delete from usuario where Id_Usuario = $id";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else
					{
						return false;
					}

				}


				public function createPatient($Nombre, $Apellido, $Direccion, $DUI, $Telefono, $Edad, $Sexo){

$query = "Insert into paciente (Nombre, Apellido, Direccion, DUI, Telefono, Edad, Sexo) VALUES ('$Nombre','$Apellido','$Direccion', '$DUI', '$Telefono', '$Edad','$Sexo')";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}


				public function readPatient(){
					$query = "Select * from paciente";

					$res = mysqli_query($this->conn, $query);
						return $res;
					}

					public function updatePatient($Nombre, $Apellido, $Direccion,$DUI,$Telefono,$Edad,$Sexo,$Id_Paciente){
					$query = "Update paciente set Nombre = '$Nombre', Apellido = '$Apellido', Direccion = '$Direccion', DUI = '$DUI', Telefono = '$Telefono', Edad = $Edad , Sexo = '$Sexo' where Id_Paciente = $Id_Paciente";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}


				public function single_record_Patient($id){
					$query = "Select Id_Paciente, Nombre, Apellido, Direccion, DUI, Telefono, Edad, Sexo from paciente where Id_Paciente='$id'";
					$res = mysqli_query($this->conn, $query);
					$return = mysqli_fetch_object($res);
					return $return;

				}


				public function deletePatient($id){
					$query = "Delete from paciente where Id_Paciente = $id";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else
					{
						return false;
					}

				}


				public function createExpedient($Id_Paciente, $AntecedentesMedicos, $Alergias, $Peso, $Estatura){

$query = "Insert into expediente (Id_Paciente , Antecedentes_Medicos, Alergias, Peso, Estatura) VALUES ($Id_Paciente,'$AntecedentesMedicos', '$Alergias', '$Peso', '$Estatura')";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}


				public function readExpedient(){
					$query = "Select T1.Id_Expediente, T2.Nombre,T2.Apellido,T1.Antecedentes_Medicos,T1.Alergias, T1.Peso, T1.Estatura from expediente T1 INNER JOIN paciente T2 on T1.Id_Paciente = T2.Id_Paciente";

					$res = mysqli_query($this->conn, $query);
						return $res;
					}

					public function updateExpedient($Id_Paciente, $AntecedentesMedicos,$Alergias,$Peso,$Estatura, $Id_Expediente){
					$query = "Update expediente set Id_Paciente = $Id_Paciente, Antecedentes_Medicos = '$AntecedentesMedicos', Alergias = '$Alergias', Peso = '$Peso', Estatura = '$Estatura' where Id_Expediente = $Id_Expediente";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function single_record_Expedient($id){
					$query = "Select T1.Id_Expediente, T2.Nombre,T2.Apellido,T1.Id_Paciente,T1.Antecedentes_Medicos,T1.Alergias, T1.Peso, T1.Estatura from expediente T1 INNER JOIN paciente T2 on T1.Id_Paciente = T2.Id_Paciente where Id_Expediente='$id'";
					$res = mysqli_query($this->conn, $query);
					$return = mysqli_fetch_object($res);
					return $return;

				}

				public function deleteExpedient($id){
					$query = "Delete from expediente where Id_Expediente = $id";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else
					{
						return false;
					}

				}

					public function createQuote($Id_Paciente,$Id_Doctor, $Fecha_Cita, $Hora_Cita,$Estado){

$query = "Insert into cita (Id_Paciente, Id_Doctor,Fecha_Cita, Hora,Estado) VALUES ('$Id_Paciente','$Id_Doctor','$Fecha_Cita','$Hora_Cita','$Estado')";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function readQuote(){
					$query = "Select T1.Id_Cita, T2.Nombre,T2.Apellido,T1.Fecha_Cita,T1.Hora,T1.Estado, T3.Nombre_Doctor, T3.Apellido_Doctor from cita T1 INNER JOIN paciente T2 on T1.Id_Paciente = T2.Id_Paciente INNER JOIN doctor T3 on T1.Id_Doctor = T3.Id_Doctor";

					$res = mysqli_query($this->conn, $query);
						return $res;
					}

					public function readActualQuote(){
					$query = "Select T1.Id_Cita, T2.Nombre,T2.Apellido,T1.Fecha_Cita,T1.Hora,T1.Estado, T3.Nombre_Doctor, T3.Apellido_Doctor from cita T1 INNER JOIN paciente T2 on T1.Id_Paciente = T2.Id_Paciente INNER JOIN doctor T3 on T1.Id_Doctor = T3.Id_Doctor where Fecha_Cita = DATE(NOW())";

					$res = mysqli_query($this->conn, $query);
						return $res;
					}

					public function readQuoteDoctor($nombre, $apellido){
					$query = "Select T1.Id_Cita,T1.Id_Doctor as doctor, T2.Nombre,T2.Apellido,T2.Id_Paciente,T1.Fecha_Cita,T1.Hora,T1.Estado,T3.Id_Doctor,T3.Nombre_Doctor, T3.Apellido_Doctor,T4.Id_Expediente from cita T1 INNER JOIN paciente T2 on T1.Id_Paciente = T2.Id_Paciente INNER JOIN doctor T3 on T1.Id_Doctor = T3.Id_Doctor INNER JOIN expediente T4 on T2.Id_Paciente = T4.Id_Paciente where Nombre_Doctor = '$nombre' AND Apellido_Doctor = '$apellido' AND Estado = 'Pendiente'";

					$res = mysqli_query($this->conn, $query);
						return $res;
					}

					public function updateQuote($Id_Paciente,$Id_Doctor, $Fecha_Cita, $Hora,$Estado, $Id_Cita){
					$query = "Update cita set Id_Paciente = $Id_Paciente, Id_Doctor = $Id_Doctor, Fecha_Cita = '$Fecha_Cita', Hora = '$Hora', Estado = '$Estado' where Id_Cita = $Id_Cita";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function single_record_Quote($id){
					$query = "Select T1.Id_Cita, T2.Nombre,T2.Apellido,T2.Id_Paciente,T1.Fecha_Cita,T1.Hora,T1.Estado, T3.Nombre_Doctor, T3.Apellido_Doctor, T3.Id_Doctor from cita T1 INNER JOIN paciente T2 on T1.Id_Paciente = T2.Id_Paciente INNER JOIN doctor T3 on T1.Id_Doctor = T3.Id_Doctor where Id_Cita = $id";
					$res = mysqli_query($this->conn, $query);
					$return = mysqli_fetch_object($res);
					return $return;

				}

					public function deleteQuote($id){
					$query = "Delete from cita where Id_Cita = $id";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else
					{
						return false;
					}

				}

					public function createReceta($Titulo,$Medicamentos, $Dosis){

$query = "Insert into receta (Titulo,Medicamentos, Dosis) VALUES ('$Titulo','$Medicamentos','$Dosis')";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function readReceta(){
					$query = "Select * from receta";

					$res = mysqli_query($this->conn, $query);
						return $res;
					}

					public function updateReceta($Titulo,$Medicamentos, $Dosis,$Id_Receta){
					$query = "Update receta set Titulo = '$Titulo', Medicamentos = '$Medicamentos', Dosis = '$Dosis' where Id_Receta = $Id_Receta";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function deleteReceta($id){
					$query = "Delete from receta where Id_Receta = $id";
					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else
					{
						return false;
					}

				}

				public function single_record_Receta($id){
					$query = "Select Id_Receta,Titulo, Medicamentos, Dosis from receta where Id_Receta='$id'";
					$res = mysqli_query($this->conn, $query);
					$return = mysqli_fetch_object($res);
					return $return;

				}



					public function createConsulta($Id_Paciente,$Motivo_Consulta, $Sintomas,$Padecimiento,$Examenes,$fecha){

$query = "Insert into consulta (Id_Cita,Motivo_Consulta, Sintomas, Padecimiento, Examenes,Fecha_Consulta) VALUES ('$Id_Paciente','$Motivo_Consulta','$Sintomas','$Padecimiento','$Examenes','$fecha')";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}

				}

				public function updateDoctorExpedient(){

					$query = "select T1.*, T2.Fecha_Cita,T3.Nombre_Doctor,T4.Nombre,T5.Id_Expediente from consulta T1 inner join cita T2 on T2.Id_Cita = T1.Id_Cita inner join doctor T3 on T3.Id_Doctor = T2.Id_Doctor inner join paciente T4 on T2.Id_Paciente = T4.Id_Paciente inner join expediente T5 on T5.Id_Paciente = T4.Id_Paciente where T2.Id_Paciente = 32 ;";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return true;
					}

					else{
						return false;
					}
					
				}

				public function readHistoryPatient($id){

					$query = "select T1.*, T2.Fecha_Cita,T3.Nombre_Doctor,T4.Nombre,T5.Id_Expediente from consulta T1 inner join cita T2 on T2.Id_Cita = T1.Id_Cita inner join doctor T3 on T3.Id_Doctor = T2.Id_Doctor inner join paciente T4 on T2.Id_Paciente = T4.Id_Paciente inner join expediente T5 on T5.Id_Paciente = T4.Id_Paciente where T2.Id_Paciente = $id";

					$res = mysqli_query($this->conn, $query);

					if ($res) {
						return $res;
					}

					else{
						return false;
					}
					
				}

				public function validarHorario($Hora_Ini, $Hora_Fin, $Hora){
					if($Hora < $Hora_Ini || $Hora > $Hora_Fin){
						return false;
					}
					else{
						return true;
					}
				}






				}

				



//select T1.*,T2.Id_Doctor from cita T1 inner join doctor T2 on T1.Id_Doctor = T2.Id_Doctor;
//select T1.*,T2.Id_Cita,T3.Id_Doctor,T4.Id_Paciente from consulta T1 inner join cita T2 on T1.Id_Cita inner join doctor T3 on T2.Id_Doctor inner join paciente T4 on T2.Id_Paciente;



				//select T1.*, T2.Fecha_Cita,T3.Nombre_Doctor,T4.Nombre from consulta T1 inner join cita T2 on T2.Id_Cita = T1.Id_Cita inner join doctor T3 on T3.Id_Doctor = T2.Id_Doctor inner join paciente T4 on T2.Id_Paciente = T4.Id_Paciente 

				//select T1.*, T2.Fecha_Cita,T3.Nombre_Doctor,T4.Nombre,T5.Id_Expediente from consulta T1 inner join cita T2 on T2.Id_Cita = T1.Id_Cita inner join doctor T3 on T3.Id_Doctor = T2.Id_Doctor inner join paciente T4 on T2.Id_Paciente = T4.Id_Paciente inner join expediente T5 on T5.Id_Paciente = T4.Id_Paciente where T2.Id_Paciente = 32 ;
?>