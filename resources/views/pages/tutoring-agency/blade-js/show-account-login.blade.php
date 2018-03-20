<script type="text/javascript">
    var id_account;
    $(document).ready(function () {
        account_load()
    });
    function account_load() {
        $.ajax({
            type: "GET",
            url : "{{ url('institution/tutoring-agency/account') . '/' }} {{ $tutoring_agency->id }}",
            dataType: "JSON",
            success: function (data) {
                id_account = data.id
                $("#email_account").html(data.email)
            },
            error: function () {
                alert("Something Wrong !")
            }
        });
    }
    function edit_account() {
        $.ajax({
            type: "GET",
            url : "{{ url('institution/tutoring-agency/account') . '/' }} {{ $tutoring_agency->id }}",
            dataType: "JSON",
            success: function (data) {
                $('.account-modal form')[0].reset()
                $('[name=email_account]').val(data.email)
                $('.account-modal').modal("show")
            },
            error: function () {
                alert("Something Wrong !")
            }
        });
    }
    $(function () {
        $('.account-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ url('institution/tutoring-agency/account') . '/' }}" + id_account,
                    data: $('.account-modal form').serialize(),
                    success: function () {
                        $('.account-modal').modal("hide")
                        $('.account-modal form')[0].reset()
                        account_load()
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