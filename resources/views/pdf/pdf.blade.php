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
<h3>Results Table</h3>
<table>
    <thead>
    <tr>
        <th style="width: 100px">Date</th>
        <th>Name</th>
        <th>Project</th>
        <th>Categories</th>
        <th>Description</th>
        <th>Time</th>
    </tr>
    </thead>

    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->logged_date }}</td>
            <td>{{ $item->userName }}</td>
            <td>{{ $item->projectName }}</td>
            <td>{{ $item->categoryName }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->worked_time }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    </tfoot>
</table>