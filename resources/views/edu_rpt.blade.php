<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	<style>
		table {border-collapse: collapse;width: 100%;}
		th, td {border: 1px solid #ddd;padding: 8px;text-align: left;}
		th {background-color: #f2f2f2;}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Edu Code</th>
				<th>Edu Description</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($edu as $row)
			<tr>
				<td>{{ $row->code }}</td>
				<td>{{ $row->desc }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</body>
</html>

