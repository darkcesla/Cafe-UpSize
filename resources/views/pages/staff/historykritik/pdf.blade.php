<!DOCTYPE html>
<html>
<head>
    <style>
        /* Define your CSS styles for the PDF here */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Kritik & Saran</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengirim</th>
                <th>Isi Kritik & Saran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kritik as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$item->user->namalengkap}}</td>
                <td>{{$item->kritiksaran}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
