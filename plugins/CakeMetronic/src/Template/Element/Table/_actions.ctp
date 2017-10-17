<span style="overflow: visible; width: 110px;">
    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="click" aria-expanded="false">
        <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill m-dropdown__toggle">
            <i class="la la-ellipsis-h"></i>
        </a>
        <div class="m-dropdown__wrapper">
            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 27.6015px;"></span>
            <div class="m-dropdown__inner">
                <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                        <ul class="m-nav">
                            <li class="m-nav__section m-nav__section--first m--hide">
                                <span class="m-nav__section-text">Quick Actions</span>
                            </li>
                            <li class="m-nav__item">
                                <a href="<?= $this->Url->build(['action' => 'view', $id])?>" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-imac"></i>
                                    <span class="m-nav__link-text">View</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="<?= $this->Url->build(['action' => 'edit', $id])?>" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-edit"></i>
                                    <span class="m-nav__link-text">Edit</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= $this->Url->build(['action' => 'view', $id])?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">
            <i class="la la-desktop"></i>
        </a>
    <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#m_modal_<?= $id ?>">
        <i class="la la-trash"></i>
    </a>
</span>

<div class="modal fade" id="m_modal_<?= $id ?>" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete item id: <?= $id ?></h5>
            </div>
            <div class="modal-body">
                Are you sure? This action cannot be revert.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?= $this->Form->postLink(__('Yes, Delete'), ['action' => 'delete', $id], ['class' => 'btn btn-danger', 'escape' => false]) ?>
            </div>
        </div>
    </div>
</div>