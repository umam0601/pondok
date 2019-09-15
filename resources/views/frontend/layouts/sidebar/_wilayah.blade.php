<div class="widget">
  <h5 class="widgetheading">Wilayah</h5>
  <form action="{{url('/pondok-pesantren/wilayah')}}" method="GET" id="form-wil">
    @csrf
    <div class="marginbot10">
      <select name="prov" id="f_provinsi" class="select2">
        <option value="" selected="" disabled="">Provinsi</option>
  		  @foreach($provinsi as $idx => $prov)
          <option value="{{$prov->wp_id}}">{{$prov->wp_name}}</option>
	  	  @endforeach
      </select>
    </div>
    <div class="marginbot10 d-none" id="city_content">
      <select name="kota" id="f_kota" class="select2">

      </select>
    </div>
    <div class="marginbot10 d-none" id="distric_content">
      <select name="camat" id="f_kecamatan" class="select2">

      </select>
    </div>

    <button type="submit" class="btn btn-theme" id="btn-filter" disabled="">Filter</button>
  </form>
</div>