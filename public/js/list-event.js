$(document).ready(function() {
	
});

$(document).on('click', '.toggle-search', function(event) {
	event.preventDefault();
	$(".row-search").toggle('slow/400/fast');
});

$(document).on('click', '.row-content', function(event) {
	event.preventDefault();
	var td1 = $(this).find('th:nth-child(1)');
	var td2 = $(this).find('td:nth-child(2)');
	var td3 = $(this).find('td:nth-child(3)');
	var td4 = $(this).find('td:nth-child(4)');
	var id = $(td1).text();
	console.log($(td1));``
	var name_event = $(td2).text();
	var content_event = $(td3).text();
	var id_event = $(td4).find('.styled-checkbox').attr('id');
	var template = "<tr class='row-edit-content'>"
				+ "<th width='5%'>"
				+ id
				+ "</th>"
				+ "<td width='15%'>"
				+ "<input type='text' class='form-control input-sm' value='"
				+ name_event
				+ "'>"
				+ "</td>"
				+ "<td width='60%'>"
				+ "<input type='text' class='form-control input-sm' value='"
				+ content_event
				+ "'>"
				+ "</td>"
				+ "<td width='5%' class='text-center'>"
				+ "<input class='styled-checkbox' id='"
				+ id_event
				+ "' type='checkbox' value='value1'>"
				+ "<label for='"
				+ id_event
				+ "'></label>"
				+ "</td>"
				+ "<td width='10%'>"
				+ "<i class='fas fa-check btn-save'></i>"
				+ "<i class='fas fa-times btn-remove'></i>"
				+ "</td>"
				+ "</tr>";

	$(template).insertBefore($(this));
	$(this).attr('hidden', 'true');
});

$(document).on('click', '.btn-remove', function(event) {
	event.preventDefault();
	$(this).parent('td').parent('.row-edit-content').next('.row-content').removeAttr('hidden');
	$(this).parent('td').parent('.row-edit-content').remove();
});

$(document).on('click', '.btn-save', function(event) {
	event.preventDefault();
	var div_edit = $(this).parent('td').parent('.row-edit-content');
	var name_event = $(div_edit).find('td:nth-child(2)').children('input').val();
	var content_event = $(div_edit).find('td:nth-child(3)').children('input').val();
	var div_content = $(div_edit).next('.row-content');
	$(div_content).removeAttr('hidden');

	$(div_content).find('td:nth-child(2)').text(name_event);
	$(div_content).find('td:nth-child(3)').text(content_event);
	$(div_edit).remove();
});

$(document).on('click', '.td-checkbox, i.fas.fa-trash-alt', function(event) {
	event.stopPropagation();
});

$(document).on('change', '.styled-checkbox', function(event) {
	var number = $(".event-checkbox:checked").length;
	if (number > 0) {
		$(".btn-delete-events").removeAttr('disabled');
	} else {
		$(".btn-delete-events").attr('disabled', true);
	}
});

$(document).on('change', '.checkbox-all', function(event) {
	event.preventDefault();
	
});