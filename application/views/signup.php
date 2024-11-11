<!DOCTYPE html>
<html lang="en">
	<?php include 'master-ui/header.php'; ?>
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>
				body { background-image: url('<?php echo base_url(); ?>/assets/media/auth/home.jpg'); } [data-bs-theme="dark"] 
				body { background-image: url('<?php echo base_url(); ?>/assets/media/auth/bg5-dark.jpg'); }
			</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center text-center p-10">
					<!--begin::Wrapper-->
					<div class="card card-flush w-lg-500px py-16 border-0" style="background-image: url('<?php echo base_url(); ?>/assets/media/auth/reg-pic.png');">
						<div class="card-body py-15 py-lg-0">
							<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="<?php echo base_url(); ?>" action="#">
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-white fw-bolder mb-3">MoodZic</h1>
								</div>
								<!--begin::Heading-->
								<!--begin::Separator-->
								<div class="separator separator-content my-14">
									<img alt="Logo" src="<?php echo base_url(); ?>/assets/media/auth/music-logo-2.png" width="120px;" />
								</div>
								<!--end::Separator-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Fullname" name="fullname" autocomplete="off" class="form-control" />
									<!--end::Email-->
								</div>
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control" />
									<!--end::Email-->
								</div>
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control" />
									<!--end::Email-->
								</div>
								<!--begin::Input group-->
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off" />
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-duotone ki-eye-slash fs-2"></i>
												<i class="ki-duotone ki-eye fs-2 d-none"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									<div class="text-white">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
									<!--end::Hint-->
								</div>
								<!--end::Input group=-->
								<!--end::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Repeat Password-->
									<input placeholder="Confirm Password" name="confirm-password" type="password" autocomplete="off" class="form-control" />
									<!--end::Repeat Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Accept-->
								
								<div class="fv-row mb-8">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="toc" value="1" />
										<span class="form-check-label fw-semibold text-white fs-base ms-1">I Accept the 
										<a href="javascript:void(0);" class="ms-1 link-secondary">Terms</a></span>
									</label>
								</div>
								
								<!--end::Accept-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Sign up</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								<div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
								<a href="<?php echo base_url(); ?>" class="link-primary fw-semibold"><b>Log in</b></a></div>
								<!--end::Sign up-->
							</form>
						</div>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Root-->
		
		<?php include 'master-ui/global-script.php'; ?>
		<script src="<?php echo base_url(); ?>/<?php echo $script; ?>"></script>
	</body>
	<!--end::Body-->
</html>