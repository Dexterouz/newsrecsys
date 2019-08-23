<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>News App | <?php echo $title; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="news\page\favicon.png" />
	<link rel="stylesheet" type="text/css" href="Styles/styles.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script src="jquery/jquery-3.2.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="Jscript/jscript.js"></script>
	<script type="text/javascript">
			tinymce.init({
		    selector: '#myTextarea',
		    theme: 'modern',
		    // width: 500,
		    // height: 300,
		    plugins: [
		      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
		      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
		      'save table contextmenu directionality emoticons template paste textcolor'
		    ],
		    content_css: 'css/content.css',
		    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
		  });
	</script>
</head>
