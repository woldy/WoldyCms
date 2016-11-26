@extends('woldycms::portal.layout.left')
@section('content')
<div class="row">
		<div  class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="javascript:void(0)"  id="menuadd"  class="pull-right fa-plus cbr-primary"></a>扫描配置</div>
<div class="row">
			
				<div class="col-md-12">
				
					<div class="tabs-vertical-env">
					
						<ul class="nav tabs-vertical">
							<li class="active"><a href="#v-home" data-toggle="tab">主机扫描</a></li>
							<li class=""><a href="#v-profile" data-toggle="tab">WEB扫描</a></li>
							<li class=""><a href="#v-messages" data-toggle="tab">SqlMap</a></li>
							<!-- <li class=""><a href="#v-settings" data-toggle="tab">SqlMap</a></li> -->
						</ul>
						
						<div class="tab-content">
							<div class="tab-pane active" id="v-home">
								{!!$listform!!}
							</div>
							<div class="tab-pane" id="v-profile">
								<p>Fulfilled direction use continual set him propriety continued. Saw met applauded favourite deficient engrossed concealed and her. Concluded boy perpetual old supposing. Farther related bed and passage comfort civilly. Dashwoods see frankness objection abilities the. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed add screened rendered six say his striking confined. </p>
							</div>
							<div class="tab-pane" id="v-messages">
								<p>When be draw drew ye. Defective in do recommend suffering. House it seven in spoil tiled court. Sister others marked fat missed did out use. Alteration possession dispatched collecting instrument travelling he or on. Snug give made at spot or late that mr. </p>
							</div>
							<div class="tab-pane" id="v-settings">
								<p>Luckily friends do ashamed to do suppose. Tried meant mr smile so. Exquisite behaviour as to middleton perfectly. Chicken no wishing waiting am. Say concerns dwelling graceful six humoured. Whether mr up savings talking an. Active mutual nor father mother exeter change six did all. </p>
							</div>
						</div>
						
					</div>	
				
				</div>
			
 
			
			</div>
			</div>			
		</div>
</div>
@stop
