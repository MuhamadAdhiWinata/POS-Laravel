<!-- Sumber Daya DataTables -->
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

@if(isset($init) && $init)
<script>
    $(document).ready(function() {
        $('#{{ $tableId ?? 'dataTable' }}').DataTable();
    });
</script>
@endif

