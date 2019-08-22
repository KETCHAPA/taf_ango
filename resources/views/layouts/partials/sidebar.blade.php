	<!-- Sidebar -->
    <div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="\img/profile.jpg" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="index.html#collapseExample" aria-expanded="true">
						<span>
							Ango Simplice
							<span class="user-level">Administrateur</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="index.html#profile">
									<span class="link-collapse">Mon profile</span>
								</a>
							</li>
							<li>
								<a href="index.html#edit">
									<span class="link-collapse">Editer mon profile</span>
								</a>
							</li>
							<li>
								<a href="index.html#settings">
									<span class="link-collapse">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="/dashboard" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Tableau de bord</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
				</li>
				<li onclick="window.location.href='/trips'" class="nav-item">
					<a data-toggle="collapse" href="index.html#base">
						<i class="fas fa-bus"></i>
						<p>Gestion des voyages</p>
					</a>
				</li>
				
				<li onclick="window.location.href='/sinisters'" class="nav-item">
					<a data-toggle="collapse" href="index.html#base">
						<i class="fas fa-car-crash"></i>
						<p>Gestion des Sinistres</p>
					</a>
				</li>
				
				<li onclick="window.location.href='/employees'" class="nav-item">
					<a data-toggle="collapse" href="index.html#base">
						<i class="fas fa-user-tie"></i>
						<p>Gestion du personnel</p>
					</a>
				</li>
				<li onclick="window.location.href='/bookings'" class="nav-item">
					<a data-toggle="collapse" href="index.html#base">
						<i class="fas fa-credit-card"></i>
						<p>Gestion des reservation</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->