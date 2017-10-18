<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-light m-aside-menu--dropdown "
		data-menu-vertical="true"
         data-menu-dropdown="true" data-menu-scrollable="true" data-menu-dropdown-timeout="500"
		>
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
				<a  href="?page=index" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Activity
							</span>
							<span class="m-menu__link-badge">
								<span class="m-badge m-badge--danger">
									2
								</span>
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					Components
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>

            <?php foreach ($items as $menu_item) : ?>
            <li class="m-menu__item  m-menu__item--submenu <?= $menu_item->hasActivePlugin($this->request->params['plugin']) ? 'm-menu__item--active m-menu__item--open' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                <a  href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon <?= $menu_item->getIcon() ?>"></i>
                    <span class="m-menu__link-text">
						<?= $menu_item->getTitle() ?>
					</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <?php if (true): ?>
                    <ul class="m-menu__subnav">
                        <?php foreach ($menu_item->getEntries() as $action_item) : ?>
                        <li class="m-menu__item <?= $this->request->params['controller'] == ($action_item->getUrl())['controller'] ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
                            <a  href="<?= $this->Url->build($action_item->getUrl()) ?>" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
									<?= __($action_item->getTitle()) ?>
								</span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>




		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
