<script type="text/javascript">
    var admin_dt;
    var url_admin;
    $(document).ready(function () {
        accountLoad();
        admin_dt = $("#admin-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{route('admin.datatables')}}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function create_admin() {
        $('[name=_method]').val("POST")
        url_admin = "{{ url('master/administrator/admin') }}"
        $("#admin-modal-btn").attr("class", "btn btn-success")
        $("#admin-modal-btn").html("SAVE")
        $('.admin-modal form')[0].reset()
        $('.admin-modal').modal("show")
    }
    function edit_admin(id) {
        $('[name=_method]').val("PATCH")
        url_admin = "{{ url('master/administrator/admin') . '/' }}" + id
        $("#admin-modal-btn").attr("class", "btn btn-info")
        $("#admin-modal-btn").html("UPDATE")
    
        $.ajax({
            type: "GET",
            url: "{{ url('master/administrator/admin') . '/' }}" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=name]').val(data.name)
                $('[name=email]').val(data.email)
                $('.admin-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.admin-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_admin,
                    data: $('.admin-modal form').serialize(),
                    success: function () {
                        $('.admin-modal').modal("hide")
                        $('.admin-modal form')[0].reset()
                        admin_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroy_admin(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('master/administrator/admin') }}" + "/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    admin_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
    function accountLoad() {
        $('[name=name_account]').val("{{ auth()->user()->name }}")
        $('[name=email_account]').val("{{ auth()->user()->email }}")
        $('[name=password_account]').val("")
    }
    $(function () {
        $("#form-setting-account").validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ url('master/administrator/admin/') . '/' . auth()->id() . '/setting-account'}} ",
                    data: $("#form-setting-account").serialize(),
                    success: function () {
                        window.location.reload() //error, seharusnya gunakan accountLoad()
                        admin_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
</script>