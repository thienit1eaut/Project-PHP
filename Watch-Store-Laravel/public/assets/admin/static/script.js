$(document).ready(function(){$('.insert_tag').click(function(event){event.preventDefault();var _this=this;var v=$(this).prev().val();if(v=="")return;event.preventDefault();$.ajax({url:$(this).attr('href'),method:'POST',global:!1,data:{name:v,controller:$(this).next().val()}}).done(function(data){if($.isNumeric(data)){var o="<li><input type='checkbox'  value='"+data+"'/>"+v+"</li>";$(_this).parent().parent().find('.mCSB_container').append(o);$(_this).parent().parent().find('.multiselect').find('li').show();$(_this).parent().parent().find('.multiselect').find('input[type=checkbox]').last().trigger('change').trigger('click');$(_this).prev().val('')}})})})
var TECH5SADMIN_NOTIFY = (function(){
	var init = function(){
		$('.sysMenu li.notification').click(function(event) {
			 $(this).toggleClass('active');
		});
	}
	return {
		_:function(){
			init();
		}
	}
})();
$(function() {
	
TECH5SADMIN_NOTIFY._();
});