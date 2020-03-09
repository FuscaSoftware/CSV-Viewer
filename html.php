<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fusca_CSV-Viewer</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>
<body>
<script>
    var dataSet1 = <?= $json_data1 ?? ''?>;
    var dataSet2 = <?= $json_data2 ?? ''?>;
    var columns1 = [
        {title: "A"},
        {title: "B"},
        {title: "C"},
        {title: "D"},
        {title: "E"}
    ];
    var columns2 = [];
    columns1 = <?= $json_columns1 ?? "columns1" ?>;
    columns2 = <?= $json_columns2 ?? "columns1" ?>;
    $(document).ready(function () {
        $('#table1').DataTable({
            data: dataSet1,
            // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            paging: false,
            columns: columns1
        });
        // $('#table2').DataTable({
        //     data: dataSet2['a'],
        //     paging: false,
        //     columns: columns2
        // });
    });
</script>
<table id="table1" class="display" width="100%"></table>
<table id="table2" class="display" width="100%"></table>
</body>
</html>