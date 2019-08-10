<div class="widget">
  <h5 class="widgetheading">Kitabiyah</h5>
  <ul class="recent">
    @foreach($latest_kitab as $no => $lk)
    <li>
      <div class="align-right widget-text">
        <h6 style="margin-bottom: 5px; line-height: 1.3rem;"><a href="">{{$lk->k_name}}</a></h6>
        <p>
          Penulis: 
          <b>{{$lk->k_penulis}}</b>
        </p>
      </div>
      <div class="widget-img">
        <img src="{{asset('public/kitab/upload')}}/{{$lk->k_code}}/{{$lk->k_image}}" class="pull-left" alt="" />
      </div>      
    </li>
    @endforeach
  </ul>
</div>