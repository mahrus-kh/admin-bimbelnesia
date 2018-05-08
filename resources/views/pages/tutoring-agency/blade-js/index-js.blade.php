<script type="text/javascript">
    var tutoring_agency_dt ;
    $(document).ready(function () {
        tutoring_agency_dt = $("#tutoring-agency-datatables").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('tutoring-agency.datatables')}}",
                error: function () {
                    window.location.replace("{{ route('login') }}")
                }
            },
            columns: [
                {data: 'tutoring_agency', name: 'tutoring_agency'},
                {data: 'verified', class: 'text-center',
                    render: function (data, type, row) {
                        if (row.verified === "0"){
                            return '<label for="" class="label bg-orange">Unverified</label>'
                        } else if (row.verified === "1"){
                            return '<label for="" class="label bg-green">Verified</label>'
                        }
                    }
                },
                {data: 'actions', name: 'actions', orderable: false, searchable: false, class: 'text-center'}

            ]
        });
    });

    function destroy(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('institution/tutoring-agency') . '/' }}" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    tutoring_agency_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>