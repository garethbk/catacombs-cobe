$(document).ready(function(){

$('.arrow').click(function(){
	$resourceID = $(this).attr('id');
	$resourceID = $resourceID.replace('arrow-', '');
	$resourceID = $resourceID.replace(/ /g, '');
	$contentID = '#content-' + $resourceID;
	console.log($contentID);
	$($contentID).toggleClass('visible-slide');
});

});