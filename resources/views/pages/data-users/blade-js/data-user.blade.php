<script type="text/javascript">
    var user_dt;
    var url_user;
    $(document).ready(function () {
        user_dt = $("#user-datatables").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('user.datatables')}}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'status', class: 'text-center',
                    render: function (data, type, row) {
                        if (row.status == 0){
                            return '<label for="" class="label bg-orange">Inactive</label>'
                        } else if(row.status == 1) {
                            return '<label for="" class="label bg-green">Active</label>'
                        }
                    }
                },
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function create_user() {
        $('[name=_method]').val("POST")
        url_user = "{{ url('users-visitors/user') }}"
        $("#user-modal-label").html("Add User")
        $("#user-modal-btn").attr("class", "btn btn-success")
        $("#user-modal-btn").html("SAVE")
        $('.user-modal form')[0].reset()
        $('.user-modal').modal("show")
    }
    function edit_user(id) {
        $('[name=_method]').val("PATCH")
        url_user = "{{ url('users-visitors/user') . '/' }}" + id
        $("#user-modal-label").html("Update User")
        $("#user-modal-btn").attr("class", "btn btn-info")
        $("#user-modal-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ url('users-visitors/user') . '/' }}" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=name]').val(data.name)
                $('[name=email]').val(data.email)
                if (data.status == 1){ //masih error
                    $("#status-1").attr('checked',true)
                    $("#status-0").attr('checked',false)
                } else if (data.status = 0) { //masih error
                    $("#status-1").attr('checked',false)
                    $("#status-0").attr('checked',true)
                }
                $('[name=phone]').val(data.phone)
                $('[name=address]').val(data.address)
                $('.user-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.user-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_user,
                    data: $('.user-modal form').serialize(),
                    success: function () {
                        $('.user-modal').modal("hide")
                        $('.user-modal form')[0].reset()
                        user_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroy_user(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('users-visitors/user') }}" + "/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    user_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>