$(document).ready(function(){

$('.arrow').click(function(){
	$resourceID = $(this).attr('id');
	$resourceID = $resourceID.replace('arrow-', '');
	$contentID = '#content-' + $resourceID;
	console.log($contentID);
	$($contentID).toggleClass('visible-slide');
});

});