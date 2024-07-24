// Elems
var gElems = {
  bodyElem: document.querySelector('body'),
  maskPlane: document.querySelector('#modal-backdrop'),
  btnLang: document.querySelector('#btn-language'),
  sound_background: document.querySelector('.box_background'),
  sound_welcome: document.querySelector('.box_welcome'),
  popItemBtn: Array.from(document.querySelectorAll('.btn-pop')),
  popCloseBtn: Array.from(document.querySelectorAll('.btn-close')),
  langItemBtn: Array.from(document.querySelectorAll('.lang-item')),
  homeLinkBar: document.querySelector('.home-link-bar'),
  pageLoadBox: document.querySelector('.pages-loading-box'),
  pagesLoadingTxt: document.querySelector('.pages-loading-txt'),
  // pagesLoadingEnter: document.querySelector('.pages-loading-enter'),
  fixBottomBtnElem: Array.from(document.querySelectorAll('.home-fix-bottom-box > .fix-bottom-btn')),
  eventListItem: Array.from(document.querySelectorAll('.event-item-list > .event-item')),
  eventBannerCloseBtns: Array.from(document.querySelectorAll('.event-banner-close-btn')),
  eventScrollBanner: document.querySelector('#event-scroll-banner'),
  pagesBtns: Array.from(document.querySelectorAll('.btn-pages')),
  pagesContainer: document.querySelector('.pages-container'),
  pagesMain: Array.from(document.querySelectorAll('.pages-container > .pages-main')),
  pagesClose: document.querySelector('.pages-container > .close-btn'),
  pageStatusPre: 'home',
  mainContainer: document.querySelector('.main-container'),
  inCenter: false,
  inDeposit: false,
  joinSwiper: function(){
      if (! joinSwiper)
      {
        joinSwiper = new Swiper('.join-wrapper', {
            autoplay: false,
            pagination: {
            el: '.swiper-pagination',
            },
        });
      }
      joinSwiper.autoplay.stop();
  },
}
var joinSwiper = '';

// 彈窗事件
var popWindowEvent = {
  open: (e, s) => {
    gElems.maskPlane.style.opacity = '';
    if (!s.classList.contains('user-center-btn')) {
      // pagesEvent.close();
    }

    // 客服遮罩透明
    if (e.classList.contains('service-dialog')) {
      gElems.maskPlane.style.opacity = 0;
    }

    e.style.display = 'block';
    gElems.maskPlane.classList.add('fade');
    setTimeout(() => {
      e.classList.add('in');
      gElems.maskPlane.classList.add('in');
    }, 300);
  },
  close: (e, b) => {
    e.classList.remove('in');
    if (b) {
      gElems.maskPlane.classList.remove('in');
    }
    setTimeout(() => {
      e.style.display = 'none';
      gElems.maskPlane.classList.remove('fade');
      if (b) {
        // 按鈕回到大廳狀態
        // gElems.fixBottomBtnElem[0].click();
      }
    }, 300);
  }
};

// 彈窗按鈕對應
var popUpWindow = () => {

  var eEnterPoint = null;

  document.querySelectorAll('body').forEach((e, i) => {
      e.addEventListener('click', (e) => {
          var n = 0;
          var target = e.target || false;

          do {
              if (! target || target.classList.contains('btn-pop'))
              {
                  break;
              }
              target = target.parentElement || false;
              
              n ++;
          }
          while (n < 10);

          if (target && target.getAttribute('data-pop'))
          {
            document.querySelectorAll('body div[id*=-dialog]').forEach((e, i) => {
                if (e.classList.contains('in'))
                {
                  e.classList.remove('in');
                  e.style.display = 'none';
                }
            });

          if (target.classList.contains('comingSoon'))
          {
            alert('即将开放');
            return ;
          }

          if (target.classList.contains('is-close') || target.classList.contains('mobile-download'))
          {
            return ;
          }

            var popWindow = document.querySelector('#' + target.getAttribute('data-pop'));
            popWindowEvent.open(popWindow, target);

            eEnterPoint = (!target.classList.contains('user-center-btn')) ? true : false;
          }
      })
  });

  // gElems.popItemBtn.forEach((e, i) => {
  //   e.addEventListener('click', () => {

  //     document.querySelectorAll('body > div[id*=-dialog]').forEach((e, i) => {
  //         if (e.classList.contains('in'))
  //         {
  //           e.classList.remove('in');
  //           e.style.display = 'none';
  //         }
  //     });

  //     var popWindow = document.querySelector('#' + e.getAttribute('data-pop'));
  //     popWindowEvent.open(popWindow, e);

  //     eEnterPoint = (!e.classList.contains('user-center-btn')) ? true : false;

  //     // if (!e.classList.contains('fix-bottom-btn')) {
  //     //   gElems.fixBottomBtnElem[0].click();
  //     // }
  //   });
  // });

  // close
  gElems.popCloseBtn.forEach((e, i) => {
    e.addEventListener('click', () => {
      var popWindow = document.querySelector('#' + e.getAttribute('data-pop'));
      popWindowEvent.close(popWindow, eEnterPoint);
    });
  })
};

// pages link
var pagesEvent = pagesEvent || {};
var pagesMain = () => {
  pagesEvent = (() => {
    pagesEvent = {
      'open': (s) => {
        gElems.pagesContainer.classList.add('show');
        gElems.pagesMain.forEach((e, i) => {
          e.classList.remove('active');
          e.classList.remove('ani');
          if (e.getAttribute("data-page-name") == s) {
            gElems.pageStatusPre = e.getAttribute('data-link');
            e.classList.add('active', 'ani');
            // setTimeout(() => {
            //   e.classList.add('ani')
            // })
          };
          if (s == 'user-center') {
            gElems.fixBottomBtnElem[4].classList.add('active');
            gElems.inCenter = false;
            gElems.inDeposit = false;
          }
          if (s == 'USDTTutorial') {
            gElems.inCenter = false;
            gElems.inDeposit = true;
          }
        })
        if (s == 'join')
        {
          gElems.joinSwiper();
        }
      },
      'close': () => {
        gElems.pagesContainer.classList.remove('show');
        gElems.pagesMain.forEach((e, i) => {
          e.classList.remove('active');
          e.classList.remove('ani')
        })
      }
    }
    return pagesEvent;
  })();

  // open
  gElems.pagesBtns.forEach((e, i) => {
    e.addEventListener('click', () => {
      var pagesName = e.getAttribute('data-page-name');
      if (e.classList.contains('is-close'))
      {
        return ;
      }
      if ((Public.GetLocalStorage('isTest') == '1' || Public.GetLocalStorage('isTest') == '') && (pagesName == 'user-center' || pagesName == 'wallet-center'))
      {
          document.querySelector('.tab-left').click();
          gElems.fixBottomBtnElem[0].classList.add('active');
          gElems.fixBottomBtnElem[4].classList.remove('active');
        return ;
      }

      pagesEvent.open(pagesName);
      if (pagesName != 'user-center') {
        gElems.fixBottomBtnElem.forEach((e, i) => {
          e.classList.remove('active')
        });
      }
    });
  });

  // close
  gElems.pagesClose.addEventListener('click', () => {

    if (gElems.inCenter) {
      pagesEvent.open(gElems.pageStatusPre);
    }
    else if (gElems.inDeposit) {
      $('#recharge-dialog').addClass('active ani').show();
      $('#modal-backdrop').addClass('fade in');
      pagesEvent.close();
    }
    else {
      pagesEvent.close();
      gElems.fixBottomBtnElem[0].click();
    }
  });
};

// 聲音
var soundObj = {};
var homeSound = () => {

  //var homeJumpUrl = window.Config.EXTERNALURL;
  var bgSound = './bg_sound.mp3?2021120323301';
  // var bgSound = 'https://gameoneapp.com/wechat/media/bg_sound.mp3?202112032330';
  // var bgSound = 'https://img-p.iodp.org.cn/imgx21/wechat/media/bg_sound.mp3';

  var lastSeen;
  var loop = () => {
    lastSeen = Date.now();
    setTimeout(loop, 50);
  };
  loop();

  soundObj = {
    status: false,
    flag_bg: Public.GetLocalStorage('backgroundsound') || 'true',

    init: () => {
      soundObj.song = new Audio();
      soundObj.song.src = bgSound;
      soundObj.song.preload = "auto";
      soundObj.song.addEventListener('ended', soundObj.song.play, false);
      soundObj.song.addEventListener('timeupdate', () => {
        if (Date.now() - lastSeen > 300) {
          soundObj.pause();
        }
      }, false);
    },
    play: () => {
      soundObj.flag_bg = true;
      Public.SetLocalStorage({backgroundsound: soundObj.flag_bg});
      gElems.sound_background.classList.add('on');
      gElems.sound_background.classList.add('active');
      parent == window
        ? soundObj.song.play()
        : parent.postMessage({var: 'Sound', func: 'BackPlay'}, '*');

    },
    pause: () => {
      soundObj.flag_bg = false;
      Public.SetLocalStorage({backgroundsound: soundObj.flag_bg});
      gElems.sound_background.classList.remove('on');
      gElems.sound_background.classList.remove('active');
      parent == window
        ? soundObj.song.pause()
        : parent.postMessage({var: 'Sound', func: 'BackPause'}, '*');
    }
  }
};

homeSound();


// 語言切換

var welcomesoundObj = {};
var languageSound = (lang) => {

  var homeJumpUrl = window.Config.EXTERNALURL;
  var welcomesong = homeJumpUrl + '/media/welcom_' + lang + '.mp3';

  welcomesoundObj = {
    flag_wc: Public.GetLocalStorage('welcomesound') || false,
    init: () => {
      welcomesoundObj.song = new Audio();
      welcomesoundObj.song.src = welcomesong;
    },
    soundPlay: ()=> {
      welcomesoundObj.flag_wc = true;
      Public.SetLocalStorage({welcomesound: welcomesoundObj.flag_wc});
      gElems.sound_welcome.classList.add('on');
      gElems.sound_welcome.classList.add('active');
      parent == window
        ? welcomesoundObj.song.play()
        : parent.postMessage({var: 'Sound', func: 'WelcomePlay'}, '*');
    },
    soundPause: ()=> {
      welcomesoundObj.flag_wc = false;
      Public.SetLocalStorage({welcomesound: welcomesoundObj.flag_wc});
      gElems.sound_welcome.classList.remove('on');
      gElems.sound_welcome.classList.remove('active');
      parent == window
        ? welcomesoundObj.song.pause()
        : parent.postMessage({var: 'Sound', func: 'WelcomePause'}, '*');
    },
  }
};

// 語言歡迎聲
languageSound(langName);

var loadComplete = () => {
  setTimeout(() => {
    document.querySelector('#pages-loading-banner').classList.add('active');
  }, 1000);
}

var homeSoundStart = () => {
  // 微信
  // wechatAutoPlayAudio(enterBtn);

  if (soundObj.song.readyState == 4) { // android
    enterBtn();
  } else { // iOS
    // soundObj.song.addEventListener("canplaythrough", () => {
    //   enterBtn();
    // }, false);
    soundObj.song.load(); // 需要主動觸發下，不然不會加載
    enterBtn();
  }

  function enterBtn() {

    loadComplete();

    // 倒數三秒可進入
    var timer = setInterval(pageloadNum, 1000);
    var num = 4;

    function pageloadNum() {
      num = num - 1;
      // console.log(num)
      if (num > 0) {
        // gElems.pagesLoadingEnter.querySelector('span').innerHTML = num;
      } else {
        // gElems.pagesLoadingEnter.querySelector('span').innerHTML = '';
        // gElems.pagesLoadingEnter.querySelector('span').classList.remove('cercle');
        clearInterval(timer);
        // gElems.pagesLoadingEnter.click();

        var func = Public.GetUrlData('function');
        var dialog = Public.GetUrlData('dialog');
        
        if (func)
        {
          document.querySelector('a[data-page-name=' + func + ']').click();
        }
        if (dialog)
        {
          document.querySelector('a[data-pop=' + dialog + ']').click();
        }
      }
    }
    // setTimeout(() => {
    //   gElems.pagesLoadingEnter.classList.remove('off');
    // }, 3000);

    onCanPlay();
    // gElems.pagesLoadingEnter.addEventListener('click', onCanPlay);
  }

  function onCanPlay() {

    gElems.pageLoadBox.classList.add('ani');
    gElems.bodyElem.classList.remove('no-scroll');

    // sound event
    if (parent != window)
    {
      (welcomesoundObj.flag_wc == true || welcomesoundObj.flag_wc == 'true') ? welcomesoundObj.soundPlay() : welcomesoundObj.soundPause();
    }
    gElems.sound_welcome.addEventListener('click', () => {
      if (welcomesoundObj.flag_wc == true) {
        welcomesoundObj.soundPause();
      } else {
        welcomesoundObj.soundPlay();
      }
    }, false);

    // 播放背景音
    //soundObj.play();
    if (parent != window)
    {
      (soundObj.flag_bg == true || soundObj.flag_bg == 'true') ? soundObj.play() : soundObj.pause();
    }

    gElems.sound_background.addEventListener('click', () => {
      if (soundObj.flag_bg == true) {
        soundObj.pause();
      } else {
        soundObj.play();
      }
    }, false);

    setTimeout(function () {
      gElems.pageLoadBox.style.display = 'none';
    }, 1000);

    // 限定一次
    // gElems.pagesLoadingEnter.removeEventListener("click", onCanPlay);

  }
}

// wechat autoPlay
var wechatAutoPlayAudio = (fn, elem) => {
  wx.config({
    // 配置信息，即使不正確也能使用wx.ready
    debug: false,
    appId: '',
    timestamp: 1,
    nonceStr: '',
    signature: '',
    jsApiList: []
  });
  wx.ready(function () {
    //elem.play();
    fn();
  });
}

// homeLink 滾動固定
var homeLinkBar = () => {
  var basicHeight = gElems.homeLinkBar.offsetTop;
  window.addEventListener('scroll', debounce(() => {
    if (window.pageYOffset >= basicHeight) {
      gElems.homeLinkBar.classList.add("fixed");
    } else {
      gElems.homeLinkBar.classList.remove("fixed");
    }
  }, 10));
}

// bottome-bottom Event
var fixBottomBtns = () => {
  gElems.fixBottomBtnElem.forEach((e, i) => {
    if (e.hasAttribute("data-menu")) {
      e.addEventListener('click', () => {
        if (['service', 'mobile'].indexOf(e.getAttribute('data-menu')) >= 0)
        {
          return false;
        }
        gElems.inCenter = false;
        e.classList.add('active');
        var sibElems = getSiblings(e);
        sibElems.forEach((m, n) => {
          m.classList.remove('active');
        });
        if (!e.hasAttribute("data-page-name")) {
          pagesEvent.close();
        }
      })
    }
  });
}

// 遊戲選項高度
var homeGameListH = function () {
  // var winSizeH = window.innerHeight,
  //   gameListElem = document.querySelector('.gamelist-wrapper'),
  //   homeTop = document.querySelector('.home-fix-top-box').offsetHeight,
  //   homeSwiper = document.querySelector('.home-swiper-wrapper').offsetHeight,
  //   homeLinkBar = document.querySelector('.home-link-bar').offsetHeight,
  //   homeBottom = document.querySelector('.home-fix-bottom-box').offsetHeight;

  // var gameListHeight = winSizeH - homeTop - homeSwiper - homeLinkBar - homeBottom;
  // gameListElem.style.height = (gameListHeight + 708) + 'px';

};

// user center btn height fill screen
var userCenterBtnH = function () {
  // var winSizeH = window.innerHeight,
  //   centerPageBox = document.querySelector('.user-center-wrapper'),
  //   homeBottom = document.querySelector('.home-fix-bottom-box').offsetHeight;
  // centerPageBoxH = winSizeH - 50 - 88 - homeBottom;
  // centerPageBox.style.height = centerPageBoxH + 'px';
};

// eventBanner
var eventBanner = () => {

  var eventPopElem = document.querySelector('#event-dialog');

  // link photo
  // gElems.eventListItem.forEach((e, i) => {
  //   e.addEventListener('click', () => {
  //     eventNav[i].click();
  //     gElems.eventScrollBanner.classList.add('show');
  //     eventPopElem.classList.remove('in');
  //     eventPopElem.style.display = 'none';
  //     //popWindowEvent.close(eventPopElem);
  //   });
  // });

  document.querySelectorAll('#event-dialog .event-item-list').forEach((e, i) => {
      e.addEventListener('click', (e) => {
          var n = 0;
          var target = e.target || false;
          var eventNav = Array.from(document.querySelectorAll('.event-pagination > span'));
          do {
            if (! target || target.classList.contains('event-item'))
            {
                var children = target.parentNode.children;
                for (var len in children)
                {
                    if (children[len] === target)
                    {
                        eventNav[len].click();
                    }
                }
                gElems.eventScrollBanner.classList.add('show');
                eventPopElem.classList.remove('in');
                eventPopElem.style.display = 'none';
                break;
            }
            target = target.parentElement || false;  
            n ++;

          } while(n < 5);
      })
  });

    // close
  // gElems.eventBannerCloseBtns.forEach((e, i) => {
  //   e.addEventListener('click', () => {
  //     gElems.eventScrollBanner.classList.remove('show');
  //     //gElems.maskPlane.classList.remove('fade');
  //     gElems.fixBottomBtnElem[0].click();
  //     eventPopElem.classList.add('in');
  //     eventPopElem.style.display = 'block';
  //   });
  // });


  document.querySelectorAll('#event-scroll-banner .event-banner-list').forEach((e, i) => {
      e.addEventListener('click', (e) => {
          var n = 0;
          var target = e.target || false;

          do {
            if (! target || target.classList.contains('event-banner-close-btn'))
            {
                gElems.eventScrollBanner.classList.remove('show');
                //gElems.fixBottomBtnElem[0].click();
                eventPopElem.classList.add('in');
                eventPopElem.style.display = 'block';
                break;
            }
            target = target.parentElement || false;  
            n ++;

          } while(n < 5);
      })
  });

};

/* 修改功能 */
// news switch btn 
var newsCon = () => {
  var parent =  document.querySelector('div[data-page-name=news]');

  parent && parent.addEventListener('click', () => {
    var e = event.target;
    var parentElem = e.parentNode;

    if (parentElem.classList.contains('switch-btn'))
    {
      e = parentElem;
      parentElem = e.parentNode;
    }
    else if (! e.classList.contains('switch-btn'))
    {
      return ;
    }

    var txtElem = e.querySelector('span');

    if (parentElem.classList.contains('hidden')) {
      parentElem.classList.remove('hidden');
      txtElem.innerHTML = Language.Get('收起');
      e.classList.add('active');
    } else {
      parentElem.classList.add('hidden');
      txtElem.innerHTML = Language.Get('阅读全文');
      e.classList.remove('active');
    }

  });


  // $('div[data-page-name=news]').on('click', '.switch-btn', function(){
  //   $(this).on('click', () => {
  //     var parentElem = $(this).parent();
  //     var txtElem = $(this).find('span');
  //     if (parentElem.hasClass('hidden'))
  //     {
  //       parentElem.removeClass('hidden');
  //       txtElem.text('收起');
  //       $(this).addClass('active');
  //     }
  //     else
  //     {
  //       parentElem.addClass('hidden');
  //       txtElem.text('阅读全文');
  //       $(this).removeClass('active');
  //     }
  //   });
  // });
  // var btns = Array.from(document.querySelectorAll('.switch-btn'))
  // btns.forEach((e, i) => {
  //   e.addEventListener('click', () => {
  //     var parentElem = e.parentNode;
  //     var txtElem = e.querySelector('span');
  //     if (parentElem.classList.contains('hidden')) {
  //       parentElem.classList.remove('hidden');
  //       txtElem.innerHTML = '收起';
  //       e.classList.add('active');

  //     } else {
  //       parentElem.classList.add('hidden');
  //       txtElem.innerHTML = '阅读全文';
  //       e.classList.remove('active');
  //     }
  //   })
  // })
}

// 即將推出
var comingEvent = () => {
  var btns = Array.from(document.querySelectorAll('.coming-btn'));
  var windowPop = document.querySelector('.coming-window');
  var closeBtn = document.querySelector('.coming-window .close-btn');
  var box = Array.from(document.querySelectorAll('.coming-window .game-photo'));

  btns.forEach((e, i) => {
    e.addEventListener('click', () => {
      var tagName = e.getAttribute('data-game');

      box.forEach((e, i) => {
        e.classList.remove('active');
        if (e.classList.contains(tagName)) {
          e.classList.add('active');
        }
      })

      windowPop.style.display = 'block';
      setTimeout(() => {
        windowPop.classList.add('on');
      }, 200)

    });
  });

  closeBtn.addEventListener('click', () => {
    windowPop.classList.remove('on');
    setTimeout(() => {
      windowPop.style.display = 'none';
    }, 200)
  });

}

// 尺寸變換初始
var resizeInit = function () {
  homeGameListH();
  userCenterBtnH();
};

// 首頁頁面初始
var homePageInit = function () {

  var intervalSwiper = setInterval(() => {
    if (
      $('.body-pages').css('display') != 'none' &&
      $('.main-container').css('display') != 'none'
    ) {
      clearInterval(intervalSwiper);
      // loading banner
      var swiper = new Swiper('.guide-swiper-container', {
        autoplay: false,
        pagination: {
          el: '.swiper-pagination',
        },
      });

      // homeBanner
      var swiper = new Swiper('.home-swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 6500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.home-swiper-container .swiper-pagination',
          clickable: true,
        },
      });

    }
  }, 500);

  // eventBanner
  // var swiper = new Swiper('.event-swiper-container', {
  //   slidesPerView: 'auto',
  //   centeredSlides: true,
  //   spaceBetween: 30,
  //   pagination: {
  //     el: '.event-pagination',
  //     clickable: true,
  //   },
  // });

  // 訊息發送滾動置底測試
  $('.send-message-form').on('submit', function (event) {
    event.preventDefault();
    var message = $('.customer-chat > li').first().clone();
    message.find('.chat_info').text($('.message-input').val());
    message.prependTo('.customer-chat');
    $('.message-input').val('');
  });

  // 針對客服點擊視窗外關掉 
  gElems.maskPlane.addEventListener('click', () => {
    var elem = document.querySelector('#service-dialog');
    if (elem.classList.contains('in')) {
      popWindowEvent.close(elem, true);
    }
  })

  // userCenter
  var userBtns = Array.from(document.querySelectorAll('.user-center-item'))
  userBtns.forEach((e, i) => {
    e.addEventListener('click', () => {
      gElems.pageStatusPre = e.getAttribute('data-link');
      if (e.classList.contains('btn-pages')) {
        gElems.inCenter = true;
      }
    })
  })

  // contentHelp
  var helpBtns = Array.from(document.querySelectorAll('.content-help-item'))
  helpBtns.forEach((e, i) => {
    e.addEventListener('click', () => {
      gElems.pageStatusPre = e.getAttribute('data-link');
      if (e.classList.contains('btn-pages')) {
        gElems.inCenter = true;
      }
    })
  })

  // sound
  soundObj.init();
  welcomesoundObj.init();

  homeGameListH();
  // homeLinkBar();
  fixBottomBtns();
  userCenterBtnH();
  popUpWindow();
  eventBanner();
  pagesMain();
  newsCon();
  comingEvent();



  window.addEventListener('resize', resizeInit);
}


// plus
function debounce(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
      args = arguments;
    var later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

function getChildren(n, skipMe) {
  var r = [];
  for (; n; n = n.nextSibling)
    if (n.nodeType == 1 && n != skipMe)
      r.push(n);
  return r;
};

function getSiblings(n) {
  return getChildren(n.parentNode.firstChild, n);
}

window.onload = homePageInit;