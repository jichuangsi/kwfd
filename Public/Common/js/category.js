$(function(){
			/* 分类展开收起 */
			$(".category dd").prev().find(".fold i").addClass("icon-unfold")
			.click(function(){
					var self = $(this);
					if(self.hasClass("icon-unfold")){
						self.closest("dt").next().slideUp("fast", function(){
							self.removeClass("icon-unfold").addClass("icon-fold");
						});
					} else {
						self.closest("dt").next().slideDown("fast", function(){
							self.removeClass("icon-fold").addClass("icon-unfold");
						});
					}
				});
		});