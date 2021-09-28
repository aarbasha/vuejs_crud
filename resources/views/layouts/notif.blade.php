@if (session()->has('Add'))
    <script>
        window.onload = function() {
            notif({
                msg: "SUCCESS",
                type: "info"
            });
        }

    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: "SUCCESS",
                type: "info"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "SUCCESS",
                type: "error"
            });
        }

    </script>
@endif
