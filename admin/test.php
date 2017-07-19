<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<!-- loader.gif -->
<img style="display:none" id="loader" src="loader.gif" alt="Loading...." title="Loading...." />
<!-- simple file uploading form -->
<form id="form" action="uploadsm.php" method="post" enctype="multipart/form-data">
  <input id="uploadImage" type="file" accept="image/*" name="image" />
  <input id="button" type="submit" value="Upload">
</form>
<!-- preview action or error msgs -->
<div id="preview" style="display:none"></div>
</body>
</html>
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jqueryform.js"></script>
<script>
$(document).ready(function() {
  var f = $('form');
  var l = $('#loader'); // loder.gif image
  var b = $('#button'); // upload button
  var p = $('#preview'); // preview area

  b.click(function(){
    // implement with ajaxForm Plugin
    f.ajaxForm({
      beforeSend: function(){
        l.show();
        b.attr('disabled', 'disabled');
        p.fadeOut();
      },
      success: function(e){
        l.hide();
        f.resetForm();
        b.removeAttr('disabled');
        p.val(e);
      },
      error: function(e){
        b.removeAttr('disabled');
        p.html(e).fadeIn();
      }
    });
  });
});
</script>