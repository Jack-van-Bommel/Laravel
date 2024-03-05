<html>
	<body>
		<h1>{{$kop}}</h1>
		<hr>

		@for ($i = 1; $i < 7; $i++)
			<h{{$i}}>{{$kop}} (= h{{$i}})</h{{$i}}>
			<br>
		@endfor

	</body>
</html>

