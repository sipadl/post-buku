<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Pembeli</td>
            <td>Qty</td>
            <td>Total</td>
            <td>Sales</td>
            <td>Tanggal</td>
        </tr>
    </thead>
    <tbody>
        @php
            $no=1
        @endphp
        @foreach($transaksi as $t)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $t->nama_pembeli }}</td>
            <td>{{ $t->jumlah }}</td>
            <td>{{ $t->total }}</td>
            <td>{{ $t->id_cashier }}</td>
            <td>{{ $t->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
