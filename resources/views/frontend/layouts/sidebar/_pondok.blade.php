<div class="widget">
  <h5 class="widgetheading">Postingan Terbaru</h5>
  <ul class="recent">
    @foreach($latest_post->where('p_id', '!=', $pondok->p_id) as $num => $lp)
    <li>
      <img src="{{asset('assets/frontend/img/dummies/blog/65x65/thumb1.jpg')}}" class="pull-left" alt="" />
      <h6 style="margin-bottom: 5px; line-height: 1.3rem;"><a href="{{url('/pondok-pesantren/context-of')}}/{{Crypt::encrypt($lp->p_id)}}">{{$lp->p_name}}</a></h6>
      <p>
        {!! \Illuminate\Support\Str::words($lp->p_description, 20,'...')  !!}
      </p>
    </li>
    @endforeach
  </ul>
</div>