<style>
    table {
        color: #333; /* Lighten up font color */
        font-family: Helvetica, Arial, sans-serif; /* Nicer font */
        width: 640px;
        border-collapse:
                collapse; border-spacing: 0;
    }

    td, th { border: 1px solid #CCC; height: 30px; } /* Make cells a bit taller */

    th {
        background: #F3F3F3; /* Light grey background */
        font-weight: bold; /* Make sure they're bold */
        padding: 10px;
    }

    td {
        background: #FAFAFA; /* Lighter grey background */
        padding: 10px;
    }
    h3 {
        text-align: center;
    }
</style>
<h3>Timesheets Invoice</h3>
<table>
    <thead>
    <tr>
        <th>Client Name</th>
        <th>Project Name</th>
        <th>From</th>
        <th>To</th>
        <th>Total Time</th>
        <th>Price</th>
    </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['project_name'] }}</td>
            <td>{{ $item['from'] }}</td>
            <td>{{ $item['to'] }}</td>
            <td>{{ $item['time'] }}</td>
            <td><strong>{{ $item['price'] }}</strong></td>
        </tr>
    </tbody>
    <tfoot>
    </tfoot>
</table>