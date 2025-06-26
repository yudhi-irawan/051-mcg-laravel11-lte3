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
				<th>Sex Description</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($sex as $row)
			<tr>
				<td>{{ $row->desc }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</body>
</html>

