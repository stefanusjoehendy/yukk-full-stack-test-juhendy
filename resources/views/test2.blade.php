<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- ✅ Load CSS file for jQuery UI  -->
    <link
      href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"
      rel="stylesheet"
    />

    <!-- ✅ load jQuery ✅ -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ✅ load jquery UI ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </head>

  <body>
    <p>Date: <input type="text" id="datepicker" /></p>

    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker();
            $('#datepicker').datepicker('show');
        })
    </script>
  </body>
</html>