@include('templates.partials.script')


<button type="button" class="btn btn-primary" onclick="mainkan()">Mantap</button>
<div class="tampil"></div>
<div class="profilnya"></div>

<script type="text/javascript">
    {{--var token = "Bearer " + "{{ $token }}";--}}
     var token = "Bearer " + "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvdjEvbGJiL2xvZ2luIiwiaWF0IjoxNTIzNDM4OTU3LCJleHAiOjE1MjM0NDI1NTcsIm5iZiI6MTUyMzQzODk1NywianRpIjoiN0Ntck84Z0xHc3ZuQWlGaiJ9.vFepRa9l_50PeMvDJ8iSMesTLo8ax5KbjDzgVYLlxpk";
    $(document).ready(function () {
        // $('.tampil').html(token)
        coba()
    });
    function mainkan() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/api/v1/lbb/bermain/1",
            headers: {Authorization: token},
            success: function (data, textStatus, header) {
                alert(data.msg)
                token = header.getResponseHeader('Authorization');
                alert(header.getAllResponseHeaders())
                $('.tampil').html(token)
                $('.profilnya').html(data.usernya.name)
            },
            error: function (error) {
                alert("HADEH")
            }
        });
    }

    function coba() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8008/bermain",
            success: function (data) {
                alert(data)
            },
            error: function () {
                alert("salah")
            }
        });
    }
</script>