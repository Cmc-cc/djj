/* file version: 1565063000_18efd458636ccc287bfff59a500dd10f */
BaseJS.addModuleClass("Common", {
	init: function() {
		var data = MainJS.cfg.data;
		if(!data.logo) {
			data.logo = MainJS.sysSetting.defaultLogo;
		}
		this.renderBody("common", data);
	},
	actionMessage: function() {
		this.setPageTitle(this.initData.pageTitle || "系统提示");
		var tpl = this.getTpl("common", "message");
		var html = this.renderTpl(tpl, {
			info: this.initData.info
		});
		this.fillMainContent(html);
	},
	getPcUrl: function() {
		return window.location.protocol + "//" + window.location.host.replace(/^m\.(.*?)$/, "www.$1") + "/?desktop=true";
	},
	actionHome: function() {
		this.setPageTitle(MainJS.cfg.siteTitle || "");
		var data = MainJS.cfg.data;
		if(!data.lunbo || data.lunbo.length === 0) {
			data.lunbo = this.sysCfg.defaultLunbo;
		}
		var tpl = this.getTpl("common", "home");
		var html = this.renderTpl(tpl, data);
		this.fillMainContent(html);
		var _this = this;
		setTimeout(function() {
			_this.initCarousel();
			_this.initCarousel(null, _this.find(".menu-btn-area"), true);
		}, 200);
		this.find(".menu-btn-area a").click(function(e) {
			MainJS.checkClick(this, e);
		});
		$("#" + this.id + "-carousel2").on("slid.bs.carousel", function(e) {
			var index = $(e.relatedTarget).data("index");
			_this.find(".tabs .tab-item[data-index='" + index + "']").click();
			_this.syncSize();
		});
		var tabScrollbar = null;
		var rolling = false;
		this.find(".tabs .tab-item").on("click", function() {
			if(rolling) {
				return;
			}
			rolling = true;
			setTimeout(function() {
				rolling = false;
			}, 350);
			_this.find(".tabs .tab-item.active").removeClass("active");
			var tab = $(this);
			tab.addClass("active");
			var index = tab.data("index");
			_this.find("#" + _this.id + "-carousel2").carousel(Number(index)).carousel("pause");
			if(tabScrollbar) {
				tabScrollbar.scrollToElement(this);
			}
		});
		if(this.find(".tab-container").length > 0 && MainJS.isTBK) {
			tabScrollbar = BaseJS.createScrollbar({
				target: this.find(".tab-container")
			}, {
				vScrollbar: false,
				hScrollbar: false
			});
			var tabCount = this.find(".tabs .tab-item").length;
			this.find(".tab-container .left-btn").click(function() {
				tabScrollbar.scrollTo(tabScrollbar.x + $(window).width() / tabCount, 0, 500);
			});
			this.find(".tab-container .right-btn").click(function() {
				tabScrollbar.scrollTo(tabScrollbar.x - $(window).width() / tabCount, 0, 500);
			});
			this.initCarousel(null, this.find(".tab-container"));
		}
		var info = this.find(".notice-area .info");
		var infoW = 0;
		this.on("syncSize", function() {
			if(infoW > 0) {
				var animationDuration = Math.ceil((infoW + window.innerWidth) / 36) + "s";
				info[0].style.webkitAnimation = "scroll-left " + animationDuration + " linear infinite";
				info[0].style.animation = info[0].style.webkitAnimation;
			}
			var minHeight = _this.getBodyMain().innerHeight() -
				_this.find(".carousel-container").outerHeight() -
				_this.find(".notice-area").outerHeight() -
				_this.find(".tab-container").outerHeight();
			if(minHeight > 0) {
				var adjustHeight = 10;
				this.find(".menu-btn-area").css("min-height", (minHeight - adjustHeight) + "px");
			} else {
				this.find(".menu-btn-area").css("min-height", "");
			}
			if(!MainJS.isNewTheme) {
				var btnImgs = this.find(".menu-btn-area .menu-btn img");
				btnImgs.width("100%");
				var mH = btnImgs.width() * (105 / 158);
				btnImgs.css("min-height", mH + "px").height(mH).width("auto");
			}
		});
		this.find(".notice-area").click(function() {
			var infoTxt = $(this).find(".info-txt");
			var notice = infoTxt.data("notice");
			var noticeContent = $.isArray(notice) ? ('<p>' + notice.join('</p><p>') + '</p>') : notice;
			if(noticeContent) {
				MainJS.showSystemNotice(noticeContent, null, {
					iconClass: "fa fa-volume-up",
					title: "最新公告",
					isHtml: true
				});
			}
		});
		var doHandler = function(data) {
			MainJS.setLoginUser(data.user);
			var topContainer = _this.find(".top-container");
			if(topContainer.length > 0) {
				var tpl = _this.getTpl("common", "loginInfo");
				var html = _this.renderTpl(tpl, data);
				var userInfo = topContainer.find(".right-area");
				if(userInfo.length > 0) {
					userInfo.replaceWith(html);
				} else {
					topContainer.append(html);
					topContainer.find("img").on("load error", function() {
						_this.syncSize();
						MainJS.syncSize();
					});
				}
			}
			info.css({
				display: "inline-block",
				width: "30000px"
			});
			var infoTxt = info.find(".info-txt");
			if(data.notice !== undefined) {
				infoTxt.data("notice", data.notice);
				var notice = $.isArray(data.notice) ? ('<span style="padding:0 10px;">' + data.notice.join('</span><span style="padding:0 10px;">') + '</span>') : data.notice;
				infoTxt.html(notice || "");
				infoW = infoTxt.width();
				infoTxt.css({
					display: "inline-block",
					width: infoW + "px",
					"font-size": "14px"
				});
				info.css({
					display: "",
					width: "",
					cursor: data.notice ? "pointer" : "default"
				});
			}
			var message = data.message;
			if(message) {
				MainJS.showSystemMessage(message.content, function() {
					_this.requestGet("/index/webcom/" + message.id, null, function(data1) {
						doHandler(data1);
					});
				});
			}
			var mpop = data.mpop || {};
			var popDataJson = "";
			if(mpop.cache == 1) {
				popDataJson = window.localStorage.getItem("BASEJS_POP_DATA_JSON");
			} else {
				popDataJson = MainJS._popDataJson;
			}
			var jsonData = JSON.stringify(mpop);
			if(popDataJson !== jsonData && mpop && mpop.items && mpop.items.length > 0) {
				if(mpop.cache == 1) {
					window.localStorage.setItem("BASEJS_POP_DATA_JSON", jsonData);
				} else {
					MainJS._popDataJson = jsonData;
				}
				var tpl = _this.getTpl("common", "ad");
				var html = _this.renderTpl(tpl, mpop);
				MainJS.showDialog({
					title: mpop.title || "",
					containerClass: "ad-dialog-main" + (!mpop.title ? " no-title" : ""),
					content: html,
					onInit: function(dialog) {
						var loadCount = 0;
						var carouselContainer = dialog.find(".carousel-container");
						carouselContainer.find("img").on("load error", function() {
							loadCount++;
							if(loadCount >= mpop.items.length) {
								carouselContainer.css("height", "auto");
							}
						});
						_this.initCarousel(dialog);
					}
				});
			}
			_this.syncSize();
			MainJS.syncSize();
			setTimeout(function() {
				_this.syncSize();
				MainJS.syncSize();
			}, 500);
		};
		var requestCfg = {
			noMask: true,
			error: function() {
				if(!MainJS.isApp && MainJS.cfg.data.homeScreenClosed == "0") {
					MainJS.showAddToHomeScreenTipDialog(function() {
						doHandler(data);
					});
				} else {
					doHandler(data);
				}
			}
		};
		doHandler({
			user: MainJS.getLoginUser()
		});
		this.requestGet("/index/webcom", null, function(data) {
			if(!MainJS.isApp && MainJS.cfg.data.homeScreenClosed == "0") {
				MainJS.showAddToHomeScreenTipDialog(function() {
					doHandler(data);
				});
			} else {
				doHandler(data);
			}
		}, requestCfg);
		if(data.lunbo) {
			var carouselContainer = this.find(".carousel-container");
			var loadCount = 0;
			carouselContainer.find("img").on("load error", function() {
				loadCount++;
				if(loadCount >= data.lunbo.length) {
					carouselContainer.css("height", "auto");
				}
			});
		}
	},
	initCarousel: function(actionContainer, touchContainer, isStop) {
		var pX = 0;
		var pY = 0;
		var moving = false;
		var container = actionContainer || this;
		var isAction = false;
		(touchContainer || container.find(".carousel.slide:first")).on("touchstart mousedown", function(event) {
			var originalEvent = event.originalEvent;
			var e = originalEvent.touches ? originalEvent.touches[0] : originalEvent;
			pX = e.pageX;
			pY = e.pageY;
			moving = false;
			if(e.preventDefault) {
				e.preventDefault();
			}
		}).on("touchmove mousemove", function(event) {
			if(moving) {
				return;
			}
			var carousel = (touchContainer || container).find(".carousel.slide:first");
			moving = true;
			var originalEvent = event.originalEvent;
			var e = originalEvent.touches ? originalEvent.touches[0] : originalEvent;
			var diffX = e.pageX - pX;
			var diffY = Math.abs(e.pageY - pY);
			if(diffX > 5 && (!touchContainer || diffY < 8)) {
				isAction = true;
				carousel.carousel("prev");
				if(e.preventDefault) {
					e.preventDefault();
				}
			}
			if(diffX < -5 && (!touchContainer || diffY < 8)) {
				isAction = true;
				carousel.carousel("next");
				if(e.preventDefault) {
					e.preventDefault();
				}
			}
			setTimeout(function() {
				isAction = false;
			}, 800);
		}).on("touchend touchcancel mouseup", function() {
			moving = false;
		});
		if(!isStop) {
			var carousel = (touchContainer || container).find(".carousel.slide:first");
			carousel.carousel("cycle");
		}
		if(actionContainer) {
			actionContainer.find("a").click(function() {
				if(isAction) {
					return false;
				}
			});
		}
	},
	actionMoreMenu: function() {
		this.setPageTitle("娱乐中心");
		var tpl = this.getTpl("common", "moreMenu");
		var html = this.renderTpl(tpl, {
			secondMenu: MainJS.cfg.data.config.secondMenu
		});
		this.fillMainContent(html);
		this.find(".menu-btn-area .list-group-item >a").click(function(e) {
			MainJS.checkClick(this, e);
		});
	},
	actionOpenLink: function() {
		this.createBodyMainScrollbar = null;
		if(this.initData.pageTitle) {
			this.setPageTitle(this.initData.pageTitle);
		}
		var iframeName = this.initData.iframeName;
		if(iframeName) {
			var iframe = $("iframe[name='" + iframeName + "']");
			this.appendMainContent(iframe);
		} else {
			var tpl = this.getTpl("common", "iframePanel");
			var html = this.renderTpl(tpl);
			this.fillMainContent(html);
			var iframe = this.find("iframe");
		}
		this.showMask();
		var _this = this;
		iframe.on("load", function() {
			_this.hideMask();
		});
		if(this.initData.url) {
			iframe[0].src = this.initData.url;
		}
		this.on("syncSize", function() {
			_this.find("iframe").height(_this.getBodyMain().height());
		});
		this.syncSize();
	},
	actionOpenInApp: function() {
		if(MainJS.isApp) {
			MainJS.openInApp(this.initData.url);
		} else {
			var _this = this;
			setTimeout(function() {
				MainJS.openLink(_this.initData.url);
			}, 100);
		}
		this.remove();
	},
	actionLocation: function() {
		window.location = this.initData.url;
	},
	actionMemberMenu: function() {
		var menus = {
			name: "会员中心"
		};
		this.setPageTitle(menus.name);
		if(!MainJS.checkLogin()) {
			MainJS.showLogout("请先登录", function() {
				MainJS.login();
			});
			return;
		}
		this.initPullDownRefresh();
		var _this = this;
		this.requestGet("/member-center/member-info", null, function(data) {
			var tpl = _this.getTpl("common", "menuArea");
			menus.childMenu = [{
				iconClass: "fa fa-user",
				name: MainJS.sysSetting.memberInfoText,
				url: "#module/member",
				login: "1",
				mode: "main"
			}, (MainJS.cfg.data.config.moneyBoxOpen == "1" ? {
				iconClass: "fa fa-cube",
				name: "保险箱 (<span class='txt-money'>¥<span class='money-box'>" + (data.money_box || "0.00") + "</span></span>)",
				url: "javascript:MainJS.showMoneyBox();",
				login: "1",
				mode: "main"
			} : null), {
				iconClass: "glyphicon glyphicon-usd",
				name: "资金流水",
				url: "#module/memberMoney",
				login: "1",
				mode: "main"
			}, {
				iconClass: "glyphicon glyphicon-list-alt",
				name: "注单查询",
				url: "#module/memberBet",
				login: "1",
				mode: "main"
			}, {
				iconClass: "fa fa-dashboard",
				name: "项目汇总",
				url: "#module/memberBet/action/count",
				login: "1",
				mode: "main"
			}, {
				iconClass: "fa fa-link",
				name: "我的推广",
				url: "#module/memberLevel",
				login: "1",
				mode: "main"
			}, {
				iconClass: "glyphicon glyphicon-bell",
				name: "消息中心",
				url: "#module/memberMessage",
				login: "1",
				mode: "main"
			}];
			if(MainJS.cfg.data.config.pointOpen == "1") {
				menus.childMenu.push({
					iconClass: "fa fa-money",
					name: "积分兑换",
					url: "#module/memberPoint",
					login: "1",
					mode: "main"
				});
			}
			var html = _this.renderTpl(tpl, {
				menus: menus,
				userInfo: data
			});
			_this.fillMainContent(html);
			_this.find(".menu-list a").click(function(e) {
				MainJS.checkClick(this, e);
			});
		});
	},
	actionMoneyMenu: function() {
		var menus = {
			name: "充值提现",
			childMenu: [{
				iconClass: "glyphicon glyphicon-piggy-bank",
				name: "在线存款",
				url: "#module/member/action/recharge",
				login: "1",
				mode: "main"
			}, {
				iconClass: "glyphicon glyphicon-new-window",
				name: "在线取款",
				url: "#module/member/action/draw",
				login: "1",
				mode: "main"
			}]
		};
		this.setPageTitle(menus.name);
		var tpl = this.getTpl("common", "menuArea");
		var html = this.renderTpl(tpl, {
			menus: menus
		});
		this.fillMainContent(html);
		this.find(".menu-list a").click(function(e) {
			MainJS.checkClick(this, e);
		});
	},
	actionDownload: function() {
		this.setPageTitle("客户端下载");
		var tpl = this.getTpl("common", "appQRCode");
		var html = this.renderTpl(tpl);
		this.fillMainContent(html);
	},
	actionMenuLink: function() {
		var menuType = this.initData.menu;
		var id = this.initData.id;
		var link = $("<a></a>");
		var menu = MainJS.cfg.data.config[menuType];
		var linkItem = null;
		if(menu) {
			$.each(menu, function(k, v) {
				if(id === v.id) {
					linkItem = v;
					return false;
				}
				if(v.sub) {
					$.each(v.sub, function(k1, v1) {
						if(id === v1.id) {
							linkItem = v1;
							return false;
						}
					});
				}
			});
		}
		if(linkItem) {
			link.data("item", linkItem);
			MainJS.checkClick(link[0]);
		}
		this.remove();
	},
	actionExchange: function() {
		var target = this.initData.target;
		var url = this.initData.url;
		this.requestGet("/member-exchange/balance/" + target, null, function(data) {
			var info = data[target];
			if(info >= 1 || info === "刷新重试!") {
				window.location = url;
			} else {
				var dialog = MainJS.showExchangeDialog(target, function() {
					window.location = url;
				});
				dialog.find(".modal-header .close").click(function() {
					window.close();
				});
			}
		}, {
			error: function() {
				window.location = url;
			}
		});
	},
	actionYouhuiDo: function() {
		this.setPageTitle("优惠活动");
		this.createBodyMainScrollbar = null;
		var _this = this;
		this.requestGet("/index/youhui", null, function(data) {
			var tpl = _this.getTpl("common", "youhui");
			var html = _this.renderTpl(tpl, {
				list: $.isArray(data) ? {
					items: data
				} : data
			});
			_this.fillMainContent(html);
			var btns = _this.find(".type-list .btn");
			btns.click(function() {
				var btn = $(this);
				var type = btn.data("type");
				btns.removeClass("btn-primary").addClass("btn-default");
				btn.addClass("btn-primary");
				if(type) {
					_this.find(".item-info[data-type='" + type + "']").show();
					_this.find(".item-info[data-type!='" + type + "']").hide();
				} else {
					_this.find(".item-info").show();
				}
			});
			if(data.bg) {
				$("html,body").css("background-color", data.bg);
			}
		});
		this.hideParentBottom();
		$("html").addClass("youhui");
		if(BaseJS.isAndroid || BaseJS.isIphone || BaseJS.isIpad) {
			$("html").addClass("mobile");
		}
		$(document.body).off("touchmove");
		MainJS.syncSize = function() {};
	},
	actionYouhui: function() {
		var baseUrl = window.location.href.split("#")[0];
		var url = baseUrl + (baseUrl.indexOf("?") >= 0 ? "&" : "?") + "viewport_width=1000#module/common/action/youhuiDo";
		if(MainJS.isApp) {
			window.history.back();
			setTimeout(function() {
				MainJS.openInApp(url, "优惠活动");
			}, 10);
		} else {
			window.location.replace(url);
		}
	},
	actionDzp: function() {
		this.setPageTitle("幸运转盘");
		var _this = this;
		this.requestGet("/member-dzp", null, function(data) {
			var tpl = _this.getTpl("common", "dzp");
			var html = _this.renderTpl(tpl, data);
			_this.fillMainContent(html);
			var dzpPoint = _this.find(".dzp-point");
			var dzpCount = _this.find(".dzp-count");
			dzpPoint.text(data.jf);
			dzpCount.text(Math.floor(data.jf / data.dzp.score));
			_this.find('.turnplate .pointer').click(function() {
				showConfirm("使用<span class='txt-important' style='padding:0 2px;'>" + data.dzp.score + "</span>积分兑换一次抽奖，是否确定继续抽奖？", function() {
					_this.requestGet("/member-dzp/rotate", null, function(result) {
						if(result.angle) {
							_this.find(".turnplate .pointer").css({
								transform: "rotate(0deg)"
							}).transition({
								rotate: result.angle + 1800
							}, 3000, "in-out", function() {
								showAlert("抽奖结果：" + result.goods);
							});
						} else {
							showAlert(result.goods);
						}
					}, {
						noMask: true,
						complete: function() {
							_this.requestGet("/member-dzp", null, function(data1) {
								data = data1;
								dzpPoint.text(data.jf);
								dzpCount.text(Math.floor(data.jf / data.dzp.score));
							}, {
								noMask: true
							});
						}
					});
				}, false, true);
			});
		});
	},
	startRedPacket: function(data) {
		var nowTime = Math.floor((new Date()).getTime() / 1000);
		var remainTime = data.endTime - nowTime;
		var timerArea = this.find(".timer-area");
		if(remainTime <= 0) {
			this.find(".main-info").text("活动已结束");
			timerArea.hide();
			return;
		}
		this.find(".main-info").text("剩余时间");
		var count = 0;
		var _this = this;
		var timer = window.setInterval(function() {
			if(count++ % 2 === 0) {
				remainTime--;
			}
			if(remainTime <= 0) {
				_this.find(".main-info").text("活动已结束");
				timerArea.hide();
				window.clearInterval(timer);
				return;
			}
			timerArea.html(_this.formatTimer(remainTime));
			_this.createRedPackect(timer);
		}, 500);
		_this.on("remove", function() {
			window.clearInterval(timer);
		});
	},
	actionRedPacket: function() {
		this.setPageTitle("抢红包");
		this.hideParentBottom();
		var _this = this;
		this.requestGet("/red-packet", null, function(data) {
			var tpl = _this.getTpl("common", "redPacket");
			var html = _this.renderTpl(tpl, data);
			if(data.bgImg) {
				_this.getBodyMain().css({
					"background": 'url("' + MainJS.getCdnImgUrl(data.bgImg) + '") no-repeat',
					"background-size": "100%"
				});
			} else {
				_this.getBody().addClass("normal");
			}
			_this.fillMainContent(html);
			_this.find(".rule-info").html(data.rules);
			var timerArea = _this.find(".timer-area");
			var nowTime = Math.floor((new Date()).getTime() / 1000);
			var waitStartTime = data.startTime - nowTime;
			if(waitStartTime > 0) {
				_this.find(".main-info").text("活动开始倒计时");
				var timer = window.setInterval(function() {
					if(waitStartTime-- <= 0) {
						_this.find(".main-info").text("剩余时间");
						window.clearInterval(timer);
						_this.startRedPacket(data);
						return;
					}
					timerArea.html(_this.formatTimer(waitStartTime));
				}, 1000);
				_this.on("remove", function() {
					window.clearInterval(timer);
				});
				return;
			}
			_this.startRedPacket(data);
		});
	},
	createRedPackect: function(timer) {
		var img = $('<img src="' + MainJS.getCdnImgUrl(MainJS.staticPath + '/images/hb.png') + '" style="width:80px;cursor:pointer;" />');
		img.appendTo(this.find(".module-main .main-container"));
		var flag = Math.random() * 2 > 1 ? 1 : -1;
		img.css({
			position: "fixed",
			left: Math.random() * ($(window).width() - 130) + "px",
			top: "10px",
			transform: "rotate(" + Math.floor(Math.random() * 60 * flag) + "deg)"
		});
		img.transition({
			top: $(window).height() + "px",
			rotate: Math.floor(Math.random() * 120 * flag)
		}, 3000, "in-out", function() {
			img.remove();
		});
		var _this = this;
		img.click(function() {
			_this.requestGet("/red-packet/open", null, function(data) {
				if(data.status == "0" && data.money) {
					var dialog = MainJS.showDialog({
						title: "",
						containerClass: "show-money-dialog",
						content: '<div class="show-money"><p>¥' + data.money + '</p><button class="btn btn-warning confirm-btn">确定</button></div>',
						onInit: function(dialog) {
							dialog.createBodyMainScrollbar = null;
							dialog.find(".confirm-btn").click(function() {
								dialog.remove();
							});
						}
					});
					var container = dialog.getDialogContainer();
					container.transition({
						"padding-top": "0"
					}, 200, "in-out", function() {
						container.transition({
							"padding-top": "30px"
						}, 200, "in-out");
					});
					var myjf = _this.find(".myjf");
					var jf = Number(myjf.text());
					if(jf > 0) {
						myjf.text(jf - Number(_this.find(".jfneed").text()));
					}
				}
				if(data.status == "1") {
					showAlert(data.message);
				}
				if(data.status == "2") {
					showAlert(data.message);
					_this.find(".main-info").text("活动已结束");
					_this.find(".timer-area").hide();
					window.clearInterval(timer);
				}
			});
		});
	},
	formatTimer: function(seconds) {
		var day = Math.floor(seconds / (3600 * 24));
		var remain = seconds % (3600 * 24);
		var timezoneOffset = (new Date()).getTimezoneOffset();
		return(day > 0 ? ("<b>" + (day < 10 ? ("0" + day) : day) + "</b>" + "天") : "<b>00</b>天") + BaseJS.formatDate(remain * 1000 + timezoneOffset * 60 * 1000, "<b>HH</b>小时<b>mm</b>分<b>ss</b>秒");
	}
});;
BaseJS.addModuleClass("Game", {
	init: function() {
		this.initData.source = this.initData.source || "hb";
		this.renderBody("game");
	},
	actionIndex: function() {
		if(this.initData.app) {
			var _this = this;
			this.requestGet("/" + this.initData.app + "/app", null, function(data) {
				_this.openApp(data);
			});
			return;
		}
		this.currentTitle = "全部游戏";
		this.setPageTitle(this.currentTitle);
		this.currentGameType = "all";
		this.currentGameIndex = 0;
		this.games = [];
		this.typeGames = [];
		this.openMode = null;
		var _this = this;
		this.requestGet("/" + this.initData.source + "/game", null, function(data) {
			_this.games = data.games || [];
			_this.typeGames = _this.games;
			_this.openMode = data.mode;
			_this.getGameList();
			_this.initMenu(data.types);
			var gameInput = _this.find(".search-bar input[name='game']");
			var closeArea = _this.find(".search-bar .close-area");
			closeArea.click(function() {
				gameInput.val("");
				gameInput.change();
				closeArea.hide();
			});
			gameInput.on("input change", function() {
				_this.currentTitle = "全部游戏";
				_this.currentGameType = "all";
				_this.setPageTitle(this.value ? (_this.currentTitle + " - 搜索结果") : _this.currentTitle);
				_this.getGameList(_this.currentGameType, this.value);
				if(this.value) {
					closeArea.show();
				} else {
					closeArea.hide();
				}
			});
		});
		this.getBodyMain().on("click", ".game-item a", function() {
			if($(this).data("item")) {
				MainJS.checkClick(this);
				return;
			}
			var url = this.href;
			MainJS.openWin(url, $.trim($(this).find(".game-name").text()), {
				orientation: "h"
			});
			return false;
		});
		this.getPullUpHandler = function() {
			if(!this.pullUpHandler) {
				this.pullUpHandler = function() {
					_this.getGameList();
				};
			}
			return this.pullUpHandler;
		};
	},
	openApp: function(data) {
		this.setPageTitle(data.gameName);
		if(!BaseJS.isIphone && !BaseJS.isIpad && !BaseJS.isAndroid) {
			showAlert("该游戏暂不支持您使用的操作系统", function() {
				MainJS.goBack();
			});
			return;
		}
		var tpl = this.getTpl("game", "openApp");
		var app = (BaseJS.isIphone || BaseJS.isIpad) ? data.IOS : data.Android;
		var html = this.renderTpl(tpl, {
			downloadUrl: data.Download,
			app: app,
			notice: this.getAppNotice(this.initData.app)
		});
		this.fillMainContent(html);
		window.location = app;
	},
	getAppNotice: function(app) {
		var notices = {
			ab: "提示：请先安装欧博APP，安装成功后，点击下方“启动游戏”按钮启动游戏，暂无法通过欧博APP直接登录账号游戏！"
		};
		return notices[app] || "";
	},
	getGameList: function(type, searchName) {
		var mainContainer = this.find(".main-container");
		var pullUp = this.find(".pull-up");
		var _this = this;
		if((type && this.currentGameType !== type) || this.currentSearch !== searchName) {
			this.currentGameType = type || this.currentGameType;
			this.currentSearch = searchName;
			this.currentGameIndex = 0;
			mainContainer.empty();
			pullUp.show();
			this.typeGames = [];
			if(this.currentGameType === "all") {
				this.typeGames = this.games;
			} else {
				$.each(this.games, function(k, v) {
					if(v.gameType == _this.currentGameType) {
						_this.typeGames.push(v);
					}
				});
			}
			if(this.currentSearch) {
				var searchGames = [];
				$.each(this.typeGames, function(k, v) {
					if(v.gameName.indexOf(_this.currentSearch) >= 0) {
						searchGames.push(v);
					}
				});
				this.typeGames = searchGames;
			}
		}
		if(this.typeGames.length === 0) {
			mainContainer.html('<div class="no-result">没有相关游戏</div>');
			pullUp.hide();
			return;
		}
		var showGames = [];
		$.each(this.typeGames, function(k, v) {
			if(k >= _this.currentGameIndex) {
				if(_this.openMode && !v.openMode) {
					v.openMode = $.extend({
						name: v.gameName,
						url: v.playUrl
					}, _this.openMode);
				}
				showGames.push(v);
				_this.currentGameIndex++;
			}
			if(showGames.length >= 24) {
				return false;
			}
		});
		if(showGames.length > 0) {
			var tpl = _this.getTpl("game", "list");
			var html = _this.renderTpl(tpl, {
				itemList: showGames
			});
			mainContainer.append(html);
			if(this.currentGameIndex >= this.typeGames.length) {
				mainContainer.append('<div class="no-result">已没有更多</div>');
				pullUp.hide();
			}
		}
	},
	initMenu: function(menuItems) {
		menuItems = menuItems || [];
		var tpl = this.getTpl("game", "dropMenu");
		var html = this.renderTpl(tpl, {
			menuItems: menuItems
		});
		var dropdownMenu = this.find(".main-menu-btn .dropdown-menu .menu-body");
		dropdownMenu.html(html);
		var _this = this;
		dropdownMenu.find("li>a").click(function() {
			var menuItem = $(this);
			var type = menuItem.data("type");
			_this.currentTitle = menuItem.text();
			_this.setPageTitle(_this.currentTitle);
			_this.find(".search-bar input[name='game']").val("");
			_this.find(".search-bar .close-area").hide();
			_this.currentSearch = "";
			_this.getGameList(type);
		});
	}
});;
BaseJS.addModuleClass("Member", {
	init: function() {
		this.renderBody("member");
	},
	actionIndex: function() {
		this.setPageTitle(MainJS.sysSetting.memberInfoText);
		this.initPullDownRefresh();
		var url = "/member-center/member-info";
		var _this = this;
		this.requestGet(url, null, function(data) {
			var tpl = _this.getTpl("member", "mainIndex");
			var html = _this.renderTpl(tpl, {
				info: data
			});
			_this.fillMainContent(html);
			_this.find(".bank-btn").click(function() {
				MainJS.openModule("member", {
					action: "bank"
				});
			});
		});
	},
	actionBank: function() {
		this.setPageTitle(this.initData.type === "complete" ? "完善资料" : "绑定银行");
		var tpl = this.getTpl("member", "bank");
		var _this = this;
		this.requestGet("/member-center/member-info", null, function(data) {
			if(data.realname && data.bank && data.bank_account) {
				showAlert("您的个人信息已完善，无需再填写。", function() {
					window.history.back();
				});
				return;
			}
			var html = _this.renderTpl(tpl, {
				memberInfo: data
			});
			_this.fillMainContent(html);
			_this.find(".submit-btn").click(function() {
				var bank = _this.find("[name='bank']").val();
				var bankAccount = _this.find("[name='bank_account']").val();
				var realname = _this.find("[name='realname']").val();
				if(!realname) {
					showAlert("请输入真实姓名", function() {
						_this.find("[name='realname']").focus();
					});
					return;
				}
				if(!bank) {
					showAlert("请输入开户银行", function() {
						_this.find("[name='bank']").focus();
					});
					return;
				}
				if(!bankAccount) {
					showAlert("请输入银行账号", function() {
						_this.find("[name='bank_account']").focus();
					});
					return;
				}
				_this.requestPost("/member-center/addinfo", {
					bank: bank,
					bank_account: bankAccount,
					realname: realname
				});
			});
		});
	},
	actionPassword: function() {
		this.setPageTitle("修改密码");
		var tpl = this.getTpl("member", "password");
		var html = this.renderTpl(tpl);
		this.fillMainContent(html);
		var _this = this;
		this.find(".submit-btn").click(function() {
			var oldpassword = _this.find("[name='oldpassword']").val();
			var password = _this.find("[name='password']").val();
			var repassword = _this.find("[name='repassword']").val();
			if(!oldpassword) {
				showAlert("请输入旧密码", function() {
					_this.find("[name='oldpassword']").focus();
				});
				return;
			}
			if(!password) {
				showAlert("请输入新密码", function() {
					_this.find("[name='password']").focus();
				});
				return;
			}
			var newpasswordlenght = password.length;
			if(newpasswordlenght < 6 || newpasswordlenght > 20) {
				showAlert("新密码在6-20个字符之间", function() {
					_this.find("[name='password']").focus();
				});
				return;
			}
			if(!repassword) {
				showAlert("请输入确认新密码", function() {
					_this.find("[name='repassword']").focus();
				});
				return;
			}
			if(password != repassword) {
				showAlert("两次输入的新密码不一致", function() {
					_this.find("[name='repassword']").focus();
				});
				return;
			}
			_this.requestPost("/member-center/password", {
				oldpassword: oldpassword,
				password: password,
				repassword: repassword
			});
		});
	},
	actionQkmm: function() {
		this.setPageTitle("修改密码");
		var _this = this;
		this.requestGet("/member-center/member-info", null, function(data) {
			if(data.isSetqkmm != "1") {
				_this.find(".qkmm-tab-title").text("设置取款密码");
			}
			var tpl = _this.getTpl("member", "qkmm");
			var html = _this.renderTpl(tpl, {
				memberInfo: data
			});
			_this.fillMainContent(html);
			_this.find(".submit-btn").click(function() {
				var oldpasswordInput = _this.find("[name='oldpassword']");
				var hasOld = oldpasswordInput.length > 0 ? true : false;
				var oldpassword = oldpasswordInput.val();
				var qkmm = _this.find("[name='qkmm']").val();
				var reqkmm = _this.find("[name='reqkmm']").val();
				if(hasOld && !oldpassword) {
					showAlert("请输入旧密码", function() {
						_this.find("[name='oldpassword']").focus();
					});
					return;
				}
				if(!qkmm) {
					showAlert("请输入" + (hasOld ? "新" : "") + "密码", function() {
						_this.find("[name='qkmm']").focus();
					});
					return;
				}
				var newqkmmlenght = qkmm.length;
				if(newqkmmlenght < 6 || newqkmmlenght > 20) {
					showAlert((hasOld ? "新" : "") + "密码在6-20个字符之间", function() {
						_this.find("[name='qkmm']").focus();
					});
					return;
				}
				if(!reqkmm) {
					showAlert("请输入确认" + (hasOld ? "新" : "") + "密码", function() {
						_this.find("[name='reqkmm']").focus();
					});
					return;
				}
				if(qkmm != reqkmm) {
					showAlert("两次输入的" + (hasOld ? "新" : "") + "密码不一致", function() {
						_this.find("[name='reqkmm']").focus();
					});
					return;
				}
				var sendData = {
					qkmm: qkmm,
					reqkmm: reqkmm
				};
				if(hasOld) {
					sendData.oldpassword = oldpassword;
				}
				_this.requestPost("/member-center/qkmm", sendData);
			});
		});
	},
	actionDraw: function() {
		this.setPageTitle("在线取款");
		var _this = this;
		this.requestGet("/member-center/draw", null, function(data) {
			var tpl = _this.getTpl("member", "draw");
			var html = _this.renderTpl(tpl, {
				drawData: data
			});
			_this.fillMainContent(html);
			_this.find(".back-all-btn").click(function() {
				_this.requestGet("member-exchange/back-all", null, function(data) {
					_this.find("[name='money']").val(data.money || "0.00");
				});
			});
			_this.find(".submit-btn").click(function() {
				var bankInput = _this.find("[name='bank']");
				var bank = bankInput.val();
				var bankAccountInput = _this.find("[name='bank_account']");
				var bankAccount = bankAccountInput.val();
				var amountInput = _this.find("[name='amount']");
				var amount = Number(amountInput.val());
				var qkmmInput = _this.find("[name='qkmm']");
				var qkmm = qkmmInput.val();
				if(data.dmlDrawOpen == 0 && data.sum < data.dml) {
					showAlert("打码量不足，还需打码量：" + (data.dml - data.sum));
					return;
				}
				if(!bank) {
					showAlert("请输入开户银行", function() {
						bankInput.focus();
					});
					return;
				}
				if(!bankAccount) {
					showAlert("请输入银行账号", function() {
						bankAccountInput.focus();
					});
					return;
				}
				if(!$.isNumeric(amount) || amount <= 0) {
					showAlert("请输入正确的提款金额", function() {
						amountInput.focus();
					});
					return;
				}
				var minAmount = Number(data.drawMinAmount);
				if(amount < minAmount) {
					showAlert("提款金额不能低于" + minAmount + "元", function() {
						amountInput.focus();
					});
					return;
				}
				if(/\./.test(amount)) {
					showAlert("请输入整数金额", function() {
						amountInput.focus();
					});
					return;
				}
				if(amount > Number(_this.find("input.money").val())) {
					showAlert("提款金额不能超过可用余额", function() {
						amountInput.focus();
					});
					return;
				}
				if(!qkmm) {
					showAlert("请输入提款密码", function() {
						qkmmInput.focus();
					});
					return;
				}
				var drawNumber = data.number || 0;
				var doDraw = function() {
					_this.requestPost("/member-center/draw", {
						bank: bank,
						bank_account: bankAccount,
						amount: amount,
						qkmm: qkmm
					});
				};
				if(data.drawMaxOn == "1" && Number(drawNumber) >= Number(data.drawMax)) {
					var fee = amount * Number(data.drawMaxSXF) / 100;
					showConfirm("您已用完今日<span class='info-warning'>" + data.drawMax + "</span>次免费提款机会，本次提款将收取额外手续费。<br />手续费：<span class='txt-money'>" + BaseJS.formatMoney(fee) + "</span>元<br />行政费用：<span class='txt-money'>" + BaseJS.formatMoney(Number(data.drawMaxXZF)) + "</span>元<br />实际提款金额：<span class='txt-money'>" + BaseJS.formatMoney(amount - fee - Number(data.drawMaxXZF)) + "</span>元", function() {
						doDraw();
					}, false, true);
					return;
				}
				doDraw();
			});
		});
	},
	actionRecharge: function() {
		this.setPageTitle("选择存款方式");
		var tpl = this.getTpl("member", "recharge");
		var html = this.renderTpl(tpl);
		this.fillMainContent(html);
	},
	actionRechargeBank: function() {
		var _this = this;
		this.requestGet("/member-center/recharge/company?step=1", null, function(data) {
			var rechargeInfoList = data.banks || [];
			if(rechargeInfoList.length === 1) {
				MainJS.createModule("member", $.extend({
					action: "doRechargeBank",
					bankMinAmount: data.amountLimit.bankMinAmount,
					bankMaxAmount: data.amountLimit.bankMaxAmount,
					desc: data.desc
				}, rechargeInfoList[0]));
				return;
			}
			_this.setPageTitle("选择银行账号");
			var tpl = _this.getTpl("member", "rechargeBank");
			var html = _this.renderTpl(tpl, {
				rechargeInfoList: rechargeInfoList
			});
			_this.fillMainContent(html);
			_this.find(".recharge-item").click(function() {
				var info = rechargeInfoList[$(this).data("index")];
				MainJS.setLocationHash(MainJS.getLocationHash().replace(/\/step\/next$/, "") + "/step/next", false, true);
				MainJS.createModule("member", $.extend({
					action: "doRechargeBank",
					bankMinAmount: data.amountLimit.bankMinAmount,
					bankMaxAmount: data.amountLimit.bankMaxAmount,
					desc: data.desc
				}, info));
			});
		});
	},
	actionDoRechargeBank: function() {
		this.setPageTitle("填写存款信息");
		var tpl = this.getTpl("member", "doRechargeBank");
		var html = this.renderTpl(tpl, {
			rtime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd"),
			desc: this.initData.desc
		});
		this.fillMainContent(html);
		this.copyInfoInit();
		var _this = this;
		this.find(".submit-btn").click(function() {
			var realnameInput = _this.find("[name='realname']");
			var accountInput = _this.find("[name='account']");
			var amountInput = _this.find("[name='amount']");
			var rtimeInput = _this.find("[name='rtime']");
			var realname = realnameInput.val();
			var account = accountInput.val();
			var amount = amountInput.val();
			var rtime = rtimeInput.val();
			if(!realname) {
				showAlert("请输入存款人姓名", function() {
					realnameInput.focus();
				});
				return;
			}
			if(!account) {
				showAlert("请输入支付账号", function() {
					accountInput.focus();
				});
				return;
			}
			if(!$.isNumeric(amount) || amount <= 0) {
				showAlert("请输入正确的存款金额", function() {
					amountInput.focus();
				});
				return;
			}
			var min = Number(_this.initData.bankMinAmount);
			if(min > 0 && amount < min) {
				showAlert("存款金额不能低于" + min + "元", function() {
					amountInput.focus();
				});
				return;
			}
			var max = Number(_this.initData.bankMaxAmount);
			if(max > 0 && amount > max) {
				showAlert("存款金额不能超过" + max + "元", function() {
					amountInput.focus();
				});
				return;
			}
			if(!rtime) {
				showAlert("存款时间不能为空", function() {
					rtimeInput.focus();
				});
				return;
			}
			_this.requestPost("/member-center/recharge/company?step=2", {
				bank_id: _this.initData.bid2,
				realname: realname,
				account: account,
				amount: amount,
				rtime: rtime,
				way: _this.find("[name='way']").val(),
				wantGift: _this.find("[name='wantGift']").val()
			});
		});
	},
	actionRechargeWeixin: function() {
		this.setPageTitle("微信转账");
		this.rechargeThirdParty("weixin");
	},
	actionRechargeAlipay: function() {
		this.setPageTitle("支付宝转账");
		this.rechargeThirdParty("alipay");
	},
	actionRechargeTenpay: function() {
		this.setPageTitle("财付通转账");
		this.rechargeThirdParty("tenpay");
	},
	actionRechargeEpay: function() {
		this.setPageTitle("在线支付");
		this.rechargeThirdParty("epay");
	},
	actionRechargeQqpay: function() {
		this.setPageTitle("QQ钱包");
		this.rechargeThirdParty("qqpay");
	},
	actionRechargeYjpay: function() {
		this.setPageTitle("网银快捷支付");
		this.rechargeThirdParty("yjpay");
	},
	actionRechargeJdpay: function() {
		this.setPageTitle("京东钱包");
		this.rechargeThirdParty("jdpay");
	},
	actionRechargeBdpay: function() {
		this.setPageTitle("百度钱包");
		this.rechargeThirdParty("bdpay");
	},
	actionRechargeYlpay: function() {
		this.setPageTitle("银联扫码");
		this.rechargeThirdParty("ylpay");
	},
	actionRechargeYsfpay: function() {
		this.setPageTitle("云闪付");
		this.rechargeThirdParty("ysfpay");
	},
	actionWaitTransfer: function() {
		this.setPageTitle("等待转账");
		var tpl = this.getTpl("member", "waitTransfer");
		var html = this.renderTpl(tpl);
		this.fillMainContent(html);
		this.find(".goBtn").click(function() {
			MainJS.goToMemberInfo();
		});
	},
	selectAccount: function(channelList) {
		var oldTitle = document.title;
		this.setPageTitle("请选择收款账号");
		var tpl = this.getTpl("member", "selectAccount");
		var html = this.renderTpl(tpl, {
			channelList: channelList
		});
		this.fillMainContent(html);
		var _this = this;
		this.find(".recharge-item").click(function() {
			_this.setPageTitle(oldTitle);
			var info = channelList[$(this).data("index")];
			MainJS.setLocationHash(MainJS.getLocationHash().replace(/\/step\/next$/, "") + "/step/next", false, true);
			_this.showRechargePage(info.type, info, info.desc);
		});
	},
	showRechargePage: function(payment, data, desc) {
		var channelList = [];
		if(data.ch1) {
			channelList.push(data.ch1);
		}
		if(data.ch2) {
			channelList.push(data.ch2);
		}
		if(data.ch3) {
			channelList.push(data.ch3);
		}
		if(data.ch4) {
			channelList.push(data.ch4);
		}
		if(data.ch5) {
			channelList.push(data.ch5);
		}
		if(channelList.length === 1) {
			data = channelList[0];
			payment = data.type;
			desc = data.desc;
		} else if(channelList.length > 1) {
			this.selectAccount(channelList);
			return;
		}
		var tpl = this.getTpl("member", "doRecharge");
		var html = this.renderTpl(tpl, {
			rechargeInfo: data,
			rtime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd"),
			payment: payment,
			desc: desc
		});
		this.fillMainContent(html);
		this.copyInfoInit();
		var _this = this;
		this.find(".submit-btn").click(function() {
			var realnameInput = _this.find("[name='realname']");
			var amountInput = _this.find("[name='amount']");
			var rtimeInput = _this.find("[name='rtime']");
			var accountInput = _this.find("[name='account']");
			var realname = realnameInput.val();
			var amount = amountInput.val();
			var rtime = rtimeInput.val();
			var account = accountInput.val();
			if(!realname) {
				showAlert("请输入支付户名", function() {
					realnameInput.focus();
				});
				return;
			}
			if(accountInput.length > 0) {
				if(!account) {
					showAlert("请输入支付账号", function() {
						accountInput.focus();
					});
					return;
				}
			}
			if(!$.isNumeric(amount) || amount <= 0) {
				showAlert("请输入正确的存款金额", function() {
					amountInput.focus();
				});
				return;
			}
			var min = Number(data.min);
			if(min > 0 && amount < min) {
				showAlert("存款金额不能低于" + min + "元", function() {
					amountInput.focus();
				});
				return;
			}
			var max = Number(data.max);
			if(max > 0 && amount > max) {
				showAlert("存款金额不能超过" + max + "元", function() {
					amountInput.focus();
				});
				return;
			}
			if(!rtime) {
				showAlert("存款时间不能为空", function() {
					rtimeInput.focus();
				});
				return;
			}
			_this.requestPost("/member-center/payment/" + payment, {
				realname: realname,
				account: account,
				amount: amount,
				rtime: rtime,
				wantGift: _this.find("[name='wantGift']").val(),
				wayId: _this.find("[name='wayId']").val()
			});
		});
	},
	showRechargeThirdParty: function(type, payment, desc, channelId) {
		if(MainJS.isApp) {
			this.hideParentBottom();
		}
		var channelList = [];
		if(payment.wap1) {
			channelList.push({
				id: "wap1",
				name: "通道一"
			});
		}
		if(payment.wap2) {
			channelList.push({
				id: "wap2",
				name: "通道二"
			});
		}
		if(payment.wap3) {
			channelList.push({
				id: "wap3",
				name: "通道三"
			});
		}
		if(payment.wap4) {
			channelList.push({
				id: "wap4",
				name: "通道四"
			});
		}
		if(payment.wap5) {
			channelList.push({
				id: "wap5",
				name: "通道五"
			});
		}
		channelId = channelId || (channelList.length > 0 ? channelList[0].id : "");
		var tpl = this.getTpl("member", channelList.length > 0 ? "rechargeThirdPartyChannel" : "rechargeThirdParty");
		var html = this.renderTpl(tpl, {
			payment: payment,
			type: type,
			desc: desc,
			channelId: channelId,
			channelList: channelList
		});
		this.fillMainContent(html);
		var _this = this;
		if(channelList.length > 0) {
			this.find(".select-item").click(function() {
				_this.showRechargeThirdParty(type, payment, desc, $(this).data("channel"));
			});
		}
		this.find(".submit-btn").click(function() {
			var amountInput = _this.find("[name='amount']");
			var amount = amountInput.val();
			if(!$.isNumeric(amount) || amount <= 0) {
				showAlert("请输入正确的存款金额", function() {
					amountInput.focus();
				});
				return;
			}
			if(/\./.test(amount)) {
				showAlert(amountInput.is(":hidden") ? "存款金额只能为整数" : "请输入整数的存款金额", function() {
					amountInput.focus();
				});
				return;
			}
			var min = Number(channelId ? payment[channelId].payMinAmount : payment.payMinAmount);
			if(min > 0 && amount < min) {
				showAlert("存款金额不能低于" + min + "元", function() {
					amountInput.focus();
				});
				return;
			}
			var max = Number(channelId ? payment[channelId].payMaxAmount : payment.payMaxAmount);
			if(max > 0 && amount > max) {
				showAlert("存款金额不能超过" + max + "元", function() {
					amountInput.focus();
				});
				return;
			}
			var rechargeForm = _this.find("form.recharge");
			_this.showMask();
			if(!MainJS.isApp && window.navigator.platform === "Linux i686") {
				var form = {
					action: rechargeForm[0].action,
					data: rechargeForm.serializeArray(),
					method: rechargeForm[0].method
				};
				var appDownload = MainJS.cfg.data.appDownload;
				var urlInfo = appDownload.replace("https://", "http://").split("/");
				var hostInfo = [urlInfo[0], urlInfo[1], urlInfo[2]];
				var baseUrl = hostInfo.join("/");
				var requestUrl = baseUrl + "/page.html#title/" + encodeURIComponent(document.title) + "/back/" + encodeURIComponent(window.location.origin + '/#module/member/action/recharge') + "/form/" + encodeURIComponent(JSON.stringify(form));
				window.location = requestUrl;
			} else {
				if(_this.sysCfg.isTransformNewWin) {
					if(BaseJS.isAndroid) {
						var winName = _this.id + "-pay";
						window.open("", winName);
						rechargeForm[0].target = winName;
					} else {
						rechargeForm[0].target = "_blank";
						if(window.navigator.userAgent.toLowerCase().indexOf("qqbrowser") >= 0) {
							rechargeForm[0].method = "get";
						}
					}
					setTimeout(function() {
						_this.hideMask();
						MainJS.createModule("member", {
							action: "waitTransfer"
						});
					}, 6000);
				}
				rechargeForm[0].submit();
			}
		});
	},
	actionLocationRequest: function() {
		$(document.body).hide();
		var requestData = JSON.parse(this.initData.requestData);
		var form = $('<form></form>');
		form[0].action = requestData.action;
		form[0].method = requestData.method;
		$.each(requestData.data, function(i, v) {
			var input = $('<input type="hidden" />');
			input[0].name = v.name;
			input[0].value = v.value;
			form.append(input);
		});
		form.appendTo(document.body);
		form[0].submit();
	},
	openInApp: function(type, paymentItem) {
		var baseUrl = window.location.href.split("#")[0];
		var infoStr = "#module/member";
		$.each({
			action: "showRechargeItem",
			type: type,
			title: document.title,
			payWay: paymentItem.type,
			paymentItem: JSON.stringify(paymentItem),
			noPageTitle: "1"
		}, function(key, val) {
			infoStr += "/" + encodeURIComponent(key) + "/" + encodeURIComponent(val);
		});
		var url = baseUrl + infoStr;
		MainJS.openInApp(url, document.title);
	},
	showRechargeAllList: function(type, paymentList) {
		var tpl = this.getTpl("member", "rechargeAllList");
		var html = this.renderTpl(tpl, {
			rechargeInfoList: paymentList || [],
			type: type
		});
		this.fillMainContent(html);
		var _this = this;
		MainJS._memberShowRechargeItemData = {};
		this.find(".recharge-item").click(function() {
			var paymentItem = paymentList[$(this).data("index")];
			if(paymentItem.type === "way3" && MainJS.isApp) {
				_this.openInApp(type, paymentItem);
			} else {
				MainJS._memberShowRechargeItemData = {
					title: document.title,
					paymentItem: JSON.stringify(paymentItem)
				};
				MainJS.openModule("member", {
					action: "showRechargeItem",
					type: type,
					ptype: paymentItem.type
				});
			}
		});
	},
	actionShowRechargeItem: function() {
		var type = this.initData.type;
		MainJS._memberShowRechargeItemData = MainJS._memberShowRechargeItemData || {};
		var paymentItem = this.initData.paymentItem || MainJS._memberShowRechargeItemData.paymentItem;
		var title = this.initData.title || MainJS._memberShowRechargeItemData.title;
		if(!title || !paymentItem) {
			var rechargeType = type.replace(/^(\w)/, function(v) {
				return v.toUpperCase();
			});
			MainJS.setLocationHash("module/member/action/recharge" + rechargeType, true);
			return;
		}
		this.setPageTitle(title);
		var paymentItem = JSON.parse(paymentItem);
		if(paymentItem.type === "way1") {
			this.showRechargePage(type, paymentItem.payment, paymentItem.desc);
		} else {
			this.rechargeThirdParty(type, paymentItem.payment, paymentItem.desc);
		}
	},
	rechargeThirdParty: function(type, payment, desc) {
		var _this = this;
		if(payment) {
			this.showRechargeThirdParty(type, payment, desc);
		} else {
			this.requestGet((type === "epay" ? "/member-center/" : "/member-center/payment/") + type, null, function(data) {
				var paymentList = [];
				if(data["way1"]) {
					if($.isArray(data["way1"])) {
						$.each(data["way1"], function(k, v) {
							paymentList.push({
								type: "way1",
								payment: v,
								desc: v.desc
							});
						});
					} else {
						paymentList.push({
							type: "way1",
							payment: data["way1"],
							desc: data["way1"].desc
						});
					}
				}
				if(data["way3"]) {
					if($.isArray(data["way3"])) {
						$.each(data["way3"], function(k, v) {
							paymentList.push({
								type: "way3",
								payment: v,
								desc: v.desc
							});
						});
					} else {
						paymentList.push({
							type: "way3",
							payment: data["way3"],
							desc: data["way3"].desc
						});
					}
				}
				if(data["epay"]) {
					paymentList.push({
						type: "epay",
						payment: data["epay"],
						desc: data.desc
					});
				}
				if(paymentList.length > 1) {
					_this.showRechargeAllList(type, paymentList);
					return;
				}
				var paymentItem = paymentList[0];
				if(paymentItem.type === "way1") {
					_this.showRechargePage(type, paymentItem.payment, paymentItem.desc);
				} else {
					if(MainJS.isApp) {
						_this.openInApp(type, paymentItem);
						window.history.back();
					} else {
						_this.rechargeThirdParty(type, paymentItem.payment, paymentItem.desc);
					}
				}
			});
		}
	},
	actionLogin: function() {
		this.setPageTitle("用户登录");
		this.hideParentBottom();
		if(window.plus) {
			plus.navigator.setStatusBarBackground(MainJS.getThemeColor(0.5));
		}
		this.on("remove", function() {
			if(window.plus) {
				plus.navigator.setStatusBarBackground(MainJS.getThemeColor(0.7));
			}
			if(MainJS.layoutCfg.bodyBottom) {
				MainJS.layoutCfg.bodyBottom.show();
			} else {
				MainJS.initMenu();
			}
			MainJS.syncSize();
		});
		var tpl = this.getTpl("member", "login");
		var loginUserListJson = localStorage.getItem("JSBaseLoginUserList");
		var loginUserList = null;
		if(loginUserListJson) {
			if(!MainJS.isApp) {
				localStorage.removeItem("JSBaseLoginUserList");
				loginUserList = [];
			} else {
				loginUserList = JSON.parse(loginUserListJson);
			}
		} else {
			loginUserList = [];
		}
		var html = this.renderTpl(tpl, {
			loginUserList: loginUserList
		});
		this.fillMainContent(html);
		var submitBtn = this.find(".submit-btn");
		var usernameInput = this.find("[name='username']");
		var passwordInput = this.find("[name='password']");
		var gestureInput = this.find("[name='gesture']");
		var _this = this;
		submitBtn.click(function() {
			var username = usernameInput.val();
			var password = passwordInput.val();
			if(!username) {
				showAlert("用户名不能为空", function() {
					usernameInput.focus();
				});
				return;
			}
			if(!password) {
				showAlert("密码不能为空", function() {
					passwordInput.focus();
				});
				return;
			}
			_this.requestPost("/index/login", {
				username: username,
				password: password
			}, function(data) {
				showSuccess("登录成功", function() {
					MainJS.setLoginUser(data.user, false, function() {
						MainJS.goBack();
					});
				});
				if(MainJS.isApp) {
					_this.setLoginMethodInfo(username, 0);
				}
			});
		});
		if(MainJS.isApp) {
			this.find(".login-menu .close").click(function() {
				var item = $(this).closest(".list-group-item");
				var list = item.closest(".list-group");
				var username = item.data("username");
				_this.setLoginMethodInfo(username, null, true);
				item.remove();
				if(list.find(".list-group-item").length < 1) {
					list.remove();
				}
				return false;
			});
			var isInitLockArea = false;
			gestureInput.change(function() {
				var lockArea = _this.find("#" + _this.id + "-lock-area");
				var passwordArea = _this.find(".password-area");
				if(this.checked) {
					passwordArea.hide();
					submitBtn.hide();
					lockArea.show();
					if(!isInitLockArea) {
						lockArea.GesturePasswd({
							backgroundColor: "transparent",
							color: "#fff",
							width: 240,
							height: 240
						}).on("touchstart mousemove", function(e) {
							usernameInput.blur();
							e.preventDefault();
							e.stopPropagation();
						}).on("hasPasswd", function(e, passwd) {
							var username = usernameInput.val();
							if(!username) {
								showAlert("用户名不能为空", function() {
									usernameInput.focus();
								});
								lockArea.trigger("passwdWrong");
								return;
							}
							if(passwd.length < 3) {
								MainJS.showTip("绘制点数不够");
								lockArea.trigger("passwdWrong");
								return;
							}
							passwordInput.val(passwd);
							_this.find(".btnCrypt").click();
							_this.requestPost("/index/login", {
								username: username,
								password: passwordInput.val(),
								type: "hand"
							}, function(data) {
								lockArea.trigger("passwdRight");
								showSuccess("登录成功", function() {
									MainJS.setLoginUser(data.user, false, function() {
										MainJS.goBack();
									});
								});
								_this.setLoginMethodInfo(username, 1);
							}, {
								errorHandler: function() {
									lockArea.trigger("passwdWrong");
								},
								errorDialogHandler: function() {
									lockArea.trigger("passwdWrong");
								}
							});
							passwordInput.val("");
						});
						isInitLockArea = true;
					}
				} else {
					lockArea.hide();
					passwordArea.show();
					submitBtn.show();
				}
			});
			this.find(".login-menu .list-group-item").click(function() {
				var item = $(this);
				usernameInput.val(item.data("username"));
				passwordInput.val(item.data(""));
				gestureInput[0].checked = item.data("gesture") == 1;
				gestureInput.trigger("change");
			});
			this.find(".login-menu .list-group-item:first").click();
		}
	},
	setLoginMethodInfo: function(username, gesture, isRemove) {
		var loginUserListJson = localStorage.getItem("JSBaseLoginUserList");
		var loginUserList = null;
		if(loginUserListJson) {
			loginUserList = JSON.parse(loginUserListJson);
		} else {
			loginUserList = [];
		}
		if(loginUserList.length > 0) {
			$.each(loginUserList, function(k, v) {
				if(v.username === username) {
					loginUserList[k] = null;
					return false;
				}
			});
		}
		var newUserList = [];
		$.each(loginUserList, function(k, v) {
			if(v) {
				newUserList.push(v);
			}
		});
		loginUserList = newUserList;
		if(!isRemove) {
			var newUser = {
				username: username,
				gesture: gesture
			};
			if(loginUserList.length > 0) {
				loginUserList = [newUser].concat(loginUserList.slice(0, Math.min(4, loginUserList.length)));
			} else {
				loginUserList.push(newUser);
			}
		}
		localStorage.setItem("JSBaseLoginUserList", JSON.stringify(loginUserList));
	},
	actionGestureSetting: function() {
		this.setPageTitle("手势密码设置");
		var _this = this;
		this.requestGet("/index/hwd-status", null, function(info) {
			var tpl = _this.getTpl("member", "gestureSetting");
			var html = _this.renderTpl(tpl, {
				info: info
			});
			_this.fillMainContent(html);
			var isInitLockArea = false;
			var infoArea = _this.find(".info-area");
			var drawPasswd = "";
			_this.find("[name='gesture'], .modify-btn").click(function() {
				var lockArea = _this.find("#" + _this.id + "-lock-area");
				var passwordInput = _this.find("[name='password']");
				if(this.checked || this.name !== "gesture") {
					_this.find(".setting-menu-area").hide();
					_this.find(".set-password-area").show();
					infoArea.text("请绘制解锁图案");
					lockArea.show();
					if(!isInitLockArea) {
						lockArea.GesturePasswd({
							backgroundColor: "transparent",
							color: "#333",
							width: 240,
							height: 240
						}).on("touchstart mousemove", function(e) {
							passwordInput.blur();
							e.preventDefault();
							e.stopPropagation();
						}).on("hasPasswd", function(e, passwd) {
							var loginPassword = passwordInput.val();
							if(!loginPassword) {
								showAlert("登录密码不能为空", function() {
									passwordInput.focus();
								});
								lockArea.trigger("passwdWrong");
								return;
							}
							if(passwd.length < 3) {
								MainJS.showTip("绘制点数不够");
								lockArea.trigger("passwdWrong");
								return;
							}
							if(drawPasswd) {
								if(drawPasswd !== passwd) {
									MainJS.showTip("解锁图案确认失败，请重新绘制解锁图案");
									infoArea.text("请绘制解锁图案");
									lockArea.trigger("passwdWrong");
								} else {
									_this.requestPost("/index/setHpw", {
										password: loginPassword,
										hpw: passwd
									}, function() {
										_this.refreshModule();
									}, {
										errorHandler: function() {
											lockArea.trigger("passwdWrong");
										},
										errorDialogHandler: function() {
											_this.refreshModule();
										}
									});
								}
								drawPasswd = "";
							} else {
								drawPasswd = passwd;
								infoArea.text("请再次绘制图案进行确认");
								lockArea.trigger("passwdRight");
							}
						});
						isInitLockArea = true;
					}
				} else {
					_this.requestPost("/index/setHpw", {
						hpw: ""
					}, function() {
						_this.refreshModule();
					});
				}
				return false;
			});
		});
	},
	actionRegister: function() {
		this.setPageTitle("用户注册");
		var _this = this;
		_this.requestGet("/index/register", null, function(data) {
			var tpl = _this.getTpl("member", "register");
			var captchaUrl = "/index/captcha";
			data.captchaUrl = captchaUrl + "?t=" + (new Date()).getTime();
			var html = _this.renderTpl(tpl, data);
			_this.fillMainContent(html);
			var captchaRefreshBtn = _this.find(".captcha-refresh-btn");
			var captchaImg = _this.find(".captcha-img");
			var captchaInput = _this.find("[name='captcha']");
			captchaRefreshBtn.add(captchaImg).click(function(e) {
				captchaImg.attr("src", captchaUrl + "?t=" + (new Date()).getTime());
				e.preventDefault();
			});
			_this.find(".submit-btn").click(function() {
				var usernameInput = _this.find("[name='username']");
				var passwordInput = _this.find("[name='password']");
				var repasswordInput = _this.find("[name='repassword']");
				var realnameInput = _this.find("[name='realname']");
				var qkmmInput = _this.find("[name='qkmm']");
				var qqInput = _this.find("[name='qq']");
				var weixinInput = _this.find("[name='weixin']");
				var telInput = _this.find("[name='tel']");
				var emailInput = _this.find("[name='email']");
				var questionSelect = _this.find("[name='question']");
				var answerInput = _this.find("[name='answer']");
				var tjidInput = _this.find("[name='tjid']");
				var aidInput = _this.find("[name='aid']");
				var username = usernameInput.val();
				var password = passwordInput.val();
				var repassword = repasswordInput.val();
				var realname = realnameInput.val();
				var qkmm = qkmmInput.val();
				var qq = qqInput.val();
				var weixin = weixinInput.val();
				var tel = telInput.val();
				var email = emailInput.val();
				var captcha = captchaInput.val();
				var question = questionSelect.val();
				var answer = answerInput.val();
				var tjid = tjidInput.val();
				var aid = aidInput.val();
				if(!username) {
					showAlert("用户名不能为空", function() {
						usernameInput.focus();
					});
					return;
				}
				if(!password) {
					showAlert("密码不能为空", function() {
						passwordInput.focus();
					});
					return;
				}
				if(password !== repassword) {
					showAlert("两次密码不一致", function() {
						repasswordInput.focus();
					});
					return;
				}
				if(!realname) {
					showAlert("真实姓名不能为空", function() {
						realnameInput.focus();
					});
					return;
				}
				if(!qkmm) {
					showAlert("取款密码不能为空", function() {
						qkmmInput.focus();
					});
					return;
				}
				if(qqInput.length > 0 && qqInput[0].checkValidity && !qqInput[0].checkValidity()) {
					showAlert("请填写正确的QQ号码", function() {
						qqInput.focus();
					});
					return;
				}
				if(qqInput.length > 0 && !qq) {
					showAlert("QQ号码不能为空", function() {
						qqInput.focus();
					});
					return;
				}
				if(weixinInput.length > 0 && !weixin) {
					showAlert("微信号不能为空", function() {
						weixinInput.focus();
					});
					return;
				}
				if(telInput.length > 0 && telInput[0].checkValidity && !telInput[0].checkValidity()) {
					showAlert("请填写正确的手机号码", function() {
						telInput.focus();
					});
					return;
				}
				if(telInput.length > 0 && !tel) {
					showAlert("手机号码不能为空", function() {
						telInput.focus();
					});
					return;
				}
				if(emailInput.length > 0 && emailInput[0].checkValidity && !emailInput[0].checkValidity()) {
					showAlert("请填写正确的電子邮箱", function() {
						emailInput.focus();
					});
					return;
				}
				if(emailInput.length > 0 && !email) {
					showAlert("電子邮箱不能为空", function() {
						emailInput.focus();
					});
					return;
				}
				if(questionSelect.length > 0 && !question) {
					showAlert("请选择密码提示问题", function() {
						questionSelect.focus();
					});
					return;
				}
				if(answerInput.length > 0 && !answer) {
					showAlert("密码提示答案不能为空", function() {
						answerInput.focus();
					});
					return;
				}
				if(captchaInput.length > 0 && !captcha) {
					showAlert("验证码不能为空", function() {
						captchaInput.focus();
					});
					return;
				}
				if(data.tjidRequired == '1' && !tjid) {
					showAlert("推荐ID不能为空", function() {
						tjidInput.focus();
					});
					return;
				}
				_this.requestPost("/index/register", {
					username: username,
					password: password,
					repassword: repassword,
					realname: realname,
					qkmm: qkmm,
					qq: qq,
					weixin: weixin,
					tel: tel,
					email: email,
					question: question,
					answer: answer,
					tjid: tjid,
					aid: aid,
					platform: MainJS.cfg.data.platform,
					captcha: captcha
				}, function(data) {
					showSuccess("注册成功", function() {
						MainJS.setLoginUser(data.user, false, function() {
							MainJS.goHome();
						});
					});
				}, {
					errorHandler: function() {
						captchaRefreshBtn.click();
						captchaInput.val("");
					}
				});
			});
		});
	},
	actionDzpResult: function() {
		this.setPageTitle("幸运转盘 - 抽奖结果");
		var tpl = this.getTpl("member", "query");
		var html = this.renderTpl(tpl, {
			startTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd"),
			endTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd")
		});
		this.fillMainContent(html);
		var _this = this;
		this.find(".submit-btn").click(function() {
			var startTimeInput = _this.find("form [name='startTime']");
			var endTimeInput = _this.find("form [name='endTime']");
			var startTime = startTimeInput.val();
			var endTime = endTimeInput.val();
			if(!startTime) {
				showAlert("开始时间不能为空", function() {
					startTimeInput.focus();
				});
				return;
			}
			if(!endTime) {
				showAlert("结束时间不能为空", function() {
					endTimeInput.focus();
				});
				return;
			}
			MainJS.openModule("member", {
				action: "dzpDoResult",
				startTime: startTime,
				endTime: endTime
			});
		});
	},
	actionDzpDoResult: function() {
		this.setPageTitle("幸运转盘 - 抽奖结果");
		this.createDataList({
			queryForm: {
				action: "/member-center/dzp-result?startTime=" + encodeURIComponent(this.initData.startTime) + "&endTime=" + encodeURIComponent(this.initData.endTime + " 23:59:59")
			}
		});
	},
	actionRedPacketResult: function() {
		this.setPageTitle("红包查询");
		var tpl = this.getTpl("member", "query");
		var html = this.renderTpl(tpl, {
			startTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd"),
			endTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd")
		});
		this.fillMainContent(html);
		var _this = this;
		this.find(".submit-btn").click(function() {
			var startTimeInput = _this.find("form [name='startTime']");
			var endTimeInput = _this.find("form [name='endTime']");
			var startTime = startTimeInput.val();
			var endTime = endTimeInput.val();
			if(!startTime) {
				showAlert("开始时间不能为空", function() {
					startTimeInput.focus();
				});
				return;
			}
			if(!endTime) {
				showAlert("结束时间不能为空", function() {
					endTimeInput.focus();
				});
				return;
			}
			MainJS.openModule("member", {
				action: "redPacketDoResult",
				startTime: startTime,
				endTime: endTime
			});
		});
	},
	actionRedPacketDoResult: function() {
		this.setPageTitle("红包查询");
		this.createDataList({
			queryForm: {
				action: "/member-center/rp-result?startTime=" + encodeURIComponent(this.initData.startTime) + "&endTime=" + encodeURIComponent(this.initData.endTime + " 23:59:59")
			}
		});
	},
	copyInfoInit: function() {
		var _this = this;
		this.find(".copy-btn").click(function() {
			var info = _this.find($(this).data("copy"))[0];
			try {
				var errorHandler = function() {
					showAlert((MainJS.isApp ? "系统" : "浏览器") + "安全限制或不支持该操作，复制失败，请手动复制！", function() {
						info.focus();
						document.execCommand("selectAll");
					});
				};
				info.focus();
				document.execCommand("selectAll");
				if(!document.execCommand("copy")) {
					errorHandler();
					return;
				}
				info.blur();
				showSuccess("复制成功");
			} catch(e) {
				errorHandler();
			}
		});
		this.on("remove", function() {
			if(document.getSelection) {
				var sel = document.getSelection();
				if(sel && sel.empty) {
					sel.empty();
				}
			}
		});
		var textArea = this.find("textarea");
		this.on("syncSize", function() {
			textArea.each(function() {
				_this.fixTextAreaHeight(this);
			});
		});
		textArea.each(function() {
			_this.fixTextAreaHeight(this);
		});
	},
	fixTextAreaHeight: function(target) {
		var element = $(target);
		element.css({
			"height": 0,
			"min-height": 0,
			"max-height": 0
		});
		var borderTop = parseFloat(element.css("border-top-width"));
		var borderBottom = parseFloat(element.css("border-bottom-width"));
		var borderHeight = borderTop + borderBottom;
		var height = target.scrollHeight + borderHeight;
		element.css({
			"height": height + "px",
			"min-height": "",
			"max-height": ""
		});
	}
});;
BaseJS.addModuleClass("MemberBet", {
	init: function() {
		this.renderBody("member_bet");
	},
	actionIndex: function() {
		this.setPageTitle("请选择注单类别");
		var tpl = this.getTpl("member_bet", "mainMenu");
		var html = this.renderTpl(tpl);
		this.fillMainContent(html);
	},
	actionQuery: function() {
		var tpl = this.getTpl("member_bet", "query");
		var html = this.renderTpl(tpl, {
			startTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd"),
			endTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd")
		});
		this.fillMainContent(html);
		this.initSelect();
		var _this = this;
		this.find("[name='startTime'],[name='endTime']").each(function() {
			_this.initDatetime(this);
		});
		this.find(".submit-btn").click(function() {
			var startTimeInput = _this.find("form [name='startTime']");
			var endTimeInput = _this.find("form [name='endTime']");
			var startTime = startTimeInput.val();
			var endTime = endTimeInput.val();
			if(!startTime) {
				showAlert("开始时间不能为空", function() {
					startTimeInput.focus();
				});
				return;
			}
			if(!endTime) {
				showAlert("结束时间不能为空", function() {
					endTimeInput.focus();
				});
				return;
			}
			MainJS.openModule("memberBet", {
				action: "list",
				type: _this.find("form [name='type']").val(),
				startTime: startTime,
				endTime: endTime
			});
		});
	},
	getMenuItems: function(catalog) {
		var menuItems = [];
		$.each(MainJS.sysSetting.orderMenuItems || [], function(k, v) {
			if(v.id === catalog) {
				menuItems = v.items;
				return false;
			}
		});
		return menuItems;
	},
	initSelect: function() {
		var catalog = this.initData.catalog;
		var menu = this.find("form [name='type']");
		var tpl = this.getTpl("member_bet", "dropMenu");
		var menuItems = MainJS.getMenuItems(catalog);
		var html = this.renderTpl(tpl, {
			menuItems: menuItems
		});
		var menuName = menuItems.length > 0 ? menuItems[0].name : "";
		this.setPageTitle(menuName + " 注单查询");
		menu.html(html);
		var _this = this;
		menu.change(function() {
			var menuName = _this.getMenuName($(this).val(), menuItems);
			_this.setPageTitle(menuName + " 注单查询");
		});
	},
	getMenuName: function(type, menuItems) {
		var menuName = "";
		$.each(menuItems, function(k, v) {
			if(v.id === type) {
				menuName = v.name;
				return false;
			}
		});
		return menuName;
	},
	getKeyName: function(key, list) {
		var name = "";
		$.each(list || [], function(k, v) {
			if(key === v.key) {
				name = v.name || v.title;
				return false;
			}
		});
		return name;
	},
	initHeadByKey: function(key, columns) {
		var keyName = this.getKeyName(key, columns);
		if(keyName) {
			this.find("." + key + "-head").text(keyName);
		}
	},
	getBetList: function(isInit) {
		var type = this.initData.type;
		var url = "";
		if(this.betListPageInfo) {
			if(this.betListCurrentPage >= this.betListPageInfo.page) {
				return;
			}
		}
		if(this.betListPageInfo && this.betListCurrentPage > 0) {
			url = "/member-bet/index/_page-" + (this.betListCurrentPage + 1) + "-" + this.betListPageInfo.total + "_";
		} else {
			url = "/member-bet/index";
		}
		var _this = this;
		this.requestGet(url, {
			id: type,
			startTime: this.initData.startTime,
			endTime: this.initData.endTime
		}, function(data) {
			var tpl = _this.getTpl("member_bet", "list");
			var columns = data.columns || [];
			if(isInit) {
				var listHead = _this.find(".module-top .list-head");
				listHead.css("background-color", "");
				_this.initHeadByKey("betTime", columns);
				_this.initHeadByKey("betAmount", columns);
				_this.initHeadByKey("netAmount", columns);
			}
			var rows = data.rows || [];
			var html = _this.renderTpl(tpl, {
				columns: columns,
				rows: rows
			});
			_this.betListPageInfo = {
				page: data.page,
				total: data.total
			};
			if(_this.betListCurrentPage > 0) {
				_this.betListCurrentPage++;
			} else {
				_this.betListCurrentPage = 1;
			}
			if(_this.betListCurrentPage === 1 && rows.length === 0) {
				html = '<div class="no-result">没有相关信息</div>';
				_this.find(".pull-up").hide();
			} else {
				if(_this.betListCurrentPage >= _this.betListPageInfo.page) {
					html += '<div class="no-result">已没有更多</div>';
					_this.find(".pull-up").hide();
				}
			}
			_this.appendMainContent(html);
			_this.countAmountList();
		});
	},
	countAmountList: function() {
		var totalBetAmount = 0;
		var totalBetResult = 0;
		this.find(".list-group-item .bet-amount").each(function() {
			totalBetAmount += Number($(this).data("amount"));
		});
		this.find(".list-group-item .net-amount").each(function() {
			totalBetResult += Number($(this).data("amount"));
		});
		this.find(".total-bet-amount").text(BaseJS.formatMoney(totalBetAmount));
		this.find(".total-bet-result").text(BaseJS.formatMoney(totalBetResult));
	},
	actionList: function() {
		this.setPageTitle("注单列表");
		if(MainJS.isNewTheme) {
			this.hideParentBottom();
		}
		this.getBetList(true);
		var _this = this;
		this.getPullUpHandler = function() {
			if(!this.pullUpHandler) {
				this.pullUpHandler = function() {
					_this.getBetList();
				};
			}
			return this.pullUpHandler;
		};
		this.getBodyMain().on("click", ".list-group-item", function() {
			$(this).find(".detail").toggle();
		});
	},
	actionCount: function() {
		this.setPageTitle("项目汇总");
		var tpl = this.getTpl("member_bet", "count");
		var html = this.renderTpl(tpl, {
			startTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd"),
			endTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd")
		});
		this.fillMainContent(html);
		var _this = this;
		this.find("[name='startTime'],[name='endTime']").each(function() {
			_this.initDatetime(this);
		});
		this.find(".submit-btn").click(function() {
			var startTimeInput = _this.find("form [name='startTime']");
			var endTimeInput = _this.find("form [name='endTime']");
			var startTime = startTimeInput.val();
			var endTime = endTimeInput.val();
			if(!startTime) {
				showAlert("开始时间不能为空", function() {
					startTimeInput.focus();
				});
				return;
			}
			if(!endTime) {
				showAlert("结束时间不能为空", function() {
					endTimeInput.focus();
				});
				return;
			}
			MainJS.openModule("memberBet", {
				action: "countList",
				startTime: startTime,
				endTime: endTime
			});
		});
	},
	actionCountList: function() {
		this.setPageTitle("项目汇总");
		var action = "/member-bet/count";
		var type = this.initData.type;
		var startTime = this.initData.startTime;
		var endTime = this.initData.endTime;
		if(this.initData.type) {
			action = action + "/" + type;
		} else if(startTime || endTime) {
			action = action + "?startTime=" + encodeURIComponent(startTime) + "&endTime=" + encodeURIComponent(endTime);
		}
		this.createDataList({
			queryForm: {
				action: action
			},
			colorKeys: ["winAmount"]
		});
	},
	initDatetime: function(target) {
		var input = $(target);
		var element = input[0];
		if(element.name === "endTime") {
			element.value += " 23:59:59";
		} else {
			element.value += " 00:00:00";
		}

		function formatYear(nowYear) {
			var arr = [];
			for(var i = nowYear - 10; i <= nowYear + 10; i++) {
				arr.push({
					id: i + '',
					value: i + '年'
				});
			}
			return arr;
		}

		function formatMonth() {
			var arr = [];
			for(var i = 1; i <= 12; i++) {
				arr.push({
					id: i + '',
					value: i + '月'
				});
			}
			return arr;
		}

		function formatDate(count) {
			var arr = [];
			for(var i = 1; i <= count; i++) {
				arr.push({
					id: i + '',
					value: i + '日'
				});
			}
			return arr;
		}
		var yearData = function(callback) {
			var d = new Date();
			var nowYear = d.getFullYear();
			callback(formatYear(nowYear));
		};
		var monthData = function(year, callback) {
			callback(formatMonth());
		};
		var dateData = function(year, month, callback) {
			if(/^(1|3|5|7|8|10|12)$/.test(month)) {
				callback(formatDate(31));
			} else if(/^(4|6|9|11)$/.test(month)) {
				callback(formatDate(30));
			} else if(/^2$/.test(month)) {
				if(year % 4 === 0 && year % 100 !== 0 || year % 400 === 0) {
					callback(formatDate(29));
				} else {
					callback(formatDate(28));
				}
			} else {
				throw new Error('month is illegal');
			}
		};
		var hourData = function(one, two, three, callback) {
			var hours = [];
			for(var i = 0, len = 24; i < len; i++) {
				hours.push({
					id: i,
					value: i + '时'
				});
			}
			callback(hours);
		};
		var minuteData = function(one, two, three, four, callback) {
			var minutes = [];
			for(var i = 0, len = 60; i < len; i++) {
				minutes.push({
					id: i,
					value: i + '分'
				});
			}
			callback(minutes);
		};
		var secondData = function(one, two, three, four, five, callback) {
			var seconds = [];
			for(var i = 0, len = 60; i < len; i++) {
				seconds.push({
					id: i,
					value: i + '秒'
				});
			}
			callback(seconds);
		};
		input[0].readOnly = true;
		input.css("background-color", "#fff").on("click", function(e) {
			this.blur();
			var d = this.value ? new Date(this.value.replace(/-/g, '/')) : new Date();
			var oneLevelId = d.getFullYear();
			var twoLevelId = d.getMonth() + 1;
			var threeLevelId = d.getDate();
			var fourLevelId = d.getHours();
			var fiveLevelId = d.getMinutes();
			var sixLevelId = d.getSeconds();
			var iosSelect = new IosSelect(6, [yearData, monthData, dateData, hourData, minuteData, secondData], {
				title: '时间选择',
				itemHeight: 35,
				itemShowCount: 9,
				headerHeight: 60,
				oneLevelId: oneLevelId,
				twoLevelId: twoLevelId,
				threeLevelId: threeLevelId,
				fourLevelId: fourLevelId,
				fiveLevelId: fiveLevelId,
				sixLevelId: sixLevelId,
				callback: function(selectOneObj, selectTwoObj, selectThreeObj, selectFourObj, selectFiveObj, selectSixObj) {
					var date = selectOneObj.id + "-" + selectTwoObj.id + "-" + selectThreeObj.id + " " + selectFourObj.id + ":" + selectFiveObj.id + ":" + selectSixObj.id;
					input.val(BaseJS.formatDate(new Date(date.replace(/-/g, '/')), 'yyyy-MM-dd HH:mm:ss'));
				}
			});
			var select = $(iosSelect.iosSelectLayer.el);
			select.find(".close").addClass("btn btn-default")[0].tabIndex = 1;
			select.find(".sure").addClass("btn btn-primary")[0].tabIndex = 2;
			select.find(".sure").on("touchstart mousedown", function() {
				if(iosSelect.scrollOne.isAnimating || iosSelect.scrollTwo.isAnimating || iosSelect.scrollThree.isAnimating || iosSelect.scrollFour.isAnimating || iosSelect.scrollFive.isAnimating || iosSelect.scrollSix.isAnimating) {
					return false;
				}
			});
			return false;
		});
	}
});;
BaseJS.addModuleClass("MemberExchange", {
	init: function() {
		this.renderBody("member_exchange");
	},
	actionIndex: function() {
		this.setPageTitle("额度转换");
		var _this = this;
		this.requestGet("/member-exchange", null, function(data) {
			var tpl = _this.getTpl("member_exchange", "exchangeArea");
			var exchangeItems = [{
				id: "SM",
				name: "我的钱包",
				open: 1,
				exchange: 1
			}];
			var games = $.grep(MainJS.getMainGames(), function(v, i) {
				return v.exchange == 1;
			});
			exchangeItems = exchangeItems.concat(games);
			var html = _this.renderTpl(tpl, {
				exchangeInfo: data,
				games: exchangeItems
			});
			_this.fillMainContent(html);
			var userGames = data.user.games || [];
			_this.find(".item-refresh-btn").click(function(e, noTry, isForce) {
				var btn = $(this);
				var type = btn.data("type");
				var refreshBtn = _this.find(".item-refresh-btn-" + type);
				refreshBtn.hide();
				var amountMoney = _this.find(".amount-money-" + type);
				var amountWarning = _this.find(".amount-warning-" + type);
				var itemAmountLoading = _this.find(".amount-loading-" + type);
				if(isForce || (type && ($.inArray(type, userGames) !== -1 || type === "SM"))) {
					itemAmountLoading.show();
					amountMoney.hide();
					amountWarning.hide();
					_this.requestGet("/member-exchange/balance/" + type, null, function(data) {
						var info = data[type];
						if(info === "刷新重试!") {
							itemAmountLoading.hide();
							amountWarning.text("获取失败").show();
							refreshBtn.show();
						} else {
							if($.isNumeric(info)) {
								var oneAmountMoney = $(amountMoney[0]);
								if(noTry === false && oneAmountMoney.data("isInitAmount")) {
									var oldMoney = oneAmountMoney.text();
									var newMoney = BaseJS.formatMoney(info);
									if(oldMoney === newMoney) {
										setTimeout(function() {
											if(!_this.isRemoved) {
												btn.triggerHandler("click", [true]);
											}
										}, 1000);
										return;
									}
								}
								amountMoney.text(BaseJS.formatMoney(info)).show();
								oneAmountMoney.data("isInitAmount", true);
							} else {
								amountWarning.text(info).show();
							}
							itemAmountLoading.hide();
							refreshBtn.hide();
						}
					}, {
						noMask: true,
						error: function() {
							itemAmountLoading.hide();
							amountWarning.text("获取失败").show();
							refreshBtn.show();
						}
					});
				} else {
					itemAmountLoading.hide();
					amountWarning.hide();
					refreshBtn.hide();
					amountMoney.text("0.00").show();
				}
			});
			_this.find(".list-group-item").click(function() {
				var item = $(this);
				var itemRefreshBtn = item.find(".item-refresh-btn:visible");
				if(itemRefreshBtn.length > 0) {
					itemRefreshBtn.triggerHandler("click");
					return false;
				}
				if(item.find(".amount-warning:visible").length > 0) {
					return false;
				}
			});
			_this.getBodyMain().on("change", "[type='radio']", function() {
				if(this.checked) {
					var unchecked = $(this).data("unchecked");
					_this.find("#" + unchecked)[0].checked = false;
				}
			});
			_this.getBodyMain().on("click", "[name='exchangeFrom']", function() {
				if(this.checked) {
					var exchangeFrom = this.value;
					var amount = Math.floor(Number(_this.find(".from-amount-money-" + exchangeFrom).text()));
					_this.find(".exchange-amount").val(amount);
				}
			});
			_this.find(".type-list-head").click(function() {
				var head = $(this);
				if(head.data("isAnimating")) {
					return;
				}
				var type = head.data("type");
				var list = _this.find(".list-group[data-type='" + type + "']");
				var listHeight = list.height();
				head.data("isAnimating", true);
				if(head.hasClass("expand")) {
					list.css({
						height: listHeight + "px"
					}).transition({
						height: 0
					}, {
						duration: 200,
						complete: function() {
							head.removeClass("expand");
							list.hide();
							list.height("");
							listHeight = list.height();
							head.data("isAnimating", false);
						}
					});
				} else {
					list.css({
						height: 0
					}).show().transition({
						height: listHeight + "px"
					}, {
						duration: 200,
						complete: function() {
							head.addClass("expand");
							list.height("");
							listHeight = list.height();
							head.data("isAnimating", false);
						}
					});
				}
				if(!head.data("isInit")) {
					_this.find(".list-group-item[data-type='" + type + "'] .from-item-refresh-btn").each(function() {
						$(this).triggerHandler("click");
					});
					head.data("isInit", true);
				}
			});
			_this.find("[name='userAutoOpen']").change(function() {
				_this.requestGet("/member-exchange/set-auto/" + (this.checked ? "1" : "0"));
			});
		});
		var refreshBtn = this.find(".main-refresh-btn");
		refreshBtn.click(function() {
			if(!refreshBtn.hasClass("refresh-disabled")) {
				refreshBtn.addClass("refresh-disabled");
				_this.refreshItems();
			}
			setTimeout(function() {
				if(!_this.isRemoved) {
					refreshBtn.removeClass("refresh-disabled");
				}
			}, 10000);
		});
		var exchangeAmountInput = _this.find(".exchange-amount");
		this.find(".exchange-btn").click(function() {
			var exchangeAmount = exchangeAmountInput.val();
			var exchangeFrom = _this.find("[name='exchangeFrom']:checked").val();
			var exchangeTo = _this.find("[name='exchangeTo']:checked").val();
			var fromAmount = _this.find(".from-amount-money-" + exchangeFrom);
			var exchangeFromAmount = Number($.trim(fromAmount.text()));
			if(!exchangeFrom) {
				showAlert("请选择转出方");
				return;
			}
			if(!exchangeTo) {
				showAlert("请选择转入方");
				return;
			}
			if(exchangeTo === exchangeFrom) {
				showAlert("转出方不能与转入方一样");
				return;
			}
			if(!exchangeAmount && !exchangeAmountInput[0].validationMessage) {
				showAlert("请填写转换金额", function() {
					exchangeAmountInput.focus();
				});
				return;
			}
			if(/\./.test(exchangeAmount)) {
				showAlert("请填写整数金额", function() {
					exchangeAmountInput.focus();
				});
				return;
			}
			if(!/^\d+$/.test(exchangeAmount) || exchangeAmount === "0") {
				showAlert("请填写正确的金额", function() {
					exchangeAmountInput.focus();
				});
				return;
			}
			exchangeAmount = Number(exchangeAmount);
			if(fromAmount.is(":visible") && exchangeFromAmount < exchangeAmount) {
				showAlert("额度不足", function() {
					exchangeAmountInput.focus();
				});
				return;
			}
			var refreshHandler = function() {
				_this.find(".item-refresh-btn-" + exchangeFrom).triggerHandler("click", [false, true]);
				_this.find(".item-refresh-btn-" + exchangeTo).triggerHandler("click", [false, true]);
			};
			_this.requestPost("/member-exchange/do", {
				amount: exchangeAmount,
				from: exchangeFrom,
				to: exchangeTo
			}, null, {
				errorDialogHandler: function() {
					refreshHandler();
				},
				successDialogHandler: function() {
					refreshHandler();
				}
			});
		});
	},
	refreshItems: function() {
		this.find(".main-container .list-group-item .from-item-refresh-btn").each(function() {
			var refreshBtn = $(this);
			var head = refreshBtn.closest(".item-list").find(".type-list-head");
			if(head.length === 0 || head.data("isInit")) {
				var type = refreshBtn.data("type");
				if(type) {
					refreshBtn.triggerHandler("click");
				}
			}
		});
	},
	getTypeName: function(type) {
		var name = "";
		$.each(MainJS.cfg.data.games.gameTypes, function(i, v) {
			if(v.key === type) {
				name = v.name;
				return false;
			}
		});
		return name;
	},
	getGameTypeName: function(id) {
		var name = "";
		var type = "";
		$.each(MainJS.cfg.data.games.gameConfig, function(i, v) {
			if(v.id === id) {
				type = v.type;
				return false;
			}
		});
		name = this.getTypeName(type);
		return name;
	},
	showExchangeDialog: function(targetId, caller) {
		var targetName = "";
		$.each(this.getMainGames(), function(k, v) {
			if(v.id === targetId) {
				targetName = v.name;
				return false;
			}
		});
		var tpl = this.getTpl("member_exchange", "moneyExchange");
		var _this = this;
		var dialog = this.showDialog({
			content: this.renderTpl(tpl),
			containerClass: "exchange-dialog-main",
			onInit: function(dialog) {
				var tpl = _this.getTpl("member_exchange", "exchangeToolbar");
				dialog.getDialogBody().after(_this.renderTpl(tpl));
				var selectedAmount = dialog.find(".selected-amount");
				var selectedName = dialog.find(".selected-name");
				var exchangeAmountInput = dialog.find(".exchange-amount");
				var initData = null;
				var selectedFromAmount = 0;
				var selectedFrom = "SM";
				dialog.setTitle("[" + targetName + "]余额不足");
				_this.requestGet("/member-exchange", null, function(data) {
					initData = data;
					selectedFromAmount = data.user.money;
					selectedAmount.text(BaseJS.formatMoney(data.user.money)).show();
					exchangeAmountInput.val(Math.floor(Number(data.user.money)));
				});
				var selectBtn = dialog.find(".select-btn");
				selectBtn.click(function() {
					var selectList = selectBtn.data("selectList");
					if(!selectList) {
						var tpl = _this.getTpl("member_exchange", "exchangeSelectList");
						var exchangeItems = [{
							id: "SM",
							name: "我的钱包",
							open: 1,
							exchange: 1
						}];
						exchangeItems = exchangeItems.concat(MainJS.getMainGames());
						selectList = $(_this.renderTpl(tpl, {
							games: exchangeItems,
							user: initData.user
						}));
						selectBtn.after(selectList);
						selectBtn.data("selectList", selectList);
						selectList.find(".item-refresh-btn").click(function(e, isForce) {
							var refreshBtn = $(this);
							var type = refreshBtn.data("type");
							refreshBtn.hide();
							var amountMoney = selectList.find(".amount-money-" + type);
							var amountWarning = selectList.find(".amount-warning-" + type);
							var itemAmountLoading = selectList.find(".amount-loading-" + type);
							if(type && (isForce || ($.inArray(type, initData.user.games) !== -1 || type === "SM"))) {
								itemAmountLoading.show();
								amountMoney.hide();
								amountWarning.hide();
								_this.requestGet("/member-exchange/balance/" + type, null, function(data) {
									var info = data[type];
									itemAmountLoading.hide();
									if(info === "刷新重试!") {
										refreshBtn.show();
									} else {
										if($.isNumeric(info)) {
											amountMoney.text(BaseJS.formatMoney(info)).show();
										} else {
											amountWarning.text(info).show();
										}
										refreshBtn.hide();
									}
								}, {
									noMask: true
								});
							} else {
								itemAmountLoading.hide();
								amountWarning.hide();
								refreshBtn.hide();
								amountMoney.text("0.00").show();
							}
						});
						selectList.find(".item-refresh-btn").each(function() {
							var refreshBtn = $(this);
							var type = refreshBtn.data("type");
							if(type !== "SM") {
								refreshBtn.triggerHandler("click");
							}
						});
						selectList.find(">li").click(function() {
							var item = $(this);
							var amountMoneyItem = item.find(".amount-money");
							if(amountMoneyItem.is(":hidden")) {
								return;
							}
							selectedFrom = item.find(".item-refresh-btn").data("type");
							var selectedFromAmountTxt = amountMoneyItem.text();
							selectedName.text(item.find(".item-name").text());
							selectedAmount.text(selectedFromAmountTxt);
							selectedFromAmount = Number(selectedFromAmountTxt);
							exchangeAmountInput.val(Math.floor(selectedFromAmount));
							var scrollbar = dialog.getBodyMainScrollbar();
							if(scrollbar && scrollbar.scrollTo) {
								scrollbar.scrollTo(0, 0, 0);
							}
							selectList.hide();
						});
					}
					selectList.toggle();
				});
				dialog.find(".exchange-btn").click(function() {
					var exchangeAmount = exchangeAmountInput.val();
					var exchangeFrom = selectedFrom;
					var exchangeTo = targetId;
					var exchangeFromAmount = selectedFromAmount;
					if(!exchangeFrom) {
						showAlert("请选择转出方");
						return;
					}
					if(!exchangeTo) {
						showAlert("请选择转入方");
						return;
					}
					if(exchangeTo === exchangeFrom) {
						showAlert("转出方不能与转入方一样");
						return;
					}
					if(!exchangeAmount && !exchangeAmountInput[0].validationMessage) {
						showAlert("请填写转换金额", function() {
							exchangeAmountInput.focus();
						});
						return;
					}
					if(/\./.test(exchangeAmount)) {
						showAlert("请填写整数金额", function() {
							exchangeAmountInput.focus();
						});
						return;
					}
					if(!/^\d+$/.test(exchangeAmount) || exchangeAmount === "0") {
						showAlert("请填写正确的金额", function() {
							exchangeAmountInput.focus();
						});
						return;
					}
					exchangeAmount = Number(exchangeAmount);
					if(exchangeFromAmount < exchangeAmount) {
						showAlert("额度不足", function() {
							exchangeAmountInput.focus();
						});
						return;
					}
					_this.requestPost("/member-exchange/do", {
						amount: exchangeAmount,
						from: exchangeFrom,
						to: exchangeTo
					}, null, {
						errorDialogHandler: function() {
							dialog.find(".item-refresh-btn-" + exchangeFrom).triggerHandler("click", [true]);
						},
						successDialogHandler: function() {
							dialog.remove();
							if(caller) {
								caller();
							}
						}
					});
				});
				dialog.find(".skip-btn").click(function() {
					dialog.remove();
					if(caller) {
						caller();
					}
				});
			}
		});
		return dialog;
	}
});;
BaseJS.addModuleClass("MemberLevel", {
	init: function() {
		this.renderBody("member_level");
	},
	actionIndex: function() {
		if(MainJS.sysSetting.isSimpleMemberLevel) {
			this.simpleIndex();
		} else {
			this.showMenu();
		}
	},
	simpleIndex: function() {
		this.setPageTitle("我的推荐");
		var _this = this;
		this.requestGet("/member-center/tj", null, function(data) {
			var tpl = _this.getTpl("member_level", "simpleIndex");
			var html = _this.renderTpl(tpl, {
				info: data,
				link: _this.getLink()
			});
			_this.fillMainContent(html);
			_this.find(".qcode-area").qrcode({
				render: window.HTMLCanvasElement ? "canvas" : "table",
				text: _this.getLink(),
				height: 180,
				width: 180
			});
			_this.initCopyLink();
		});
	},
	showMenu: function() {
		this.setPageTitle("我的推广");
		var tpl = this.getTpl("member_level", "menu");
		var html = this.renderTpl(tpl);
		this.fillMainContent(html);
	},
	actionManage: function() {
		this.setPageTitle("下级管理");
		var dataList = this.createDataList({
			queryForm: {
				action: "/member-level/index",
				onEditBeforeSubmit: function(form) {
					var input = form.find('[name="pshui"]');
					var pshui = input.val();
					if(!$.isNumeric(pshui) || /\./.test(pshui)) {
						showAlert("请输入整数", function() {
							input.focus();
						});
						return false;
					}
					if(pshui > 50) {
						showAlert(dataList.getColumnName("modify") + "最高为50%", function() {
							input.focus();
						});
						return false;
					}
				}
			},
			coustomColumns: {
				modify: {
					getFormAction: function(row) {
						return "/member-level/set/" + row.mid;
					},
					getItems: function(row) {
						return [{
							tag: "input",
							name: "pshui",
							value: row.modify || "0",
							attributes: {
								type: "number"
							}
						}, {
							tag: "button",
							type: "submit",
							text: "修改"
						}, {
							tag: "button",
							extCls: "btn-sm btn-warning",
							text: "返水点数",
							attributes: {
								onclick: row.fanshui.length === 0 ? "showAlert('无返水');" : ("MainJS.showDialogList('返水点数',{listData:" + JSON.stringify({
									columns: [{
										key: "name",
										title: "项目"
									}, {
										key: "ratio",
										title: "点数"
									}],
									rows: row.fanshui
								}) + "},'list-dialog-main no-bottom');")
							}
						}];
					}
				}
			},
			onAfterRequest: function(data) {
				data.columns.splice(3, 1);
				setTimeout(function() {
					if(dataList.find(".info-show").length < 1) {
						dataList.getBodyMainContent().prepend("<div class='info-container info-show' style='margin:5px;'><div class='info' style='margin-bottom:0;'>抽水是对下一级会员的返水金额进行抽水，抽水比率设置越高，下级会员返水的金额就越少，抽水比率最高设置为<span class='txt-important'>50%</span>。</div></div>");
					}
				}, 10);
			}
		});
	},
	fixTextAreaHeight: function(target) {
		var element = $(target);
		element.css({
			"height": 0,
			"min-height": 0,
			"max-height": 0
		});
		var borderTop = parseFloat(element.css("border-top-width"));
		var borderBottom = parseFloat(element.css("border-bottom-width"));
		var borderHeight = borderTop + borderBottom;
		var height = target.scrollHeight + borderHeight;
		element.css({
			"height": height + "px",
			"min-height": "",
			"max-height": ""
		});
	},
	actionDefault: function() {
		this.setPageTitle("默认设置");
		var _this = this;
		this.createDataList({
			queryForm: {
				action: "/member-level/default"
			},
			onAfterRequest: function(data) {
				var info = data.choushui;
				var formHtml = BaseJS.renderForm({
					isInline: true,
					action: "/member-level/default",
					items: [{
						tag: "input",
						type: "text",
						name: "choushui",
						text: info.name,
						value: info.ratio,
						attributes: {
							type: "number",
							inputmode: "numeric",
							pattern: "[0-9]*"
						}
					}, {
						tag: "button",
						type: "submit",
						extCls: "btn-primary submit-btn",
						text: "修改"
					}]
				});
				var form = $(formHtml);
				form.find("[type='submit']").click(function() {
					var input = form.find('[name="choushui"]');
					var choushui = input.val();
					if(!$.isNumeric(choushui) || /\./.test(choushui)) {
						showAlert("请输入整数", function() {
							input.focus();
						});
						return false;
					}
					if(choushui > 50) {
						showAlert(info.name + "最高为50%", function() {
							input.focus();
						});
						return false;
					}
					_this.requestPost(form[0].action, form.serialize(), null, {
						successDialogHandler: function() {
							_this.refreshModule();
						}
					});
					return false;
				});
				_this.getBodyBottom().append(form).addClass("bottom-top");
				_this.syncSize();
			}
		});
	},
	actionLink: function() {
		this.setPageTitle("推广地址");
		var tpl = this.getTpl("member_level", "link");
		var html = this.renderTpl(tpl, {
			link: this.getLink()
		});
		this.fillMainContent(html);
		this.find(".qcode-area").qrcode({
			render: window.HTMLCanvasElement ? "canvas" : "table",
			text: this.getLink(),
			height: 180,
			width: 180
		});
		this.initCopyLink();
	},
	getLink: function() {
		var host = window.location.host.replace(/^m\./, "www.");
		host = host.replace(/^wap\./, "www.");
		var user = MainJS.getLoginUser();
		var link = "";
		var linkFormat = this.sysCfg.linkFormat;
		if(linkFormat && user) {
			link = window.location.protocol + "//" + host + linkFormat.replace(/\{\{mid\}\}/g, user.mid);
		}
		return link;
	},
	initCopyLink: function() {
		var _this = this;
		var linkInfo = _this.find(".link-info")[0];
		if(!linkInfo) {
			return;
		}
		this.fixTextAreaHeight(linkInfo);
		this.on("syncSize", function() {
			_this.fixTextAreaHeight(linkInfo);
		});
		this.find(".copy-btn").click(function() {
			try {
				var errorHandler = function() {
					showAlert((MainJS.isApp ? "系统" : "浏览器") + "安全限制或不支持该操作，复制失败，请手动复制！", function() {
						linkInfo.focus();
						document.execCommand("selectAll");
					});
				};
				linkInfo.focus();
				document.execCommand("selectAll");
				if(!document.execCommand("copy")) {
					errorHandler();
					return;
				}
				linkInfo.blur();
				showSuccess("复制成功");
			} catch(e) {
				errorHandler();
			}
		});
		this.on("remove", function() {
			if(document.getSelection) {
				var sel = document.getSelection();
				if(sel && sel.empty) {
					sel.empty();
				}
			}
		});
	},
	actionAdd: function() {
		this.setPageTitle("添加下级");
		var _this = this;
		this.requestGet("/member-level/add", null, function(data) {
			var tpl = _this.getTpl("member_level", "register");
			var html = _this.renderTpl(tpl, data);
			_this.fillMainContent(html);
			_this.find(".submit-btn").click(function() {
				var usernameInput = _this.find("[name='username']");
				var passwordInput = _this.find("[name='password']");
				var repasswordInput = _this.find("[name='repassword']");
				var realnameInput = _this.find("[name='realname']");
				var qkmmInput = _this.find("[name='qkmm']");
				var qqInput = _this.find("[name='qq']");
				var weixinInput = _this.find("[name='weixin']");
				var telInput = _this.find("[name='tel']");
				var emailInput = _this.find("[name='email']");
				var questionSelect = _this.find("[name='question']");
				var answerInput = _this.find("[name='answer']");
				var username = usernameInput.val();
				var password = passwordInput.val();
				var repassword = repasswordInput.val();
				var realname = realnameInput.val();
				var qkmm = qkmmInput.val();
				var qq = qqInput.val();
				var weixin = weixinInput.val();
				var tel = telInput.val();
				var email = emailInput.val();
				var question = questionSelect.val();
				var answer = answerInput.val();
				if(!username) {
					showAlert("用户名不能为空", function() {
						usernameInput.focus();
					});
					return;
				}
				if(!password) {
					showAlert("密码不能为空", function() {
						passwordInput.focus();
					});
					return;
				}
				if(password !== repassword) {
					showAlert("两次密码不一致", function() {
						repasswordInput.focus();
					});
					return;
				}
				if(!realname) {
					showAlert("真实姓名不能为空", function() {
						realnameInput.focus();
					});
					return;
				}
				if(!qkmm) {
					showAlert("取款密码不能为空", function() {
						qkmmInput.focus();
					});
					return;
				}
				if(qqInput.length > 0 && qqInput[0].checkValidity && !qqInput[0].checkValidity()) {
					showAlert("请填写正确的QQ号码", function() {
						qqInput.focus();
					});
					return;
				}
				if(qqInput.length > 0 && !qq) {
					showAlert("QQ号码不能为空", function() {
						qqInput.focus();
					});
					return;
				}
				if(weixinInput.length > 0 && !weixin) {
					showAlert("微信号不能为空", function() {
						weixinInput.focus();
					});
					return;
				}
				if(telInput.length > 0 && telInput[0].checkValidity && !telInput[0].checkValidity()) {
					showAlert("请填写正确的手机号码", function() {
						telInput.focus();
					});
					return;
				}
				if(telInput.length > 0 && !tel) {
					showAlert("手机号码不能为空", function() {
						telInput.focus();
					});
					return;
				}
				if(emailInput.length > 0 && emailInput[0].checkValidity && !emailInput[0].checkValidity()) {
					showAlert("请填写正确的電子邮箱", function() {
						emailInput.focus();
					});
					return;
				}
				if(emailInput.length > 0 && !email) {
					showAlert("電子邮箱不能为空", function() {
						emailInput.focus();
					});
					return;
				}
				if(questionSelect.length > 0 && !question) {
					showAlert("请选择密码提示问题", function() {
						questionSelect.focus();
					});
					return;
				}
				if(answerInput.length > 0 && !answer) {
					showAlert("密码提示答案不能为空", function() {
						answerInput.focus();
					});
					return;
				}
				_this.requestPost("/member-level/add", {
					username: username,
					password: password,
					repassword: repassword,
					realname: realname,
					qkmm: qkmm,
					qq: qq,
					weixin: weixin,
					tel: tel,
					email: email,
					question: question,
					answer: answer
				}, null, {
					successDialogHandler: function() {
						_this.refreshModule();
					}
				});
			});
		});
	},
	actionInfo: function() {
		this.setPageTitle("推广说明");
		var tpl = this.getTpl("member_level", "info");
		var html = this.renderTpl(tpl);
		this.fillMainContent(html);
	}
});;
BaseJS.addModuleClass("MemberMessage", {
	init: function() {
		this.initData.type = this.initData.type || "message";
		this.renderBody("member_message", {
			type: this.initData.type
		});
	},
	actionIndex: function() {
		this.setPageTitle(this.initData.type === "sportNotice" ? "體育公告" : "消息中心");
		this.initPullDownRefresh();
		var _this = this;
		var url = this.initData.type === "sportNotice" ? "/hg_sports/sport/notice" : ("/member-center/" + this.initData.type);
		this.requestGet(url, null, function(data) {
			var tpl = _this.getTpl("member_message", "list");
			var html = _this.renderTpl(tpl, {
				list: data.rows || data.message
			});
			_this.fillMainContent(html);
		});
	}
});;
BaseJS.addModuleClass("MemberMoney", {
	init: function() {
		this.renderBody("member_money");
	},
	actionIndex: function() {
		this.setPageTitle("资金流水");
		var tpl = this.getTpl("member_money", "query");
		var html = this.renderTpl(tpl, {
			startTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd"),
			endTime: MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd")
		});
		this.fillMainContent(html);
		this.find(".main-container .form-group").eq(2).show();
		var _this = this;
		this.find(".submit-btn").click(function() {
			var startTimeInput = _this.find("form [name='startTime']");
			var endTimeInput = _this.find("form [name='endTime']");
			var startTime = startTimeInput.val();
			var endTime = endTimeInput.val();
			if(!startTime) {
				showAlert("开始时间不能为空", function() {
					startTimeInput.focus();
				});
				return;
			}
			if(!endTime) {
				showAlert("结束时间不能为空", function() {
					endTimeInput.focus();
				});
				return;
			}
			MainJS.openModule("memberMoney", {
				action: 'list',
				startTime: startTime,
				endTime: endTime,
				type: _this.find("form [name='type']").val()
			});
		});
	},
	getBetList: function() {
		var url = "";
		if(this.betListPageInfo) {
			if(this.betListCurrentPage >= this.betListPageInfo.page) {
				return;
			}
		}
		if(this.betListPageInfo && this.betListCurrentPage > 0) {
			url = "/member-center/rdh/_page-" + (this.betListCurrentPage + 1) + "-" + this.betListPageInfo.total + "_";
		} else {
			url = "/member-center/rdh";
		}
		var _this = this;
		this.requestGet(url, {
			type: this.initData.type,
			startTime: this.initData.startTime,
			endTime: this.initData.endTime + " 23:59:59"
		}, function(data) {
			var tpl = _this.getTpl("member_money", "list");
			var rows = data.rows || [];
			var html = _this.renderTpl(tpl, {
				columns: data.columns || [],
				rows: rows
			});
			_this.betListPageInfo = {
				page: data.page,
				total: data.total
			};
			if(_this.betListCurrentPage > 0) {
				_this.betListCurrentPage++;
			} else {
				_this.betListCurrentPage = 1;
			}
			if(_this.betListCurrentPage === 1 && rows.length === 0) {
				html = '<div class="no-result">没有相关信息</div>';
				_this.find(".pull-up").hide();
			} else {
				if(_this.betListCurrentPage >= _this.betListPageInfo.page) {
					html += '<div class="no-result">已没有更多</div>';
					_this.find(".pull-up").hide();
				}
			}
			_this.appendMainContent(html);
			_this.countAmountList();
		});
	},
	countAmountList: function() {
		var totalBetAmount = 0;
		this.find(".list-group-item .item-amount").each(function() {
			totalBetAmount += Number($(this).data("amount"));
		});
		this.find(".total-list-amount").text(BaseJS.formatMoney(totalBetAmount));
	},
	actionList: function() {
		this.setPageTitle("资金流水");
		this.initPullDownRefresh();
		this.getBetList();
		var _this = this;
		this.getPullUpHandler = function() {
			if(!this.pullUpHandler) {
				this.pullUpHandler = function() {
					_this.getBetList();
				};
			}
			return this.pullUpHandler;
		};
		this.getBodyMain().on("click", ".list-group-item", function() {
			$(this).find(".detail").toggle();
		});
	}
});;
BaseJS.addModuleClass("MemberPoint", {
	init: function() {
		this.renderBody("member_point");
	},
	actionIndex: function() {
		this.setPageTitle("积分兑换");
		var _this = this;
		this.requestGet("/member-point", null, function(data) {
			var tpl = _this.getTpl("member_point", "info");
			var html = _this.renderTpl(tpl, {
				info: data.points
			});
			_this.fillMainContent(html);
		});
	},
	actionConvert: function() {
		this.setPageTitle("积分兑换");
		var _this = this;
		var url = "/member-point/convert/" + this.initData.id;
		this.requestGet(url, null, function(data) {
			var tpl = _this.getTpl("member_point", "convert");
			var html = _this.renderTpl(tpl, {
				info: data
			});
			_this.fillMainContent(html);
			_this.find(".submit-btn").click(function() {
				var numInput = _this.find("[name='num']");
				var qkmmInput = _this.find("[name='qkmm']");
				var num = numInput.val();
				var qkmm = qkmmInput.val();
				if(!num) {
					showAlert("请输入兑换数量", function() {
						numInput.focus();
					});
					return;
				}
				if(!qkmm) {
					showAlert("请输入取款密码", function() {
						qkmmInput.focus();
					});
					return;
				}
				_this.requestPost(url, {
					num: num,
					qkmm: qkmm
				}, null, {
					successDialogHandler: function() {
						_this.refreshModule();
					}
				});
			});
		});
	},
	formatTimer: function(seconds) {
		var day = Math.floor(seconds / (3600 * 24));
		var remain = seconds % (3600 * 24);
		var timezoneOffset = (new Date()).getTimezoneOffset();
		return(day > 0 ? (day + "天") : "") + " " + BaseJS.formatDate(remain * 1000 + timezoneOffset * 60 * 1000, "HH:mm:ss");
	}
});;
BaseJS.addModuleClass("Sport", {
	init: function() {
		if(this.initData.stype === "fu") {
			this.initData.stype = "ft";
			this.initData.dtype = "future";
		} else if(this.initData.stype === "bbfu") {
			this.initData.stype = "bb";
			this.initData.dtype = "future";
		} else {
			this.initData.stype = this.initData.stype || "ft";
			this.initData.dtype = this.initData.dtype || (this.initData.type === "gq" ? "gq" : "today");
		}
		this.initData.type = this.initData.type || "ds";
		this.renderBody("sport");
	},
	actionIndex: function() {
		this.setPageTitle(MainJS.getSportName(this.initData.stype) + " - " + MainJS.getPlayType(this.initData.stype, this.initData.type));
		this.initPullDownRefresh();
		var _this = this;
		this.getBodyMain().on("click", "li .item-area", function() {
			var itemArea = $(this);
			if(_this.initData.type === "zhgg") {
				var listArea = itemArea.data("listArea");
				if(listArea) {
					listArea.toggle();
					itemArea.toggleClass("item-area-active");
				} else {
					itemArea.addClass("item-area-active");
					_this.getDetailList(function(html, data) {
						var listArea = $("<div class='match-item-area'>" + html + "</div>");
						itemArea.after(listArea);
						itemArea.data("listArea", listArea);
						itemArea.find(".match-count").text(data.length);
						_this.syncSelected();
					}, itemArea.data("league"));
				}
			} else {
				MainJS.openModule("sport", {
					action: "detail",
					stype: _this.initData.stype,
					type: _this.initData.type,
					dtype: _this.initData.dtype,
					league: itemArea.data("league")
				});
			}
		});
		this.getLeagueList();
		if(this.initData.type === "zhgg") {
			this.multiBetInit();
		}
	},
	getLeagueList: function() {
		var requestUrl = "";
		if(this.initData.dtype === "gq") {
			requestUrl = "/hg_sports/sport/" + this.initData.stype;
		} else {
			requestUrl = "/hg_sports/sport/" + this.initData.stype + "-" + this.initData.dtype;
		}
		requestUrl = requestUrl + "/" + this.initData.type;
		var _this = this;
		this.requestGet(requestUrl, null, function(data) {
			var tpl = _this.getTpl("sport", "leagueList");
			var html = _this.renderTpl(tpl, {
				list: data
			});
			_this.fillMainContent(html);
		});
	},
	actionDetail: function() {
		this.setPageTitle(this.initData.league + " - " + MainJS.getPlayType(this.initData.stype, this.initData.type));
		this.initPullDownRefresh();
		var _this = this;
		this.getDetailList(function(html) {
			_this.fillMainContent(html);
			_this.singleBetInit();
		});
	},
	getRealStype: function() {
		var stype = this.initData.stype;
		var dtype = this.initData.dtype;
		var realStype = "";
		if(stype === "ft") {
			if(dtype === "future") {
				realStype = "fu";
			} else {
				realStype = stype;
			}
		} else {
			if(dtype === "future") {
				realStype = stype + "fu";
			} else {
				realStype = stype;
			}
		}
		return realStype;
	},
	removeBetMatch: function(matchInfo, caller) {
		var realStype = this.getRealStype();
		var _this = this;
		this.requestGet("/hg_sports/sport/zhgg/" + (matchInfo.ftid || matchInfo.id || matchInfo.match_id), {
			cancel: 1,
			stype: realStype,
			type: this.initData.type,
			btype: matchInfo.btype
		}, function(data) {
			_this.betData = data;
			_this.syncSelected();
			if(caller) {
				caller(data);
			}
		});
	},
	syncSelected: function() {
		var data = this.betData.zhgg ? this.betData.zhgg.data : null;
		var btns = this.find(".rate-btn");
		btns.each(function() {
			var btn = $(this);
			var matchId = btn.data("id");
			var btype = btn.data("btype");
			var selected = false;
			if(data) {
				$.each(data, function(k, v) {
					if(v.match_id == matchId && v.btype == btype) {
						selected = true;
						return false;
					}
				});
			}
			if(selected) {
				btn.addClass("selected-rate");
			} else {
				btn.removeClass("selected-rate");
			}
		});
		this.find(".selected-count").text(this.betData.zhgg ? this.betData.zhgg.count : 0);
		this.find(".total-rate").text(this.betData.zhgg ? this.betData.zhgg.rate : 0);
	},
	multiBetInit: function() {
		this.betData = {};
		var _this = this;
		this.getBodyMain().on("click", ".rate-btn", function() {
			var rateBtn = $(this);
			var btype = rateBtn.data("btype");
			var matchItem = rateBtn.closest(".match-item");
			var match = matchItem.data("match");
			var stype = _this.initData.stype;
			var matchId = stype === "ft" ? match.ftid : match.id;
			var realStype = _this.getRealStype();
			if(rateBtn.hasClass("selected-rate")) {
				_this.removeBetMatch(match);
			} else {
				_this.requestGet("/hg_sports/sport/zhgg/" + matchId, {
					stype: realStype,
					type: _this.initData.type,
					btype: btype
				}, function(data) {
					_this.betData = data;
					_this.syncSelected();
				});
			}
		});
		this.find(".bet-confirm-btn,.selected-info").click(function() {
			if(Number($.trim(_this.find(".selected-count").text())) > 0) {
				_this.requestGet("/hg_sports/sport/zhgg", {
					stype: _this.getRealStype(),
					type: "zhgg"
				}, function(data) {
					var betTpl = _this.getTpl("sport", "betSelected");
					MainJS.showDialog({
						title: _this.betData.title,
						content: _this.renderTpl(betTpl, {
							matchData: data
						}),
						onInit: function(dialog) {
							_this.initBetDialog(dialog, data);
						}
					});
				});
			} else {
				if($(this).hasClass("bet-confirm-btn")) {
					showAlert("请选择串关项目");
				}
			}
		});
		this.requestGet("/hg_sports/sport/zhgg", {
			stype: this.getRealStype(),
			type: "zhgg"
		}, function(data) {
			_this.betData = data;
			_this.syncSelected();
		});
	},
	singleBetInit: function() {
		var _this = this;
		this.find(".rate-btn").click(function() {
			var rateBtn = $(this);
			var btype = rateBtn.data("btype");
			var matchItem = rateBtn.closest(".match-item");
			var match = matchItem.data("match");
			var matchId = match.ftid || match.id;
			var realStype = _this.getRealStype();
			_this.requestGet("/hg_sports/sport/order/" + matchId, {
				stype: realStype,
				type: _this.initData.type,
				btype: btype
			}, function(matchData) {
				var betTpl = _this.getTpl("sport", "bet");
				MainJS.showDialog({
					title: matchData.league + (matchData.title ? (" " + matchData.title) : (" - " + rateBtn.data("title"))),
					content: _this.renderTpl(betTpl, {
						matchData: matchData
					}),
					onInit: function(dialog) {
						_this.initBetDialog(dialog, matchData);
					}
				});
			});
		});
	},
	getDetailList: function(caller, league) {
		var _this = this;
		var requestUrl = "";
		if(this.initData.dtype === "gq") {
			requestUrl = "/hg_sports/sport/" + this.initData.stype;
		} else {
			requestUrl = "/hg_sports/sport/" + this.initData.stype + "-" + this.initData.dtype;
		}
		requestUrl = requestUrl + "/" + this.initData.type;
		this.requestGet(requestUrl, {
			league: this.initData.league || league
		}, function(data) {
			var tpl = _this.getTpl("sport", "detailList");
			var html = _this.renderTpl(tpl, {
				list: data
			});
			caller(html, data || []);
		});
	},
	initBetDialog: function(dialog, matchData) {
		var betMoneyInput = dialog.find(".bet_money");
		var _this = this;
		dialog.find(".do-bet-btn").click(function() {
			if(matchData.zhgg && matchData.zhgg.count < matchData.zhgg.max_sg_num) {
				showAlert("串关数目不能少于" + matchData.zhgg.max_sg_num + "个");
				return;
			}
			if(matchData.zhgg && matchData.zhgg.count > 10) {
				showAlert("串关数目不能多于10个");
				return;
			}
			var betMoney = $.trim(betMoneyInput.val());
			if(!betMoney && !betMoneyInput[0].validationMessage) {
				showAlert("请填写下注金额", function() {
					betMoneyInput.focus();
				});
				return;
			}
			if(/\./.test(betMoney)) {
				showAlert("请填写整数金额", function() {
					betMoneyInput.focus();
				});
				return;
			}
			if(!/^\d+$/.test(betMoney)) {
				showAlert("请填写正确的金额", function() {
					betMoneyInput.focus();
				});
				return;
			}
			betMoney = Number(betMoney);
			if(betMoney > Number(matchData.money)) {
				showAlert("您的余额不足", function() {
					betMoneyInput.focus();
				});
				return;
			}
			if(betMoney < Number(matchData.low_limit)) {
				showAlert("投注金额不能低于" + matchData.low_limit, function() {
					betMoneyInput.focus();
				});
				return;
			}
			if(betMoney > Number(matchData.hight_limit)) {
				showAlert("投注金额不能高于" + matchData.hight_limit, function() {
					betMoneyInput.focus();
				});
				return;
			}
			showConfirm("投注金额：" + betMoney + "\n可赢金额：" + dialog.find(".calc-win").text() + "\n确定要投注吗？", function() {
				if(matchData.zhgg) {
					_this.requestPost("/hg_sports/sport/dozhgg", {
						stype: matchData.stype,
						type: matchData.type,
						gold: betMoney
					});
				} else {
					_this.requestPost("/hg_sports/sport/doorder", {
						match_id: matchData.match_id,
						stype: matchData.stype,
						type: matchData.type,
						btype: matchData.btype,
						gold: betMoney
					}, null, {
						successDialogHandler: function() {
							dialog.remove();
						},
						error: function() {
							dialog.remove();
							showAlert("网络不稳定或服务器忙，请通过注单查询确认是否下注成功。");
						}
					});
				}
			});
		});
		dialog.find(".suggest .btn").click(function() {
			betMoneyInput.val($(this).data("money"));
			betMoneyInput.change();
		});
		betMoneyInput.bind("change input", function() {
			var rate = 0;
			if(matchData.zhgg) {
				rate = Number(matchData.zhgg.rate || 0);
			} else {
				rate = Number(matchData.rate || 0);
			}
			var money = Number(this.value);
			var calcResult = 0;
			if(matchData.minus > 0) {
				calcResult = money * rate - money;
			} else {
				calcResult = money * rate;
			}
			calcResult = calcResult > 0 ? calcResult : 0;
			dialog.find(".calc-win").text(BaseJS.formatMoney(calcResult));
		});
		var refreshBtn = dialog.find(".refresh-btn");
		if(refreshBtn.length > 0) {
			var timeCount = 10;
			var timeCountArea = dialog.find(".time-count");
			var timer = null;
			refreshBtn.click(function() {
				_this.requestGet("/hg_sports/sport/order/" + matchData.match_id, {
					stype: matchData.stype,
					type: matchData.type,
					btype: matchData.btype
				}, function(newMatchData) {
					if(!newMatchData) {
						return;
					}
					matchData = newMatchData;
					timeCount = 10;
					timeCountArea.text(timeCount);
					dialog.find(".rate-info").text(matchData.rate);
					betMoneyInput.change();
				}, {
					errorDialogHandler: function() {
						dialog.remove();
					},
					errorHandler: function() {
						if(timer) {
							clearInterval(timer);
							timer = null;
						}
					}
				});
			});
			timer = setInterval(function() {
				if(timeCount <= 0) {
					timeCount = 10;
					refreshBtn.click();
				} else {
					timeCount--;
				}
				timeCountArea.text(timeCount);
			}, 1000);
			dialog.on("remove", function() {
				if(timer) {
					clearInterval(timer);
					timer = null;
				}
			});
		}
		var betTotalInfo = dialog.find(".bet-total-info");
		var syncBetTotalInfo = function() {
			if(betTotalInfo.length > 0) {
				betTotalInfo.html('<span class="txt-important">' + (matchData.zhgg ? matchData.zhgg.count : 0) + '</span>串1 @<span class="info-warning">' + (matchData.zhgg ? matchData.zhgg.rate : 0) + '</span>');
			}
		};
		syncBetTotalInfo();
		dialog.find(".match-remove-btn").click(function() {
			var removeBtn = $(this);
			var match = removeBtn.data("match");
			_this.removeBetMatch(match, function(data) {
				matchData = data;
				removeBtn.closest(".match-item").remove();
				if(dialog.find(".match-item").length === 0) {
					dialog.find(".list-group").after('<div class="no-result">无相关信息</div>');
				}
				syncBetTotalInfo();
				dialog.syncSize();
			});
		});
	},
	openSportRule: function(url, title, caller) {
		var _this = this;
		this.requestGet(url, null, function(data) {
			var matchResult = data.match(/<div id="info.*?">([\s\S]*?)(<p id="back-top">[\s\S]*)?<div class="to_top">/);
			if(matchResult) {
				MainJS.showDialog({
					title: title || "规则说明",
					content: '<div class="dialog-rule-list">' + (matchResult[1] || "") + '</div>',
					onInit: function(dialog) {
						var tpl = _this.getTpl("sport", "ruleListMenu");
						var html = _this.renderTpl(tpl);
						dialog.find(".modal-header").prepend(html);
						dialog.find(".modal-header li a").click(function() {
							MainJS.openSportRule($(this).data("src"), $(this).text(), function() {
								dialog.remove();
							});
						});
						dialog.find("a[href^='#']").click(function() {
							var scrollbar = dialog.getBodyMainScrollbar();
							var targetId = $(this).attr("href").replace(/^#/, "");
							var target = document.getElementById(targetId);
							if(!targetId || (target && $(target).parents().filter(scrollbar.scroller).length > 0)) {
								if(target) {
									scrollbar.scrollToElement(target, 500);
								} else {
									scrollbar.scrollTo(0, 0, 500);
								}
								setTimeout(function() {
									scrollHandler();
								}, 800);
								return false;
							}
							if(!target && !/^module\//.test(targetId)) {
								return false;
							}
						});
						dialog.find("table").addClass("table table-striped");
						var toTop = $('<button class="btn btn-warning" style="opacity:0.8;display:none;transform:rotate(90deg);font-size:20px;;position:absolute;bottom:30px;right:0;"><span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span></button>');
						var scrollHandler = function() {
							var scrollbar = dialog.getBodyMainScrollbar();
							if(scrollbar.y < -100 && scrollbar.vScrollbar) {
								toTop.fadeIn();
							} else {
								toTop.fadeOut();
							}
						};
						toTop.click(function() {
							var scrollbar = dialog.getBodyMainScrollbar();
							scrollbar.scrollTo(0, 0, 500);
							setTimeout(function() {
								scrollHandler();
							}, 800);
						});
						dialog.getDialogBody().on("mousemove touchstart", scrollHandler);
						dialog.getDialogBody().append(toTop);
						var doRefresh = window.setInterval(function() {
							scrollHandler();
						}, 2000);
						dialog.on("remove", function() {
							window.clearInterval(doRefresh);
						});
						if(caller) {
							caller();
						}
					}
				});
			}
		}, {
			dataType: "html"
		});
	},
	openRuleList: function() {
		var tpl = this.getTpl("sport", "ruleList");
		var html = this.renderTpl(tpl);
		MainJS.showDialog({
			title: "规则说明",
			content: '<div class="dialog-rule-list">' + html + '</div>',
			onInit: function(dialog) {
				dialog.find(".select-menu .btn").click(function() {
					MainJS.openSportRule($(this).data("src"), $(this).text(), function() {
						dialog.remove();
					});
				});
			}
		});
	}
});;
BaseJS.addModuleClass("SportResult", {
	init: function() {
		this.renderBody("sport_result");
	},
	actionIndex: function() {
		this.initData.stype = this.initData.stype || "ft";
		var stypes = this.initData.stype;
		this.initPullDownRefresh();
		this.initData.date = this.initData.date || MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd");
		var today = MainJS.getTimeForServer((new Date()).getTime(), "yyyy-MM-dd");
		var yesday = BaseJS.formatDate((new Date(this.initData.date)).getTime() - 3600 * 24 * 1000, "yyyy-MM-dd");
		var nextday = BaseJS.formatDate((new Date(this.initData.date)).getTime() + 3600 * 24 * 1000, "yyyy-MM-dd");
		this.setPageTitle((/^ft/.test(this.initData.stype) ? "足球赛果" : "篮球赛果") + (/gj$/.test(this.initData.stype) ? " - 冠军" : "") + (this.initData.date ? "（" + this.initData.date + "）" : ""));
		this.find(".top-menu-result .fontday").click(function() {
			MainJS.openModule("sportResult", {
				stype: stypes,
				date: yesday
			});
		});
		if(this.initData.date == today) {
			this.find(".top-menu-result .nextday").hide();
		} else {
			this.find(".top-menu-result .nextday").click(function() {
				MainJS.openModule("sportResult", {
					stype: stypes,
					date: nextday
				});
			});
		}
		var _this = this;
		var requestUrl = "/hg_sports/sport/sg/" + this.initData.stype;
		this.requestGet(requestUrl, {
			date: this.initData.date
		}, function(data) {
			var tpl = _this.getTpl("sport_result", /gj$/.test(_this.initData.stype) ? "resultGjList" : "resultList");
			var html = _this.renderTpl(tpl, {
				list: data
			});
			_this.fillMainContent(html);
		});
	}
});;
BaseJS.classes.MainController = function(cfg) {
	BaseJS.classes.MainController.superClass.constructor.apply(this, arguments);
	this.cfg = cfg;
};
BaseJS.classExtend(BaseJS.classes.MainController, BaseJS.classes.BaseController, {
	init: function() {
		if(window.pageLoader) {
			pageLoader.close();
		}
		$(".page-loader").remove();
		if(window.navigator.platform === "Win32") {
			$("html").css({
				"touch-action": "none"
			});
		}
		if(window.location.hash !== "#module/common/action/youhuiDo") {
			var passiveSupported = false;
			try {
				var options = {
					get passive() {
						passiveSupported = true;
					}
				};
				window.addEventListener("test", null, options);
				window.removeEventListener("test", null, options);
			} catch(err) {
				passiveSupported = false;
			}
			document.addEventListener("touchmove", function(event) {
				event.preventDefault();
			}, passiveSupported ? {
				passive: false
			} : false);
		}
		this.adaptSystem();
		var _this = this;
		this.getTemplateAll(function() {
			if(_this.isApp && window.navigator.userAgent.indexOf("Html5Plus") >= 0) {
				if(window.plus) {
					_this.appReadyInit();
				} else {
					document.addEventListener('plusready', function() {
						_this.appReadyInit();
					}, false);
				}
			} else {
				_this.doInit();
			}
		});
	},
	doInit: function() {
		this.triggerHandler("beforeInit");
		if(this.sysSetting.bodyClass) {
			$(document.body).addClass(this.sysSetting.bodyClass);
		}
		var locationHash = this.getLocationHash();
		this.setLoginUser(this.cfg.data.mid ? {
			mid: this.cfg.data.mid
		} : null, (!locationHash || locationHash === "module/common/action/home") ? false : true);
		this.bindNavigate();
		if(this.cfg.maintence) {
			this.createModule("common", {
				action: "message",
				info: this.cfg.maintence
			});
			return;
		}
		if(!locationHash) {
			if(this.isApp) {
				if(window.plus) {
					var webview = plus.webview.currentWebview();
					if(webview && this.isSubSystem) {
						webview.close("none");
						return;
					}
				}
				if(this.cfg.data.QRCode) {
					this.createModule("common", {
						action: "download"
					});
				}
			} else {
				this.initMenu();
				this.goHome();
			}
		} else {
			this.initMenu();
		}
		this.initThemeColor();
		if(this.cfg.data.jsCode) {
			$(document.body).append(this.cfg.data.jsCode);
		}
		if(!this.isApp) {
			if(document.referrer && document.referrer.indexOf("/index/appdownload?mdomain=") >= 0) {
				MainJS.showAddToHomeScreenTipDialogByScan();
			}
		}
	},
	initThemeColor: function() {
		var styleList = {
			"black": "#000000",
			"dark_black": "#333333",
			"blue": "#0000FF",
			"light_blue": "#0069D2",
			"ice_blue": "#14596E",
			"see_blue": "#32C7EE",
			"dark_blue": "#000080",
			"red": "#FF0000",
			"light_red": "#FF5959",
			"pink": "#FF607B",
			"light_pink": "#FF8698",
			"dark_pink": "#FF4460",
			"pure_ice_blue": "#1F3BEF",
			"coffee_red": "#762D0D",
			"purple": "#8000FF",
			"light_purple": "#8E1EFF",
			"green": "#228767",
			"yellow": "#C4C400",
			"dark_yellow": "#B28F25"
		};
		var style = this.cfg.data.styleColor || "";
		var initStyleColor = "";
		if(style.indexOf("black") >= 0) {
			initStyleColor = styleList["dark_black"];
		} else if(style.indexOf("blue") >= 0) {
			initStyleColor = styleList["dark_blue"];
		} else if(style.indexOf("purple") >= 0 || style.indexOf("zi") >= 0) {
			initStyleColor = styleList["purple"];
		} else if(style.indexOf("yellow") >= 0) {
			initStyleColor = styleList["dark_yellow"];
		} else if(style.indexOf("coffee") >= 0) {
			initStyleColor = styleList["coffee_red"];
		} else if(style.indexOf("green") >= 0) {
			initStyleColor = styleList["green"];
		} else if(/^#/.test(style)) {
			initStyleColor = style;
		} else {
			initStyleColor = "#032B5C";
		}
		this.setThemeColor(initStyleColor);
		if(window.plus && !this.isQuit) {
			var _this = this;
			var checkSplashHandler = window.setInterval(function() {
				if(!plus.navigator.hasSplashscreen()) {
					window.clearInterval(checkSplashHandler);
					plus.navigator.setStatusBarStyle("light");
					plus.navigator.setStatusBarBackground(_this.getThemeColor(0.7));
				}
			}, 20);
		}
	},
	checkLogin: function() {
		return $.cookie("BASEJS_IS_MEMBER_LOGIN") === "1" ? true : false;
	},
	setLoginUser: function(user, isNoNotice, caller) {
		if(!this.checkLogin() && user && !isNoNotice) {
			this.loginUser = user;
			$.cookie("BASEJS_IS_MEMBER_LOGIN", user ? "1" : "0", {
				path: "/"
			});
			var popNotice = this.cfg.data.popNotice;
			if(popNotice) {
				this.showSystemNotice(popNotice, caller);
			} else {
				if(caller) {
					caller();
				}
			}
		} else {
			this.loginUser = user;
			$.cookie("BASEJS_IS_MEMBER_LOGIN", user ? "1" : "0", {
				path: "/"
			});
			if(caller) {
				caller();
			}
		}
		if(this.layoutCfg.bodyBottom) {
			if(!this.logoutMenuItem) {
				this.logoutMenuItem = this.layoutCfg.bodyBottom.find(".menu-logout-btn");
				this.logoutMenuPrev = this.logoutMenuItem.prev();
				if(this.logoutMenuPrev.length === 0) {
					this.logoutMenuParent = this.logoutMenuItem.parent();
				}
				this.logoutMenuItem.remove();
			}
			if(user) {
				if(this.logoutMenuParent) {
					this.logoutMenuParent.prepend(this.logoutMenuItem);
				} else {
					this.logoutMenuPrev.after(this.logoutMenuItem);
				}
			} else {
				this.logoutMenuItem.remove();
			}
		}
	},
	getLoginUser: function() {
		return this.loginUser;
	},
	goBack: function() {
		if(this.clickMenuItem) {
			var clickMenuItem = this.clickMenuItem;
			this.clickMenuItem = null;
			var menuItem = $(clickMenuItem).data("item");
			if(this.checkOpenWin(menuItem)) {
				this.goBack();
			}
			this.checkClick(clickMenuItem);
		} else if(this.navigateCount <= 1) {
			this.goHome();
		} else {
			window.history.back();
		}
	},
	initMenu: function() {
		var moduleInfo = this.parserModuleUrl();
		if(moduleInfo) {
			var mn = moduleInfo.moduleName;
			var ma = moduleInfo.moduleCfg.action;
			if((mn === "common" && (ma === "download" || ma === "exchange")) || (mn === "member" && ma === "login")) {
				return;
			}
		}
		if(!this.isBodyBottomHidden && this.cfg.data.config && this.cfg.data.config.mainMenu && !this.isSubSystem) {
			if(!this.layoutCfg.bodyBottom) {
				this.layoutCfg.bodyBottom = $('<div class="layout-bottom"></div>');
				this.layoutCfg.bodyMain.after(this.layoutCfg.bodyBottom);
			}
			var menuTpl = this.getTpl("common", "mainMenu");
			var mainMenu = MainJS.cfg.data.config.mainMenu;
			var lastMenuItem = mainMenu[mainMenu.length - 1];
			if(lastMenuItem.sub) {
				lastMenuItem.sub.push({
					name: "安全退出",
					id: "exit",
					class: "menu-logout-btn",
					onclick: "MainJS.logout();"
				});
			}
			var menuHtml = this.renderTpl(menuTpl, {
				mainMenu: mainMenu,
				moneyMenu: [{
					iconClass: "glyphicon glyphicon-piggy-bank icon",
					name: "在线存款",
					url: "#module/member/action/recharge",
					login: "1",
					mode: "main"
				}, {
					iconClass: "glyphicon glyphicon-new-window icon",
					name: "在线取款",
					url: "#module/member/action/draw",
					login: "1",
					mode: "main"
				}]
			});
			this.layoutCfg.bodyBottom.append(menuHtml);
			this.clickMenuItem = null;
			var _this = this;
			this.layoutCfg.bodyBottom.find(".dropup").width((100 / mainMenu.length) + "%");
			if(BaseJS.isWebKit) {
				this.layoutCfg.bodyBottom.find(".dropup >a").css("outline-style", "none").attr("tabindex", "1");
			}
			this.layoutCfg.bodyBottom.find(".dropdown-menu").each(function(k, v) {
				var container = $(v);
				var content = container.find(">*");
				content.remove();
				container.append('<li><ul style="list-style:none;padding:0;margin:0;"></ul></li>');
				container.find("ul").append(content);
				container.data("scrollbar", BaseJS.createScrollbar({
					target: container,
					isAutoHeight: true
				}));
			});
			var menu = this.layoutCfg.bodyBottom.find(".money-menu");
			var isBluring = false;
			menu.blur(function() {
				_this.enable();
				menu.hide();
				isBluring = true;
				setTimeout(function() {
					isBluring = false;
				}, 500);
			});
			var isBind = false;
			this.layoutCfg.bodyBottom.find(".main-menu-area a, .money-menu [data-item]").click(function(e) {
				if($(this).parent().data("id") === "money") {
					if(menu.is(":hidden") && !isBluring) {
						menu.show();
						menu.focus();
						_this.disable();
						if(!isBind) {
							isBind = true;
							_this._disableMask.on("click", function() {
								menu.blur();
							});
						}
					}
					isBluring = false;
				} else {
					_this.checkClick(this, e);
					menu.blur();
				}
			});
			this.layoutCfg.bodyBottom.find(".menu-mask").bind("click", function() {
				$(".dropup.more-menu.open").removeClass("open");
			});
			this.syncSize();
		}
	},
	cacheTpls: function(tplList) {
		if(tplList) {
			var _this = this;
			$.each(tplList, function(k, v) {
				_this.getTplData(v);
			});
		}
	},
	getTemplateAll: function(caller) {
		var _this = this;
		var getTplAll = function(data) {
			$.each(data, function(k, v) {
				_this.tplCache[k] = _this.getTplInfo(v);
			});
			if(caller) {
				caller();
			}
		};
		getTplAll(window.BASEJS_TPL_ALL);
	},
	getTplInfo: function(tplStr) {
		var result = null;
		var exp = /<!--tplStart:(\w+)-->([\s\S]*?)<!--tplEnd-->/g;
		var tpls = {};
		while((result = exp.exec(tplStr)) !== null) {
			tpls[result[1]] = result[2];
		}
		return tpls;
	},
	getTplData: function(tplId) {
		if(this.tplCache[tplId]) {
			return this.tplCache[tplId];
		}
		var tplStr = "";
		this.requestGet(this.staticPath + "/js/templates/" + tplId + ".tpl", null, function(data) {
			tplStr = data;
		}, {
			async: false,
			dataType: "html"
		});
		this.tplCache[tplId] = this.getTplInfo(tplStr);
		return this.tplCache[tplId];
	},
	getTimeForServer: function(dateTime, format) {
		if($.isNumeric(dateTime)) {
			dateTime = new Date(dateTime);
		}
		dateTime = dateTime || new Date();
		var clientOffsetHour = (dateTime.getTimezoneOffset() / 60) * -1;
		var serverOffsetHour = this.cfg.serverOffsetHour;
		var diffTime = (clientOffsetHour - serverOffsetHour) * 3600000;
		var serverTime = dateTime.getTime() - diffTime;
		return BaseJS.formatDate(serverTime, format);
	},
	getTypeList: function(stype) {
		if(stype === "ft") {
			var list = [{
				name: "单式",
				id: "ds"
			}, {
				name: "波胆",
				id: "bd"
			}, {
				name: "入球数",
				id: "zrq"
			}, {
				name: "半全场",
				id: "bqs"
			}, {
				name: "滚球",
				id: "gq"
			}, {
				name: "综合过关",
				id: "zhgg"
			}, {
				name: "冠军",
				id: "gj"
			}];
		} else {
			var list = [{
				name: "单式",
				id: "ds"
			}, {
				name: "滚球",
				id: "gq"
			}, {
				name: "综合过关",
				id: "zhgg"
			}, {
				name: "冠军",
				id: "gj"
			}];
		}
		return list;
	},
	getSportList: function() {
		var list = [{
			name: "足球",
			id: "ft"
		}, {
			name: "篮球",
			id: "bb"
		}, {
			name: "棒球",
			id: "ba",
			disabled: true
		}, {
			name: "网球",
			id: "te",
			disabled: true
		}, {
			name: "排球",
			id: "vo",
			disabled: true
		}, {
			name: "其他",
			id: "ot",
			disabled: true
		}];
		return list;
	},
	getSportName: function(id) {
		var list = this.getSportList();
		var sportName = "";
		$.each(list, function(k, v) {
			if(id === v.id) {
				sportName = v.name;
				return false;
			}
		});
		return sportName;
	},
	getPlayType: function(stype, id) {
		var list = this.getTypeList(stype);
		var playType = "";
		$.each(list, function(k, v) {
			if(id === v.id) {
				playType = v.name;
				return false;
			}
		});
		return playType;
	},
	clearAppCache: function() {
		var _this = this;
		var wkView = null;
		if(!BaseJS.isAndroid) {
			wkView = plus.webview.create("", "__test__", {
				kernel: "WKWebview",
				height: "1px",
				width: "1px"
			});
			if(wkView && wkView.loadData && wkView.hide && this.activeModule) {
				wkView.hide("none");
				this.activeModule.on("remove", function() {
					if(wkView) {
						wkView.close("none");
						wkView = null;
					}
				});
			}
		}
		showConfirm("确定要清除缓存吗？", function() {
			if(BaseJS.isAndroid) {
				var nwv = plus.android.currentWebview();
				plus.android.invoke(nwv, "clearCache", true);
				showSuccess("清除缓存成功");
			} else {
				var commonHandler = function() {
					var NSURLCache = plus.ios.import("NSURLCache");
					var sharedURLCache = NSURLCache.sharedURLCache();
					sharedURLCache.removeAllCachedResponses();
					showSuccess("清除缓存成功");
					if(wkView && wkView.close) {
						wkView.close("none");
						wkView = null;
					}
				};
				var WKWebsiteDataStore = _this.getWKWebsiteDataStore();
				var isSupportWKWebView = false;
				if(wkView && wkView.nativeInstanceObject) {
					var nWkView = wkView.nativeInstanceObject();
					if(nWkView && nWkView.plusGetAttribute("navigationDelegate") !== undefined) {
						isSupportWKWebView = true;
					}
				}
				if(WKWebsiteDataStore && isSupportWKWebView) {
					var NSDate = plus.ios.import("NSDate");
					var dateInfo = NSDate.dateWithTimeIntervalSince1970(0);
					var defaultDataStore = WKWebsiteDataStore.defaultDataStore();
					var allWebsiteDataTypes = WKWebsiteDataStore.allWebsiteDataTypes();
					var allObjects = allWebsiteDataTypes.plusGetAttribute("allObjects");
					var count = allObjects.plusGetAttribute("count");
					var cacheTypes = plus.ios.newObject("NSMutableSet");
					for(var i = 0; i < count; i++) {
						var val = plus.ios.invoke(allObjects, "objectAtIndex:", i);
						if($.inArray(val, ["WKWebsiteDataTypeDiskCache", "WKWebsiteDataTypeMemoryCache"]) >= 0) {
							plus.ios.invoke(cacheTypes, "addObject:", val);
						}
					}
					plus.ios.invoke(defaultDataStore, "removeDataOfTypes:modifiedSince:completionHandler:", cacheTypes, dateInfo, commonHandler);
				} else {
					commonHandler();
				}
			}
		});
	},
	getWKWebsiteDataStore: function() {
		if(this.WKWebsiteDataStore === undefined) {
			this.WKWebsiteDataStore = plus.ios.import("WKWebsiteDataStore");
		}
		return this.WKWebsiteDataStore;
	},
	openAppWin: function(data) {
		if(window.plus && data.message && data.message.url) {
			var _this = this;
			if(this.isContentWinOpening) {
				return;
			}
			this.isContentWinOpening = true;
			setTimeout(function() {
				_this.isContentWinOpening = false;
			}, 1000);
			var isShowTitle = data.message.orientation === "s";
			if(this.contentWin) {
				this.contentWin.close("none");
				this.contentWin = null;
			}
			if(this.toolbar) {
				if(isShowTitle) {
					_this.toolbar.evalJS('document.getElementById("title").innerHTML="";');
				} else {
					_this.toolbar.evalJS('document.getElementById("hide").click();');
				}
			}
			var isSupportWKWebsiteDataStore = !BaseJS.isAndroid && this.getWKWebsiteDataStore() ? true : false;
			var winStyle = {
				backButtonAutoControl: "close",
				scalable: true,
				plusrequire: "ahead"
			};
			var toolbarStyle = {
				backButtonAutoControl: "close",
				height: "28px",
				width: "37px",
				background: "transparent",
				scrollIndicator: "none"
			};
			var baseUrl = window.location.protocol + "//" + window.location.host;
			if(isSupportWKWebsiteDataStore) {
				if(data.message.url.indexOf(baseUrl + "/qp/index") >= 0 || data.message.url.indexOf(baseUrl + "/ky/index") >= 0) {
					winStyle.kernel = "WKWebview";
					if(data.message.url.indexOf(window.location.protocol + "//" + window.location.host) === 0) {
						winStyle.additionalHttpHeaders = {
							Cookie: document.cookie
						};
					}
				}
				toolbarStyle.kernel = "WKWebview";
			}
			if(isShowTitle) {
				winStyle.top = "42px";
				winStyle.bottom = "0px";
				toolbarStyle.height = "42px";
				toolbarStyle.background = "";
				toolbarStyle.width = "100%";
			}
			var nwaiting = plus.nativeUI.showWaiting("", {
				back: "transmit"
			});
			var isLoaded = false;
			if(BaseJS.isAndroid) {
				var main = plus.android.runtimeMainActivity();
				if(main.setRequestedOrientation) {
					main.setRequestedOrientation(-1);
				}
			} else {
				plus.screen.unlockOrientation();
			}
			this.contentWin = plus.webview.create(data.message.url, "content", winStyle);
			this.contentWin.appendJsFile("_doc/preload.js");
			var barId = isShowTitle ? "toolbar_title" : "toolbar";
			var initContent = function() {
				if(isLoaded) {
					return;
				}
				isLoaded = true;
				var closeCaller = function() {
					if(_this.contentWin) {
						_this.contentWin.close("none");
						_this.contentWin = null;
					}
					plus.navigator.setFullscreen(false);
					plus.screen.lockOrientation("portrait-primary");
					_this.toolbar = null;
				};
				if(_this.toolbar && _this.toolbar.id !== barId) {
					_this.toolbar.removeEventListener("close", closeCaller);
					_this.toolbar.close("none");
					_this.toolbar = null;
				}
				var isShown = false;
				var showCaller = function() {
					if(isShowTitle) {
						_this.toolbar.evalJS('var title = document.getElementById("title");if(title){title.innerHTML="' + BaseJS.encodeHTML(data.message.title || _this.contentWin.getTitle()) + '";}');
					}
					if(isShown) {
						return;
					}
					isShown = true;
					if(nwaiting) {
						nwaiting.close();
						nwaiting = null;
					}
					_this.contentWin.show("fade-in");
					_this.toolbar.show("fade-in");
					if(BaseJS.isAndroid) {
						$(document.body).hide();
					}
					_this.toolbar.evalJS('window.onorientationchange&&window.onorientationchange();');
				};
				if(!_this.toolbar) {
					_this.toolbar = plus.webview.create("", barId, toolbarStyle);
					var tpl = _this.getTpl("common", isShowTitle ? "title" : "toolbar");
					var html = _this.renderTpl(tpl);
					_this.toolbar.loadData(html);
					_this.toolbar.addEventListener("hide", function() {
						if(_this.contentWin) {
							_this.contentWin.close("none");
							_this.contentWin = null;
						}
						plus.navigator.setFullscreen(false);
						plus.screen.lockOrientation("portrait-primary");
						if(isShowTitle) {
							_this.toolbar.evalJS('document.getElementById("title").innerHTML="";');
						} else {
							_this.toolbar.evalJS('document.getElementById("hide").click();');
						}
					}, false);
					_this.toolbar.addEventListener("close", closeCaller, false);
					_this.toolbar.addEventListener("loaded", function() {
						showCaller();
					}, false);
					setTimeout(function() {
						showCaller();
					}, 1000);
				} else {
					showCaller();
				}
			};
			this.contentWin.addEventListener("close", function() {
				if(nwaiting) {
					nwaiting.close();
					nwaiting = null;
				}
				if(_this.toolbar) {
					_this.toolbar.hide("none");
				}
				if(BaseJS.isAndroid) {
					$(document.body).show();
				}
			}, false);
			this.contentWin.addEventListener("titleUpdate", function() {
				_this.contentWin.evalJS(_this.preloadJS);
				initContent();
			}, false);
			this.contentWin.addEventListener("loaded", function() {
				_this.contentWin.evalJS(_this.preloadJS);
				if(BaseJS.isAndroid) {
					$(document.body).show();
				}
				if(BaseJS.isIphone) {
					_this.contentWin.evalJS('try{if(window.__setPullToRefresh__===undefined){window.__setPullToRefresh__=function(){};}var nwv = plus.ios.currentWebview();nwv.plusSetAttribute("allowsInlineMediaPlayback",true);}catch(e){}');
				}
				if(_this.isIphoneXSeries) {
					_this.contentWin.evalJS('if(window.MainJS&&window.$){$("head").append("<style>.module-bottom >*:last-child{padding-bottom:34px;}</style>");}');
				}
				_this.contentWin.evalJS('try{HTMLElement.prototype.requestFullscreen=null;HTMLElement.prototype.webkitRequestFullscreen=null;HTMLElement.prototype.webkitRequestFullScreen=null;document.exitFullscreen();}catch(e){}if(window.location.host==="' + window.location.host + '"&&window.location.hash==="#module/member/action/login"&&window.MainJS&&!MainJS.getLoginUser()){var view=plus.webview.currentWebview();var openW=view.opener();openW.evalJS("if(window.MainJS){MainJS.showLogoutByWebview();}");}');
			}, false);
			setTimeout(function() {
				initContent();
			}, 5000);
		} else {
			if(data.message && data.message.url) {
				this.openWin(data.message.url);
			}
		}
	},
	showLogoutByWebview: function() {
		this.showLogout("请先登录");
		if(this.contentWin) {
			this.contentWin.close("none");
		}
	},
	showLogout: function(message) {
		this.setLoginUser(null);
		var _this = this;
		this.showMessage(message || "未知原因登出", function() {
			_this.login();
		}, "glyphicon-alert alert-icon", false, false, true);
	},
	openLink: function(url) {
		this.openModule("common", {
			action: "openLink",
			url: url
		});
	},
	openInApp: function(url, title, cfg) {
		cfg = cfg || {};
		this.openAppWin({
			ptl: "window",
			message: {
				showLogo: cfg.showLogo || "0",
				mode: "inappbrowser",
				url: url,
				title: title || "",
				orientation: cfg.orientation || "s",
				history: "1"
			}
		});
	},
	openWin: function(url, title, cfg) {
		title = title || "新窗口";
		cfg = cfg || {};
		if(window.plus) {
			var baseUrl = window.location.protocol + "//" + window.location.host;
			if(!/^https?\:\/\//.test(url)) {
				if(!/\:\/\//.test(url)) {
					if(/^\//.test(url)) {
						url = baseUrl + url;
					} else if(/^#/.test(url)) {
						url = baseUrl + window.location.pathname + url;
					} else {
						var pathInfo = window.location.pathname.split("/");
						pathInfo[pathInfo.length - 1] = url;
						url = baseUrl + pathInfo.join("/");
					}
				} else {
					window.open(url);
					return;
				}
			}
			this.openAppWin({
				ptl: "window",
				message: {
					showLogo: cfg.showLogo || "0",
					mode: cfg.mode || "sub",
					url: url,
					title: title || "",
					orientation: cfg.orientation || "s",
					history: "1"
				}
			});
		} else {
			if(window.navigator.standalone) {
				var link = $("a")[0];
				link.href = url;
				link.click();
			} else {
				window.open(url);
			}
		}
	},
	logout: function() {
		if(this.isSubSystem) {
			var view = plus.webview.currentWebview();
			var openW = view.opener();
			openW.evalJS("if(window.MainJS){MainJS.logout();}");
			return;
		}
		var _this = this;
		this.requestGet("/index/logout", null, function() {
			_this.setLoginUser(null);
			if(_this.contentWin) {
				_this.contentWin.close("none");
			}
			_this.goHome(true);
		});
	},
	login: function() {
		this.openModule("member", {
			action: "login"
		});
	},
	goToMemberInfo: function() {
		if(this.isSubSystem) {
			var view = plus.webview.currentWebview();
			var openW = view.opener();
			openW.evalJS("if(window.MainJS){MainJS.goToMemberInfo();}");
			return;
		}
		if(this.contentWin) {
			this.contentWin.close("none");
		}
		this.openModule("member");
	},
	checkOpenWin: function(menuItem) {
		if(!menuItem.url) {
			return false;
		}
		if(!this.isApp && menuItem.id === "lo") {
			return false;
		}
		if((!/^#/.test(menuItem.url) && (BaseJS.isMac || BaseJS.isSafari || menuItem.mode === "sub")) || menuItem.mode === "inappbrowser" || menuItem.mode === "insidebrowser") {
			return true;
		} else {
			if(BaseJS.isSecure && /^http\:/.test(menuItem.url)) {
				if(menuItem.url.indexOf("http://" + window.location.host) !== 0) {
					return true;
				}
			}
			return false;
		}
	},
	checkClick: function(element, e, noCheckMoney, isReplace) {
		var obj = $(element);
		var menuItem = obj.data("item");
		if(!menuItem) {
			return;
		}
		var _this = this;
		if(!this.checkLogin() && menuItem.login == 1) {
			this.clickMenuItem = element;
			this.showLogout("请先登录", function() {
				_this.login();
			});
			return;
		}
		if(!noCheckMoney) {
			if(menuItem.target) {
				if(this.checkOpenWin(menuItem) && !window.plus) {
					MainJS.openModule("common", {
						action: "exchange",
						target: menuItem.target,
						url: menuItem.url
					}, true);
				} else {
					this.requestGet("/member-exchange/balance/" + menuItem.target, null, function(data) {
						var info = data[menuItem.target];
						if(info >= 1 || info === "刷新重试!") {
							_this.checkClick(element, e, true, isReplace);
						} else {
							_this.showExchangeDialog(menuItem.target, function() {
								_this.checkClick(element, e, true, isReplace);
							});
						}
					}, {
						async: this.checkOpenWin(menuItem) && !this.isApp ? false : true,
						error: function() {
							_this.checkClick(element, e, true, isReplace);
						}
					});
				}
				return;
			}
		}
		if(this.isTBK) {
			if(menuItem.id === "st") {
				this.requestGet("/hg_sports/sport/back", null, null, {
					noMask: true,
					error: null
				});
			}
		}
		if(/\:/.test(menuItem.url) && !/^https?\:/.test(menuItem.url)) {
			window.location = menuItem.url;
			return;
		}
		if(!/^#/.test(menuItem.url) && menuItem.mode === "main" && this.isApp) {
			this.openLink(menuItem.url);
			return;
		}
		if(this.checkOpenWin(menuItem)) {
			this.openWin(menuItem.url, menuItem.name || $.trim(obj.text()), menuItem);
		} else {
			if(/^#/.test(menuItem.url)) {
				if(isReplace) {
					window.location.replace(menuItem.url);
				} else {
					window.location = menuItem.url;
				}
			} else {
				if(menuItem.url) {
					if(this.isApp) {
						if(isReplace) {
							window.location.replace(menuItem.url);
						} else {
							window.location = menuItem.url;
						}
					} else {
						window.open(menuItem.url);
					}
				}
			}
		}
	},
	getHomeIcon: function(menuId) {
		return this.sysSetting.homeIcon[menuId] || (this.staticPath + "/images/menu_btns/" + menuId + ".png");
	},
	getSecondIcon: function(menuId) {
		return this.sysSetting.secondIcon[menuId] || (this.staticPath + "/images/icons/" + menuId + ".png");
	},
	getMainIconClass: function(menuId) {
		return this.sysSetting.mainIconClass[menuId] || "";
	},
	showDialogList: function(title, cfg, containerClass) {
		this.showDialog({
			title: title,
			containerClass: containerClass || "list-dialog-main",
			onInit: function(dialog) {
				new BaseJS.classes.components.DataList(cfg, {
					container: dialog.getDialogBody(),
					parentObject: dialog
				});
				dialog.show();
			}
		});
	},
	setThemeColor: function(baseColor) {
		this.baseColor = baseColor || "#333";
		var tpl = this.getTpl("common", "style");
		var style = this.renderTpl(tpl);
		if(this.styleElement) {
			this.styleElement.remove();
			this.styleElement = null;
		}
		this.styleElement = $('<style type="text/css">' + style + '</style>');
		$("head").append(this.styleElement);
	},
	getThemeColor: function(opacity, isRgba, baseColor) {
		var color = this.getRgbColor(baseColor || this.baseColor);
		opacity = opacity || 1;
		if(isRgba) {
			return "rgba(" + color.r + "," + color.g + "," + color.b + "," + opacity + ")";
		}
		$.each(color, function(k, v) {
			color[k] = Math.max(0, Math.floor(255 - (255 - v) * opacity));
		});
		return "rgb(" + color.r + "," + color.g + "," + color.b + ")";
	},
	getRgbColor: function(color) {
		if(/^#/.test(color)) {
			var value = color.replace(/^#/, "");
			if(value.length === 6) {
				var r = value.substr(0, 2);
				var g = value.substr(2, 2);
				var b = value.substr(4, 2);
			} else if(value.length === 3) {
				var r = value.substr(0, 1) + "f";
				var g = value.substr(1, 1) + "f";
				var b = value.substr(2, 1) + "f";
			} else {
				throw "color value error";
			}
			return {
				r: parseInt(r.toLowerCase(), 16),
				g: parseInt(g.toLowerCase(), 16),
				b: parseInt(b.toLowerCase(), 16)
			};
		} else {
			throw "color value error";
		}
	},
	calWidth: function(html, style) {
		if(!this.calWidthElement) {
			this.calWidthElement = $('<span style="position:absolute;top:-9999px;left:-9999px;white-space:normal;font-size:14px;"></span>');
			$(document.body).append(this.calWidthElement);
		}
		this.calWidthElement.html(html);
		if(style) {
			this.calWidthElement.css(style);
		}
		var w = this.calWidthElement.width();
		this.calWidthElement.html("");
		return w;
	},
	showExchangeDialog: function() {
		return BaseJS.classes.modules.MemberExchange.prototype.showExchangeDialog.apply(this, arguments);
	},
	initSystemInfo: function() {
		this.isApp = this.cfg.data.platform === "wap";
		this.isTG = this.cfg.data.system === "TG";
		this.isTBK = this.cfg.data.system === "TBK";
		this.isTBKApp = this.isApp && this.isTBK;
		this.isTBKWeb = !this.isApp && this.isTBK;
		this.isTGApp = this.isApp && this.isTG;
		this.isTGWeb = !this.isApp && this.isTG;
		this.isWebApp = window.navigator.standalone;
		if(this.isWebApp) {
			this.isApp = true;
			var currentStatusData = window.localStorage.getItem("currentStatusData");
			if(currentStatusData) {
				currentStatusData = JSON.parse(currentStatusData);
				$.cookie("web", currentStatusData.cookie.web, {
					path: "/"
				});
				$.cookie("BASEJS_IS_MEMBER_LOGIN", currentStatusData.cookie.BASEJS_IS_MEMBER_LOGIN, {
					path: "/"
				});
				window.location = currentStatusData.location;
			}
			$(window).on("hashchange", function() {
				window.localStorage.setItem("currentStatusData", JSON.stringify({
					location: window.location.href,
					cookie: {
						BASEJS_IS_MEMBER_LOGIN: $.cookie("BASEJS_IS_MEMBER_LOGIN"),
						web: $.cookie("web")
					}
				}));
			});
		}
		if(this.isTBK) {
			this.system = "TBK";
		}
		if(this.isTG) {
			this.system = "TG";
		}
	},
	appReadyInit: function() {
		var webview = plus.webview.currentWebview();
		var firstTime = null;
		plus.key.addEventListener('backbutton', function() {
			webview.canBack(function(e) {
				if(e.canBack) {
					webview.back();
				} else {
					if(!firstTime) {
						firstTime = (new Date()).getTime();
						plus.nativeUI.toast("再按一次退出应用");
						setTimeout(function() {
							firstTime = null;
						}, 2000);
					} else {
						if((new Date()).getTime() - firstTime < 2000) {
							plus.runtime.quit();
						}
					}
				}
			});
		}, false);
		plus.screen.lockOrientation("portrait-primary");
		var _this = this;
		plus.runtime.getProperty(plus.runtime.appid, function(appInfo) {
			var info = plus.runtime.version.split(".");
			info[2] = appInfo.version.split(".")[2];
			_this.appVersion = info.join(".");
		});
		if(this.cfg.data.appConfig.checkUpdate) {
			if(this.checkUpdate(this.cfg.data.appConfig) === false) {
				this.isQuit = true;
				this.initThemeColor();
				return;
			}
		}
		this.isSubSystem = false;
		if(this.isApp) {
			var view = plus.webview.currentWebview();
			if(view.id === "content") {
				this.isSubSystem = true;
			}
		}
		if(!this.isSubSystem) {
			try {
				if(window.parent.MainJS && window.parent.MainJS !== this) {
					this.isSubSystem = true;
				}
			} catch(e) {}
		}
		this.preloadJS = 'try{Object.defineProperties(document,{"fullscreen":{value:false},"webkitIsFullScreen":{value:false}});Object.defineProperties(document,{"fullscreenEnabled":{value:false},"webkitFullscreenEnabled":{value:false}});delete HTMLElement.prototype.requestFullscreen;delete HTMLElement.prototype.requestFullScreen;delete HTMLElement.prototype.webkitRequestFullscreen;delete HTMLElement.prototype.webkitRequestFullScreen;delete Document.prototype.exitFullscreen;delete Document.prototype.webkitCancelFullScreen;}catch(e){}';
		plus.io.requestFileSystem(plus.io.PRIVATE_DOC, function(fs) {
			fs.root.getFile('preload.js', {
				create: true
			}, function(fileEntry) {
				fileEntry.createWriter(function(writer) {
					writer.write(_this.preloadJS);
				});
			});
		});
		this.doInit();
	},
	goHome: function(isForce) {
		if(isForce && window.location.hash === this.sysSetting.homeUrl && this.activeModule) {
			this.activeModule.refreshModule();
		} else {
			window.location = this.sysSetting.homeUrl;
		}
	},
	adaptSystem: function() {
		this.staticPath = "/mobile_static";
		BaseJS.setScrollbarCfg({
			isDiyPanelMenuScrollbar: true
		});
		this.initSystemInfo();
		this.isNewTheme = true;
		this.hideModuleActions = ["common/menuLink", "common/openInApp"];
		if(this.system) {
			if(this["adapt" + this.system]) {
				this["adapt" + this.system]();
			}
		} else {
			this.sysSetting = {};
		}
		var checkIphoneXSeries = function() {
			if(BaseJS.isIphone) {
				var s = window.screen;
				var r = window.devicePixelRatio;
				if((s.width === 375 && s.height === 812 || s.width === 812 & s.height === 375) && r === 3) {
					return true;
				}
				if((s.width === 414 && s.height === 896 || s.width === 896 & s.height === 414) && (r === 3 || r === 2)) {
					return true;
				}
				return false;
			}
		};
		this.isIphoneXSeries = checkIphoneXSeries();
	},
	adaptTBK: function() {
		this.initSysTBK();
	},
	adaptTG: function() {
		this.initSysTG();
	},
	initSysTG: function() {
		this.sysSetting = {
			homeUrl: "#module/common/action/home",
			bodyClass: "common_style",
			isEnableCdn: this.cfg.cdnUrl ? true : false,
			isSimpleMemberLevel: true,
			tjQueryText: "推荐",
			memberInfoText: "会员中心",
			homeIcon: {
				sport: this.staticPath + "/images/menu_btns/tg_hg_sports.png",
				st: this.staticPath + "/images/menu_btns/tg_hg_sports.png",
				jc: this.staticPath + "/images/menu_btns/jl.png",
				ag: this.staticPath + "/images/menu_btns/ag_ls.png",
				webchat: this.staticPath + "/images/menu_btns/ocs.png",
				moreMenu: this.staticPath + "/images/menu_btns/more.png",
				lo: this.staticPath + "/images/menu_btns/dc.png",
				bb: this.staticPath + "/images/menu_btns/bbin.png",
				bg: this.staticPath + "/images/menu_btns/bbin.png",
				dt: this.staticPath + "/images/menu_btns/dt.png?v=1",
				ug: this.staticPath + "/images/menu_btns/ug.png?v=3",
				ky: this.staticPath + "/images/menu_btns/ky.png?v=3",
				vg: this.staticPath + "/images/menu_btns/vg.png?v=1"
			},
			secondIcon: {
				sport: this.staticPath + "/images/icons/tg_hgty.png",
				st: this.staticPath + "/images/icons/tg_hgty.png",
				sp: this.staticPath + "/images/icons/sb.png",
				ts: this.staticPath + "/images/icons/ss.png",
				jc: this.staticPath + "/images/icons/jl.png",
				ho: this.staticPath + "/images/icons/hg.png",
				webchat: this.staticPath + "/images/icons/zx.png",
				lo: this.staticPath + "/images/icons/dc.png",
				bb: this.staticPath + "/images/icons/bbin.png",
				bg: this.staticPath + "/images/icons/bbin.png",
				ug: this.staticPath + "/images/icons/ug.png?v=1",
				dt: this.staticPath + "/images/icons/dt.png?v=1"
			},
			mainIconClass: {
				tiyu: "icon-uniE60C",
				caipiao: "icon-uniE609",
				shixun: "icon-uniE605",
				dianzi: "icon-uniE607",
				wo: this.isNewTheme ? "fa fa-user" : "icon-uniE604",
				home: this.isNewTheme ? "fa fa-home" : "icon-uniE601",
				message: "glyphicon glyphicon-volume-up",
				money: "icon icon-uniE617",
				info: "iconfont icon-huiyuan",
				exchange: "glyphicon glyphicon-transfer",
				all: "glyphicon glyphicon-knight",
				exit: "fa fa-sign-out",
				password: "glyphicon glyphicon-lock",
				bet: "glyphicon glyphicon-list-alt",
				moneyLog: "glyphicon glyphicon-usd",
				recharge: "glyphicon glyphicon-piggy-bank",
				draw: "glyphicon glyphicon-new-window",
				qipai: "icon-uniE616",
				webchat: "icon-uniE615",
				count: "fa fa-dashboard",
				yh: "glyphicon glyphicon-gift"
			},
			defaultLogo: this.staticPath + "/images/tg_logo.png",
			modules: {
				common: {
					homeNoticeIconClass: "fa fa-volume-up notice-icon",
					defaultLunbo: [this.staticPath + "/images/carousel/banner.jpg", this.staticPath + "/images/carousel/banner1.jpg", this.staticPath + "/images/carousel/banner2.jpg", this.staticPath + "/images/carousel/banner3.jpg", this.staticPath + "/images/carousel/banner4.jpg"],
					isShowLogoutBtn: !this.isApp,
					isShowSwitchPcBtn: !this.isApp
				},
				member: {
					isShowMoreSysMenu: this.isApp,
					isShowMoreFunMenu: true,
					isTransformNewWin: !this.isApp
				},
				memberLevel: {
					linkFormat: "/cn/register?tj={{mid}}"
				}
			}
		};
	},
	initSysTBK: function() {
		this.sysSetting = {
			homeUrl: "#module/common/action/home",
			bodyClass: "common_style",
			isEnableCdn: this.cfg.cdnUrl ? true : false,
			tjQueryText: "抽水",
			memberInfoText: "会员资料",
			homeIcon: {
				sport: this.staticPath + "/images/menu_btns/hg_sports.png",
				st: this.staticPath + "/images/menu_btns/hg_sports.png",
				jc: this.staticPath + "/images/menu_btns/jl.png",
				ag: this.staticPath + "/images/menu_btns/ag_ls.png",
				webchat: this.staticPath + "/images/menu_btns/ocs.png",
				moreMenu: this.staticPath + "/images/menu_btns/more.png",
				ho: this.staticPath + "/images/menu_btns/ho.png",
				lo: this.staticPath + "/images/menu_btns/dc.png",
				bb: this.staticPath + "/images/menu_btns/bbin.png",
				bg: this.staticPath + "/images/menu_btns/bbin.png",
				dt: this.staticPath + "/images/menu_btns/dt.png?v=1",
				ug: this.staticPath + "/images/menu_btns/ug.png?v=3",
				ky: this.staticPath + "/images/menu_btns/ky.png?v=3"
			},
			secondIcon: {
				sport: this.staticPath + "/images/icons/hgty.png?v=1",
				st: this.staticPath + "/images/icons/hgty.png?v=1",
				sp: this.staticPath + "/images/icons/sb.png",
				ts: this.staticPath + "/images/icons/ss.png",
				jc: this.staticPath + "/images/icons/jl.png",
				ho: this.staticPath + "/images/icons/hg.png",
				webchat: this.staticPath + "/images/icons/zx.png",
				lo: this.staticPath + "/images/icons/dc.png",
				bb: this.staticPath + "/images/icons/bbin.png",
				bg: this.staticPath + "/images/icons/bbin.png",
				ug: this.staticPath + "/images/icons/ug.png?v=1",
				dt: this.staticPath + "/images/icons/dt.png?v=1"
			},
			mainIconClass: {
				tiyu: "glyphicon glyphicon-globe",
				caipiao: "glyphicon glyphicon-heart",
				shixun: "glyphicon glyphicon-facetime-video",
				dianzi: "glyphicon glyphicon-knight",
				wo: this.isNewTheme ? "fa fa-user" : "glyphicon glyphicon-user",
				home: "fa fa-home",
				message: "glyphicon glyphicon-volume-up",
				money: "icon icon-uniE617",
				info: "iconfont icon-huiyuan",
				exchange: "glyphicon glyphicon-transfer",
				all: "fa fa-gamepad",
				exit: "fa fa-sign-out",
				password: "glyphicon glyphicon-lock",
				bet: "glyphicon glyphicon-list-alt",
				moneyLog: "glyphicon glyphicon-usd",
				recharge: "glyphicon glyphicon-piggy-bank",
				draw: "glyphicon glyphicon-new-window",
				qipai: "icon-uniE616",
				webchat: "icon-uniE615",
				count: "fa fa-dashboard",
				yh: "glyphicon glyphicon-gift"
			},
			defaultLogo: this.staticPath + "/images/tbk_logo.png",
			modules: {
				memberExchange: {
					tplId: "member_exchange_tbk"
				},
				common: {
					homeNoticeIconClass: "fa fa-volume-up notice-icon",
					defaultLunbo: [this.staticPath + "/images/carousel/tbk/banner.jpg", this.staticPath + "/images/carousel/tbk/banner1.jpg", this.staticPath + "/images/carousel/tbk/banner2.jpg", this.staticPath + "/images/carousel/tbk/banner3.jpg"],
					isShowLogoutBtn: !this.isApp,
					isShowSwitchPcBtn: !this.isApp
				},
				member: {
					isTransformNewWin: !this.isApp,
					isHideTjInput: true
				},
				memberLevel: {
					linkFormat: "/cn/tj/{{mid}}"
				}
			}
		};
	},
	getMainGames: function() {
		if(!this.mainGames) {
			var mainGames = [];
			$.each(MainJS.cfg.data.games.gameConfig || [], function(k, v) {
				if(v.open == 1) {
					mainGames.push(v);
				}
			});
			this.mainGames = mainGames;
		}
		return this.mainGames;
	},
	getGameName: function(type) {
		var gameName = "";
		$.each(MainJS.cfg.data.games.gameConfig || [], function(k, v) {
			if(v.id === type) {
				gameName = v.name;
				return false;
			}
		});
		return gameName;
	},
	getMenuItems: function(catalog) {
		var menuItems = [];
		$.each(this.getMainGames(), function(k, v) {
			if(v.type === catalog && v.bet == 1) {
				menuItems.push(v);
			}
		});
		return menuItems;
	},
	upperCaseFirst: function(txt) {
		return txt.replace(/^(\w)/, function(v) {
			return v.toUpperCase();
		});
	},
	showSystemMessage: function(msg, callback) {
		var tpl = '<div class="modal" tabindex="1">' + '<div class="modal-dialog message-dialog modal-sm">' + '<div class="modal-content">' + '<div class="modal-header">' + '<h4 class="modal-title"><span class="glyphicon glyphicon-envelope" aria-hidden="true" style="font-size:20px;vertical-align:top;color:#ffbf00;"></span> 系统消息</h4>' + '</div>' + '<div class="modal-body" style="max-height:' + ($(window).height() * 0.45) + 'px;max-height:45vh;padding:0 15px;">' + '<div class="line-info">' + '<div class="info-left"><pre style="padding:15px 0;">' +
			BaseJS.encodeHTML(msg) + '</pre></div>' + '</div>' + '</div>' + '<div class="modal-footer">' + '<div class="col-xs-6"><button type="button" class="btn btn-primary confirm-btn">确定</button></div>' + '<div class="col-xs-6"><button type="button" class="btn btn-default cancel-btn">取消</button></div>' + '</div>' + '</div>' + '</div>' + '</div>';
		var dialog = $(tpl);
		var bodyMainScrollbar = BaseJS.createScrollbar({
			target: dialog.find(".modal-body"),
			isAutoHeight: true
		});
		dialog.find(".cancel-btn").on("click", function() {
			bodyMainScrollbar.destroy();
			dialog.remove();
		});
		dialog.find(".confirm-btn").on("click", function() {
			if(callback) {
				callback();
			}
			bodyMainScrollbar.destroy();
			dialog.remove();
		});
		dialog.appendTo(document.body);
		dialog.show();
		dialog.focus();
	},
	showSystemNotice: function(msg, callback, cfg) {
		cfg = cfg || {};
		var tpl = '<div class="modal" tabindex="1">' + '<div class="modal-dialog message-dialog modal-sm">' + '<div class="modal-content">' + '<div class="modal-header">' + '<h4 class="modal-title"><span class="' + (cfg.iconClass || 'glyphicon glyphicon-bell') + '" aria-hidden="true" style="font-size:22px;vertical-align:top;color:#ffbf00;"></span> ' + (cfg.title || '系统公告') + '</h4>' + '</div>' + '<div class="modal-body" style="max-height:' + ($(window).height() * 0.45) + 'px;max-height:45vh;padding:0 15px;">' + '<div class="line-info">' + '<div class="info-left"><pre style="padding:15px 0;">' +
			(cfg.isHtml ? msg : BaseJS.encodeHTML(msg)) + '</pre></div>' + '</div>' + '</div>' + '<div class="modal-footer">' + '<div class="col-xs-12"><button type="button" class="btn btn-primary confirm-btn">确定</button></div>' + '</div>' + '</div>' + '</div>' + '</div>';
		var dialog = $(tpl);
		var bodyMainScrollbar = BaseJS.createScrollbar({
			target: dialog.find(".modal-body"),
			isAutoHeight: true
		});
		dialog.find(".confirm-btn").on("click", function() {
			if(callback) {
				callback();
			}
			bodyMainScrollbar.destroy();
			dialog.remove();
		});
		dialog.appendTo(document.body);
		dialog.show();
		dialog.focus();
	},
	showTip: function(msg, type, hideTime) {
		if(!this._tip) {
			this._tip = $('<div style="position:absolute;top:60px;width:100%;text-align:center;"><div style="display:inline-block;" class="alert alert-' + (type || 'danger') + '"></div></div>');
			this._tip.appendTo(document.body);
		}
		var tip = this._tip;
		tip.find(">div").text(msg);
		tip.show();
		setTimeout(function() {
			tip.hide();
		}, hideTime || 3000);
	},
	showAddToHomeScreenTipDialogByScan: function() {
		var tpl = this.getTpl("common", "addToIosHomeScreen");
		var html = this.renderTpl(tpl, {
			isByScan: true
		});
		this.showDialog({
			title: "快速添加手机桌面",
			containerClass: "tip-full-screen-dialog-main",
			content: html
		});
		this.isNoShowAddToIosHomeScreen = true;
	},
	showAddToHomeScreenTipDialog: function(caller) {
		if(!window.sessionStorage || this.checkShownTip("isShownAddToIosHomeScreen")) {
			caller && caller();
			return;
		}
		var _this = this;
		if(BaseJS.isIphone) {
			if(window.localStorage && !this.checkKnownTip("addToIosHomeScreen")) {
				var tpl = this.getTpl("common", "addToIosHomeScreen");
				var html = this.renderTpl(tpl);
				this.showDialog({
					title: "快速添加手机桌面",
					containerClass: "tip-full-screen-dialog-main",
					content: html,
					onInit: function(dialog) {
						var save = dialog.find(".tip-full-screen-dialog-save");
						save.appendTo(document.body);
						dialog.on("remove", function() {
							caller && caller();
							if(dialog.find(".no-more:checked").length > 0) {
								_this.addKnownTip("addToIosHomeScreen");
							}
							_this.addShownTip("isShownAddToIosHomeScreen");
							save.remove();
						});
					}
				});
			} else {
				caller && caller();
			}
		} else {
			if(window.localStorage && !this.checkKnownTip("addToHomeScreen")) {
				var tpl = this.getTpl("common", "addToHomeScreen");
				var html = this.renderTpl(tpl);
				this.showDialog({
					title: "添加到主屏幕操作提示",
					containerClass: "tip-dialog-main",
					content: html,
					onInit: function(dialog) {
						dialog.find(".known-btn").click(function() {
							_this.addKnownTip("addToHomeScreen");
							dialog.remove();
						});
						dialog.find(".more-link").click(function() {
							dialog.find(".more-container").show();
						});
						dialog.on("remove", function() {
							caller && caller();
							_this.addShownTip("isShownAddToIosHomeScreen");
						});
					}
				});
			} else {
				caller && caller();
			}
		}
	},
	checkKnownTip: function(tipName) {
		var storage = window.localStorage;
		var tipList = JSON.parse(storage.getItem("JSBaseKnownTipList")) || [];
		if($.inArray(tipName, tipList) >= 0) {
			return true;
		} else {
			return false;
		}
	},
	addKnownTip: function(tipName) {
		var storage = window.localStorage;
		var tipList = JSON.parse(storage.getItem("JSBaseKnownTipList")) || [];
		if($.inArray(tipName, tipList) < 0) {
			tipList.push(tipName);
			storage.setItem("JSBaseKnownTipList", JSON.stringify(tipList));
		}
	},
	checkShownTip: function(tipName) {
		var storage = window.sessionStorage;
		var tipList = JSON.parse(storage.getItem("JSBaseShownTipList")) || [];
		if($.inArray(tipName, tipList) >= 0) {
			return true;
		} else {
			return false;
		}
	},
	addShownTip: function(tipName) {
		var storage = window.sessionStorage;
		var tipList = JSON.parse(storage.getItem("JSBaseShownTipList")) || [];
		if($.inArray(tipName, tipList) < 0) {
			tipList.push(tipName);
			storage.setItem("JSBaseShownTipList", JSON.stringify(tipList));
		}
	},
	checkUpdate: function(versionInfo) {
		if(window.plus && plus.runtime.version && Number(plus.runtime.version.split(".")[0]) < Number(versionInfo.version.split(".")[0])) {
			showAlert("本应用已停止使用！");
			return false;
		}
		var optionIdOne = this.getUpdateMethod(plus.runtime.version, versionInfo.version);
		var _this = this;
		if(optionIdOne == "1") {
			plus.nativeUI.alert(versionInfo.updateNote, function() {
				plus.runtime.openURL(versionInfo.updateUrl);
				plus.nativeUI.showWaiting("应用下载中...", {
					modal: true,
					back: "none"
				});
			}, "更新提示", "立即更新");
		} else {
			plus.runtime.getProperty(plus.runtime.appid, function(appInfo) {
				var optionIdTwo = _this.getUpdateMethodSmall(appInfo.version, versionInfo.version);
				if(optionIdTwo == 1) {
					plus.nativeUI.toast("资源更新中...");
					_this.downWgt(versionInfo.wwwUrl);
				}
			});
		}
	},
	splitVersion: function(version) {
		var bigVer, smallVer, VersionArr = {};
		if(version) {
			var verArr = version.split(".");
			if(verArr.length == 3) {
				bigVer = verArr[0] + "." + verArr[1];
				smallVer = verArr[2];
				VersionArr = {
					bigVer: bigVer,
					smallVer: smallVer
				};
			}
		}
		return VersionArr;
	},
	getUpdateMethod: function(localVersion, netVersion) {
		var localArr = this.splitVersion(localVersion);
		var netArr = this.splitVersion(netVersion);
		var optionId = '';
		if(localArr.bigVer && netArr.bigVer && parseInt(localArr.bigVer.replace(".", "")) < parseInt(netArr.bigVer.replace(".", ""))) {
			optionId = "1";
		}
		return optionId;
	},
	getUpdateMethodSmall: function(localVersion, netVersion) {
		var localArr = this.splitVersion(localVersion);
		var netArr = this.splitVersion(netVersion);
		var optionId = '';
		if(localArr.smallVer && netArr.smallVer && parseInt(localArr.smallVer) < parseInt(netArr.smallVer)) {
			optionId = "1";
		}
		return optionId;
	},
	downWgt: function(wgtUrl) {
		var _this = this;
		if(wgtUrl) {
			plus.downloader.createDownload(wgtUrl, {
				filename: "_doc/update/"
			}, function(d, status) {
				if(status == 200) {
					console.log("下载wgt成功：" + d.filename);
					_this.installWgt(d.filename);
				} else {
					console.log("下载wgt失败！");
					plus.nativeUI.alert("下载wgt失败！");
				}
				plus.nativeUI.closeWaiting();
			}).start();
		} else {
			console.log("网络错误，请稍后重试！");
			plus.nativeUI.alert("网络错误，请稍后重试！");
		}
	},
	installWgt: function(path) {
		plus.nativeUI.showWaiting("安装wgt文件...");
		plus.runtime.install(path, {}, function() {
			plus.nativeUI.closeWaiting();
			console.log("安装wgt文件成功！");
			plus.nativeUI.alert("应用资源更新完成！", function() {
				plus.runtime.restart();
			});
		}, function(e) {
			plus.nativeUI.closeWaiting();
			console.log("安装wgt文件失败[" + e.code + "]：" + e.message);
			plus.nativeUI.alert("安装wgt文件失败[" + e.code + "]：" + e.message);
		});
	},
	openSportRule: function() {
		return BaseJS.classes.modules.Sport.prototype.openSportRule.apply(this, arguments);
	},
	openRuleList: function() {
		return BaseJS.classes.modules.Sport.prototype.openRuleList.apply(this, arguments);
	},
	showMoneyBox: function() {
		var data = null;
		var _this = this;
		this.requestGet("/member-center/member-info", null, function(info) {
			data = info;
			var tpl = _this.getTpl("common", "moneyBox");
			var html = _this.renderTpl(tpl, {
				data: data
			});
			MainJS.showDialog({
				title: "保险箱",
				content: html,
				containerClass: "money-box-dialog-main",
				onInit: function(dialog) {
					var tpl = _this.getTpl("common", "moneyBoxToolbar");
					dialog.getDialogBody().after(_this.renderTpl(tpl));
					var doAmountInput = dialog.find(".do-amount");
					var doAction = function(type) {
						var doAmount = doAmountInput.val();
						if(!doAmount && !doAmountInput[0].validationMessage) {
							showAlert("请填写金额", function() {
								doAmountInput.focus();
							});
							return;
						}
						if(/\./.test(doAmount)) {
							showAlert("请填写整数金额", function() {
								doAmountInput.focus();
							});
							return;
						}
						if(!/^\d+$/.test(doAmount) || doAmount === "0") {
							showAlert("请填写正确的金额", function() {
								doAmountInput.focus();
							});
							return;
						}
						if((type === "in" && Number(data.money) < doAmount) || (type === "out" && Number(data.money_box) < doAmount)) {
							showAlert("额度不足", function() {
								doAmountInput.focus();
							});
							return;
						}
						_this.requestPost("/member-center/money-exchange", {
							action: type,
							amount: doAmount
						}, function() {
							_this.requestGet("/member-center/member-info", null, function(info) {
								data = info;
								dialog.find(".money-box").text(data.money_box || "0.00");
								dialog.find(".wallet").text(data.money || "0.00");
								MainJS.activeModule.find(".money-box").text(data.money_box || "0.00");
								MainJS.activeModule.find(".wallet").text(data.money || "0.00");
							});
						});
					};
					dialog.find(".in-btn").click(function() {
						doAction("in");
					});
					dialog.find(".out-btn").click(function() {
						doAction("out");
					});
				}
			});
		});
	}
});