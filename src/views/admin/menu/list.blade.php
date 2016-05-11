			<div class="panel panel-default">
				<div class="panel-heading">Simple nesting example</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-8">
							<ul id="menu_edit_list" class="uk-nestable" data-uk-nestable>
                    			<?php echo Menu::edit_list('0'); ?>
							</ul>
						</div>
						<div class="col-sm-4">
							<?php echo Form::buildForm(); ?>
						</div>
					</div>
				</div>
			</div>

<link rel="stylesheet" href="/assets/css/xenon-components.css">
<link rel="stylesheet" href="/assets/js/woldycms/xenon/uikit/uikit.css">
<script src="/assets/js/woldycms/xenon/uikit/js/uikit.min.js"></script>
<script src="/assets/js/woldycms/xenon/uikit/js/addons/nestable.min.js"></script>
<script src="/assets/js/woldycms/admin/menu.edit.js"></script>
