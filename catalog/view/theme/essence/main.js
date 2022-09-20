function getURLVar(f) {
	var h = [];
	var k = String(document.location).split("?");
	if (k[1]) {
		var g = k[1].split("&");
		for (i = 0; i < g.length; i++) {
			var l = g[i].split("=");
			if (l[0] && l[1]) {
				h[l[0]] = l[1]
			}
		}
		if (h[f]) {
			return h[f]
		} else {
			return ""
		}
	}
}
$(document).ready(function () {
	$(".text-danger").each(function () {
		var b = $(this).parent().parent();
		if (b.hasClass("form-group")) {
			b.addClass("has-error")
		}
	});
	$("#form-currency .currency-select").on("click", function (b) {
		b.preventDefault();
		$("#form-currency input[name='code']").val($(this).attr("name"));
		$("#form-currency").submit()
	});
	$("#form-language .language-select").on("click", function (b) {
		b.preventDefault();
		$("#form-language input[name='code']").val($(this).attr("name"));
		$("#form-language").submit()
	});
	$("#search input[name='search']").parent().find("button").on("click", function () {
		var d = $("base").attr("href") + "index.php?route=product/search";
		var c = $("#search input[name='search']").val();
		if (c) {
			d += "&search=" + encodeURIComponent(c)
		}
		location = d
	});
	$("#search input[name='search']").on("keydown", function (b) {
		if (b.keyCode == 13) {
			$("#search input[name='search']").parent().find("button").trigger("click")
		}
	});
	$.fn.essence_autocomplete = function (b) {
		return this.each(function () {
			this.timer = null;
			this.items = new Array();
			$.extend(this, b);
			$(this).attr("essence_autocomplete", "off");
			$(this).on("focus", function () {
				this.request()
			});
			$(this).on("blur", function () {
				setTimeout(function (a) {
					a.hide()
				}, 200, this)
			});
			$(this).on("keydown", function (a) {
				switch (a.keyCode) {
					case 27:
						this.hide();
						break;
					default:
						this.request();
						break
				}
			});
			this.click = function (a) {
				a.preventDefault();
				value = $(a.target).closest("li").attr("data-value");
				if (value && this.items[value]) {
					this.select(this.items[value])
				}
			};
			this.show = function () {
				var a = $(this).position();
				$(this).siblings("ul.dropdown-menu").css({
					top: a.top + $(this).outerHeight(),
					left: a.left
				});
				$(this).siblings("ul.dropdown-menu").show()
			};
			this.hide = function () {
				$(this).siblings("ul.dropdown-menu").hide()
			};
			this.request = function () {
				clearTimeout(this.timer);
				this.timer = setTimeout(function (a) {
					a.source($(a).val(), $.proxy(a.response, a))
				}, 200, this)
			};
			this.response = function (a) {
				html = "";
				if (a.length) {
					for (i = 0; i < a.length; i++) {
						this.items[a[i]["value"]] = a[i]
					}
					for (i = 0; i < a.length; i++) {
						if (!a[i]["category"]) {
							html += '<li data-value="' + a[i]["value"] + '">';
							if (a[i]["image"]) {
								html += '<a class="search-link" href="#"><img src="' + a[i]["image"] + '"></a>'
							}
							html += '<a class="search-link" href="#">';
							html += '<span class="product_name">' + a[i]["label"] + "</span>";
							html += "</a>";
							html += "</li>"
						}
					}
					var d = new Array();
					for (i = 0; i < a.length; i++) {
						if (a[i]["category"]) {
							if (!d[a[i]["category"]]) {
								d[a[i]["category"]] = new Array();
								d[a[i]["category"]]["name"] = a[i]["category"];
								d[a[i]["category"]]["item"] = new Array()
							}
							d[a[i]["category"]]["item"].push(a[i])
						}
					}
					for (i in d) {
						html += '<li class="dropdown-header">' + d[i]["name"] + "</li>";
						for (j = 0; j < d[i]["item"].length; j++) {
							html += '<li data-value="' + d[i]["item"][j]["value"] + '"><a href="#">   ' + d[i]["item"][j]["label"] + "</a></li>"
						}
					}
				}
				if (html) {
					this.show()
				} else {
					this.hide()
				}
				$(this).siblings("ul.dropdown-menu").html(html)
			};
			$(this).after('<ul class="dropdown-menu search-block"></ul>');
			$(this).siblings("ul.dropdown-menu").delegate("a", "click", $.proxy(this.click, this));
			$(this).siblings("ul.dropdown-menu").delegate("img", "click", $.proxy(this.click, this));
			$(this).siblings("ul.dropdown-menu").delegate("span", "click", $.proxy(this.click, this))
		})
	};
	$("input[name='search']").essence_autocomplete({
		source: function (c, d) {
			$.ajax({
				url: "index.php?route=product/search&search=" + encodeURIComponent(c) + "&description=" + encodeURIComponent(c) + "&autocomplete=1",
				dataType: "json",
				success: function (a) {
					d($.map(a, function (b) {
						return {
							image: b.thumb,
							label: b.name,
							value: b.product_id,
						}
					}))
				}
			})
		},
		select: function (b) {
			url = $("base").attr("href") + "index.php?route=product/product&product_id=" + b.value;
			location = url;
			return false
		}
	});
	$(document).on("keydown", "#collapse-checkout-option input[name='email'], #collapse-checkout-option input[name='password']", function (b) {
		if (b.keyCode == 13) {
			$("#collapse-checkout-option #button-login").trigger("click")
		}
	});
	$("[data-toggle='tooltip']").tooltip({
		container: "body"
	});
	$(document).ajaxStop(function () {
		$("[data-toggle='tooltip']").tooltip({
			container: "body"
		})
	});
	$("#list-view").click(function () {
		$("#content .product-grid > .clearfix").remove();
		$("#content .row > .product-grid").attr("class", "product-layout product-list col-xs-12");
		$("#grid-view").removeClass("active");
		$("#list-view").addClass("active");
		localStorage.setItem("display", "list")
	});
	$("#grid-view").click(function () {
		var a = $("#column-right, #column-left").length;
		if (a == 2) {
			$("#content .product-list").attr("class", "product-layout product-grid col-lg-6 col-md-6 col-sm-6 col-xs-6")
		} else {
			if (a == 1) {
				$("#content .product-list").attr("class", "product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-6")
			} else {
				$("#content .product-list").attr("class", "product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-6")
			}
		}
		$("#list-view").removeClass("active");
		$("#grid-view").addClass("active");
		localStorage.setItem("display", "grid")
	});
	if (localStorage.getItem("display") == "list") {
		$("#list-view").trigger("click");
		$("#list-view").addClass("active")
	} else {
		$("#grid-view").trigger("click");
		$("#grid-view").addClass("active")
	}
});
var cart = {
	add: function (d, c) {
		$.ajax({
			url: "index.php?route=checkout/cart/add",
			type: "post",
			data: "product_id=" + d + "&quantity=" + (typeof (c) != "undefined" ? c : 1),
			dataType: "json",
			beforeSend: function () {
				$("#cart > button").button("loading")
			},
			complete: function () {
				$("#cart > button").button("reset")
			},
			success: function (a) {
				$(".alert-dismissible, .text-danger").remove();
				if (a.redirect) {
					location = a.redirect
				}
				if (a.success) {
					$("#content").parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + a.success + ' <button type="button" class="close" data-dismiss="alert">×</button></div>');
					setTimeout(function () {
						$("#cart > button").html('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><span id="cart-total">' + a.total + "</span>")
					}, 100);
					$("html, body").animate({
						scrollTop: 0
					}, "slow");
					$("#cart .cart-block").load("index.php?route=common/cart/info .cart-block li")
				}
			},
			error: function (a, f, b) {
				alert(b + "\r\n" + a.statusText + "\r\n" + a.responseText)
			}
		})
	},
	update: function (d, c) {
		$.ajax({
			url: "index.php?route=checkout/cart/edit",
			type: "post",
			data: "key=" + d + "&quantity=" + (typeof (c) != "undefined" ? c : 1),
			dataType: "json",
			beforeSend: function () {
				$("#cart > button").button("loading")
			},
			complete: function () {
				$("#cart > button").button("reset")
			},
			success: function (a) {
				setTimeout(function () {
					$("#cart > button").html('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><span id="cart-total">' + a.total + "</span>")
				}, 100);
				if (getURLVar("route") == "checkout/cart" || getURLVar("route") == "checkout/checkout") {
					location = "index.php?route=checkout/cart"
				} else {
					$("#cart .cart-block").load("index.php?route=common/cart/info .cart-block li")
				}
			},
			error: function (a, f, b) {
				alert(b + "\r\n" + a.statusText + "\r\n" + a.responseText)
			}
		})
	},
	remove: function (b) {
		$.ajax({
			url: "index.php?route=checkout/cart/remove",
			type: "post",
			data: "key=" + b,
			dataType: "json",
			beforeSend: function () {
				$("#cart > button").button("loading")
			},
			complete: function () {
				$("#cart > button").button("reset")
			},
			success: function (a) {
				setTimeout(function () {
					$("#cart > button").html('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><span id="cart-total">' + a.total + "</span>")
				}, 100);
				if (getURLVar("route") == "checkout/cart" || getURLVar("route") == "checkout/checkout") {
					location = "index.php?route=checkout/cart"
				} else {
					$("#cart .cart-block").load("index.php?route=common/cart/info .cart-block li")
				}
			},
			error: function (e, a, f) {
				alert(f + "\r\n" + e.statusText + "\r\n" + e.responseText)
			}
		})
	}
};
var voucher = {
	add: function () {},
	remove: function (b) {
		$.ajax({
			url: "index.php?route=checkout/cart/remove",
			type: "post",
			data: "key=" + b,
			dataType: "json",
			beforeSend: function () {
				$("#cart > button").button("loading")
			},
			complete: function () {
				$("#cart > button").button("reset")
			},
			success: function (a) {
				setTimeout(function () {
					$("#cart > button").html('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><span id="cart-total">' + a.total + "</span>")
				}, 100);
				if (getURLVar("route") == "checkout/cart" || getURLVar("route") == "checkout/checkout") {
					location = "index.php?route=checkout/cart"
				} else {
					$("#cart .cart-block").load("index.php?route=common/cart/info .cart-block li")
				}
			},
			error: function (e, a, f) {
				alert(f + "\r\n" + e.statusText + "\r\n" + e.responseText)
			}
		})
	}
};
var wishlist = {
	add: function (b) {
		$.ajax({
			url: "index.php?route=account/wishlist/add",
			type: "post",
			data: "product_id=" + b,
			dataType: "json",
			success: function (a) {
				$(".alert-dismissible").remove();
				if (a.redirect) {
					location = a.redirect
				}
				if (a.success) {
					$("#content").parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + a.success + ' <button type="button" class="close" data-dismiss="alert">×</button></div>')
				}
				$("#wishlist-total span").html(a.total);
				$("#wishlist-total").attr("title", a.total);
				$("html, body").animate({
					scrollTop: 0
				}, "slow")
			},
			error: function (e, a, f) {
				alert(f + "\r\n" + e.statusText + "\r\n" + e.responseText)
			}
		})
	},
	remove: function () {}
};
var compare = {
	add: function (b) {
		$.ajax({
			url: "index.php?route=product/compare/add",
			type: "post",
			data: "product_id=" + b,
			dataType: "json",
			success: function (a) {
				$(".alert-dismissible").remove();
				if (a.success) {
					$("#content").parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + a.success + ' <button type="button" class="close" data-dismiss="alert">×</button></div>');
					$("#compare-total").html(a.total);
					$("html, body").animate({
						scrollTop: 0
					}, "slow")
				}
			},
			error: function (e, a, f) {
				alert(f + "\r\n" + e.statusText + "\r\n" + e.responseText)
			}
		})
	},
	remove: function () {}
};
$(document).delegate(".agree", "click", function (c) {
	c.preventDefault();
	$("#modal-agree").remove();
	var d = this;
	$.ajax({
		url: $(d).attr("href"),
		type: "get",
		dataType: "html",
		success: function (a) {
			html = '<div id="modal-agree" class="modal">';
			html += '  <div class="modal-dialog">';
			html += '    <div class="modal-content">';
			html += '      <div class="modal-header">';
			html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
			html += '        <h4 class="modal-title">' + $(d).text() + "</h4>";
			html += "      </div>";
			html += '      <div class="modal-body">' + a + "</div>";
			html += "    </div>";
			html += "  </div>";
			html += "</div>";
			$("body").append(html);
			$("#modal-agree").modal("show")
		}
	})
});
(function (b) {
	b.fn.autocomplete = function (a) {
		return this.each(function () {
			this.timer = null;
			this.items = new Array();
			b.extend(this, a);
			b(this).attr("autocomplete", "off");
			b(this).on("focus", function () {
				this.request()
			});
			b(this).on("blur", function () {
				setTimeout(function (d) {
					d.hide()
				}, 200, this)
			});
			b(this).on("keydown", function (d) {
				switch (d.keyCode) {
					case 27:
						this.hide();
						break;
					default:
						this.request();
						break
				}
			});
			this.click = function (d) {
				d.preventDefault();
				value = b(d.target).parent().attr("data-value");
				if (value && this.items[value]) {
					this.select(this.items[value])
				}
			};
			this.show = function () {
				var d = b(this).position();
				b(this).siblings("ul.dropdown-menu").css({
					top: d.top + b(this).outerHeight(),
					left: d.left
				});
				b(this).siblings("ul.dropdown-menu").show()
			};
			this.hide = function () {
				b(this).siblings("ul.dropdown-menu").hide()
			};
			this.request = function () {
				clearTimeout(this.timer);
				this.timer = setTimeout(function (d) {
					d.source(b(d).val(), b.proxy(d.response, d))
				}, 200, this)
			};
			this.response = function (f) {
				html = "";
				if (f.length) {
					for (i = 0; i < f.length; i++) {
						this.items[f[i]["value"]] = f[i]
					}
					for (i = 0; i < f.length; i++) {
						if (!f[i]["category"]) {
							html += '<li data-value="' + f[i]["value"] + '"><a href="#">' + f[i]["label"] + "</a></li>"
						}
					}
					var e = new Array();
					for (i = 0; i < f.length; i++) {
						if (f[i]["category"]) {
							if (!e[f[i]["category"]]) {
								e[f[i]["category"]] = new Array();
								e[f[i]["category"]]["name"] = f[i]["category"];
								e[f[i]["category"]]["item"] = new Array()
							}
							e[f[i]["category"]]["item"].push(f[i])
						}
					}
					for (i in e) {
						html += '<li class="dropdown-header">' + e[i]["name"] + "</li>";
						for (j = 0; j < e[i]["item"].length; j++) {
							html += '<li data-value="' + e[i]["item"][j]["value"] + '"><a href="#">   ' + e[i]["item"][j]["label"] + "</a></li>"
						}
					}
				}
				if (html) {
					this.show()
				} else {
					this.hide()
				}
				b(this).siblings("ul.dropdown-menu").html(html)
			};
			b(this).after('<ul class="dropdown-menu"></ul>');
			b(this).siblings("ul.dropdown-menu").delegate("a", "click", b.proxy(this.click, this))
		})
	}
})(window.jQuery);
$(document).ready(function () {
	var a = $("#toTop");
	$(window).scroll(function () {
		var b = $(this).scrollTop();
		if (b > 300) {
			$(a).css("display", "block")
		} else {
			$(a).css("display", "none")
		}
	});
	$(a).click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 800);
		return false
	})
 $('#mob-menu').click(function() {
    $('.menu').addClass('showing');
  });
   $('#mob-menu-close').click(function() {
     $('.menu').removeClass('showing');
  });
});