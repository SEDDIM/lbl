<form>
    <input type="text" class="datepick">
</form>
 
<script>
    $(document).ready(function() {
        $('.datepick').datepicker({ dateFormat: "yy-mm-dd"});
    });
</script>