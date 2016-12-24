var bConfigurator = (function($){
	var bc = {};
	var baseURI = 'http://localhost:8080/BraceletConfiguratorRestfulService/resources/bracelets';
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
							console.log("Bracelets in DB:" + resp.getResponseHeader('braceletsInDB'));
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
	function addPagination(items, itemsInDB){
		var show_per_page = 10;
		var number_of_pages = Math.ceil(itemsInDB/show_per_page);
		var current_page = 1;
		var html = '<ul>';
		html += '<li><a href="javascript:prev();" id="prev_link">&lt;&lt;</a></li>';
		for(var i=1;i<=number_of_pages;i++){
			html += '<li><a href="javascript:goToPage(' + i + ');">' + i + '</a></li>';
		}
		html += '<li><a href="javascript:next();" id="next_link">&gt;&gt;</a></li>';
		html += '</ul>';
		document.getElementById('pagination-container').innerHTML = html;
		function prev(){
			
		}
		function next(){
			
		}
		function goToPage(page){
			
		}
	}
	function template(item){
		var html = '<tr>';
				html += '<td>' + $(item).attr('id') + '</td>';
				html += '<td>' + $(item).attr('name') + '</td>';
				html += '<td>' + $(item).attr('size') + '</td>';
				html += '<td>' + $(item).attr('model') + '</td>';
				html += '<td>' + $(item).attr('created') + '</td>';
				html += '<td><a href="">Edit</a> | <a href="">Delete</a></td>';
			html += '</tr>';
		return html;
	}
	function listBracelets(xml, braceletsInDB){
		var $xml = $(xml);
		var bracelets = $xml.find('bracelet');
		addPagination(bracelets, braceletsInDB);
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
