<script type="text/javascript">
    var id_contact;
    $(document).ready(function () {
        contact_load()
    });
    function contact_load() {
        $.ajax({
            type: "GET",
            url : "{{ url('institution/tutoring-agency/contact') . '/' }} {{ $tutoring_agency->id }}",
            dataType: "JSON",
            success: function (data) {
                id_contact = data.id
                $("#website").html(data.website)
                $("#office_phone").html(data.office_phone)
                $("#mobile_phone").html(data.mobile_phone)
                $("#email").html(data.email)
                $("#facebook").html(data.facebook)
                $("#instagram").html(data.instagram)
                $("#other_contacts").html(data.other_contacts)
            },
            error: function () {
                alert("Something Wrong !")
            }
        });
    }
    function edit_contact() {
        $.ajax({
            type: "GET",
            url : "{{ url('institution/tutoring-agency/contact') . '/' }} {{ $tutoring_agency->id }}",
            dataType: "JSON",
            success: function (data) {
                $('[name=website]').val(data.website)
                $('[name=office_phone]').val(data.office_phone)
                $('[name=mobile_phone]').val(data.mobile_phone)
                $('[name=email]').val(data.email)
                $('[name=facebook]').val(data.facebook)
                $('[name=instagram]').val(data.instagram)
                $('[name=other_contacts]').val(data.other_contacts)
                $('.contact-modal').modal("show")
            },
            error: function () {
                alert("Something Wrong !")
            }
        });
    }
    $(function () {
        $('.contact-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ url('institution/tutoring-agency/contact') . '/' }}" + id_contact,
                    data: $('.contact-modal form').serialize(),
                    success: function () {
                        $('.contact-modal').modal("hide")
                        contact_load()
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