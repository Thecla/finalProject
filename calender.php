<! DOCTYPE html>
<head>
<title>jQuery UI Datepicker - Set Different Date Formats</title>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.19.custom.min.js"></script>
<script type="text/javascript">
$(function() {
$("#txtDate").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
<style type="text/css">
.ui-datepicker { font-size:8pt !important}
</style>
</head>
<body>
<form id="form1" method="post">
<div class="demo">
<input type="text" name="date" id="txtDate">
</div>
</form>
</body>
</html>