var alphalist2 = {};
alphalist2.sort_list = function($l) {
	var a = [];
	$l.find("li").each(function() {
		var $t = jQuery(this);
		a.push([$t.text(), $t]);
	});
	a.sort(function(a, b) { return a[0] > b[0] });
	for (k in a) {
		var $li = a[k][1];
		$l.append($li);
	}
};

jQuery(document).ready(function() {
    jQuery(".alphalist2").each(function() {
        var $l = jQuery(this).find("ol,ul");
        alphalist2.sort_list($l);
    });
});
