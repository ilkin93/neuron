$(document).ready(function(){
	var pagination;
	$('body').on('click', '#toggle', function(){
		$(this).toggleClass('on');
		$('body').toggleClass('over-hid');
		$('body').find('.nav-con').stop().slideToggle();
		return false
	});

	if($('.flip').length > 0){
		$('.flip').flip();
		$('.flip').on('click', function(){
			$(".flip").not(this).flip(false);
			return false
		})
	}

	$('body').on('click', '.main-nav li a, a.faq, a.logo', function(){
		//return false
	});

	$('body').on('click', '.ny', function(){
		$(this).fadeOut();
		$('body').css('overflow', 'visible')
	})

	$('body').find('a.faq').on('click', function () {
		$('body div.FAQ').addClass('show');
    })

    $('body').find('span.faq-close').on('click', function () {
        $('body div.FAQ').removeClass('show');
    });

	//	Pagination
    function createDemo(name){
        var container = $('#pagination-' + name);
        var sources = function(){
            var result = [];
            for(var i = 1; i < 196; i++){
                result.push(i);
            }
            return result;
        }();
        var options = {
            dataSource: sources,
            callback: function(response, pagination){
                window.console && console.log(response, pagination);
                var dataHtml = '<ul>';
                $.each(response, function(index, item){
                    dataHtml += '<li>'+ item +'</li>';
                });
                dataHtml += '</ul>';
                container.prev().html(dataHtml);
            }
        };
        //$.pagination(container, options);
        container.addHook('beforeInit', function(){
            window.console && console.log('beforeInit...');
        });
        container.pagination(options);
        container.addHook('beforePageOnClick', function(){
            window.console && console.log('beforePageOnClick...');
            //return false
        });
        return container;
    }
    createDemo('demo1');
    // Chart




});

particlesJS.load('particles-js', 'js/particles.json');