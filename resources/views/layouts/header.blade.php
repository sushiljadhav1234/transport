		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->
		
		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<nav id="sidebar" class="sidebar-wrapper">

				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<!-- <a href="index.html" class="logo">
						<img src="img/logo.png" alt="Logo" />
					</a> -->
					<a href="index.php" class="logo text-center"><img src="{{asset('img/logo.png')}}" alt="logo"></a>
				</div>
				<!-- Sidebar brand end  -->
				
				<!-- User profile start -->
				<div class="sidebar-user-details">
					<div class="user-profile">
						<img src="{{asset('img/user2.png')}}" class="profile-thumb" alt="User Thumb">
						<span class="status-label"></span>
					</div>
					<h6 class="profile-name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6>
					<div class="profile-actions">
					
						<!--
						
						<a href="my_profile.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Profile">
							<i class="icon-user1"></i>
						</a>
						
						<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
							<i class="icon-twitter1"></i>
						</a>
						<a href="logout.php" class="red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
							<i class="icon-power1"></i>
						</a>
						-->
					</div>					
				</div>
				<!-- User profile end -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
						
							
						<li class="mainkalamenu"  id="mainmenuDashboards">
							<a href="#" value="Dashboards">
								<i class="icon-filter_none"></i>
								<span class="menu-text">Dashboard</span>
							</a>
						</li>
						<li class="mainkalamenu"  id="mainmenuQR" >
							<a  value="QR"  href="#">
							<i class="icon-playlist_add_check"></i>
								QRs
							</a>
						</li>

						<li class="mainkalamenu"  id="mainmenuAddQuoteRequest"  >
							<a  value="AddQuoteRequest" href="#">
							<i class="icon-playlist_add"></i>
								New QR
							</a>
						</li>

						
						<li class="mainkalamenu" id="mainmenuJobs">
							<a  value="Jobs"   href="#">
							<i class="icon-airport_shuttle"></i>
								Jobs
							</a>
						</li>

						<li class="sidebar-dropdown mainkalamenu"  id="mainmenuMasters">
								<a href="#" value="Masters">
									<i class="icon-briefcase"></i>
									<span class="menu-text">Masters</span>
								</a>
								
							
								<div class="sidebar-submenu">
									<ul>
									<li class="kalamenu">
										<a  value="Users"  id="menuUsers" href="{{route('user')}}">
											<i class="icon-users"></i>
											<span class="menu-text">Users</span>
										</a>
									</li>
									
									
									<li class="kalamenu">
										<a  value="Clients"  id="menuClients" href="{{route('client.index')}}">
											<i class="icon-users"></i>
											<span class="menu-text">Clients</span>
										</a>
									</li>
									
									
									<li class="kalamenu">
										<a  value="JobTags"  id="menuJobTags" href="{{route('jobstag.index')}}">
											<i class="icon-bubble_chart"></i>
											<span class="menu-text">Job Tags</span>
										</a>
									</li>
									
									
									<li class="kalamenu">
										<a  value="BusinessContractors"  id="menuBusinessContractors" href="#">
											<i class="icon-users"></i>
											<span class="menu-text">Contractors</span>
										</a>
									</li>
									
									<li class="kalamenu">
										<a  value="BusinessSubContractors"  id="menuBusinessSubContractors" href="#">
											<i class="icon-users"></i>
											<span class="menu-text">Sub Contractors</span>
										</a>
									</li>
									
									<li class="kalamenu">
										<a  value="BusinessVineVaultTeams"  id="menuBusinessVineVaultTeams" href="#">
											<i class="icon-users"></i>
											<span class="menu-text">Vine Vault Teams</span>
										</a>
									</li>
									
									<li class="kalamenu">
										<a  value="BusinessStorageFacilities"  id="menuBusinessStorageFacilities" href="#">
											<i class="icon-package"></i>
											<span class="menu-text">Storage Facilities</span>
										</a>
									</li>
									
									<li class="kalamenu">
										<a  value="ManageWarehouses"  id="menuManageWarehouses" href="#">
											<i class="icon-package"></i>
											<span class="menu-text">Warehouses</span>
										</a>
									</li>

									
									<li class="kalamenu">
										<a  value="AdditionalServices"  id="menuAdditionalServices" href="#">
											<i class="icon-list"></i>
											<span class="menu-text">Additional Services</span>
										</a>
									</li>
									
								
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown mainkalamenu"  id="mainmenuArchive">
								<a href="#" value="Archive">
									<i class="icon-delete_sweep"></i>
									<span class="menu-text">Archive</span>
								</a>
								
							
								<div class="sidebar-submenu">
									<ul>
										
										<li class="kalamenu">
											<a  value="ViewQuoteRequestArchivedQR"  id="menuViewQuoteRequestArchivedQR"  href="#">
											Archived QR
											</a>
										</li>
										<li class="kalamenu">
											<a  value="ViewQuoteRequestConvertedQR"  id="menuViewQuoteRequestConvertedQR"  href="#">
											Converted QR
											</a>
										</li>
										
										
										<li class="kalamenu">
											<a  value="JobsArchivedJobs"  id="menuJobsArchivedJobs"  href="#">
											Archived Jobs
											</a>
										</li>
										
										<li class="kalamenu">
											<a  value="JobsCompletedJobs"  id="menuJobsCompleteddJobs"  href="#">
											Completed Jobs
											</a>
										</li>
										
										
									</ul>
								</div>
							</li>
							
						
							
							
							
							<li class="mainkalamenu"  id="mainmenuChangePassword">
								<a href="" value="#">
									<i class="icon-lock"></i>
									<span class="menu-text">Change Password</span>
								</a>
							</li>
							
							
							<li>
								<a href="{{route('signout')}}"
									<i class="icon-log-out1"></i>
									<span class="menu-text">Logout</span>
								</a>
							</li>
							
							
							
						</ul>
					</div>
					<!-- sidebar menu end -->
					
					
				</div>
				<!-- Sidebar content end -->
				
			</nav>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">				
				
				<!-- Header start -->
				<header class="header">
					<div class="toggle-btns">
						<a id="toggle-sidebar" href="#">
							<i class="icon-menu"></i>
						</a>
						<a id="pin-sidebar" href="#">
							<i class="icon-menu"></i>
						</a>
					</div>
					<div class="header-items">
						<!-- Custom search start -->
						<div class="custom-search">
							<input type="text" class="search-query" placeholder="Search here ...">
							<i class="icon-search1"></i>
						</div>
						<!-- Custom search end -->

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown user-settings">
								<a href="#" id="userSettings" data-toggle="dropdown" aria-haspopup="true">
								
								<img src="{{asset('img/user2.png')}}" class="user-avatar" alt="Avatar">
					
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="{{asset('img/user2.png')}}" class="user-avatar" alt="Avatar">
											</div>
											<h5>Sachin</h5>
											<p>Admin</p>
										</div>
										<a href="my_profile.php"><i class="icon-user1"></i> My Profile</a>
									
										<a href="change_password.php"><i class="icon-lock"></i> Change Password</a>
										<!--<a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a>-->
										<a href="#"><i class="icon-log-out1"></i> Log Out</a>
									</div>
								</div>
							</li>
						</ul>						
						<!-- Header actions end -->
					</div>
				</header>
				<!-- Header end -->