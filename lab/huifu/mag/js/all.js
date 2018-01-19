// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function noop() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});
    while (length--) {
        method = methods[length];
        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());
var isIE = !! window.ActiveXObject;
var isIE6 = isIE && !window.XMLHttpRequest;
var isIE8 = isIE && !! document.documentMode;
var isIE7 = isIE && !isIE6 && !isIE8;
$(function() {
  /** 暂存浮层开启后的关闭目标，即打开的浮层对象 **/
  var opend = null;

  
  $('.set_bank tbody tr').click(function() {
    $(this).parent().parent().find(".on").removeClass("on");
    $(this).find('input:radio').attr("checked", "checked");
    $(this).addClass("on");
    var m = $(this).parent().parent().parent().find(".mark");
    var ct = $(this).parent().parent().find(".on");
    set_bank(m, ct)
  })

  /** 自适应 详情 明细 表格宽度 **/
  $(".table_detail thead tr").each(function() {
    while($(this).height() > 35) {
      var t = $(this).parent().parent();
      $(t).css("width", $(t).width() + 20)
      $(t).css("max-width", $(t).width() + 20)
    }
  })

  /** 开关 **/
  
    $(".toggle_btn").livequery(function(){
      var h='<div class="toggle';
      if (!$(this).attr("checked")){
        h+= " off";
      }
      h+='"><a href="javascript:void(0);"></a></div>';
      $(this).wrapAll(h);
      $(this).hide();
    })
  $(".toggle").live("click", function() {
    var s = $(this);
    var k = $(this).find("a");
    var t = $(k).css("left") == "0px" && !$(this).hasClass("off");
    var m = t ? -35 : 0;
    $(k).animate({
      left: m
    }, 200, function() {
      $(this).find("input:checkbox").attr("checked", !t);
      t ? $(s).addClass("off").removeClass("on") : $(s).addClass("on").removeClass("off");
    })
  });

  /** 标签页 **/
  $('.yy_submenu a').click(function() {
    var tli = $(this).parent();
    if(!$(tli).hasClass('on')) {
      var onT = $(tli).parent().find(".on");
      $(onT).removeClass("on");
      $(tli).addClass("on");
      var t = $(tli).parent().next().find("table");
      $(t[$(onT).index()]).hide();
      $(t[$(tli).index()]).show();
    }
  })

  /** Table checkbox 全选 **/
  $(".table th input:checkbox").change(function() {
    $(this).parent().parent().parent().parent().find("td input:checkbox").attr("checked", $(this).attr("checked"));
  })
  $(".table td input[type='checkbox']").change(function() {
    var t = $(this).parent().parent().parent().parent();
    //总数
    var dl = $(t).find("td input:checkbox").length;
    //被选中
    var cl = $(t).find("td input:checked").length;
    if(dl == cl) {
      $(t).find("th input:checkbox").attr("checked", true)
    } else {
      $(t).find("th input:checkbox").attr("checked", false)
    }
  })

  /** Table 列排序 **/
  $(".table .order").click(function() {
    if(!$(this).hasClass('order_up')) {
      $(this).removeClass('order_down');
      $(this).addClass('order_up');
    } else {
      $(this).removeClass('order_up');
      $(this).addClass('order_down');
    }
  })

  /** 取现选择银行列表 **/
  $('.set_bank').each(function() {
    var t = $(this).find("td");
    //$(t[0]).append('<div class="mark"><b></b></div>');
    $(this).wrapAll('<div class="table_wrap clearfix"></div>');
    $(this).parent().append('<div class="mark"><b></b></div>');
    var m = $(this).parent().find(".mark");
    var ct = $(this).find(".on");
    console.log(ct[0])
    if (ct[0]){
      set_bank(m, ct);
    }else{
      m.hide();
    }
    
  })

  function set_bank(m, ct) {
    var t, l, h;
    if($.browser.msie && !isIE6) {
      t = $(ct).position().top-1;
    } else {
      t = $(ct).position().top;
    }
    if($.browser.mozilla || isIE8) {
      l = $(ct).position().left;
    } else {
      l = $(ct).position().left - 1;
    }
    if(isIE6) {
      h = $(ct).height() + 1;
    } else if(isIE8 || $.browser.mozilla) {
      h = $(ct).height();
    } else {
      h = $(ct).height() - 1;
    }
    $(m).show();
    $(m).css({
      'width': isIE6 ? $(ct).width() + 2 : $(ct).width(),
      'height': h,
      'top': t
      /*,
      'left':l*/
    })
  }
  
  /** 选择银行 **/
  $(".drop_bank").each(function(){
    var d = $(this).parent();
    $(this).find("input:hidden").val($(this).find('dl dd .on').attr("rel"));
    $(this).parent().children().first().attr("src",$(this).find("dl dd .on img").attr("src"));
  })
  $('.drop_bank dl dd a').click(function(event){
    var d = $(this).parent().parent().parent();
    event.stopPropagation();
    closeOpened();
    $(d).find(".on").removeClass("on");
    $(d).find("input:radio:checked").attr("checked","checked");
    $(this).addClass("on");
    $(d).find("input:hidden").val($(this).attr("rel"));
    $(d).parent().children().first().attr("src",$(this).find("img").attr("src"));
  })
  $(".opened_bank dl a").click(function() {
    //console.log($(this))
  })

  /** 选择日期 **/
  $(".select.date").click(function(event) {
    event.stopPropagation();
    closeOpened();
    opend = $(this).find(".drop_date");
    $(opend).show();
  })
  $(".select.date dd a").click(function(event) {
    event.stopPropagation();
    closeOpened();
  })

  /** 替换select **/
  $("select").each(function() {
    var t = "";
    var v = $(this).get(0).selectedIndex;//$(this).val();
    var txt;
    $(this).find("option").each(function() {
      var c = "";
      if(v === $(this).index()) {
        txt = $(this).text();
        c = ' class="on"';
      }
      t += '<dd><a href="javascript:void(0);"' + c + '>' + $(this).text() + '</a></dd>';
    })
    var w=$(this).attr("width");
    var wt="";
    if(w){
      wt=' style="width:'+w+'px"';
    }
    //<b></b>存入原来的select
    $(this).wrapAll('<div class="select list"'+wt+'><b></b><span>' + txt + '</span><a href="javascript:void(0);"></a><div class="drop clearfix"><div class="box"><a href="javascript:void(0);" class="first"></a></div><dl class="clearfix">' + t + '</dl></div></div>')
    
    if($(this).parent().parent().find("dl").height() > 205) {
      $(this).parent().parent().find("dl").css("height", 205);
      if(w){
        $(this).parent().parent().find("dl").css("width", w);
      }else{
        $(this).parent().parent().find("dl").css("width", 128);
      }
    }
    $(this).parent().parent().find("dl").scrollTop($(this).parent().parent().find("dl .on").position().top - 82)
    if(w){
      $(this).parent().parent().find(".box").css("width",parseInt(w));
      $(this).parent().parent().find(".drop a").css("width",parseInt(w-10));
      $(this).parent().parent().find(".first").css("width",parseInt(w-2));
    }
    $(this).parent().parent().find(".drop").hide()
    $(this).hide();
  })

  /** 下拉框 **/
  var sz=20000;//下拉初始z-index, 解决ie6 z-index bug
  $(".select.list").click(function(event) {
    event.stopPropagation();
    closeOpened();
    opend = $(this).find(".drop");
    $(opend).show();
    $(this).css("z-index",sz++);
  })
  $(".select.list .drop a").click(function(event) {
    event.stopPropagation();
    if(!$(this).hasClass("first")) {
      r = $(this).parent().parent().parent().parent();
      $(this).parent().parent().find(".on").removeClass("on");
      $(this).addClass("on");
      $(r).find("span").html($(this).text());
      $(r).find("select").get(0).selectedIndex = ($(this).parent().index())
      $(r).find("select").change();
    }
    closeOpened();
  })

  /** 密码框默认清空 **/
  $("input[type=password]").val("");
  /** 输入框变化 **/
  $('.input_change').hover(function() {
    $(this).css('border', '1px solid #7ea3c9');
  }, function() {
    $(this).css('border', '1px solid #D6D6D6');
  });

  /** 文字提示 **/
  $('.list_msg').hover(function() {
    $(".msg ul li").html($(this).attr("name"));
    $(".msg").css('top', $(this).position().top - 10).css('left', $(this).position().left - 260).show();
  }, function() {
    $(".msg").hide();
  });

  /** 关闭已开启的浮层 **/
  $("html").click(function() {
    closeOpened();
  })

  function closeOpened() {
    if(opend !== null) {
      $(opend).hide();
      opend = null;
    }
  }
})

/** 弹出层开始 **/
//调整位置


function BOX_layout() {
  $('#BOX_overlay').css({
    "height": $("body").height() + 'px',
    "display": ""
  })
}

//显示


function BOX_show(box) {
  if($("#" + box + ":visible")[0]) {
    return;
  }
  if(!$('#BOX_overlay')[0]) {
    $('body').append("<div id='BOX_overlay'></div>");
    BOX_layout();
  }
  BOX_center(box);
  //改变窗体重新调整位置
  window.onresize = function() {
    BOX_layout();
    BOX_center(box);
  }

  window.onscroll = function() {
    if(isIE6) {
      BOX_layout();
      BOX_center(box);
    }
  }

  document.onkeyup = function(event) {
    var evt = window.event || event;
    var code = evt.keyCode ? evt.keyCode : evt.which;
    if(code == 27) {
      BOX_remove(box);
    }
  }
}

function BOX_center(box) {
  var t = isIE6 ? (($(window).height() - (parseInt($("#" + box).height()))) / 2) + $(window).scrollTop() + "px" : (($(window).height() - (parseInt($("#" + box).height()))) / 2) + "px"
  var l = isIE6 ? (($(window).width() - (parseInt($("#" + box).width()))) / 2) + $(window).scrollLeft() + "px" : (($(window).width() - (parseInt($("#" + box).width()))) / 2) + "px"
  $("#" + box).css({
    "z-index": 99999,
    "display": 'block',
    "left": l,
    "top": t
  })
}
//移除


function BOX_remove(box) {
  window.onscroll = null;
  window.onresize = null;
  $('#BOX_overlay').remove();
  $('#' + box).hide();
  var selects = document.getElementsByTagName('select');
  for(i = 0; i < selects.length; i++) {
    selects[i].style.visibility = "visible";
  }
} /** 弹出层结束 **/


/*! Copyright (c) 2010 Brandon Aaron (http://brandonaaron.net)
 * Dual licensed under the MIT (MIT_LICENSE.txt)
 * and GPL Version 2 (GPL_LICENSE.txt) licenses.
 *
 * Version: 1.1.1
 * Requires jQuery 1.3+
 * Docs: http://docs.jquery.com/Plugins/livequery
 */

(function($) {

$.extend($.fn, {
  livequery: function(type, fn, fn2) {
    var self = this, q;

    // Handle different call patterns
    if ($.isFunction(type))
      fn2 = fn, fn = type, type = undefined;

    // See if Live Query already exists
    $.each( $.livequery.queries, function(i, query) {
      if ( self.selector == query.selector && self.context == query.context &&
        type == query.type && (!fn || fn.$lqguid == query.fn.$lqguid) && (!fn2 || fn2.$lqguid == query.fn2.$lqguid) )
          // Found the query, exit the each loop
          return (q = query) && false;
    });

    // Create new Live Query if it wasn't found
    q = q || new $.livequery(this.selector, this.context, type, fn, fn2);

    // Make sure it is running
    q.stopped = false;

    // Run it immediately for the first time
    q.run();

    // Contnue the chain
    return this;
  },

  expire: function(type, fn, fn2) {
    var self = this;

    // Handle different call patterns
    if ($.isFunction(type))
      fn2 = fn, fn = type, type = undefined;

    // Find the Live Query based on arguments and stop it
    $.each( $.livequery.queries, function(i, query) {
      if ( self.selector == query.selector && self.context == query.context &&
        (!type || type == query.type) && (!fn || fn.$lqguid == query.fn.$lqguid) && (!fn2 || fn2.$lqguid == query.fn2.$lqguid) && !this.stopped )
          $.livequery.stop(query.id);
    });

    // Continue the chain
    return this;
  }
});

$.livequery = function(selector, context, type, fn, fn2) {
  this.selector = selector;
  this.context  = context;
  this.type     = type;
  this.fn       = fn;
  this.fn2      = fn2;
  this.elements = [];
  this.stopped  = false;

  // The id is the index of the Live Query in $.livequery.queries
  this.id = $.livequery.queries.push(this)-1;

  // Mark the functions for matching later on
  fn.$lqguid = fn.$lqguid || $.livequery.guid++;
  if (fn2) fn2.$lqguid = fn2.$lqguid || $.livequery.guid++;

  // Return the Live Query
  return this;
};

$.livequery.prototype = {
  stop: function() {
    var query = this;

    if ( this.type )
      // Unbind all bound events
      this.elements.unbind(this.type, this.fn);
    else if (this.fn2)
      // Call the second function for all matched elements
      this.elements.each(function(i, el) {
        query.fn2.apply(el);
      });

    // Clear out matched elements
    this.elements = [];

    // Stop the Live Query from running until restarted
    this.stopped = true;
  },

  run: function() {
    // Short-circuit if stopped
    if ( this.stopped ) return;
    var query = this;

    var oEls = this.elements,
      els  = $(this.selector, this.context),
      nEls = els.not(oEls);

    // Set elements to the latest set of matched elements
    this.elements = els;

    if (this.type) {
      // Bind events to newly matched elements
      nEls.bind(this.type, this.fn);

      // Unbind events to elements no longer matched
      if (oEls.length > 0)
        $.each(oEls, function(i, el) {
          if ( $.inArray(el, els) < 0 )
            $.event.remove(el, query.type, query.fn);
        });
    }
    else {
      // Call the first function for newly matched elements
      nEls.each(function() {
        query.fn.apply(this);
      });

      // Call the second function for elements no longer matched
      if ( this.fn2 && oEls.length > 0 )
        $.each(oEls, function(i, el) {
          if ( $.inArray(el, els) < 0 )
            query.fn2.apply(el);
        });
    }
  }
};

$.extend($.livequery, {
  guid: 0,
  queries: [],
  queue: [],
  running: false,
  timeout: null,

  checkQueue: function() {
    if ( $.livequery.running && $.livequery.queue.length ) {
      var length = $.livequery.queue.length;
      // Run each Live Query currently in the queue
      while ( length-- )
        $.livequery.queries[ $.livequery.queue.shift() ].run();
    }
  },

  pause: function() {
    // Don't run anymore Live Queries until restarted
    $.livequery.running = false;
  },

  play: function() {
    // Restart Live Queries
    $.livequery.running = true;
    // Request a run of the Live Queries
    $.livequery.run();
  },

  registerPlugin: function() {
    $.each( arguments, function(i,n) {
      // Short-circuit if the method doesn't exist
      if (!$.fn[n]) return;

      // Save a reference to the original method
      var old = $.fn[n];

      // Create a new method
      $.fn[n] = function() {
        // Call the original method
        var r = old.apply(this, arguments);

        // Request a run of the Live Queries
        $.livequery.run();

        // Return the original methods result
        return r;
      }
    });
  },

  run: function(id) {
    if (id != undefined) {
      // Put the particular Live Query in the queue if it doesn't already exist
      if ( $.inArray(id, $.livequery.queue) < 0 )
        $.livequery.queue.push( id );
    }
    else
      // Put each Live Query in the queue if it doesn't already exist
      $.each( $.livequery.queries, function(id) {
        if ( $.inArray(id, $.livequery.queue) < 0 )
          $.livequery.queue.push( id );
      });

    // Clear timeout if it already exists
    if ($.livequery.timeout) clearTimeout($.livequery.timeout);
    // Create a timeout to check the queue and actually run the Live Queries
    $.livequery.timeout = setTimeout($.livequery.checkQueue, 20);
  },

  stop: function(id) {
    if (id != undefined)
      // Stop are particular Live Query
      $.livequery.queries[ id ].stop();
    else
      // Stop all Live Queries
      $.each( $.livequery.queries, function(id) {
        $.livequery.queries[ id ].stop();
      });
  }
});

// Register core DOM manipulation methods
$.livequery.registerPlugin('append', 'prepend', 'after', 'before', 'wrap', 'attr', 'removeAttr', 'addClass', 'removeClass', 'toggleClass', 'empty', 'remove', 'html');

// Run Live Queries when the Document is ready
$(function() { $.livequery.play(); });

})(jQuery);