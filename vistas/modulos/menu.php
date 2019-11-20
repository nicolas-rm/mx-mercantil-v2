<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?php

				if ($_SESSION["foto"] != "") {

					echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';
				} else {
					// echo '<img src="vistas/img/usuarios/default/usuario1.png" class="user-image">';
					echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';
				}


				?>
			</div>


			<div class="pull-left info">
				<p><?php echo $_SESSION["usuario"]; ?></p>

				<i class="fa fa-circle text-success"></i> Activado</span>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">
				<center>MENU PRINCIPAL</center>
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

				<a href="">

					<i class="fa fa-times"></i>
					<span>x</span>

				</a>

			</li>

			<li>

				<a href="">

					<i class="fa fa-times"></i>
					<span>x</span>

				</a>

			</li>

			<li>

				<a href="">

					<i class="fa fa-times"></i>
					<span>x</span>

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

			<!-- ESTATUS -->
			<li class="treeview">

				<a href="#">

					<i class="fa fa-star"></i>

					<span>Estatus</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					<li>

						<a href="estatus">

							<i class="fa fa-podcast"></i>
							<span>Estatus</span>

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

			<!-- CAMIONES -->
			<li class="treeview">

				<a href="#">

					<i class="fa fa-star"></i>

					<span>Camiones</span>

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