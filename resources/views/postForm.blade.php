<form action="{{route('postABC')}}" method="post">
	<input name="_token" type="hidden" value="{{{ csrf_token() }}}"/>
	<input type="text" name="HoTen">
	<!--{!! csrf_field() !!}-->
	<input type="submit">
</form>
