<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?php

				$actual = $_SESSION["id"];

				$item = null;
				$valor = null;

				$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);


				foreach ($usuario as $key => $value) {

					if ($actual == $value["id"]) {


						$item = "id";
						$valor = $value["id_empleado"];
						$empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);






						if ($value["foto"] != "") {

							echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
						} else {

							echo '<td><img src="vistas/img/usuarios/default/anonymous2.png" class="img-thumbnail" width="40px"></td>';
						}
					}
				}



				?>
			</div>


			<div class="pull-left info">
				<p> <i class="fa fa-circle text-success"></i> <span>Activo: </span> <?php echo $_SESSION["usuario"]; ?> </p>


			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu " data-widget="tree">
			<li class="header">
				<center> MENU PRINCIPAL </center>
			</li>


			<li class="active">

				<a href="inicio">



					<i class="fa fa-home"></i>
					<span>Inicio</span>



				</a>

			</li>


			<?php



			if ($_SESSION["id_rol"] == 1) {

				echo '<li class="treeview">

				<a href="#">

					 <i class="fa fa-star"></i>
					
					 <span>Administrador</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span> 

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="empleados">
							
							<i class="fa fa-users"></i>
							<span>Empleados</span>

						</a>

					</li>
					
					<li>

						<a href="roles">
							
							<i class="fa fa-podcast"></i>
							<span>Roles</span>

						</a>

					</li>

					<li>

						<a href="usuarios">
							
							<i class="fa fa-heart"></i>
							<span>Usuarios</span>

						</a>

					</li>

				</ul>

			</li>';
			}

			?>

			<li>

				<a href="sucursales">

					<i class="fa fa-building"></i>
					<span>Sucursales</span>

				</a>

			</li>

			<li>

				<a href="calendario">

					<i class="fa fa-calendar"></i>
					<span>calendario</span>

				</a>

			</li>


			<li class="treeview">

				<a href="#">

					<i class="fa fa-star"></i>

					<span>mantenimiento</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="mantenimiento">

							<i class="fa fa-podcast"></i>
							<span>Agregar mantenimiento</span>

						</a>

					</li>



				</ul>


			</li>

			<!-- CONDUCTORES -->
			<li class="treeview">

				<a href="#">

					<i class="fa fa-star"></i>

					<span>Conductores</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					<li>

						<a href="conductores">

							<i class="fa fa-podcast"></i>
							<span>Conductor</span>

						</a>

					</li>
				</ul>

			</li>

			

			<!-- CAMIONES -->
			<li class="treeview">

				<a href="#">

					<i class="fa fa-star"></i>

					<span>Vehiculos</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					<li>

						<a href="camiones">

							<i class="fa fa-podcast"></i>
							<span>Camiones</span>

						</a>

					</li>
					<!-- <li>

		<a href="conductoresRead">

			<i class="fa fa-podcast"></i>
			<span>Mostrar Estatus</span>

		</a>

	</li> -->



				</ul>

			</li>

			<!-- VIAJES -->
			<li class="treeview">

				<a href="#">

					<i class="fa fa-star"></i>

					<span>Viaje</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					<li>

						<a href="viaje">

							<i class="fa fa-podcast"></i>
							<span>Viaje</span>

						</a>
						<a href="agenda">

							<i class="fa fa-podcast"></i>
							<span>Agenda</span>

						</a>
					</li>
					<!-- <li>

		<a href="conductoresRead">

			<i class="fa fa-podcast"></i>
			<span>Mostrar Estatus</span>

		</a>

	</li> -->



				</ul>

			</li>

			<!-- PDF -->
			<li class="treeview">

				<a href="#">

					<i class="fa fa-star"></i>

					<span>PDF</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					<li>

						<a href="pdf">

							<i class="fa fa-podcast"></i>
							<span>Generar PDF</span>

						</a>

					</li>
				</ul>
			</li>







		</ul>

	</section>



</aside>