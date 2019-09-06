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
							{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
							<span class="user-level">{{ auth()->user()->fonction }}</span>
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

                            @if (auth()->user()->fonction == "Administrateur" || auth()->user()->fonction == "Guichetier")
                                <li onclick="window.location.href='/trips'" class="nav-item">
                                    <a data-toggle="collapse" href="index.html#base">
                                        <i class="fas fa-bus"></i>
                                        <p>Gestion des voyages</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->fonction == "Administrateur" || auth()->user()->fonction == "Comptable")
                                <li class="nav-item">
                                    <a href="{{ route('bills.index') }}">
                                        <i class="fa fa-ticket"></i>
                                        <p>Gestion des factures</p>
                                    </a>
                                </li>
                            @endif

                            <li onclick="window.location.href='/sinisters'" class="nav-item">
                                <a data-toggle="collapse" href="index.html#base">
                                    <i class="fas fa-car-crash"></i>
                                    <p>Gestion des Sinistres</p>
                                </a>
                            </li>

                            <!--<li onclick="window.location.href='/employees'" class="nav-item">
                                <a data-toggle="collapse" href="index.html#base">
                                    <i class="fas fa-user-tie"></i>
                                    <p>Gestion du personnel</p>
                                </a>
                            </li>-->
                            @if (auth()->user()->fonction == "Administrateur" || auth()->user()->fonction == "Guichetier")
                            <li onclick="window.location.href='/bookings'" class="nav-item">
                                <a data-toggle="collapse" href="index.html#base">
                                    <i class="fas fa-credit-card"></i>
                                    <p>Gestion des reservation</p>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->fonction == "Administrateur")
                                <li class="nav-item">
                                    <a href="{{ route('discipline.index') }}">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <p>Gestion de la discipline</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->fonction == "Administrateur")
                                <li class="nav-item">
                                    <a href="{{ route('vehicles.index') }}">
                                        <i class="fa fa-car" aria-hidden="true"></i>
                                        <p>Gestion des véhicules</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->fonction == "Service courrier")
                            <li class="nav-item">
                                <a href="{{ route('mails.index') }}">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    <p>Gestion des courriers</p>
                                </a>
                            </li>
                            @endif
                           @if (auth()->user()->fonction == "Administrateur")
                            <li class="nav-item">
                                <a href="/stats">
                                    <i class="fas fa-chart-pie"></i>
                                    <p>Statistiques</p>
                                </a>
                            </li>
                           @endif 
                        </ul>

				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Sidebar -->
