<script type="text/javascript">
    var sub_category_dt;
    var url_sub_category
    $(document).ready(function () {
        sub_category_dt = $("#sub-category-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{route('sub-category.datatables')}}",
            columns: [
                {data: 'sub_category', name: 'sub_category'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function create_sub_category() {
        $('[name=_method]').val("POST")
        url_sub_category = "{{ route('sub-category.store') }}"
        $("#sub-category-modal-label").html("Add New Sub Category")
        $("#sub-category-modal-btn").attr("class", "btn btn-success")
        $("#sub-category-modal-btn").html("SAVE")
        $('.sub-category-modal form')[0].reset()
        $('.sub-category-modal').modal("show")
    }
    function edit_sub_category(id) {
        $('[name=_method]').val("PATCH")
        url_sub_category = "{{ url('setup/sub-category') }}" + "/" + id
        $("#sub-category-modal-label").html("Update Sub Category")
        $("#sub-category-modal-btn").attr("class", "btn btn-info")
        $("#sub-category-modal-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ url('setup/sub-category') . '/' }}" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=sub_category]').val(data.sub_category)
                $('.sub-category-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.sub-category-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_sub_category,
                    data: $('.sub-category-modal form').serialize(),
                    success: function (data) {
                        $('.sub-category-modal').modal("hide")
                        $('.sub-category-modal form')[0].reset()
                        sub_category_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroy_sub_category(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('setup/sub-category') }}" + "/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    sub_category_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>