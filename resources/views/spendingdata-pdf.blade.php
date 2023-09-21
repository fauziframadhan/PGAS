<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

h1 {
    text-align: center;
}
</style>
</head>
<body>

<h1>Spending Data</h1>

<table id="customers">
  <tr>
    <th>EmployeeID</th>
    <th>Date</th>
    <th>Value</th>
  </tr>
  @foreach ($data2 as $row)
  <tr>
    <td scope="row">{{$row->employeeid}}</td>
                        <td>{{$row->date}}</td>
                        <td>{{$row->value}}</td>
  </tr>
  @endforeach
  
  
</table>

</body>
</html>


