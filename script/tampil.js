function pilihkodelab() {
$(document).ready(function() {
    selesai();
});
 
function selesai() {
	setTimeout(function() {
		update();
		selesai();
	}, 200);
}
 
function update() {
	$.getJSON("tampil.php", function(data) {
		$("ul").empty();
		$.each(data.result, function() {
			$("ul").append("<tr><td align='left'>"+this['ITEM_EXAM_NAME']+"</td></tr>");
		});
	});
}}