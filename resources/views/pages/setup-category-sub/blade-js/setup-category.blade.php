<script type="text/javascript">
    var category_dt;
    var url_category
    $(document).ready(function () {
        category_dt = $("#category-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{route('category.datatables')}}",
            columns: [
                {data: 'category', name: 'category'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function create_category() {
        $('[name=_method]').val("POST")
        url_category = "{{ route('category.store') }}"
        $("#category-modal-label").html("Add New Category")
        $("#category-modal-btn").attr("class", "btn btn-success")
        $("#category-modal-btn").html("SAVE")
        $('.category-modal form')[0].reset()
        $('.category-modal').modal("show")
    }
    function edit_category(id) {
        $('[name=_method]').val("PATCH")
        url_category = "{{ url('setup/category') }}" + "/" + id
        $("#category-modal-label").html("Update Category")
        $("#category-modal-btn").attr("class", "btn btn-info")
        $("#category-modal-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ url('setup/category') . '/' }}" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=category]').val(data.category)
                $('.category-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.category-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_category,
                    data: $('.category-modal form').serialize(),
                    success: function (data) {
                        $('.category-modal').modal("hide")
                        $('.category-modal form')[0].reset()
                        category_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroy_category(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('setup/category') }}" + "/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    category_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>