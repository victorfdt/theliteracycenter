<div class="panel panel-success">
  <div class="panel-heading">
  	<h3 class="panel-title">{{ $file->name}}</h3>
  </div>
  
  @if(!empty($file->description))
	  <div class="panel-body">
	    {{$file->description}}
	  </div>
  @endif

  <div class="panel-footer">{!! HTML::link($file->link, 'Download the file') !!}</div>
</div>