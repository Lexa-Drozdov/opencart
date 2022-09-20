~(function(window) {
	'use strict';

	var DEFAULT = 
	{
		color      : '#229AC8',
		product    : '.product-layout',
		pagination : '.pagination'
	};

	var Infiniti = function Infiniti(settings = {}) 
	{
		this.settings = Object.assign({}, settings, DEFAULT);
		this.isLoad   = false;

		this.createEvent().addStyle();
	};

	var _proto = Infiniti.prototype;

	_proto.createEvent = function createEvent() 
	{
		var _this = this;

		document.addEventListener('scroll', function() {

			if (_this.isLoad) { 
				return false; 
			}
		
			var pagination = document.querySelector(_this.settings.pagination);

			if (!Object.is(pagination, null) && _this.isInViewport(pagination)) {
				_this.loadProduct();
			}
		})

		return this;
	},

	_proto.loadProduct = function loadProduct() 
	{

		var _this = this,
			url   = document.querySelector(_this.settings.pagination + ' .active');
		
		if (Object.is(url, null) || Object.is(url.nextSibling, null)) {
			return false;
		}

		url = url.nextSibling.children;

		if (!url.length) {
			return false;
		}

		_this.addLoader();
		_this.isLoad = true;

		var pagination = document.querySelector(_this.settings.pagination);
			
			pagination.style.position = "relative";
			pagination.classList.add('infiniti__pagination--active');

		/* on Vanila =( */
		$.get(url[0].href, function(response) {
			var $response  = $(response),
				class_name = document.querySelector(_this.settings.product + ':last-child');

			$('.product-layout:last-child').after($response.find(_this.settings.product).attr('class', class_name.className));
			$(pagination).closest('.row').html($response.find(_this.settings.pagination).closest('.row').html());
				
			window.history.pushState(null, null, url[0].href);

			_this.isLoad = false;
			_this.deleteLoader();
		});
	}

	_proto.isInViewport = function isInViewport(element)
	{
    	var rect = element.getBoundingClientRect();

		return (rect.bottom >= 0 && rect.right >= 0 && rect.top <= (window.innerHeight 
			|| document.documentElement.clientHeight) && rect.left <= (window.innerWidth 
			|| document.documentElement.clientWidth));
	}

	_proto.addLoader = function addLoader() 
	{
		var div = document.createElement('div');
		
		div.innerHTML = '<div class="infiniti__animated"></div>';
		div.className = 'infiniti';

		this.deleteLoader();


		document.body.appendChild(div)
	},

	_proto.deleteLoader = function deleteLoader() 
	{
		var div = document.querySelector('.infiniti');

		if (!Object.is(div, null)) {
			div.remove();
		}
	},

	_proto.addStyle = function addStyle() 
	{
		/* see https://css-tricks.com/snippets/javascript/lighten-darken-color */
		var lightenDarkenColor = function(col, amt) 
		{
   			var usePound = false;
  
   			if (col[0] == "#") {
        		col = col.slice(1);
        		usePound = true;
    		}
 
    		var num = parseInt(col,16),
    			r 	= (num >> 16) + amt;
 
    		if (r > 255) { 
    			r = 255; 
    		} else if (r < 0) { 
    			r = 0;
    		}
 
    		var b = ((num >> 8) & 0x00FF) + amt;
 
    		if (b > 255) { 
    			b = 255;
    		} else if (b < 0) {
    			b = 0;
    		}
 
    		var g = (num & 0x0000FF) + amt;
 
    		if (g > 255) { 
    			g = 255;
    		} else if (g < 0) { 
    			g = 0;
    		}
 
    		return (usePound ? '#' : '') + (g | (b << 8) | (r << 16)).toString(16);
		}

		var css = document.createElement('style');

		css.innerHTML = `
		.infiniti__pagination--active:after,
			.infiniti__pagination--active:before 
			{
				position: absolute;
			}

			.infiniti__pagination--active:before 
			{
				content: '';
				left: 0; right: 0; top: 0; bottom: 0;
				background: rgba(255, 255, 255, .5);
				z-index: 2;
			}

			.infiniti__pagination--active:after 
			{
				content: '\\f110';
				font: normal normal normal 14px/1 FontAwesome;
				color: ${this.settings.color};
				left: 50%; top: 50%;
				margin: -6px -7px 0 0;
				width: 14px; 
				height: 14px;
				z-index: 2; 

				-webkit-animation: spin 2s linear infinite;
					animation: spin 2s linear infinite;
			}

			.infiniti 
			{
				position: fixed;
				top: 0; left: 0; right: 0;
				height: 3px;
				background: ${lightenDarkenColor(this.settings.color, 50)};
				background-clip: padding-box;
				overflow: hidden;
				z-index: 999;
			}

			.infiniti__animated 
			{
				background: ${this.settings.color};
			}

			.infiniti__animated:before, 
			.infiniti__animated:after 
			{
				content: '';
				position: absolute;
      			background-color: inherit;
      			top: 0; left:0; bottom: 0;
      			will-change: left, right;
			}

			.infiniti__animated:before 
			{
				-webkit-animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
						animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
			} 

			.infiniti__animated:after 
			{
				-webkit-animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
						animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
      			
      			-webkit-animation-delay: 1.15s;
      					animation-delay: 1.15s;
			}			

			@-webkit-keyframes indeterminate-short 
			{
  				0%   { left: -200%; right: 100%; }
 	 			60%  { left:  107%; right: -8%;  }
  				100% { left:  107%; right: -8%;  } 
  			}

			@keyframes indeterminate-short 
			{
  				0%   { left: -200%; right: 100%; }
  				60%  { left:  107%; right: -8%;  }
  				100% { left:  107%; right: -8%;  }
  			}

			@-webkit-keyframes indeterminate 
			{
  				0%   { left: -35%; right: 100%; }
  				60%  { left: 100%; right: -90%; }
  				100% { left: 100%; right: -90%; } 
  			}

			@keyframes indeterminate 
			{
  				0%   { left: -35%; right: 100%; }
  				60%  { left: 100%; right: -90%; }
  				100% { left: 100%; right: -90%; } 
  			}  		

  			@-webkit-keyframes spin 
  			{
    			from { -webkit-transform: rotate(0deg);   }
    			to 	 { -webkit-transform: rotate(360deg); }
			}
			
			@keyframes spin 
			{
    			from { transform:rotate(0deg);   }
    			to 	 { transform:rotate(360deg); }
			}	
		`;

		document.body.appendChild(css);
	}; 

	window.addEventListener('load', function() { (new Infiniti()) })
})(window);