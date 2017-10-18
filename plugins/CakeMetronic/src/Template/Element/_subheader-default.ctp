<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title ">
				<?= $this->fetch('page-title') ?>
			</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				<?= $this->fetch('breadcrumb') ?>
			</ul>
		</div>
		<div>

			<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
				<span>
					<i class="la la-calendar-check-o"></i>
					<span>Add</span>
				</span>
			</a>

            <?= $this->fetch('aditional-header-buttons') ?>

			<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
				<a href="#" class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--pill m-btn--air  m-dropdown__toggle">
					<i class="la la-plus m--hide"></i>
					<i class="la la-ellipsis-h"></i>
				</a>
				<div class="m-dropdown__wrapper">
					<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21.5px;"></span>
					<div class="m-dropdown__inner">
						<div class="m-dropdown__body">
							<div class="m-dropdown__content">
								<ul class="m-nav">
									<li class="m-nav__section m-nav__section--first m--hide">
										<span class="m-nav__section-text">Quick Actions</span>
									</li>
									<?= $this->fetch('header-dropdown-content') ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: Subheader -->
