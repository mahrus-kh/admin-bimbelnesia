@include('templates.partials.script')


<button type="button" class="btn btn-primary" onclick="mainkan()">Mantap</button>
<div class="tampil"></div>
<div class="profilnya"></div>

<script type="text/javascript">
    {{--var token = "Bearer " + "{{ $token }}";--}}
     var token = "Bearer " + "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvdjEvbGJiL2xvZ2luIiwiaWF0IjoxNTIyODU4MjcwLCJleHAiOjE1MjI4NjE4NzAsIm5iZiI6MTUyMjg1ODI3MCwianRpIjoiZHhXRThwbG1KTDJFYXBnTiJ9.4PWuC7g1iyAOuhMvhwdFp5i2s8Dl2-kRQubQ6_fO8K0";
    $(document).ready(function () {
        $('.tampil').html(token)
    });
    function mainkan() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/api/v1/lbb/bermain/1",
            headers: {Authorization: token},
            success: function (data, textStatus, header) {
                alert(data.msg)
                token = header.getResponseHeader('Authorization');
                $('.tampil').html(token)
                $('.profilnya').html(data.usernya.name)
            },
            error: function (error) {
                alert("HADEH")
            }
        });
    }
</script>