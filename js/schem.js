$(window).load(function()
	{
		$.ajax
		({
			url: '../scripts/exceptionHeader.php',
			type: 'GET',
			dataType: 'text',
			success:function(data)
			{
				//alert("jsonLd is loaded" + data);
				document.getElementsByTagName('head').innerHTML = data;
			}
		})
	});
