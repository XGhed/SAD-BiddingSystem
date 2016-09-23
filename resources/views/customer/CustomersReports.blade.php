<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/datatables.css">
 
        <script type="text/javascript" charset="utf8" src="js/datatables.js"></script>

    </head>
    <body>
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        });
    </script>

    </body>
</html>