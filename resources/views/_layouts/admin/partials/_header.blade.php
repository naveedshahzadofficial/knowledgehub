
<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">

						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">

							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">

								</div>

								<!--end::Header Menu-->
							</div>

							<!--end::Header Menu Wrapper-->

							<!--begin::Topbar-->
							<div class="topbar">





								<!--begin::User-->
								<div class="dropdown">

									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
										<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
											<span class="text-white font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
											<span class="text-white font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ \Illuminate\Support\Str::before(auth()->user()->first_name,' ') }}</span>
											{{--<span class="symbol symbol-35 symbol-light-success">
												<span class="symbol-label font-size-h5 font-weight-bold">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr(auth()->user()->first_name,0,1)) }}</span>
											</span>--}}
										</div>
									</div>

									<!--end::Toggle-->

									<!--begin::Dropdown-->
									<div class="bg-custom-color dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">

										<!--[html-partial:include:{"file":"partials/_extras/dropdown/user.html"}]/-->
                                        @section('dropdown-user')
                                            @include('_layouts.admin.partials._extras.dropdown.user')
                                        @show
									</div>

									<!--end::Dropdown-->
								</div>

								<!--end::User-->
							</div>

							<!--end::Topbar-->
						</div>

						<!--end::Container-->
					</div>

					<!--end::Header-->
