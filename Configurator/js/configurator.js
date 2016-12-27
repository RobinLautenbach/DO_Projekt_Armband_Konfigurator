var bConfigurator = (function($){
	var bc = {};
	var baseURI = 'http://localhost:8080/BraceletConfiguratorRestfulService/resources/bracelets';
	var pagination_set = false;
	bc.getBraceletsPaginated = function(start, size){
			if(start >= 0 && size >= 0){
				$.ajax({
					type: 'GET',
					url: baseURI + '?start=' + start + '&size=' + size,
					beforeSend: function(xhr, options){
						setLoadingDiv();
					},
					error: function(xhr, textStatus, errorThrown){
						removeLoadingDiv();
						console.log(textStatus + ': ' + errorThrown);
					},
					complete: function(resp){
						removeLoadingDiv();
						if(resp.getResponseHeader('braceletsInDB') == null){
							setNoDataDiv();
						}else
						{
							listBracelets(resp.responseXML, resp.getResponseHeader('braceletsInDB'));
						}
					}
				});
			}
	};
	bc.getBracelet = function(id){
		$.ajax({
			type: 'GET',
			url: baseURI + '/' + id,
			error: function(xhr, textStatus, errorThrown){
				removeLoadingDiv();
				console.log(textStatus + ': ' + errorThrown);
			},
			complete: function(resp){
				console.log("Bracelets in DB:" + resp.getResponseHeader('braceletsInDB'));
				listBracelets(resp.responseXML);
			}
		});		
	};
	bc.getAllBracelets = function(){
		$.ajax({
			type: 'GET',
			url: baseURI,
			complete: function(resp){
				console.log("Bracelets in DB:" + resp.getResponseHeader('braceletsInDB'));
				listBracelets(resp.responseXML);
			}
		});		
	};
	bc.addBracelet = function(id){
		console.log('Add Bracelet with ID: ' + id);
	};
	bc.deleteBracelet = function(id){
		console.log('Delete Bracelet with ID: ' + id);
	};
	bc.addPagination = function(items, itemsInDB){
		var show_per_page = 10;
		var number_of_pages = Math.ceil(itemsInDB/show_per_page);
		var current_page = 1;
		var html = '<ul>';
		html += '<li><a href="javascript:bConfigurator.prev();" id="prev_link">&lt;&lt;</a></li>';
		for(var i=1;i<=number_of_pages;i++){
			html += '<li><a class="page_link" href="javascript:bConfigurator.goToPage(' + i + ');" longdesc="' + i + '">' + i + '</a></li>';
		}
		html += '<li><a href="javascript:bConfigurator.next();" id="next_link">&gt;&gt;</a></li>';
		html += '</ul><input type="hidden" id="current_page" /><input type="hidden" id="show_per_page" />';
		$('#pagination-container').html(html);
		$('#current_page').val(current_page);
		$('#show_per_page').val(show_per_page);
		$('#pagination-container .page_link:first').addClass('active_page');
		pagination_set = true;
	}
	bc.prev = function(){
		var new_page = parseInt($('#current_page').val()) - 1;
		if($('.active_page').parent('li').prev('li').length == true) bc.goToPage(new_page);
	}
	bc.next = function(){	
		var new_page = parseInt($('#current_page').val()) + 1;
		if($('.active_page').parent('li').next('li').length == true) bc.goToPage(new_page);
	}
	bc.goToPage = function(page){
		var show_per_page = parseInt($('#show_per_page').val());
		var start = (page == 1) ? 0 : (page - 1) * show_per_page;
		$('#pagination-container ul li a.active_page').removeClass('active_page');
		$('.page_link[longdesc=' + page + ']').addClass('active_page');
		$('#current_page').val(page);
		bc.getBraceletsPaginated(start, show_per_page);
	}
	function template(item){
		var html = '<tr>';
				html += '<td>' + $(item).attr('id') + '</td>';
				html += '<td>' + $(item).attr('name') + '</td>';
				html += '<td>' + $(item).attr('size') + '</td>';
				html += '<td>' + $(item).attr('model') + '</td>';
				html += '<td>' + $(item).attr('created') + '</td>';
				html += '<td><a href="javascript:alert(\'edit\');">Edit</a> | <a href="javascript:alert(\'delete\');">Delete</a></td>';
			html += '</tr>';
		return html;
	}
	function listBracelets(xml, braceletsInDB){
		var $xml = $(xml);
		var bracelets = $xml.find('bracelet');
		if(!pagination_set) bc.addPagination(bracelets, braceletsInDB);
		var html = '<table>';
				html += '<tr>';
					html += '<th>#ID</th>';
					html += '<th>Name</th>';
					html += '<th>Size</th>';
					html += '<th>Model</th>';
					html += '<th>Created</th>';
					html += '<th></th>';
				html += '</tr>';
		$.each(bracelets, function(i,b){
			html += template(b);
		});
		html += '</table>';
		document.getElementById('data-container').innerHTML = html;
	}
	function setLoadingDiv(){
		$('#data-container').append('<div id="loadingDiv"><span>Loading Data...</span></div>');
	}
	function removeLoadingDiv(){
		$('#loadingDiv').remove();
	}
	function setNoDataDiv(){
		$('#data-container').append('<div id="noDataDiv"><span>No Bracelets in DB.</span></div>');
	}
	function removeNoDataDiv(){
		$('#noDataDiv').remove();
	}
	return bc;	
})(jQuery);
