<script type="text/javascript">
    var excellence_dt;
    var url_excellence;
    $(document).ready(function () {
        excellence_dt = $("#excellence-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{route('excellence.datatables', $tutoring_agency)}}",
            columns: [
                {data: 'excellence', name: 'excellence'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function create_excellence() {
        $('[name=_method]').val("POST")
        url_excellence = "{{ url('institution/tutoring-agency/excellence') . '/' }} {{ $tutoring_agency->id }}"
        $("#excellence-modal-label").html("Add New Excellence")
        $("#excellence-modal-btn").attr("class", "btn btn-success")
        $("#excellence-modal-btn").html("SAVE")
        $('.excellence-modal form')[0].reset()
        $('.excellence-modal').modal("show")
    }
    function edit_excellence(id) {
        $('[name=_method]').val("PATCH")
        url_excellence = "{{ url('institution/tutoring-agency/excellence') . '/' }}" + id
        $("#excellence-modal-label").html("Update Excellence")
        $("#excellence-modal-btn").attr("class", "btn btn-primary")
        $("#excellence-modal-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ url('institution/tutoring-agency/excellence') . '/' }}" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=excellence]').val(data.excellence)
                $('.excellence-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.excellence-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_excellence,
                    data: $('.excellence-modal form').serialize(),
                    success: function () {
                        $('.excellence-modal').modal("hide")
                        $('.excellence-modal form')[0].reset()
                        excellence_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroy_excellence(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('institution/tutoring-agency/excellence') }}" + "/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    excellence_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>