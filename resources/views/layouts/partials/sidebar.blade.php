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
							<a href="index.html#dashboard" aria-expanded="false">
								<i class="fa fa-home"></i>
								<p>Tableau de bord</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="index.html#base">
								<i class="fa fa-bus" aria-hidden="true"></i>
								<p>Gestion des voyages</p>
							</a>
                        </li>

						<li class="nav-item">
							<a data-toggle="collapse" href="index.html#base">
								<i class="fa fa-fire" aria-hidden="true"></i>
								<p>Gestion des Sinistres</p>
							</a>
                        </li>

						<li class="nav-item">
							<a data-toggle="collapse" href="index.html#base">
								<i class="fas fa-user-shield    "></i>
								<p>Gestion du personnel</p>
							</a>
                        </li>

						<li class="nav-item">
							<a data-toggle="collapse" href="index.html#base">
								<i class="fas fa-layer-group"></i>
								<p>Gestion des passagers</p>
							</a>
                        </li>

                        <li class="nav-item">
							<a href="{{ route('discipline.index') }}">
								<i class="fa fa-users" aria-hidden="true"></i>
								<p>Gestion de la discipline</p>
							</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('vehicles.index') }}">
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <p>Gestion des véhicules</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('mails.index') }}">
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <p>Gestion des courriers</p>
                            </a>
                        </li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
