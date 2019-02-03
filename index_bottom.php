</div>
<div id="welcome" class="container">
	<h2>Welcome to our website</h2>
	<p>This is <strong>Porphyrio</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="smarteditor2-master/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script>

<script type="text/javascript">
	$('#btn_write').click(function(){
		$(location).attr('href','write.php');
	});

	$('#btn_delete').click(function(){
		var result = confirm("Are you sure you want to delete it?");

		if (result) {
			$('#delete_frm').submit();
		} else {

		}
	})

	var oEditors = [];
	nhn.husky.EZCreator.createInIFrame({

	    oAppRef: oEditors,

	    elPlaceHolder: "ir1",

	    sSkinURI: "smarteditor2-master/dist/SmartEditor2Skin.html",

	    fCreator: "createSEditor2"

	});

	$("#submit_write").click(function(){
	        //id가 smarteditor인 textarea에 에디터에서 대입
	        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	        // 이부분에 에디터 validation 검증

	        //폼 submit
	        $("#frm_write").submit();
	    })




</script>
</body>
</html>
