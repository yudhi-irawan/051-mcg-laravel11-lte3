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
				<th>Emp Name</th>
				<th>Birth Day</th>
				<th>Sex Description</th>
				<th>Edu Code</th>
				<th>Edu Description</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($emp as $row)
			<tr>
				<td>{{ $row->name }}</td>
				<td>{{ $row->bday }}</td>
				<td>{{ $row->sex_desc }}</td>
				<td>{{ $row->edu_code }}</td>
				<td>{{ $row->edu_desc }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</body>
</html>

