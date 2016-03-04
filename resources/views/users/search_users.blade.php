<ul id="country-list">

@foreach($searchUsers as $u)
        <li onClick="selectCountry({{$u->name}})">{{$u->name}}</li>
    @endforeach
</ul>