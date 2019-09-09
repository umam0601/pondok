<div class="widget">
  <h5 class="widgetheading">Wilayah</h5>
  <div class="filter-wilayah">
  	<ul class="list-box">
  		@foreach($provinsi as $idx => $prov)
  		<a class="w-100" href="{{url('pondok-pesantren/wilayah')}}/{{Crypt::encrypt($prov->wp_id)}}">
	  		<li class="list-wilayah">
	  			<input type="hidden" class="val-wilayah" value="{{$prov->wp_id}}">
	  			<i class="fa fa-fw fa-angle-right"></i>&nbsp {{$prov->wp_name}}
  			</li>
  		</a>
	  	@endforeach
  	</ul>
  </div>
</div>