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
    <h2>Data Booking</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengirim</th>
                <th>No Meja</th>
                <th>Tanggal Pemesanan</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($booking as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->namalengkap }}</td>
                <td>{{ $item->meja->meja }}</td>
                <td>{{ $item->book_date }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
