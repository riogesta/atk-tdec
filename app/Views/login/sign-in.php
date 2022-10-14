<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<title>
		Login
	</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link id="pagestyle" href="<?= base_url('public/assets/vendor/argon/argon-dashboard.min.css?v=2.0.4')?>" rel="stylesheet" />
	</script>
</head>

<body class="" id="smooth">
	<div class="container position-sticky z-index-sticky top-0">
		<div class="row">
			<div class="col-12">
			</div>
		</div>
	</div>
	<main class="main-content scroll-content mt-0">
		<section>
			<div class="page-header min-vh-100">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
							<div class="card card-plain">
								<div class="card-header pb-0 text-start">
									<h4 class="font-weight-bolder">Sign In</h4>
									<?php if (session()->getFlashdata('error')) : ?>
									<div class="alert alert-primary" role="alert">
										<?= session()->getFlashdata('error') ?>
									</div>
									<?php endif; ?>

									<p class="mb-0">Masukkan username dan password yang terdaftar</p>
								</div>
								<div class="card-body">
									<form action="<?= base_url('/login')?>" method="post">
										<div class="mb-3">
											<input type="text" name="username" class="form-control form-control-lg"
												placeholder="Username" aria-label="username">
										</div>
										<div class="mb-0">
											<input type="password" name="password" class="form-control form-control-lg"
												placeholder="Password" aria-label="Password">
										</div>
										<div class="text-center">
											<button type="submit"
												class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
												in</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div
							class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
							<div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
								style="background-image: url('<?= base_url('public//assets/img/alat.jpg')?>');
          background-size: cover;">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
		integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
		integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
	</script>
	<script src="<?= base_url('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>
	<script src="<?= base_url('public/assets/vendor/js/smooth-scrollbar.min.js')?>"></script>
	<script>
		var Scrollbar = window.Scrollbar;

		Scrollbar.init(document.querySelector('#smooth'), options);
	</script>

	<script async defer src="https://buttons.github.io/buttons.js"></script>

	<script src="<?= base_url('public/assets/vendor/argon/argon-dashboard.min.js?v=2.0.4')?>"></script>
</body>

</html>