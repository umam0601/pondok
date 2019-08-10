<div class="widget">
  <h5 class="widgetheading">Postingan Terbaru</h5>
  <ul class="recent">
    @foreach($latest_post->where('p_id', '!=', $pondok->p_id) as $num => $lp)
    <li class="marginbot20">
      <div class="align-right widget-text">
        <h6 style="margin-bottom: 5px; line-height: 1.3rem;"><a href="{{url('/pondok-pesantren/context-of')}}/{{Crypt::encrypt($lp->p_id)}}">{{$lp->p_name}}</a></h6>
        <p>
          Pengasuh: <b>{{$lp->p_pengasuh}}</b>
        </p>
      </div>
      <div class="widget-img">
        <img src="{{asset('public/profile/upload')}}/{{$lp->p_code}}/{{$lp->p_image}}" class="pull-left" alt="" />
      </div>      
    </li>
    @endforeach
  </ul>
</div>