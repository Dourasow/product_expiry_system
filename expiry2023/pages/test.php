<script type="text/javascript">
// Using jQuery.

$(function() {
    $('form').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });

        $(this).find('input[type=submit]').hide();
    });
});
</script>


<form name="loginBox" target="#here" method="post">
    <input name="username" type="text" /><br />
    <input name="password" type="password" />
    <input type="submit" />
</form>
