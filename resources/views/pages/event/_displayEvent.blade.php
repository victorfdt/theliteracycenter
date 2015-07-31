<div class="panel panel-success">
	<div class="panel-heading" role="tab" id="{{ '#heading' . $panelId }}">
		<h4 class="panel-title">					
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="{{ '#collapse' . $panelId }}" aria-expanded="true" aria-controls="{{ 'collapse' . $panelId }}">
				<?php $dateString = $carbon->createFromFormat('Y-m-d', $event->date)->toFormattedDateString(); ?>
				{{$dateString}} - {{$event->name}}
			</a>
		</h4>
	</div>
	<div id="{{ 'collapse' . $panelId }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{ '#heading' . $panelId }}">
		<div class="panel-body">
			<div class="media">
				<div class="media-left">
					@if(!empty($event->path))
					{!! HTML::image($event->path, '', array('class' => 'img-rounded', 'style' => 'width: 350px;')) !!}
					@endif
				</div>
				<div class="media-body">
					{!! $event->description !!}
					<br><br>

					<label>Date: {{$dateString}}</label>
				</div>
			</div>

		</div>

		<div class="panel-footer">
			<a href="{{ url($event->link) }}">Read more about this event</a>
		</div>
	</div>
</div>