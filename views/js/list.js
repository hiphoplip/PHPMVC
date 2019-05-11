console.log("List");
function editClick(id)
{
	window.location = 'work/edit/'+id;
}
function addClick()
{
	window.location = 'work/add';
}
function deleteClick(id)
{
	console.log("Delete");
	$.post('work/submit',{
		id: id,
		action: "delete"
	}, function(res){
		window.location = 'work';
	});
}
function showClick(id)
{
	window.location = 'work/show';
}