<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<form style="margin-left:160px;" class="form-inline">
  <input style=" width: 900px; height: 40px;" class="form-control mr-sm-2" id="filter" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
</form>
<script>
  $("#filter").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mycard > div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>