(function(b,d){var c=wp.customize,a;a=function(g,e,f){var h;return function(){var i=arguments;f=f||this;clearTimeout(h);h=setTimeout(function(){h=null;g.apply(f,i)},e)}};c.Preview=c.Messenger.extend({initialize:function(g,f){var e=this;c.Messenger.prototype.initialize.call(this,g,null,f);this.body=d(document.body);this.body.on("click.preview","a",function(h){h.preventDefault();e.send("url",d(this).attr("href"))});this.body.on("submit.preview","form",function(h){h.preventDefault()});this.window=d(window);this.window.on("scroll.preview",a(function(){e.send("scroll",e.window.scrollTop())},200));this.bind("scroll",function(h){e.window.scrollTop(h)})}});d(function(){c.settings=window._wpCustomizeSettings;if(!c.settings){return}var f,e;f=new c.Preview(window.location.href);d.each(c.settings.values,function(h,g){c.set(h,g)});f.bind("setting",function(g){c.set.apply(c,g)});e=d(document.body);c("background_color",function(g){g.bind(function(h){e.css("background-color",h?"#"+h:"")})})})})(wp,jQuery);