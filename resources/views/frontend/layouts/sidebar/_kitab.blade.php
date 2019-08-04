<div class="widget">
  <h5 class="widgetheading">Kitabiyah</h5>
  <ul class="recent">
    @foreach($latest_kitab as $no => $lk)
    <li>
      <img src="{{asset('assets/frontend/img/dummies/blog/65x65/thumb1.jpg')}}" class="pull-left" alt="" />
      <h6 style="margin-bottom: 5px; line-height: 1.3rem;"><a href="">{{$lk->k_name}}</a></h6>
      <p>
        Penulis : &nbsp <b>{{$lk->k_penulis}}</b>
      </p>
    </li>
    @endforeach
  </ul>
</div>