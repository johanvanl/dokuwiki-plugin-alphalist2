var alphalist2 = {};
alphalist2.sort_list = function($l) {
	var a = [];
	$l.find("> li").each(function() {
		var $t = jQuery(this);
		a.push([$t.text(), $t]);
	});
	a.sort(function(a, b) { return (a[0]).localeCompare(b[0]) });
	for (k in a) {
		var $li = a[k][1];
		$l.append($li);
	}
};

jQuery(document).ready(function() {
    jQuery(".alphalist2").find("ol,ul").each(function() {
        alphalist2.sort_list(jQuery(this));
    });
});
