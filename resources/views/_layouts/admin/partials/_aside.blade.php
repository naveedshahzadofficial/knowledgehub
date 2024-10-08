
<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">

						<!--begin::Logo-->
						<a href="{{ route('admin.dashboard') }}" class="brand-logo">
							<img alt="Logo" src="{{ asset('assets/img/main-logo.png') }}" class="flex-center h-60px mt-0 ml-1" />
						</a>

						<!--end::Logo-->

						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">

								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>

								<!--end::Svg Icon-->
							</span>
						</button>

						<!--end::Toolbar-->
					</div>

					<!--end::Brand-->

					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

							<!--begin::Menu Nav-->
							<ul class="menu-nav my-4">
                                @if(!auth()->user()->isDepartment() && !auth()->user()->isSectoralMapper())
                                    <li class="menu-item {{ areActiveRoutes(['admin.dashboard']) }}" aria-haspopup="true">
                                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                                                <!--begin::Svg Icon -->
                                           <span class="svg-icon text-white svg-icon-white menu-icon fas fa-home"></span>
                                                <!--end::Svg Icon-->
                                            <span class="menu-text text-white">Dashboard</span>
                                        </a>
                                    </li>
                                @endif

                                @if(!auth()->user()->isDepartment() && !auth()->user()->isSectoralMapper())
                                    <li class="menu-item menu-item-submenu {{ areActiveRoutes(['admin.activities.index','admin.activities.create','admin.activities.edit',
                                                                                                'admin.required-documents.index','admin.required-documents.create','admin.required-documents.edit',
                                                                                                'admin.roles.index','admin.roles.create','admin.roles.edit', 'admin.roles.show',
                                                                                                'admin.admins.index','admin.admins.create','admin.admins.edit', 'admin.admins.show'
                                                                                                ]) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon text-white svg-icon-white menu-icon fas fa-cog"></span>
                                            <span class="menu-text text-white">System Settings</span>
                                            <i class="menu-arrow"></i>
                                        </a>

                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">


                                                <li class="menu-item {{ areActiveRoutes(['admin.roles.index','admin.roles.create','admin.roles.edit', 'admin.roles.show']) }}" aria-haspopup="true">
                                                    <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                                        <span class="menu-text text-white">Roles</span>
                                                    </a>
                                                </li>

                                                <li class="menu-item {{ areActiveRoutes(['admin.admins.index','admin.admins.create','admin.admins.edit', 'admin.admins.show']) }}" aria-haspopup="true">
                                                    <a href="{{ route('admin.admins.index') }}" class="menu-link">
                                                        <span class="menu-text text-white">Staffs</span>
                                                    </a>
                                                </li>

                                                <li class="menu-item {{ areActiveRoutes(['admin.activities.index','admin.activities.create','admin.activities.edit']) }}" aria-haspopup="true">
                                                    <a href="{{ route('admin.activities.index') }}" class="menu-link">
                                                        <span class="menu-text text-white">Activities</span>
                                                    </a>
                                                </li>

                                                <li class="menu-item {{ areActiveRoutes(['admin.required-documents.index','admin.required-documents.create','admin.required-documents.edit']) }}" aria-haspopup="true">
                                                    <a href="{{ route('admin.required-documents.index') }}" class="menu-link">
                                                        <span class="menu-text text-white">Required Documents</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                @endif



								<li class="menu-item {{ areActiveRoutes(['admin.rlcos.index','admin.rlcos.show']) }}" aria-haspopup="true">
									<a href="{{ route('admin.rlcos.index') }}" class="menu-link">
										<span class="svg-icon svg-icon-white menu-icon" >

											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>

											<!--end::Svg Icon-->
										</span>
										<span class="menu-text text-white">All RLCOs</span>
									</a>
								</li>
                                @if(!auth()->user()->isDepartment()  && !auth()->user()->isSectoralMapper())
                                    <li class="menu-item {{ areActiveRoutes(['admin.reviews.index','admin.reviews.show']) }}" aria-haspopup="true">
									<a href="{{ route('admin.reviews.index') }}" class="menu-link">
										<span class="svg-icon svg-icon-white menu-icon" >

                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Half-star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3"/>
        <path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000"/>
    </g>
</svg>

											<!--end::Svg Icon-->
										</span>
										<span class="menu-text text-white">Reviews</span>
									</a>
								</li>
                                @endif


							</ul>

							<!--end::Menu Nav-->
						</div>

						<!--end::Menu Container-->
					</div>

					<!--end::Aside Menu-->
				</div>

				<!--end::Aside-->

<style>
    .aside-menu .menu-nav > .menu-item .menu-submenu .menu-item.menu-item-active > .menu-link{
        background-color: #404040 !important;
    }
</style>
